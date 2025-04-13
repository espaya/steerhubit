<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ManagementBlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        $query = Post::where('status', 'Publish');

        if ($search) 
        {
            $query->where('title', 'like', "%{$search}%");
        }

        $totalPosts = $query->count(); // total records

        $posts = $query->orderBy('id', 'DESC')->paginate($perPage)->appends([
            'search' => $search,
            'per_page' => $perPage
        ]);

        // Safe dynamic per page options
        $maxPerPage = min(100, $totalPosts);
        $perPageOptions = $maxPerPage >= 10
            ? collect(range(10, $maxPerPage, 10))->toArray()
            : [10]; // fallback

        return view('admin.blog.admin-blog', compact('posts', 'perPageOptions'));
    }

    public function create()
    {
        $categories = PostCategory::orderBy('category_name', 'desc')->get();

        return view('admin.blog.admin-blog-new', ['categories' => $categories]);
    }

    public function destroy($id)
    {
        try 
        {
            $post = Post::find($id);
    
            if ($post) 
            {
                // Get the associated category
                $category = PostCategory::where('id', $post->category)->first();
    
                // Check if category exists before attempting to decrement count
                if ($category) 
                {
                    $category->category_count--;
                    $category->save();
                }

                // delete featured image from dir
                $featuredImage = public_path('uploads/posts/' . $post->featured_image);
                
                if(file_exists($featuredImage))
                {
                    unlink($featuredImage);
                }
    
                // Delete the post
                $post->delete();
    
                return redirect()->back()->with(['success' => 'Post deleted successfully']);
            }
    
            return redirect()->back()->with(['error' => 'Post not found']);
        }
        catch (Exception $ex)
        {
            Log::error('Unknown error occurred whilst deleting post: ' . $ex->getMessage());
            return redirect()->back()->with(['error' => 'Unknown error occurred whilst deleting post']);
        }
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],
            'tags' => ['required', 'array'],
            'status' => ['required', 'in:Publish,Draft,Schedule'],
            'schedule' => ['nullable', 'date'],
            'featured_image' => ['required', 'mimes:png,jpg,jpeg,webp,gif', 'max:2048']
        ], [
            'title.required' => 'This field is required',
            'title.string' => 'Invalid input',
            'description.required' => 'This field is required',
            'description.string' => 'Invalid input',
            'category.required' => 'This field is required',
            'category.string' => 'Invalid input',
            'tags.required' => 'This field is required',
            'tags.array' => 'Invalid input',
            'status.required' => 'This field is required',
            'status.in' => 'Unknown status option',
            'schedule.date' => 'Invalid input',
            'featured_image.required' => 'This field is required',
            'featured_image.mimes' => 'Invalid file type. Please select an image file',
            'featured_image.max' => 'Image size is too big'
        ]);

        try 
        {
            DB::beginTransaction();

            $title = htmlspecialchars(trim($request->title), ENT_QUOTES, 'utf-8');
            $description = htmlspecialchars(trim($request->description), ENT_QUOTES, 'utf-8');
            $category = htmlspecialchars(trim($request->category), ENT_QUOTES, 'utf-8');
            $tags = $request->tags;
            $status = htmlspecialchars(trim($request->status), ENT_QUOTES, 'utf-8');
            $schedule = htmlspecialchars(trim($request->schedule), ENT_QUOTES, 'utf-8');


            $imageDir = public_path('uploads/posts');
            if (!File::exists($imageDir)) 
            {
                File::makeDirectory($imageDir, 0777, true);
            }
            
            $imageName = '';

            // upload image to public/uploads/posts
            if ($request->hasFile('featured_image')) 
            {
                $image = $request->file('featured_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move($imageDir, $imageName);
            }

            // create and generate a slug for each post, if slug already exists, add -1, -2, etc
            $slug = Str::slug($title);
            $originalSlug = $slug;
            $count = 1;

            while (Post::where('slug', $slug)->exists()) 
            {
                $slug = $originalSlug . '-' . $count++;
            }

            // get category id
            $count = PostCategory::where('category_name', $category)->first();
            // update category count
            $count->category_count++;
            $count->save();

            Post::create([
                'title' => $title,
                'description' => $description,
                'category' => $count->id,
                'tags' => json_encode($tags),
                'status' => $status,
                'schedule' => $schedule,
                'featured_image' => $imageName,
                'slug' => $slug,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
                'slug' => $slug
            ], 200);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Error creating new post: ' . $ex);

            return response()->json([
                'success' => false,
                'message' => 'Error occurred whilst creating this post'
            ], 500);
        }

    }

}
