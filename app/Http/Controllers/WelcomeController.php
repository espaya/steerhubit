<?php

namespace App\Http\Controllers;

use App\Models\SocialProfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        // Auth::logout();
        $socials = SocialProfiles::get();

        return view('welcome', [
           'socials' =>  $socials,
        ]);
    }
}
