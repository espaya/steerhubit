<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CandidatesPublicController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\MailingListController;
use App\Http\Controllers\OtpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\WelcomeController;
use Symfony\Component\HttpKernel\Exception\HttpException;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

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

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/search', [BlogController::class, 'index'])->name('blog.search');
Route::get('/blog/{slug}', [BlogController::class, 'view'])->name('blog.view.single');
Route::post('/blog/{slug}/comment/{id}', [CommentsController::class, 'store'])->name('comments.store');
Route::post('/blog/{slug}/comment/reply/{id}', [CommentsController::class, 'store'])->name('comments.store.reply');

Route::get('/choose-subscription-plan', function(){
    return view('choose-subscription');
})->name('choose.subscription');
    

Route::post('/subscribe-to-our-mailing-list', [MailingListController::class, 'subscribe'])->name('subscribe.mailing.list');

Route::get('/candidates/{id}', [CandidatesPublicController::class, 'show'])->name('public.candidates.show');


Route::middleware('otp.verify')->group(function () {
    Route::get('/verify-otp', [OtpController::class, 'showOtpVerificationForm'])->name('verify-otp');
    Route::post('/verify-otp/submit', [OtpController::class, 'verifyOtp'])->name('verify-otp.submit');
});

Route::post('/send-new-otp', [OtpController::class, 'newOtpCode'])->name('send.new.otp');


Route::group(['middleware' =>['auth', 'auth.redirect', 'prevent-back-history', 'otp.verified']], function(){
    Route::get('/jobs', [JobDetailsController::class, 'index'])->name('jobs');
    Route::get('/jobs/{slug}', [JobDetailsController::class, 'show'])->name('job.view');
    Route::post('/candidate-dashboard/applied-job/apply/{id}', [JobDetailsController::class, 'apply']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['guest']], function(){
    Route::get('/sign-in', function(){ return view('auth.login'); })->name('login');
    Route::post('/sign-in', [LoginController::class, 'login'])->name('login')->middleware('throttle:10,1');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('showRegistrationForm');    
    Route::post('/register-new-account', [RegisterController::class, 'register'])->name('register')->middleware('throttle:10,1');
});

Route::post('/reset-password/send-reset-link', [LoginController::class, 'sendResetLink']);

// Show the password reset form
Route::get('/reset-password', function () {
    return view('auth.passwords.reset');
})->middleware('guest')->name('password.reset');

Route::get('/429', function(){
    throw new HttpException(429, 'Too Many Requests', null, ['Retry-After' => 60]);
});

require __DIR__.'/admin.php';
require __DIR__.'/employee.php';
require __DIR__.'/employer.php';