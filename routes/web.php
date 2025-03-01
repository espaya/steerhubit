<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/about-us', function(){
        return view('about');
    })->name('about');

    Route::get('/contact-us', function(){
        return view('contact');
    })->name('contact');

    Route::get('/frequently-asked-questions', function(){
        return view('faq');
    })->name('faq');

    Route::get('/pricing', function(){
        return view('pricing');
    })->name('pricing');

    Route::get('/privacy-policy', function(){
        return view('privacy-policy');
    })->name('privacy.policy');

    Route::get('/terms-and-conditions', function(){
        return view('terms-conditions');
    })->name('terms.conditions');

    Route::get('/blog', function(){
        return view('blog');
    })->name('blog');

    Route::get('/choose-subscription-plan', function(){
        return view('choose-subscription');
    })->name('choose.subscription');
});

Route::group(['middleware' => ['employer']], function(){
    Route::get('/dashboard', function(){
        return view('employer.dashboard');
    })->name('employer');
});
