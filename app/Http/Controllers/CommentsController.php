<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComments;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentsController extends Controller
{
    public function store(Request $request, $slug, $id)
    {
        $request->validate([
            'comment_email' => ['required', 'email'],
            'comment_name' => ['required', 'string'],
            'comment' => ['required', 'string'],
            'parent_id' => ['nullable', 'exists:post_comment,id'],
            'g-recaptcha-response' => ['required', 'captcha'],
        ], [
            'comment_email.required' => 'This field is required',
            'comment_email.email' => 'Invalid email',
            'comment_name.required' => 'This field is required',
            'comment_name.string' => 'Invalid input',
            'comment.required' => 'This field is required',
            'comment.string' => 'Invalid input',
            'parent_id.exists' => 'An error occurred. You cannot reply to this comment',
            'g-recaptcha-response.required' => 'This field is required',
            'g-recaptcha-response.captcha' => 'Invalid input'
        ]);   

        try 
        {
            DB::beginTransaction();

            $post = Post::where('id', $id)->where('slug', $slug)->first();

            if(!$post)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'You can not comment on this post'
                ], 404);
            }

            $comment_name = htmlspecialchars(trim($request->comment_name), ENT_QUOTES, 'utf-8');
            $comment_email = htmlspecialchars(trim($request->comment_email), ENT_QUOTES, 'utf-8');
            $comment = htmlspecialchars(trim($request->comment), ENT_QUOTES, 'utf-8');
            $parent_id = htmlspecialchars(trim($request->parent_id), ENT_QUOTES, 'utf-8');

            PostComments::create([
                'comment_name' => $comment_name,
                'comment_email' => $comment_email,
                'comment' => $comment,
                'post_id' => $id,
                'status' => 'PENDING',
                'parent_id' => $parent_id ?? null
            ]); 

            DB::commit();

            $message = $parent_id ? 'Your reply to this comment is waiting approval' : 'Your comment is waiting for moderation';

            return response()->json([
                'success' => true,
                'message' => $message
            ], 200);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst commenting on this post: ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst commenting on this post'
            ], 500);
        }
    }
}
