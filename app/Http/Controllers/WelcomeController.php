<?php

namespace App\Http\Controllers;

use App\Models\SocialProfiles;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $socials = SocialProfiles::get();

        return view('welcome', [
           'socials' =>  $socials,
        ]);
    }
}
