<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostComments;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ManagementCommentController extends Controller
{
    public function index(Request $request)
    {
        $query = PostComments::with('post')->orderBy('id', 'DESC');

        // Optional search by comment content, name, or email
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('comment', 'like', '%' . $request->search . '%')
                    ->orWhere('comment_name', 'like', '%' . $request->search . '%')
                    ->orWhere('comment_email', 'like', '%' . $request->search . '%');
            });
        }

        // Get the total number of comments
        $totalComments = $query->count();

        // Calculate the maximum per-page limit (up to 100 records per page)
        $maxPerPage = min(100, $totalComments);

        // Dynamically generate per-page options (in increments of 10, up to the maximum number of records)
        $perPageOptions = [];
        for ($i = 10; $i <= $maxPerPage; $i += 10) {
            $perPageOptions[] = $i;
        }

        // Default to 20 per page if no value is provided
        $perPage = $request->get('per_page', 20);

        // Paginate the results
        $comments = $query->paginate($perPage)->appends($request->all());

        // Return view with comments, dynamic per-page options
        return view('admin.blog.admin-comments', compact('comments', 'perPage', 'perPageOptions'));
    }




    public function approveComment($id)
    {
        try 
        {
            DB::beginTransaction();
    
            $comment = PostComments::find($id);
    
            if (!$comment) 
            {
                return redirect()->back()->with('error', 'Comment not found.');
            }
    
            $comment->status = 'APPROVED';
            $comment->save();
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Comment approved successfully.');
        } 
        catch (\Exception $ex) 
        {
            DB::rollBack();
            Log::error('Error approving comment ID ' . $id . ': ' . $ex->getMessage());
    
            return redirect()->back()->with('error', 'An unexpected error occurred while approving the comment.');
        }
    }
    
}
