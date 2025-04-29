<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class CandidateResumeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $resume_file = Resume::where('userID', $user->id)->get();

        return view('employee.employee-resume', ['resume_file' => $resume_file]);
    }

    public function storeFile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf']
        ], [
            'file.required' => 'Please upload your resume',
            'file.file' => 'Please upload the right file',
            'file.mimes' => 'Only PDFs are allowed'
        ]);

        try 
        {
            DB::beginTransaction();
        
            $file = $request->file('file');
            $fileName = time() . '-' . $file->getClientOriginalName();
        
            $file_path = public_path('uploads/resumes');
        
            if (!File::exists($file_path)) 
            {
                File::makeDirectory($file_path, 0777, true);
            }
        
            // Check if user already exists
            $candidate = Resume::where('userID', $user->id)->first();
        
            if ($candidate) 
            {
                // Delete old file if it exists
                $oldFile = $file_path . '/' . $candidate->file;
                if (File::exists($oldFile)) 
                {
                    File::delete($oldFile);
                }
        
                // Update the file column
                $candidate->file = $fileName;
                $candidate->save();
        
                // Move the new file
                $file->move($file_path, $fileName);
        
                DB::commit();
        
                return response()->json([
                    'success' => true,
                    'message' => 'Resume updated successfully'
                ], 200);
            }
        
            // Move the new file
            $file->move($file_path, $fileName);
        
            // Create resume
            $newCandidate = new Resume();
            $newCandidate->file = $fileName;
            $newCandidate->userID = $user->id;
            $newCandidate->save();
        
            DB::commit();
        
            return response()->json([
                'success' => true,
                'message' => 'Resume uploaded successfully'
            ], 200);
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst uploading your Resume: ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst uploading your Resume'
            ], 500);
        }        
    }

    public function storeDegree(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'degree_institution_name' => ['required', 'string'],
            'degree_institution_location' => ['required', 'string'],
            'degree_year_started' => ['required', 'date'],
            'degree_year_completed' => ['required', 'date'],
        ], [
            'degree_institution_name.required' => 'This field is required',
            'degree_institution_name.string' => 'Invalid input',
            'degree_institution_location.required' => 'This field is required',
            'degree_institution_location.string' => 'Invalid input',
            'degree_year_started.required' => 'This field is required',
            'degree_year_started.date' => 'Invalid input',
            'degree_year_completed.required' => 'This field is required',
            'degree_year_completed.date' => 'Invalid input'
        ]);

        try 
        {
            DB::beginTransaction();

            $degree_institution_name = htmlspecialchars(trim($request->degree_institution_name), ENT_QUOTES, 'utf-8');
            $degree_institution_location = htmlspecialchars(trim($request->degree_institution_location), ENT_QUOTES, 'utf-8');
            $degree_year_started = htmlspecialchars(trim($request->degree_year_started), ENT_QUOTES, 'utf-8');
            $degree_year_completed = htmlspecialchars(trim($request->degree_year_completed), ENT_QUOTES, 'utf-8');

            $candidate = Resume::where('userID', $user->id)->first();

            if($candidate)
            {
                // update the degree columns
                $candidate->degree_institution_name = $degree_institution_name;
                $candidate->degree_institution_location = $degree_institution_location;
                $candidate->degree_year_started = $degree_year_started;
                $candidate->degree_year_completed = $degree_year_completed;

                if($candidate->isDirty())
                {
                    $candidate->save();

                    DB::commit();

                    return response()->json([
                        'success' => true,
                        'message' => 'Degree info updated successfully'
                    ], 200);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'No changes detected'
                ], 200);

            }

            // create new candidate
            $newCandidate = new Resume();

            $newCandidate->degree_institution_name = $degree_institution_name;
            $newCandidate->degree_institution_location = $degree_institution_location;
            $newCandidate->degree_year_started = $degree_year_started;
            $newCandidate->degree_year_completed = $degree_year_completed;
            $newCandidate->userID = $user->id;

            $newCandidate->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Resume updated successfully'
            ], 200);
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknow error occurred whilst saving resume: ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unknow error occurred whilst saving resume'
            ], 500);
        }
    }

    public function storeCertification(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'cert_institution_name' => ['required', 'string'],
            'cert_institution_location' => ['required', 'string'],
            'cert_year_started' => ['required', 'date'],
            'cert_year_completed' => ['required', 'date'],
        ], [
            'cert_institution_name.required' => 'This field is required',
            'cert_institution_name.string' => 'Invalid input',
            'cert_institution_location.required' => 'This field is required',
            'cert_institution_location.string' => 'Invalid input',
            'cert_year_started.required' => 'This field is required',
            'cert_year_started.date' => 'Input is not in the correct format',
            'cert_year_completed.required' => 'This field is required',
            'cert_year_completed.date' => 'Input is not in the correct format'
        ]);

        try 
        {
            DB::beginTransaction();

            $cert_institution_name = htmlspecialchars(trim($request->cert_institution_name), ENT_QUOTES, 'utf-8');
            $cert_institution_location = htmlspecialchars(trim($request->cert_institution_location), ENT_QUOTES, 'utf-8');
            $cert_year_started = htmlspecialchars(trim($request->cert_year_started), ENT_QUOTES, 'utf-8');
            $cert_year_completed = htmlspecialchars(trim($request->cert_year_completed), ENT_QUOTES, 'utf-8');

            $candidate = Resume::where('userID', $user->id)->first();

            if($candidate)
            {
                // update candidate resume
                $candidate->cert_institution_name = $cert_institution_name;
                $candidate->cert_institution_location = $cert_institution_location;
                $candidate->cert_year_started = $cert_year_started;
                $candidate->cert_year_completed = $cert_year_completed;

                if($candidate->isDirty())
                {
                    $candidate->save();
                    DB::commit();

                    return response()->json([
                        'success' => true,
                        'message' => 'Resume updated successfully'
                    ], 200);
                }
            }

            // create new resume
            $newCandidate = new Resume();
            $newCandidate->cert_institution_name = $cert_institution_name;
            $newCandidate->cert_institution_location = $cert_institution_location;
            $newCandidate->cert_year_started = $cert_year_started;
            $newCandidate->cert_year_completed = $cert_year_completed;
            $newCandidate->userID = $user->id;

            $newCandidate->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Your resume created successfully'
            ], 200);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst saving resume: '. $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst saving resume'
            ], 500);
        }

    }

    public function storeHighSchool(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'high_school_name' => ['required', 'string'],
            'high_school_location' => ['required', 'string'],
            'high_school_year_started' => ['required', 'date'],
            'high_school_year_completed' => ['required', 'date'],
        ], [
            'high_school_name.required' => 'This field is required',
            'high_school_name.string' => 'Invalid input',
            'high_school_location.required' => 'This field is required',
            'high_school_location.string' => 'Invalid input',
            'high_school_year_started.required' => 'This field is required',
            'high_school_year_started.date' => 'Invalid input',
            'high_school_year_completed.required' => 'This field is required',
            'high_school_year_completed.date' => 'Invalid input'
        ]);

        try 
        {
            DB::beginTransaction();

            $high_school_name = htmlspecialchars(trim($request->high_school_name), ENT_QUOTES, 'utf-8');
            $high_school_location = htmlspecialchars(trim($request->high_school_location), ENT_QUOTES, 'utf-8');
            $high_school_year_started = htmlspecialchars(trim($request->high_school_year_started), ENT_QUOTES, 'utf-8');
            $high_school_year_completed = htmlspecialchars(trim($request->high_school_year_completed), ENT_QUOTES, 'utf-8');

            $candidate = Resume::where('userID', $user->id)->first();

            if($candidate)
            {
                // UPdate resume
                $candidate->high_school_name = $high_school_name;
                $candidate->high_school_location = $high_school_location;
                $candidate->high_school_year_started = $high_school_year_started;
                $candidate->high_school_year_completed = $high_school_year_completed;

                if($candidate->isDirty())
                {
                    $candidate->save();
                    DB::commit();
                    return response()->json([
                        'success' => true,
                        'message' => 'Your resume updated successfully'
                    ], 200);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'No changes detected'
                ], 200);
            }

            // create resume
            $newCandidate = new Resume();
            $newCandidate->high_school_name = $high_school_name;
            $newCandidate->high_school_location = $high_school_location;
            $newCandidate->high_school_year_started = $high_school_year_started;
            $newCandidate->high_school_year_completed = $high_school_year_completed;

            $newCandidate->save();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Your resume updated successfully'
            ], 200);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst saving resume: ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst saving resume'
            ], 500);
        }
    }

    public function storeSkills(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'skills' => ['required', 'array']
        ], [
            'skills.required' => 'This field is required',
            'skills.array' => 'Invalid input'
        ]);

        try 
        {
            $skills = implode(', ', $request->skills);

            $candidate = Resume::where('userID', $user->id)->first();

            if($candidate)
            {
                // update resume
                $candidate->skills = $skills;

                if($candidate->isDirty())
                {
                    $candidate->save();

                    DB::commit();

                    return response()->json([
                        'success' => true, 
                        'message' => 'Your resume updated successfully'
                    ], 200);
                }

                return response()->json([
                    'success' => true, 
                    'message' => 'No changes detected'
                ], 200);
            }

            // Create resume 
            $newCandidate = new Resume();
            $newCandidate->skills = $skills;
            $newCandidate->userID = $user->id;

            $newCandidate->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Your resume updated successfully'
            ], 200);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst updating your resume: ' . $ex->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst updating your resume'
            ], 500);
        }
    }

}
