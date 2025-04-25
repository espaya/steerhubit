<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\ApplyForJob;
use App\Models\CandidateProfile;
use App\Models\Job;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EmployerJobController extends Controller
{
    public function index(Request $request)
    {
        $param = htmlspecialchars(trim($request->search), ENT_QUOTES, 'utf-8');

        if ($param) {
            $jobs = Job::where('userID', Auth::user()->id)->where('title', 'LIKE', "%{$param}%")
                ->orWhere('pay', 'LIKE', "%{$param}%")
                ->orWhere('deadline', 'LIKE', "%{$param}%")
                ->orderBy('id', 'DESC')
                ->paginate(10);
        } else {
            $jobs = Job::where('userID', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        }

        return view('employer.employer-my-job', [
            'jobs' => $jobs,
            'search' => $param
        ]);
    }

    public function destroy($id)
    {
        try 
        {
            $job = Job::find($id);

            if(!$job)
            {
                return redirect()->back()->with(['error' => 'Job Not Found']);
            }

            $job->delete();

            return redirect()->back()->with(['success' => 'Job Deleted Successfully']);
        }
        catch(Exception $ex)
        {
            Log::error('Unknown error occurred whilst deleting this job: ' . $ex);
            return redirect()->back()->with(['error' => 'Unknown error occurred whilst deleting this job']);
        }
    }


    public function add()
    {
        $countries = [
            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
            "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain",
            "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
            "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei",
            "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon",
            "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
            "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica", "Croatia", "Cuba",
            "Cyprus", "Czechia", "Denmark", "Djibouti", "Dominica", "Dominican Republic",
            "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia",
            "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia",
            "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau",
            "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran",
            "Iraq", "Ireland", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan",
            "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia",
            "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania",
            "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta",
            "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
            "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
            "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua",
            "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan",
            "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
            "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda",
            "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
            "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia",
            "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands",
            "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka",
            "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan",
            "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago",
            "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine",
            "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan",
            "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
        ];
                
        return view('employer.employer-submit-job', ['countries' => $countries]);
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
            'video' => ['nullable',
                'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w\-]{11}$/'
            ],

            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
        ], [
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
            'postal_code.string' => 'Invalid input'
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

    public function appliedJobs()
    {
        // Get all job IDs that have been applied for
        $appliedJobIds = ApplyForJob::pluck('job_id');

        // Fetch the corresponding jobs
        $jobs = Job::whereIn('id', $appliedJobIds)
                    ->orderByDesc('id')
                    ->paginate(10);

        // Pass them to the view
        return view('employer.employer-applied-jobs', ['jobs' => $jobs]);
    }

    public function viewAppliedJob($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();

        // Get all applicant_ids who applied for this job
        $applicants = ApplyForJob::where('job_id', $job->id)->get();

        return view('employer.employer-single-applied-job', [
            'job' => $job,
            'applicants' => $applicants
        ]);
    }


    public function edit($slug)
    {
        $countries = [
            "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda",
            "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain",
            "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
            "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei",
            "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon",
            "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia",
            "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica", "Croatia", "Cuba",
            "Cyprus", "Czechia", "Denmark", "Djibouti", "Dominica", "Dominican Republic",
            "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia",
            "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia",
            "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau",
            "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran",
            "Iraq", "Ireland", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan",
            "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia",
            "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania",
            "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta",
            "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
            "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
            "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua",
            "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan",
            "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
            "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda",
            "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
            "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia",
            "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands",
            "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka",
            "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan",
            "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago",
            "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine",
            "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan",
            "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
        ];

        $job = Job::where('slug', $slug)->first();

        return view('employer.employer-edit-job', ['job' => $job, 'countries' => $countries]);
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
            'video' => ['nullable',
                'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w\-]{11}$/'
            ],

            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
        ], [
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
            'postal_code.string' => 'Invalid input'
        ]);

        try 
        {
            DB::beginTransaction();
        
            $job = Job::where('slug', $slug)->first();
        
            if (!$job) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'This job was not found'
                ], 404);
            }
        
            $job->title = htmlspecialchars(trim($request->title), ENT_QUOTES, 'UTF-8');
            $job->description = htmlspecialchars(trim($request->description), ENT_QUOTES, 'UTF-8');
            $job->working_schedule = htmlspecialchars(trim($request->working_schedule), ENT_QUOTES, 'UTF-8');
            $job->working_day = htmlspecialchars(trim($request->working_day), ENT_QUOTES, 'UTF-8');
            $job->pay = htmlspecialchars(trim($request->pay), ENT_QUOTES, 'UTF-8');
            $job->experience = htmlspecialchars(trim($request->experience), ENT_QUOTES, 'UTF-8');
            $job->deadline = htmlspecialchars(trim($request->deadline), ENT_QUOTES, 'UTF-8');
            $job->qualification = htmlspecialchars(trim($request->qualification), ENT_QUOTES, 'UTF-8');
            $job->video = $request->filled('video') 
                ? htmlspecialchars(trim($request->video), ENT_QUOTES, 'UTF-8') 
                : '';
            $job->country = htmlspecialchars(trim($request->country), ENT_QUOTES, 'UTF-8');
            $job->state = htmlspecialchars(trim($request->state), ENT_QUOTES, 'UTF-8');
            $job->address = htmlspecialchars(trim($request->address), ENT_QUOTES, 'UTF-8');
            $job->postal_code = htmlspecialchars(trim($request->postal_code), ENT_QUOTES, 'UTF-8');
        
            if ($job->isClean()) 
            {
                return response()->json([
                    'success' => true,
                    'message' => 'No changes detected'
                ], 200);
            }
        
            $job->save();
            DB::commit();
        
            return response()->json([
                'success' => true,
                'message' => 'Job updated successfully'
            ], 200);
        
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
        
            Log::error('Unknown error occurred whilst updating this job: ' . $ex->getMessage());
        
            return response()->json([
                'success' => false,
                'message' => 'Unknown error occurred whilst updating this job'
            ], 500);
        }
        
    }

}
