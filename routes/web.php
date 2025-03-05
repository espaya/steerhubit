<?php

use App\Http\Controllers\MailingListController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

    Route::post('/subscribe-to-our-mailing-list', [MailingListController::class, 'subscribe'])->name('subscribe.mailing.list');

});


/*
* Employee Middleware
*/
// Route::group(['middleware' => ['guest']], function(){

//     Route::get('/employee', function(){
//         return view('employee.employee');
//     })->name('employee');

//     Route::get('/employee/resume', function(){
//         return view('employee.employee-resume');
//     })->name('employee.resume');

//     Route::get('/employee/profile', function(){
//         return view('employee.employee-profile');
//     })->name('employee.profile');

//     Route::get('/employee/job-shortlisted', function(){
//         return view('employee.employee-job-shortlisted');
//     })->name('employee.job.shortlisted');

//     Route::get('/employee/following-employer', function(){
//         return view('employee.employee-following-employer');
//     })->name('employee.following-employer');

//     Route::get('/employee/delete-profile', function(){
//         return view('employee.employee-delete-profile');
//     })->name('employee.delete-profile');

//     Route::get('/employee/change-password', function(){
//         return view('employee.employee-change-password');
//     })->name('employee.change.password');

//     Route::get('/employee/applied-job', function(){
//         return view('employee.employee-applied-job');
//     })->name('employee.applied.job');

// });


/*
* Employer Middleware
*/

Route::group(['middleware' => ['guest']], function(){

});