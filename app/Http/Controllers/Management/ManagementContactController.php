<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManagementContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        $query = Contact::query();

        if ($search) 
        {
            $query->where('contact_name', 'like', "%{$search}%")
                ->orWhere('contact_email', 'like', "%{search}%");
        }

        $totalContacts = $query->count(); // total records

        $contacts = $query->orderBy('id', 'DESC')->paginate($perPage)->appends([
            'search' => $search,
            'per_page' => $perPage
        ]);

        // Safe dynamic per page options
        $maxPerPage = min(100, $totalContacts);
        $perPageOptions = $maxPerPage >= 10
            ? collect(range(10, $maxPerPage, 10))->toArray()
            : [10]; // fallback

        return view('admin.contact.admin-contact', compact('contacts', 'perPageOptions'));
    }

    public function destroy($id)
    {
        try 
        {
            $contact = Contact::find($id);

            if(!$contact)
            {
                return redirect()->back()->with(['error' => 'This message was not found']);
            }

            $contact->delete();

            return redirect()->back()->with(['success' => 'Message deleted successfully']);

        }
        catch(Exception $ex)
        {
            Log::error('Error occurred whilst deleting this message: ' . $ex->getMessage());
            return redirect()->back()->with(['error' => 'Error occurred whilst deleting this message']);
        }
    }
}
