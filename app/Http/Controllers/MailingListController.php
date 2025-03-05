<?php

namespace App\Http\Controllers;

use App\Models\MailingList;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MailingListController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'subscribe_email' => ['required', 'email', 'unique:mailing_list,subscribe_email']
        ], [
            'subscribe_email' => 'Email is required',
            'subscribe_email.email' => 'Please enter a valid email address',
            'subscribe_email.unique' => 'This email already exists in our mailing list'
        ]);

        try 
        {
            DB::beginTransaction();

            MailingList::create([
                'subscribe_email' => Crypt::encryptString($request->subscribe_email) // encrypt data
            ]);

            DB::commit();

            return response()->json(['status' => 'success'], 200);
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again',
                'error' => $ex->getMessage()
            ], 500);
        }
    }
}
