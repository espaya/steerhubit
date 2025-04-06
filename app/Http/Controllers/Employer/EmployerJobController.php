<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployerJobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('id', 'DESC')->paginate(10);

        return view('employer.employer-my-job', ['jobs' => $jobs]);
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

            $job = new Job([
                'title' => $title,
                'description' => $description,
                'working_schedule' => $working_schedule,
                'working_day' => $working_day,
                'pay' => $pay,
                'experience' => $experience,
                'deadline' => $deadline,
                'qualification' => $qualification,
                'video' => $video,
                'country' => $country,
                'state' => $state,
                'address' => $address,
                'postal_code' => $postal_code,
                'userID' => $userID
            ]);

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
}
