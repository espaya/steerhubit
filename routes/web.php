<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Candidate\CandidateJobController;
use App\Http\Controllers\Candidate\CandidateProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Employer\EmployerJobController;
use App\Http\Controllers\Employer\EmployerProfileController;
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\MailingListController;
use App\Http\Controllers\Management\ManagementBlockedUsers;
use App\Http\Controllers\Management\ManagementBlogCategoryController;
use App\Http\Controllers\Management\ManagementController;
use App\Http\Controllers\Management\ManagementEmployeesController;
use App\Http\Controllers\Management\ManagementEmployersController;
use App\Http\Controllers\Management\ManagementJobsController;
use App\Http\Controllers\Management\ManagementSettingsController;
use App\Http\Controllers\Management\ManagementBlogController;
use App\Http\Controllers\OtpController;
use Illuminate\Support\Facades\Route;


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

    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/search', [BlogController::class, 'index'])->name('blog.search');
    Route::get('/blog/{slug}', [BlogController::class, 'view'])->name('blog.view.single');

    Route::get('/choose-subscription-plan', function(){
        return view('choose-subscription');
    })->name('choose.subscription');

    
Route::post('/register-new-account', [RegisterController::class, 'register'])->name('register');
Route::post('/subscribe-to-our-mailing-list', [MailingListController::class, 'subscribe'])->name('subscribe.mailing.list');


Route::middleware('otp.verify')->group(function () {
    // Route::get('/verify-otp', [OtpController::class, 'showOtpVerificationForm'])->name('verify-otp');
    Route::post('/verify-otp/submit', [OtpController::class, 'verifyOtp'])->name('verify-otp.submit');
});

Route::post('/send-new-otp', [OtpController::class, 'newOtpCode'])->name('send.new.otp');


Route::group(['middleware' =>['auth', 'auth.redirect', 'prevent-back-history', 'otp.verified']], function(){
    Route::get('/jobs', [JobDetailsController::class, 'index'])->name('jobs');
    Route::get('/jobs/{slug}', [JobDetailsController::class, 'show'])->name('job.view');
    Route::post('/candidate-dashboard/applied-job/apply/{id}', [JobDetailsController::class, 'apply']);
});


Route::group(['middleware' => ['auth', 'auth.redirect', 'employer', 'prevent-back-history', 'otp.verified']], function () {
    /****
     * 
     * Employer Middleware Protected Routes
     * 
     ****/
    Route::get('/employer-dashboard', function () {
        return view('employer.employer');
    })->name('employer.dashboard');

    Route::get('/employer-dashboard/company-profile', [EmployerProfileController::class, 'index'])->name('employer.profile');
    Route::post('/employer-dashboard/company-profile/update', [EmployerProfileController::class, 'updateEmployerProfile'])->name('update.employer.profile');
    Route::post('/employer-dashboard/company-profile/update-company-avatar', [EmployerProfileController::class, 'employerAvatarUpdate'])->name('update.employer.profile');
    Route::post('/employer-dashboard/company-profile/remove-company-avatar', [EmployerProfileController::class, 'removeAvatar'])->name('remove.employer.profile');

    Route::get('/employer-dashboard/my-job', [EmployerJobController::class, 'index'])->name('employer.job');


    Route::get('/employer-dashboard/my-job/submit', [EmployerJobController::class, 'add'])->name('employer.job.submit');
    Route::post('/employer-dashboard/my-job/submit-new', [EmployerJobController::class, 'store'])->name('employer.job.submit.new');
    Route::delete('/employer-dashboard/my-jobs/delete/{id}', [EmployerJobController::class, 'destroy'])->name('employer.job.delete');

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

    Route::post('/candidate/dashboard/profile/update', [CandidateProfileController::class, 'updateAvatar'])->name('candidate.update.avatar');
    Route::post('/candidate/dashboard/profile/delete-avatar', [CandidateProfileController::class, 'deleteAvatar']);


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

    Route::get('/candidate-dashboard/applied-job', [CandidateJobController::class, 'index'])->name('employee.applied.job');
    Route::get('/candidate-dashboard/applied-job/search', [CandidateJobController::class, 'index'])->name('employee.applied.job.search');

});


