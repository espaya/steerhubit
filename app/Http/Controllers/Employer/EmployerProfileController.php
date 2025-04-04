<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\EmployerProfile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployerProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = EmployerProfile::where('userID', $user->id)->first();

        // dd($profile->employer_state);

        return view('employer.employer-company-profile', ['profile' => $profile]);
    }


    public function removeAvatar(Request $request)
    {
        $user = Auth::user();

        try 
        {
            // Check if user has an avatar
            if ($user && $user->avatar) 
            {
                $avatarPath = public_path('uploads/avatars/' . $user->avatar);

                // Delete the file if it exists
                if (file_exists($avatarPath)) {
                    unlink($avatarPath);
                }

                // Clear avatar field in DB
                $user->update(['avatar' => '']);

                return response()->json([
                    'success' => true,
                    'message' => 'Company logo removed successfully',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Company logo not found.',
            ], 404);
        } 
        catch (Exception $ex) 
        {
            Log::error('Error removing company logo: ' . $ex->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while removing the company logo.',
            ], 500);
        }
    }



    public function employerAvatarUpdate(Request $request)
    {
        $request->validate([
            'employer_avatar' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp']
        ], [
            'employer_avatar.required' => 'Please select your company\'s logo',
            'employer_avatar.image' => 'Select a valid image file',
            'employer_avatar.mimes' => 'Unknown file type'
        ]);

        
        // Get authenticated employer
        $user = Auth::user();

        try 
        {
            DB::beginTransaction();

            if ($request->hasFile('employer_avatar')) 
            {
                $file = $request->file('employer_avatar');
                $directory = public_path('uploads/avatars');

                // Create directory if it doesn't exist
                if (!file_exists($directory)) 
                {
                    mkdir($directory, 0777, true);
                }

                $employer = User::where('id', $user->id)->first();

                if (!$employer) 
                {
                    return response()->json([
                        'success' => false,
                        'message' => 'User not found'
                    ], 404);
                } 
                
                    // Remove old image from directory
                if ($employer->avatar) 
                {
                    $oldImagePath = $directory . '/' . $employer->avatar;
                    
                    if (file_exists($oldImagePath)) 
                    {
                        unlink($oldImagePath);
                    }
                }
                

                // Generate unique filename
                $filename = uniqid('avatar_') . '.' . $file->getClientOriginalExtension();

                // Move file to destination
                $file->move($directory . '/', $filename);

                // Update employer avatar path
                $employer->avatar = $filename;
                $employer->save(); // Ensure it saves to the database

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Company logo uploaded successfully',
                    'avatar_url' => asset('uploads/avatars/' . $filename) // Send URL for frontend display
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'No file uploaded'
            ], 400);

        } 
        catch (Exception $ex) 
        {
            DB::rollBack();

            Log::error('Error uploading company logo: ' . $ex->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while uploading the company logo'
            ], 500);
        }
    }

    public function updateEmployerProfile(Request $request)
    {
        $request->validate([
            'employer_name' => [
                'required',
                'string',
                'unique:employer_profile,employer_name'
            ],

            'employer_email' => [
                'required',
                'string',
                'email',
                'unique:employer_profile,employer_email'  // Fixed: employer_email should be validated
            ],

            'employer_phone' => [
                'required',
                'string',
                'regex:/^\+?(\d{1,4})?[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}$/'
            ],

            'employer_website' => [
                'required',
                'string',
                'regex:/^(https?:\/\/)?(?!([a-zA-Z0-9-]+\.)?steerhubit\.com)([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],

            'employer_category' => [
                'required',
                'string'
            ],

            'employer_public_view_profile' => [
                'required',
                'string'
            ],

            'employer_facebook' => [
                'nullable',
                'string',
                'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[a-zA-Z0-9(\.\?)?]/'
            ],

            'employer_instagram' => [
                'nullable',
                'string',
                'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[a-zA-Z0-9._-]+\/?$/'
            ],

            'employer_linkedin' => [
                'nullable',
                'string',
                'regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/(in|company)\/[a-zA-Z0-9-]+\/?$/'
            ],

            'employer_country' => [
                'required',
                'string'
            ],

            'employer_state' => [
                'required',
                'string'
            ],

            'employer_present_address' => [
                'required',
                'string'
            ],

            'employer_postal_code' => [
                'required',
                'string'
            ]
        ], [
            'employer_name.required' => 'This field is required',
            'employer_name.string' => 'Invalid input',
            'employer_name.unique' => 'This company name already exists',

            'employer_email.required' => 'This field is required',
            'employer_email.string' => 'Invalid input',
            'employer_email.email' => 'Invalid email',
            'employer_email.unique' => 'This email already exists',

            'employer_phone.required' => 'This field is required',
            'employer_phone.string' => 'Invalid input',
            'employer_phone.regex' => 'Invalid phone number',

            'employer_website.required' => 'This field is required',
            'employer_website.string' => 'Invalid input',
            'employer_website.regex' => 'Invalid url',

            'employer_category.required' => 'This field is required',
            'employer_category.string' => 'Invalid input',

            'employer_public_view_profile.required' => 'This field is required',
            'employer_public_view_profile.string' => 'Invalid input',

            'employer_facebook.string' => 'Invalid input',
            'employer_facebook.regex' => 'Invalid facebook url',
            'employer_instagram.string' => 'Invalid input',
            'employer_instagram.regex' => 'Invalid instagram url',
            'employer_linkedin.string' => 'Invalid input',
            'employer_linkedin.regex' => 'Invalid linkedin url',

            'employer_country.required' => 'This field is required',
            'employer_country.string' => 'Invalid input',

            'employer_state.required' => 'This field is required',
            'employer_state.string' => 'Invalid input',

            'employer_present_address.required' => 'This field is required',
            'employer_present_address.string' => 'Invalid input',

            'employer_postal_code.required' => 'This field is required',
            'employer_postal_code.string' => 'Invalid input',
        ]);

       
        $user = Auth::user();

        try 
        {
            DB::beginTransaction();

            $employer = EmployerProfile::where('userID', $user->id)->first();

            if (!$employer) 
            {
                // Create profile if employer does not exist
                $employer = new EmployerProfile();
            }

            // Sanitizing and assigning the form data
            if ($request->filled('employer_name')) 
            {
                $employer->employer_name = htmlspecialchars(trim($request->employer_name), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_email')) 
            {
                $employer->employer_email = htmlspecialchars(trim($request->employer_email), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_phone')) 
            {
                $employer->employer_phone = htmlspecialchars(trim($request->employer_phone), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_website')) 
            {
                $employer->employer_website = htmlspecialchars(trim($request->employer_website), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_category')) 
            {
                $employer->employer_category = htmlspecialchars(trim($request->employer_category), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_public_view_profile')) 
            {
                $employer->employer_public_view_profile = htmlspecialchars(trim($request->employer_public_view_profile), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_facebook')) 
            {
                $employer->employer_facebook = htmlspecialchars(trim($request->employer_facebook), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_instagram')) 
            {
                $employer->employer_instagram = htmlspecialchars(trim($request->employer_instagram), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_linkedin')) 
            {
                $employer->employer_linkedin = htmlspecialchars(trim($request->employer_linkedin), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_country')) 
            {
                $employer->employer_country = htmlspecialchars(trim($request->employer_country), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_state')) 
            {
                $employer->employer_state = htmlspecialchars(trim($request->employer_state), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_present_address')) 
            {
                $employer->employer_present_address = htmlspecialchars(trim($request->employer_present_address), ENT_QUOTES, 'UTF-8');
            }

            if ($request->filled('employer_postal_code')) 
            {
                $employer->employer_postal_code = htmlspecialchars(trim($request->employer_postal_code), ENT_QUOTES, 'UTF-8');
            }

            if(!$employer->userID)
            {
                $employer->userID = $user->id;
            }

            // Check if any changes are made
            if ($employer->isDirty()) 
            {
                $employer->save();

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Your company profile updated successfully'
                ], 200);
            }

            // If no changes, return a success message
            return response()->json([
                'success' => true,
                'message' => 'No Changes Detected'
            ], 200);

        } catch (Exception $ex) {
            // Rollback transaction and log error
            DB::rollback();
            Log::error('Error occurred while saving employer profile: ' . $ex->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred saving your company profile'
            ], 500);
        }
    }

}
