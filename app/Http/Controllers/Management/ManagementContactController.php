<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

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
}