Route::group(['middleware' => ['auth', 'auth.redirect', 'admin', 'prevent-back-history', 'otp.verified']], function(){
    // Management route
    Route::get('/0246520325/management', [ManagementController::class, 'index'])->name('management');
    Route::get('0246520325/management/employers', [ManagementEmployersController::class, 'index'])->name('management.employers');
    Route::get('0246520325/management/employees', [ManagementEmployeesController::class, 'index'])->name('management.employees');
    Route::get('0246520325/management/blocked-users', [ManagementBlockedUsers::class, 'index'])->name('management.blocked.users');
    Route::get('0246520325/management/jobs', [ManagementJobsController::class, 'index'])->name('management.jobs');
    Route::get('0246520325/management/jobs/search', [ManagementJobsController::class, 'index'])->name('management.jobs.search');
    Route::get('0246520325/management/jobs/add-new', [ManagementJobsController::class, 'add'])->name('management.add.new');
    Route::get('0246520325/management/jobs/add-new/store', [ManagementJobsController::class, 'store'])->name('management.add.new.store');

    Route::post('0246520325/management/jobs/add-new/store', [
        ManagementJobsController::class, 
        'store'
    ])->name('management.add.store');

    Route::get('0246520325/management/jobs/applied-jobs', [
        ManagementJobsController::class, 
        'appliedJobs'
    ])->name('management.applied.jobs');

    Route::get('0246520325/management/jobs/pending-approval', [
        ManagementJobsController::class, 
        'pendingApproval'
    ])->name('management.pending.jobs');

    Route::get('0246520325/management/jobs/trashed-jobs', [
        ManagementJobsController::class, 
        'trashedJobs'
    ])->name('management.trash.jobs');

    Route::get('0246520325/management/jobs/soft-delete-job/{id}', [
        ManagementJobsController::class, 
        'destroy'
    ])->name('management.job.soft.delete');

    Route::delete('0246520325/management/jobs/{id}', [
        ManagementJobsController::class, 
        'forceDelete'
    ])->name('management.job.delete');

    Route::post('0246520325/management/jobs/approve-job/{id}', [
        ManagementJobsController::class, 
        'approveJob'
    ])->name('management.job.approve');

    Route::get('0246520325/management/settings', [
        ManagementSettingsController::class, 
        'index'
    ])->name('management.settings');

    Route::post('0246520325/management/settings/update-email-username', [
        ManagementSettingsController::class, 
        'updateUsernameEmail'
    ]);
    Route::post('0246520325/management/settings/update-password', [
        ManagementSettingsController::class, 
        'updatePassword'
    ]); 

    Route::post('0246520325/management/settings/update-admin-profile-picture', [
        ManagementSettingsController::class, 
        'updateAvatar'
    ])->name('update.mgt.avatar'); 

    Route::post('0246520325/management/settings/update-admin-banner-picture', [
        ManagementSettingsController::class, 
        'bannerImage'
    ])->name('update.mgt.bannerImg'); 

    Route::post('0246520325/management/settings/update-admin-social-profiles', [
        ManagementSettingsController::class, 
        'socialProfiles'
    ]); 

    Route::post('0246520325/management/settings/update-admin-update-company-profile', [
        ManagementSettingsController::class, 
        'updateCompanyProfile'
    ]); 

    Route::get('0246520325/management/blog', [
        ManagementBlogController::class, 
        'index'
    ])->name('management.blog');

    Route::get('0246520325/management/blog/new', [
        ManagementBlogController::class, 
        'create'
    ])->name('management.blog.create');

    Route::post('0246520325/management/blog/new/store', [
        ManagementBlogController::class, 
        'store'
    ])->name('management.blog.store');

    Route::delete('0246520325/management/blog/delete/{id}', [
        ManagementBlogController::class, 
        'destroy'
    ])->name('management.blog.destroy');

    Route::get('0246520325/management/blog/category', [
        ManagementBlogCategoryController::class, 
        'index'
    ])->name('management.blog.category');

    Route::get('0246520325/management/blog/category/search', [
        ManagementBlogCategoryController::class, 
        'index'
    ])->name('management.blog.category.search');

    Route::post('0246520325/management/blog/category/store', [
        ManagementBlogCategoryController::class, 
        'store'
    ]);

    Route::post('0246520325/management/blog/category/update/{id}', [
        ManagementBlogCategoryController::class, 
        'update'
    ]);


});

// Auth::routes(); 
Route::get('/login', function(){ return view('welcome'); })->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

