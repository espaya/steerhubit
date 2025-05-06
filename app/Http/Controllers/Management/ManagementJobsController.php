<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\ApplyForJob;
use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ManagementJobsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not set
    
        $search = htmlspecialchars(trim($request->search), ENT_QUOTES, 'utf-8');
    
        if ($search) 
        {
            $jobs = Job::where('title', 'LIKE', "%{$search}%")
                ->orWhere('working_schedule', 'LIKE', "%{$search}%")
                ->orWhere('working_day', 'LIKE', "%{$search}%")
                ->orWhere('pay', 'LIKE', "%{$search}%")
                ->orderBy('id', 'desc')
                ->paginate($perPage); // Apply dynamic per_page
        } else 
        {
            $jobs = Job::orderBy('id', 'DESC')->paginate($perPage); // Apply dynamic per_page
        }
    
        return view('admin.jobs.jobs', ['jobs' => $jobs]);
    }
    
    public function appliedJobs(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not set
        
        $search = htmlspecialchars(trim($request->search), ENT_QUOTES, 'utf-8');

        // Get all applied jobs (no user-specific filter)
        $appliedJobIds = ApplyForJob::pluck('job_id');

        // Start building the query for jobs
        $query = Job::whereIn('id', $appliedJobIds)->where('status', 'APPROVED');

        // If there is a search term, apply additional filters
        if ($search) 
        {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('working_schedule', 'LIKE', "%{$search}%")
                    ->orWhere('working_day', 'LIKE', "%{$search}%")
                    ->orWhere('pay', 'LIKE', "%{$search}%");
            });
        }

        // Apply pagination
        $jobs = $query->orderBy('id', 'desc')->paginate($perPage);

        return view('admin.jobs.applied-jobs', ['jobs' => $jobs]);
    }

    public function forceDelete($id)
    {
        try 
        {
            $job = Job::onlyTrashed()->find($id);

            if (!$job) 
            {
                return redirect()->back()->with(['error' => 'Job not found']);
            }

            // Force delete related applications using job_id
            $appliedJobs = ApplyForJob::onlyTrashed()->where('job_id', $id)->get();

            foreach ($appliedJobs as $appliedJob) 
            {
                $appliedJob->forceDelete();
            }

            // Permanently delete the job
            $job->forceDelete();

            return redirect()->back()->with(['success' => 'Job deleted permanently']);
        } 
        catch (Exception $ex) 
        {
            Log::error('Unknown error occurred whilst permanently deleting job: ' . $ex);
            return redirect()->back()->with(['error' => 'Unknown error occurred whilst permanently deleting job']);
        }
    }

    public function approveJob($id)
    {
        try 
        {
            DB::beginTransaction();

            // Find the job by ID
            $job = Job::withTrashed()->find($id); // Fetch even soft deleted jobs

            if (!$job) 
            {
                // If job doesn't exist, return an error
                return redirect()->back()->with(['error' => 'Job not found']);
            }

            // Check if the job is soft deleted and restore it
            if ($job->trashed()) 
            {
                $job->restore();  // Restore the soft deleted job
            }

            // Update the job status to 'APPROVED'
            $job->status = 'APPROVED';
            $job->save();  // Save the changes

            DB::commit();  // Commit the transaction

            return redirect()->back()->with(['success' => 'Job approved successfully']);

        } 
        catch (Exception $ex) 
        {
            DB::rollBack();  // Roll back the transaction if any error occurs

            // Log the error for debugging
            Log::error('Unknown error occurred while approving the job: ' . $ex->getMessage());

            return redirect()->back()->with(['error' => 'Unknown error occurred while approving the job']);
        }
    }

    public function trashedJobs(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not set
    
        $search = htmlspecialchars(trim($request->search), ENT_QUOTES, 'utf-8');
    
        if ($search) 
        {
            $jobs = Job::onlyTrashed()
                ->where('status', 'REJECTED')
                ->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('working_schedule', 'LIKE', "%{$search}%")
                        ->orWhere('working_day', 'LIKE', "%{$search}%")
                        ->orWhere('pay', 'LIKE', "%{$search}%");
                })
                ->orderBy('id', 'desc')
                ->paginate($perPage);
        } 
        else 
        {
            $jobs = Job::onlyTrashed()
                ->where('status', 'REJECTED')
                ->orderBy('id', 'DESC')
                ->paginate($perPage);
        }

        return view('admin.jobs.trash-jobs', ['jobs' => $jobs]);
    }

    public function pendingApproval(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not set
    
        $search = htmlspecialchars(trim($request->search), ENT_QUOTES, 'utf-8');
    
        if ($search) 
        {
            $jobs = Job::where('status', 'PENDING')->where('title', 'LIKE', "%{$search}%")
                ->orWhere('working_schedule', 'LIKE', "%{$search}%")
                ->orWhere('working_day', 'LIKE', "%{$search}%")
                ->orWhere('pay', 'LIKE', "%{$search}%")
                ->orderBy('id', 'desc')
                ->paginate($perPage); // Apply dynamic per_page
        } 
        else 
        {
            $jobs = Job::where('status', 'PENDING')->orderBy('id', 'DESC')->paginate($perPage); // Apply dynamic per_page
        }

        return view('admin.jobs.pending', ['jobs' => $jobs]);
    }

    public function add()
    {
        return view('admin.jobs.admin-add-new-job');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'working_schedule' => ['required', 'string'],
            'working_day' => ['required', 'string'],
            'pay' => ['required', 'regex:/^\d+(\.\d{2})?$/'],
            'experience' => ['required', 'string'],
            'deadline' => ['required', 'date', ' after:today'],
            'qualification' => ['required', 'string'],
            'video' => [
                'nullable',
                'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w\-]{11}$/'
            ],

            'category' => ['required', 'string', 'in:Home Health Aide,Licensed Practical Nurse,Certified Nursing Assistant'],

            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
            'status' => ['required', 'string', 'in:PENDING,REJECTED,APPROVED'],
            'website' => ['required', 'regex:/^(https?:\/\/)?([a-z0-9-]+\.)+[a-z]{2,}(\/[^\s]*)?$/i']
        ], [
            'category.required' => 'This field is required',
            'category.string' => 'Invalid input',
            'category.in' => 'Invalid category option',
            'title.required' => 'This field is required',
            'title.string' => 'Invalid input',
            'description.required' => 'This field is required',
            'description.string' => 'This field is required',
            'working_schedule.required' => 'This field is required',
            'working_schedule.string' => 'Invalid input',
            'working_day.required' => 'This field is required',
            'working_day.string' => 'Invalid input',
            'pay.required' => 'Invalid input',
            'pay.regex' => 'Payment format is invalid. e.g 20.56',
            'experience.required' => 'This field is required',
            'experience.string' => 'Invalid input',
            'deadline.required' => 'This field is required',
            'deadline.date' => 'Invalid deadline',
            'deadline.after' => 'Deadline must be a future date',
            'video.regex' => 'Invalid YouTube video link',
            'country.required' => 'This field is required',
            'country' => 'Invalid input',
            'state.required' => 'This field is required',
            'state.string' => 'Invalid input',
            'address.required' => 'This field is required',
            'address.string' => 'Invalid input',
            'postal_code.required' => 'This is required',
            'postal_code.string' => 'Invalid input',
            'status.required' => 'This field is required',
            'status.string' => 'Invalid input',
            'status.in' => 'Please select the right option',
            'website.required' => 'This field is required',
            'website.regex' => 'Invalid website link'
        ]);

        $user = Auth::user(); 

        if(!$user)
        {
            return response()->json([
                'success' => false,
                'message' => 'User was not found. Please sign in again'
            ], 404);
        }

        try 
        {
            DB::beginTransaction();

            $job = new Job();

            $title = htmlspecialchars(trim($request->title), ENT_QUOTES, 'utf-8');
            $description = htmlspecialchars(trim($request->description), ENT_QUOTES, 'utf-8');
            $working_schedule = htmlspecialchars(trim($request->working_schedule), ENT_QUOTES, 'utf-8');
            $working_day = htmlspecialchars(trim($request->working_day), ENT_QUOTES, 'utf-8');
            $pay = htmlspecialchars(trim($request->pay), ENT_QUOTES, 'utf-8');
            $experience = htmlspecialchars(trim($request->experience), ENT_QUOTES, 'utf-8');
            $deadline = htmlspecialchars(trim($request->deadline), ENT_QUOTES, 'utf-8');
            $qualification = htmlspecialchars(trim($request->qualification), ENT_QUOTES, 'utf-8');
            $video = htmlspecialchars(trim($request->video), ENT_QUOTES, 'utf-8');
            $country = htmlspecialchars(trim($request->country), ENT_QUOTES, 'utf-8');
            $state = htmlspecialchars(trim($request->state), ENT_QUOTES, 'utf-8');
            $address = htmlspecialchars(trim($request->address), ENT_QUOTES, 'utf-8');
            $postal_code = htmlspecialchars(trim($request->postal_code), ENT_QUOTES, 'utf-8');
            $userID = $user->id;
            $slug = $this->generateUniqueSlug($title);
            $status = htmlspecialchars(trim($request->status), ENT_QUOTES, 'utf-8');
            $website = htmlspecialchars(trim($request->website), ENT_QUOTES, 'utf-8');
            $category = htmlspecialchars(trim($request->category), ENT_QUOTES, 'utf-8');

            $job->title = $title;
            $job->description = $description;
            $job->working_schedule = $working_schedule;
            $job->working_day = $working_day;
            $job->pay = $pay;
            $job->experience = $experience;
            $job->deadline = $deadline;
            $job->qualification = $qualification;
            $job->video = $video;
            $job->country = $country;
            $job->state = $state;
            $job->address = $address;
            $job->postal_code = $postal_code;
            $job->userID = $userID;
            $job->slug = $slug;
            $job->status = $status;
            $job->website = $website;
            $job->category = $category;

            $job->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job posted successfully. Waiting for approval'
            ], 200);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst saving your job' . $ex);
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst saving your job'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try 
        {
            $job = Job::find($id);

            if(!$job)
            {
                return redirect()->back()->with(['error' => 'No job found']);
            }

            $job->status = 'REJECTED';
            $job->save();

            // soft delete related applications
            $appliedJob = ApplyForJob::where('job_id', $id)->delete();

            if($appliedJob)
            {
                // soft delete job
                $appliedJob->delete();
            }

            // soft delete job
            $job->delete();

            return redirect()->back()->with(['success' => 'Job deleted successfully']);
        }
        catch(Exception $ex)
        {
            Log::error('Unknown error occurred whilst deleting this job: ' . $ex);
            return redirect()->back()->with(['error' => 'Unknown error occurred whilst deleting this job']);
        }
    }

    function generateUniqueSlug($title, $id = null)
    {
        // Start by creating a slug from the title
        $slug = Str::slug($title); 

        // If an ID is provided (for updates), exclude that job from the check
        $originalSlug = $slug;
        $i = 1;

        // Check if the slug already exists in the database
        while (Job::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            // Append a number to the slug and increment it
            $slug = $originalSlug . '-' . $i;
            $i++;
        }

        return $slug;
    }

    public function edit($slug)
    {
        $job = Job::where('slug', $slug)->first();

        $countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo (Congo-Brazzaville)', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czechia (Czech Republic)', 'Democratic Republic of the Congo', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini (fmr. "Swaziland")', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Holy See', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia',
            'Montenegro', 'Morocco', 'Mozambique', 'Myanmar (formerly Burma)', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand','Nicaragua', 'Niger', 'Nigeria', 'North Korea', 'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestine State', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia',
            'South Africa', 'South Korea', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States of America', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'
        ];

        return view('admin.jobs.edit-job', ['job' => $job, 'countries' => $countries]);
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'working_schedule' => ['required', 'string'],
            'working_day' => ['required', 'string'],
            'pay' => ['required', 'regex:/^\d+(\.\d{2})?$/'],
            'experience' => ['required', 'string'],
            'deadline' => ['required', 'date', ' after:today'],
            'qualification' => ['required', 'string'],
            'video' => [
                'nullable',
                'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w\-]{11}$/'
            ],

            'category' => ['required', 'string', 'in:Home Health Aide,Licensed Practical Nurse,Certified Nursing Assistant'],

            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
            'status' => ['required', 'string', 'in:PENDING,REJECTED,APPROVED'],
            'website' => ['required', 'regex:/^(https?:\/\/)?([a-z0-9-]+\.)+[a-z]{2,}(\/[^\s]*)?$/i']
        ], [
            'category.required' => 'This field is required',
            'category.string' => 'Invalid input',
            'category.in' => 'Invalid category option',
            'title.required' => 'This field is required',
            'title.string' => 'Invalid input',
            'description.required' => 'This field is required',
            'description.string' => 'This field is required',
            'working_schedule.required' => 'This field is required',
            'working_schedule.string' => 'Invalid input',
            'working_day.required' => 'This field is required',
            'working_day.string' => 'Invalid input',
            'pay.required' => 'Invalid input',
            'pay.regex' => 'Payment format is invalid. e.g 20.56',
            'experience.required' => 'This field is required',
            'experience.string' => 'Invalid input',
            'deadline.required' => 'This field is required',
            'deadline.date' => 'Invalid deadline',
            'deadline.after' => 'Deadline must be a future date',
            'video.regex' => 'Invalid YouTube video link',
            'country.required' => 'This field is required',
            'country' => 'Invalid input',
            'state.required' => 'This field is required',
            'state.string' => 'Invalid input',
            'address.required' => 'This field is required',
            'address.string' => 'Invalid input',
            'postal_code.required' => 'This is required',
            'postal_code.string' => 'Invalid input',
            'status.required' => 'This field is required',
            'status.string' => 'Invalid input',
            'status.in' => 'Please select the right option',
            'website.required' => 'This field is required',
            'website.regex' => 'Invalid website link'
        ]);

        try 
        {
            DB::beginTransaction();

            $job = Job::where('slug', $slug)->first();

            if(!$job)
            {
                return response()->json([
                    'success' => false,
                    'message' => "Job '$request->title' was not found"
                ], 404);
            }

            $title = htmlspecialchars(trim($request->title), ENT_QUOTES, 'utf-8');
            $description = htmlspecialchars(trim($request->description), ENT_QUOTES, 'utf-8');
            $working_schedule = htmlspecialchars(trim($request->working_schedule), ENT_QUOTES, 'utf-8');
            $working_day = htmlspecialchars(trim($request->working_day), ENT_QUOTES, 'utf-8');
            $pay = htmlspecialchars(trim($request->pay), ENT_QUOTES, 'utf-8');
            $experience = htmlspecialchars(trim($request->experience), ENT_QUOTES, 'utf-8');
            $deadline = htmlspecialchars(trim($request->deadline), ENT_QUOTES, 'utf-8');
            $qualification = htmlspecialchars(trim($request->qualification), ENT_QUOTES, 'utf-8');
            $video = htmlspecialchars(trim($request->video), ENT_QUOTES, 'utf-8');
            $country = htmlspecialchars(trim($request->country), ENT_QUOTES, 'utf-8');
            $state = htmlspecialchars(trim($request->state), ENT_QUOTES, 'utf-8');
            $address = htmlspecialchars(trim($request->address), ENT_QUOTES, 'utf-8');
            $postal_code = htmlspecialchars(trim($request->postal_code), ENT_QUOTES, 'utf-8');

            $status = htmlspecialchars(trim($request->status), ENT_QUOTES, 'utf-8');
            $website = htmlspecialchars(trim($request->website), ENT_QUOTES, 'utf-8');
            $category = htmlspecialchars(trim($request->category), ENT_QUOTES, 'utf-8');

            $job->title = $title;
            $job->description = $description;
            $job->working_schedule = $working_schedule;
            $job->working_day = $working_day;
            $job->pay = $pay;
            $job->experience = $experience;
            $job->deadline = $deadline;
            $job->qualification = $qualification;
            $job->video = $video;
            $job->country = $country;
            $job->state = $state;
            $job->address = $address;
            $job->postal_code = $postal_code;

            if($job->title !== $title)
            {
                $job->slug = $this->generateUniqueSlug($title);
            }
            
            $job->status = $status;
            $job->website = $website;
            $job->category = $category;

            if($job->isDirty())
            {
                $job->save();

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Job updated successfully'
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'No change was detected'
            ], 200);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred whilst saving your job' . $ex);
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst saving your job'
            ], 500);
        }
    }

}
