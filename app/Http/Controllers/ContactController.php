<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'contact_name' => ['required', 'string'],
            'contact_email' => ['required', 'email'],
            'contact_message' => ['required', 'string']
        ], [
            'contact_name.required' => 'This field is required',
            'contact_name.string' => 'Invalid input',

            'contact_email.required' => 'This field is required',
            'contact_email.email' => 'Invalid input',

            'contact_message.required' => 'This field is required',
            'contact_message.email' => 'Invalid input'
        ]);

        try 
        {
            DB::beginTransaction();

            Contact::create([
                'contact_name' => Crypt::encryptString($request->contact_name),
                'contact_email' => Crypt::encryptString($request->contact_email),
                'contact_message' => Crypt::encryptString($request->contact_message),
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Thank You! We\'ll get back to you as soon as possible',
            ], 200);

        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error("Error Submitting Contact Info: $ex");
            return response()->json([
                'status' => 'error',
                'message' => 'An Unknown Error Occurred'
            ], 500);
        }
    }
}
