<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManagementEmployeesController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10); // Default to 10 if not set
        $search = trim($request->query('search', ''));

        $query = User::where('role', 'Candidate')->orderBy('id', 'DESC');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        $employees = $query->paginate($perPage);
        $totalEmployees = User::where('role', 'Candidate')->count();

        $limits = [];

        for ($i = 10; $i <= $totalEmployees; $i *= 2) 
        {
            $limits[] = $i;
        }

        // Ensure the last option is the total number of employees
        if ($totalEmployees > end($limits)) 
        {
            $limits[] = $totalEmployees;
        }

        return view('admin.employees', compact('employees', 'totalEmployees', 'limits'));
    }



    
}
