<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\MailingList;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ManagementSubscribersController extends Controller
{
    public function index()
    {
        $mailing_list = MailingList::orderBy('id', 'DESC')->paginate(10);

        return view('admin.subscribers.subscribers', [
            'mailing_list' => $mailing_list
        ]);
    }

    public function destroy($id)
    {
        try 
        {
            DB::beginTransaction();

            $subscriber = MailingList::find($id);

            if($subscriber)
            {
                $subscriber->delete();

                DB::commit();

                return redirect()->back()->with(['success' => 'Subscriber deleted successfully']);
            }

            return redirect()->back()->with(['error' => 'Subscriber was not found']);
        }
        catch(Exception $ex)
        {
            DB::rollBack();
            Log::error('Unknown error occurred deleting subscriber: ' . $ex->getMessage());
            return redirect()->back()->with(['error' => 'Unknown error occurred deleting subscriber']);
        }
    }
}
