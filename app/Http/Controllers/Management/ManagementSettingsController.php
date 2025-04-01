<?php

namespace App\Http\Controllers\Management;


use App\Http\Controllers\Controller;
use App\Models\SocialProfiles;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ManagementSettingsController extends Controller
{
    public function index()
    {
        $socialsData = SocialProfiles::get();

        $socials = $socialsData->isEmpty() ? null : $socialsData->first();

        return view('admin.admin-settings', ['socials' => $socials]);
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/'],
            'repeat_password' => ['required', 'same:new_password']
        ], [
            'old_password.required' => 'This field is required',
            'new_password.required' => 'This field is required',
            'new_password.regex' => 'The password must contain at least one uppercase letter, one number, one special character, and be at least 8 characters long.',
            'repeat_password.required' => 'This field is required',
            'repeat_password.same' => 'Passowords do not match'
        ]);

        try 
        {
            DB::beginTransaction();

            $user = User::find($id);

            Log::error($user);

            if($user)
            {
                $old_password = $request->old_password;
                $db_password = $user->password;
                // Check if old_password match db password
                $passwordMatch = Hash::check($old_password, $db_password);

                if(Hash::check($request->new_password, $db_password))
                {
                    return response()->json([
                        'success' => false,
                        'message' => 'New password cannot be same as old password'
                    ], 422);
                }

                if(!$passwordMatch)
                {
                    return response()->json([
                        'success' => false,
                        'message' => 'Incorrect existing password'
                    ], 422);
                }

                if($request->filled('new_password'))
                {
                    $user->password = Hash::make($request->input('new_password'));
                }

                if($user->isDirty('password'))
                {
                    $user->save();

                    DB::commit();

                    return response()->json([
                        'success' => true,
                        'message' => 'Password updated successfully'
                    ], 200);
                }
                else 
                {
                    return response()->json([
                        'success' => false,
                        'message' => 'No Changes Detected'
                    ], 400);
                }
            }
            else 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred when saving your passowrd: ' . $ex);
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred when saving your passowrd'
            ], 500);
        }
    }

    public function updateUsernameEmail(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($id)],
            'name' => ['required', 'string', Rule::unique('users', 'name')->ignore($id)]
        ],[
            'name.required' => 'This field is required',
            'name.string' => 'Invalid inputs',
            'email.required' => 'This field is required',
            'email.string' => 'Invalid inputs',
            'email.email' => 'Invalid email format'
        ]);

        try 
        {
            DB::beginTransaction();

            $user = User::find($id);

            if($user)
            {
                // Check if the request contains new values and update the fields
                if($request->filled('email'))
                {
                    $user->email = $request->input('email');
                }

                if($request->filled('name'))
                {
                    $user->name = $request->input('name');
                }

                // Check if any changes were made before saving
                if($user->isDirty(['email', 'name']))
                {
                    $user->save();
                    DB::commit();

                    return response()->json([
                        'success' => true,
                        'message' => 'Username and email updated successfully'
                    ], 200);
                }
                else 
                {
                    return response()->json([
                        'success' => false,
                        'message' => 'No changes detected'
                    ], 400);
                }
            }
            else 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

        }
        catch(Exception $ex)
        {
            DB::rollBack();

            Log::error('Unknown error occurred updating username and email: ' . $ex);

            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred updating username and email'
            ], 500);
        }
    }

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

        $id = Auth::user()->id;
         
        try 
        {
            DB::beginTransaction();

            $user = User::find($id);

            
            Log::error($user);

            if(!$user)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }
    
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
                $oldAvatarPath = public_path('uploads/avatars/' . $user->avatar);

                if ($user->avatar && file_exists($oldAvatarPath)) 
                {
                    unlink($oldAvatarPath);
                }

    
                // Move new file to public/uploads/avatars
                $file->move("$uploadPath/", $filename);
    
                // Update user's avatar path
                $user->avatar = $filename;
                $user->save();
            }
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Profile image updated successfully',
                'avatar' => asset('uploads/avatars/' . $filename) // Send updated URL
            ], 200);
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred saving profile picture: '. $ex);
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred saving profile picture'
            ], 500);
        }
    }

    public function bannerImage(Request $request)
    {
        $request->validate([
            'bannerImg' => 
                [
                    'required', 
                    'image', 
                    'mimes:jpeg,png,jpg,gif,webp', 
                    'max:2048'
                    ] // Validate image format
        ], [
            'bannerImg.required' => 'Please an image to upload',
            'bannerImg.image' => 'Please upload an image',
            'bannerImg.mimes' => 'Unknown file type',
            'bannerImg.max' => 'Please reduce file size'
        ]);

        $id = Auth::user()->id;
         
        try 
        {
            DB::beginTransaction();

            $user = User::find($id);

            if(!$user)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }
    
            if ($request->hasFile('bannerImg')) 
            {
                $file = $request->file('bannerImg');

                $filename = time() . '_' . $file->getClientOriginalName();

                $uploadPath = public_path('uploads');
    
                // Create the directory if it does not exist
                if (!file_exists($uploadPath)) 
                {
                    mkdir($uploadPath, 0777, true); // Create directory with full permissions
                }
    
                // Delete existing avatar if it exists and is not the default
                $oldbannerImgPath = public_path('uploads/' . $user->bannerImg);

                if ($user->bannerImg && file_exists($oldbannerImgPath)) 
                {
                    unlink($oldbannerImgPath);
                }

    
                // Move new file to public/uploads/avatars
                $file->move("$uploadPath/", $filename);
    
                // Update user's avatar path
                $user->bannerImg = $filename;
                $user->save();
            }
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Profile image updated successfully',
                'bannerImg' => asset('uploads/' . $filename) // Send updated URL
            ], 200);
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred saving banner image: '. $ex);
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst saving banner image'
            ], 500);
        }
    }

    public function socialProfiles(Request $request)
    {
        $request->validate([
            'facebook' => ['nullable', 'string', 'regex:/^https:\/\/(www\.)?facebook\.com\//'],
            'twitter' => ['nullable', 'string', 'regex:/^https:\/\/(www\.)?(twitter|x)\.com\//'], // Twitter/X
            'instagram' => ['nullable', 'string', 'regex:/^https:\/\/(www\.)?instagram\.com\//'],
            'linkedin' => ['nullable', 'string', 'regex:/^https:\/\/(www\.)?linkedin\.com\//'],
            'youtube' => ['nullable', 'string', 'regex:/^https:\/\/(www\.)?youtube\.com\//'], 
        ], [
            'facebook.regex' => 'The Facebook link must start with https://facebook.com/',
            'facebook.string' => 'Invalid input',
            'twitter.regex' => 'The Twitter/X link must start with https://twitter.com/ or https://x.com/',
            'twitter.string' => 'Invalid input',
            'instagram.regex' => 'The Instagram link must start with https://instagram.com/',
            'instagram.string' => 'Invalid input',
            'linkedin.regex' => 'The LinkedIn link must start with https://linkedin.com/',
            'linkedin.string' => 'Invalid input',
            'youtube.regex' => 'The YouTube link must start with https://youtube.com/',
            'youtube.string' => 'Invalid input',
        ]);

        try 
        {
            DB::beginTransaction();
        
            // Assuming the super admin is the only one updating the social profiles
            $social = SocialProfiles::first(); // Get the first record, assuming there is only one record for the super admin
        
            if (!$social) 
            {
                // If no record exists, create a new one
                $social = new SocialProfiles();
            }
        
            // Update only the fields that are filled in the request
            if ($request->filled('facebook')) 
            {
                $social->facebook = $request->input('facebook');
            }
        
            if ($request->filled('twitter')) 
            {
                $social->twitter = $request->input('twitter');
            }
        
            if ($request->filled('instagram')) 
            {
                $social->instagram = $request->input('instagram');
            }
        
            if ($request->filled('linkedin')) 
            {
                $social->linkedin = $request->input('linkedin');
            }
        
            if ($request->filled('youtube')) 
            {
                $social->youtube = $request->input('youtube');
            }
        
            // Check if any of the fields were updated
            if ($social->isDirty(['facebook', 'twitter', 'instagram', 'linkedin', 'youtube'])) 
            {
                $social->save();
                DB::commit();
        
                return response()->json([
                    'success' => true,
                    'message' => 'Social profiles saved successfully'
                ], 200);
            }
        
            // No changes were detected, roll back
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'No changes were detected'
            ], 200);
        
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
        
            Log::error('An error occurred saving changes to social links: ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred saving changes'
            ], 500);
        }        
    }

}
