<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validate user input.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'regex:/^\S+$/', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',  
                'string',
                'confirmed', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'role' => ['required', 'string']
        ], [
            'name.required' => 'This field is required',
            'name.string' => 'Invalid input',
            'name.max' => 'Input is too long',
            'name.regex' => 'Invalid input',
            'name.unique' => 'You can not use this username',

            'email.required' => 'This field is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'A user with this email already exists',

            'password.required' => 'Password is required',
            'password.confirmed' => 'Passwords do not match',
            'password.regex' => 'Password must include uppercase, lowercase, number, and special character',
            'role.required' => 'Role is required'
        ]);
    }

    /**
     * Create a new user instance.
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);
    }


    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        // Validate request data
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::notIn([
                'admin', 'admins', 'administrator', 'contributor', 'motherfucker', 
                'author', 'editor', 'subscriber', 'moderator', 'fuck', 'bitch', 
                'CEO', 'manager', 'CTO', 'director', 'secretary', 'writer', 'nigga',
            ])],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required', 
                'string',
                'confirmed', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'role' => ['required', 'string']
        ], [
            'name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'A user with this email already exists',
            'password.required' => 'This is required',
            'password.confirmed' => 'Fields do not match',
            'password.regex' => 'This field must include uppercase, lowercase, number, and special character',
            'role.required' => 'Choose an account type',
            'name.not_in' => 'You cannot use this username'
        ]);

        // Create the user
        $user = $this->create($data);

        // Authenticate the user       
        Auth::login($user, true);

        Auth::attempt(['email' => $user->email, 'password' => $user->password]);

        $role = Auth::user()->role;

        // Ensure role is properly retrieved
        $redirectUrl = ($role == 'Candidate') ? '/candidate-dashboard' :
                    (($role == 'EMPLOYER') ? '/employer-dashboard' : '/');

        return response()->json([
            'success' => true,
            'message' => 'Registration successful! Redirecting...',
            'user' => $user,
            'redirect' => $redirectUrl
        ], 200);
    }

}
