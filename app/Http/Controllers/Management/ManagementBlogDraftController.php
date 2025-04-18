<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ManagementBlogDraftController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 11);

        $query = Post::with('categoryName')->whereIn('status', ['Draft', 'Schedule']); 

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

        return view('admin.blog.admin-draft', compact('posts', 'perPageOptions'));
    }
}
