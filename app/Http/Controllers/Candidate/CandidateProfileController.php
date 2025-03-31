<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CandidateProfileController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'] // Validate image format
        ], [
            'file.required' => 'Please an image to upload',
            'file.image' => 'Please upload an image',
            'file.mimes' => 'Unknown file type',
            'file.max' => 'Please reduce file size'
        ]);

        $user = Auth::user();

        try 
        {
            DB::beginTransaction();
    
            if ($request->hasFile('file')) 
            {
                $file = $request->file('file');

                $filename = time() . '_' . $file->getClientOriginalName();

                $uploadPath = public_path('uploads/avatars');
    
                // Create the directory if it does not exist
                if (!file_exists($uploadPath)) 
                {
                    mkdir($uploadPath, 0777, true); // Create directory with full permissions
                }
    
                // Delete existing avatar if it exists and is not the default
                if ($user->avatar && file_exists(public_path($user->avatar))) {
                    unlink(public_path($user->avatar));
                }
    
                // Move new file to public/uploads/avatars
                $file->move($uploadPath, $filename);
    
                // Update user's avatar path
                $user->avatar = "/uploads/avatars/" . $filename;
                $user->save();
            }
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Profile image updated successfully',
                'avatar' => asset('uploads/avatars/' . $filename) // Send updated URL
            ], 200);
        } catch (Exception $ex) {
            DB::rollBack();
    
            Log::error('Error updating profile image:', [$ex]);
    
            return response()->json([
                'success' => false,
                'message' => 'Error updating profile image'
            ], 500);
        }
    }

    public function deleteAvatar(Request $request)
    {
        $user = Auth::user();

        if ($user->avatar && file_exists(public_path($user->avatar))) 
        {
            unlink(public_path($user->avatar)); // Delete existing avatar
        }

        $user->avatar = null; // Reset avatar field in database
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile image deleted successfully'
        ], 200);
    }


}
