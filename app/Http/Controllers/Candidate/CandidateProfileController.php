<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CandidateProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = CandidateProfile::where('userID', $user->id)->first();

        return view('employee.employee-profile', ['profile' => $profile]);
    } 

    public function store(Request $request)
    {
         $request->validate([
            'fullname' => ['required', 'string'],
            'phone' => [
                'required',
                'regex:/^(\+?\d{1,4})?0?\d{10}$/'
            ],

            'dob' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'description' => ['required', 'string'],
            'facebook' => [
                'required',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/.+$/i'
            ],

            'instagram' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/.+$/i'],
            'linkedin' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/.+$/i'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'present_address' => ['required', 'string'],
            'postal_code' => ['required', 'string']
        ], [
            'fullname.required' => 'This field is required',
            'fullname.string' => 'Invalid input',
            'phone.required' =>'This field is required',
            'phone.regex' => 'Invalid phone number',
            'dob.required' => 'This field is required',
            'dob.date' => 'Invalid input',
            'gender.required' => 'This field is required',
            'gender.in' => 'Please select the valid option',
            'description.required' => 'This field is required',
            'description.string' => 'Invalid input',
            'facebook.required' => 'This field is required',
            'facebook.url' => 'Invalid url',
            'facebook.regex' => 'Invalid facebook link',
            'instagram.required' => 'This field is required',
            'instagram.url' => 'Invalid url',
            'instagram.regex' => 'Invalid Instagram link',
            'linkedin.required' => 'This field is required',
            'linkedin.url' => 'Invalid url',
            'linkedin.regex' => 'Invalid linkedin link',
            'country.required' => 'This field is required',
            'country.string' => 'Invalid input',
            'state.required' => 'This is field is required',
            'state.string' => 'Invalid input',
            'postal_code.required' => 'This field is required',
            'postal_code.string' => 'Invalid input'
        ]);

        $id = Auth::user()->id;

        try 
        {
            DB::beginTransaction();

            $fullname = htmlspecialchars(trim($request->fullname), ENT_QUOTES, 'UTF-8');
            $phone = htmlspecialchars(trim($request->phone), ENT_QUOTES, 'UTF-8');
            $dob = htmlspecialchars(trim($request->dob), ENT_QUOTES, 'UTF-8');
            $gender = htmlspecialchars(trim($request->gender), ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars(trim($request->description), ENT_QUOTES, 'UTF-8');
            $facebook = htmlspecialchars(trim($request->facebook), ENT_QUOTES, 'UTF-8');
            $instagram = htmlspecialchars(trim($request->instagram), ENT_QUOTES, 'UTF-8');
            $linkedin = htmlspecialchars(trim($request->linkedin), ENT_QUOTES, 'UTF-8');
            $country = htmlspecialchars(trim($request->country), ENT_QUOTES, 'UTF-8');
            $state = htmlspecialchars(trim($request->state), ENT_QUOTES, 'UTF-8');
            $present_address = htmlspecialchars(trim($request->present_address), ENT_QUOTES, 'UTF-8');
            $postal_code = htmlspecialchars(trim($request->postal_code), ENT_QUOTES, 'UTF-8');

            // Check if user already exists
            $profile = CandidateProfile::find($id);

            if($profile)
            {
                // Update their profile
                if($profile->fullname != $fullname) $profile->fullname = $fullname;
                if($profile->phone != $phone) $profile->phone = $phone;
                if($profile->dob != $dob) $profile->dob = $dob;
                if($profile->gender != $gender) $profile->gender = $gender;
                if($profile->description != $description) $profile->description = $description;
                if($profile->facebook != $facebook) $profile->facebook = $facebook;
                if($profile->instagram != $instagram) $profile->instagram = $instagram;
                if($profile->linkedin != $linkedin) $profile->linkedin = $linkedin;
                if($profile->country != $country) $profile->country = $country;
                if($profile->state != $state) $profile->state = $state;
                if($profile->present_address != $present_address) $profile->present_address = $present_address;
                if($profile->postal_code != $postal_code) $profile->postal_code = $postal_code;

                $profile->save();

                DB::commit();

                return redirect()->back()->with(['success' => 'Your profile updated successfully']);
            }

            // else create profile
            $newProfile = new CandidateProfile();

            $newProfile->fullname = $fullname;
            $newProfile->phone = $phone;
            $newProfile->dob = $dob;
            $newProfile->gender = $gender;
            $newProfile->description = $description;
            $newProfile->facebook = $facebook;
            $newProfile->instagram = $instagram;
            $newProfile->linkedin = $linkedin;
            $newProfile->country = $country;
            $newProfile->state = $state;
            $newProfile->present_address = $present_address;
            $newProfile->postal_code = $postal_code;
            $newProfile->userID = $id;

            $newProfile->save();

            DB::commit();

            return redirect()->back()->with(['success' => 'Your profile created successfully']);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst updating your profile: ' . $ex->getMessage());
            return redirect()->back()->with(['error' => 'Unknown error occurred whilst updating your profile']);
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
