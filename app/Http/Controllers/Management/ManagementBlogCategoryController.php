<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ManagementBlogCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search_category = htmlspecialchars(trim($request->search_category), ENT_QUOTES, 'utf-8');

        $query = PostCategory::query();

        if ($search_category) 
        {
            $query->where('category_name', 'LIKE', "%{$search_category}%");
        }

        $total = PostCategory::count();
        $perPage = $request->input('per_page', 10);

        // Generate options like: [10, 20, 30, ..., total]
        $step = 10;
        $perPageOptions = [];

        for ($i = $step; $i < $total; $i += $step) 
        {
            $perPageOptions[] = $i;
        }

        if (!in_array($total, $perPageOptions)) 
        {
            $perPageOptions[] = $total;
        }

        $categories = $query->orderBy('id', 'DESC')->paginate($perPage);

        return view('admin.blog.admin-blog-category', compact('categories', 'perPage', 'perPageOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['required', 'string', 'unique:post_category,category_name'],
            'category_slug' => ['required', 'string', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            'category_description' => ['required', 'string']
        ], [
            'category_name.required' => 'This field is required',
            'category_name.string' => 'Invalid input',
            'category_name.unique' => 'Category name already exists',
            'category_slug.required' => 'This field is required',
            'category_slug.string' => 'Invalid input',
            'category_slug.regex' => 'This field may only contain lowercase letters, numbers, and hyphens (no spaces or special characters).',
            'category_description.required' => 'This field is required',
            'category_description.string' => 'Invalid input'
        ]);

        try 
        {
            DB::beginTransaction();

            $category_name = htmlspecialchars(trim($request->category_name), ENT_QUOTES, 'utf-8');
            $base_slug = htmlspecialchars(trim($request->category_slug), ENT_QUOTES, 'utf-8');
            $category_description = htmlspecialchars(trim($request->category_description), ENT_QUOTES, 'utf-8');

            // Ensure unique slug by appending -1, -2, etc. if needed
            $slug = $base_slug;
            $counter = 1;

            while (PostCategory::where('category_slug', $slug)->exists()) 
            {
                $slug = $base_slug . '-' . $counter;
                $counter++;
            }

            $category = new PostCategory();
            $category->category_name = $category_name;
            $category->category_slug = $slug;
            $category->category_description = $category_description;
            $category->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully'
            ], 200);
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Unknown error occurred whilst creating the category: ' . $ex);
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst creating the category'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Fetch existing category
        $category = PostCategory::findOrFail($id);

        // Validate request
        $request->validate([
            'category_name' => [
                'required',
                'string',
                Rule::unique('post_category', 'category_name')->ignore($category->id)
            ],
            'category_slug' => [
                'required',
                'string',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('post_category', 'category_slug')->ignore($category->id)
            ],
            'category_description' => ['required', 'string']
        ], [
            'category_name.required' => 'This field is required',
            'category_name.string' => 'Invalid input',
            'category_name.unique' => 'Category name already exists',
            'category_slug.required' => 'This field is required',
            'category_slug.string' => 'Invalid input',
            'category_slug.regex' => 'This field may only contain lowercase letters, numbers, and hyphens (no spaces or special characters).',
            'category_slug.unique' => 'Category slug already exists',
            'category_description.required' => 'This field is required',
            'category_description.string' => 'Invalid input'
        ]);

        try 
        {
            DB::beginTransaction();

            $category->category_name = htmlspecialchars(trim($request->category_name), ENT_QUOTES, 'UTF-8');
            $category->category_slug = htmlspecialchars(trim($request->category_slug), ENT_QUOTES, 'UTF-8');
            $category->category_description = htmlspecialchars(trim($request->category_description), ENT_QUOTES, 'UTF-8');

            if ($category->isDirty()) 
            {
                $category->save();

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' =>  'Category updated successfully' 
                ], 200);
            }


            return response()->json([
                'success' => false,
                'message' => 'No changes detected'
            ], 400);
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::error('Error updating category: ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the category'
            ], 500);
        }
    }


    public function destroy($id)
    {
        try 
        {
            DB::beginTransaction();

            $category = PostCategory::find($id);

            if(!$category)
            {
                return redirect()->back()->with(['error' => 'Category not found']);
            }

            // check if category is assigned to post

            // delete category
            $category->delete();

            return redirect()->back()->with(['success' => 'Category deleted successfully']);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst deleting category: ' . $ex);
            return redirect()->back()->with(['error' => 'Unknown error occurred whilst deleting category']);
        }
    }
}
