<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailingListController;
use App\Http\Controllers\OtpController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


// Route::group(['middleware' => 'guest'], function(){

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/about-us', function(){
        return view('about');
    })->name('about');

    Route::get('/contact-us', function(){
        return view('contact');
    })->name('contact');

    Route::post('/contact-us/send', [ContactController::class, 'save'])->name('contact.send');

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

// });

Route::middleware('otp.verify')->group(function () {
    // Route::get('/verify-otp', [OtpController::class, 'showOtpVerificationForm'])->name('verify-otp');
    Route::post('/verify-otp/submit', [OtpController::class, 'verifyOtp'])->name('verify-otp.submit');
});
Route::post('/send-new-otp', [OtpController::class, 'newOtpCode'])->name('send.new.otp');


Route::group(['middleware' => ['auth', 'auth.redirect', 'employer', 'prevent-back-history', 'otp.verified']], function () {
    /****
     * 
     * Employer Middleware Protected Routes
     * 
     ****/
    Route::get('/employer-dashboard', function () {
        return view('employer.employer');
    })->name('employer.dashboard');

    Route::get('/employer-dashboard/company-profile', function () {
        return view('employer.employer-company-profile');
    })->name('employer.profile');

    Route::get('/employer-dashboard/my-job', function () {
        return view('employer.employer-my-job');
    })->name('employer.job');

    Route::get('/employer-dashboard/my-job/submit', function () {
        return view('employer.employer-submit-job');
    })->name('employer.job.submit');

    Route::get('/employer-dashboard/candidate-list', function () {
        return view('employer.employer-candidate-list');
    })->name('employer.candidate.list');

    // Shortlist candidates
    Route::get('/employer-dashboard/candidate-shortlist', function () {
        return view('employer.employer-candidate-shortlist');
    })->name('employer.candidate.shortlist');

    Route::get('/employer-dashboard/package', function () {
        return view('employer.employer-package');
    })->name('employer.package');

    Route::get('/employer-dashboard/change-password', function () {
        return view('employer.employer-change-password');
    })->name('employer.change.password');

    Route::get('/employer-dashboard/delete-profile', function () {
        return view('employer.employer-delete-profile');
    })->name('employer.delete.profile');
});



/*
* Employee Middleware
*/
Route::group(['middleware' => ['auth', 'auth.redirect', 'candidate', 'prevent-back-history', 'otp.verified']], function () {
    Route::get('/candidate-dashboard', function () {
        return view('employee.employee');
    })->name('employee');

    Route::get('/candidate-dashboard/resume', function () {
        return view('employee.employee-resume');
    })->name('employee.resume');

    Route::get('/candidate-dashboard/profile', function () {
        return view('employee.employee-profile');
    })->name('employee.profile');

    Route::get('/candidate-dashboard/job-shortlisted', function () {
        return view('employee.employee-job-shortlisted');
    })->name('employee.job.shortlisted');

    Route::get('/candidate-dashboard/following-employer', function () {
        return view('employee.employee-following-employer');
    })->name('employee.following-employer');

    Route::get('/candidate-dashboard/delete-profile', function () {
        return view('employee.employee-delete-profile');
    })->name('employee.delete-profile');

    Route::get('/candidate-dashboard/change-password', function () {
        return view('employee.employee-change-password');
    })->name('employee.change.password');

    Route::get('/candidate-dashboard/applied-job', function () {
        return view('employee.employee-applied-job');
    })->name('employee.applied.job');
});



// Auth::routes(); 

Route::post('/register-new-account', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

