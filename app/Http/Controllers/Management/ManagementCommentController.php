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
    public function index()
    {
        $comments = PostComments::with('post')->where('status', 'APPROVED')->orderBy('id', 'DESC')->get();
        return view('admin.blog.admin-comments', ['comments' => $comments]);
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
