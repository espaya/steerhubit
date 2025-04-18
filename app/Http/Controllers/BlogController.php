<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostComments;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        $query = Post::where('status', 'Publish');

        if ($search) {
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

        
        $latest = Post::where('status', 'Publish')->orderBy('id', 'DESC')->paginate(3);

         // Fetch tags from all posts and merge them into a single array
         $tags = Post::orderBy('id', 'DESC')->pluck('tags');
         $tagsArray = [];
         // Merge all the tags into one array
         foreach ($tags as $tag) 
         {
             $tagsArray = array_merge($tagsArray, json_decode($tag, true)); // Merge decoded tags
         }
         // Remove duplicates
         $tagsArray = array_unique($tagsArray);

         // Get all categories
         $categories = PostCategory::all();

        

        return view('blog', [
            'posts' => $posts, 
            'perPageOptions' => $perPageOptions, 
            'latest' => $latest, 
            'tags' => $tagsArray,
            'categories' => $categories,
        ]);
    }

    public function view($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(!$post)
        {
            return view('errors.404');
        }

        $latest = Post::where('status', 'Publish')->orderBy('id', 'DESC')->paginate(3);

        // Fetch tags from all posts and merge them into a single array
        $tags = Post::orderBy('id', 'DESC')->pluck('tags');
        $tagsArray = [];
        // Merge all the tags into one array
        foreach ($tags as $tag) 
        {
            $tagsArray = array_merge($tagsArray, json_decode($tag, true)); // Merge decoded tags
        }
        // Remove duplicates
        $tagsArray = array_unique($tagsArray);

         // Get all categories
         $categories = PostCategory::all();

         $comments = PostComments::where('status', 'APPROVED')
            ->whereNull('parent_id')
            ->with('replies')
            ->where('post_id', $post->id)
            ->latest()
            ->get();

        return view('blog-single', [
            'post' => $post, 
            'latest' => $latest, 
            'tags' => $tagsArray, 
            'categories' => $categories,
            'comments' => $comments
        ]);
    }

}
