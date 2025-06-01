<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Employer\EmployerBrowseCandidateController;
use App\Http\Controllers\Employer\EmployerCandidateShortlistController;
use App\Http\Controllers\Employer\EmployerChangePasswordController;
use App\Http\Controllers\Employer\EmployerDashboardController;
use App\Http\Controllers\Employer\EmployerJobController;
use App\Http\Controllers\Employer\EmployerProfileController;


Route::group(['middleware' => ['auth', 'auth.redirect', 'employer', 'prevent-back-history', 'otp.verified']], function () {
    /****
     * 
     * Employer Middleware Protected Routes
     * 
     ****/
    Route::get('/employer-dashboard', [EmployerDashboardController::class, 'index'])->name('employer.dashboard');

    Route::get('/employer-dashboard/company-profile', [EmployerProfileController::class, 'index'])->name('employer.profile');

    Route::post('/employer-dashboard/company-profile/update', [EmployerProfileController::class, 'updateEmployerProfile'])
        ->name('update.employer.profile');

    Route::post('/employer-dashboard/company-profile/update-company-avatar', [EmployerProfileController::class, 'employerAvatarUpdate'])
        ->name('update.employer.profile');

    Route::post('/employer-dashboard/company-profile/remove-company-avatar', [EmployerProfileController::class, 'removeAvatar'])
        ->name('remove.employer.profile');

    Route::delete('/employer-dashboard/company-profile/delete-account', [EmployerProfileController::class, 'destroy']);

    Route::get('/employer-dashboard/my-job', [EmployerJobController::class, 'index'])->name('employer.job');

    Route::get('/employer-dashboard/my-job/submit', [EmployerJobController::class, 'add'])->name('employer.job.submit');

    Route::get('/employer-dashboard/my-job/edit/{slug}', [EmployerJobController::class, 'edit'])->name('employer.job.edit');
    Route::post('/employer-dashboard/my-job/update/{slug}', [EmployerJobController::class, 'update'])->name('employer.job.update');

    Route::post('/employer-dashboard/my-job/submit-new', [EmployerJobController::class, 'store'])->name('employer.job.submit.new');

    Route::delete('/employer-dashboard/my-jobs/delete/{id}', [EmployerJobController::class, 'destroy'])->name('employer.job.delete');


    Route::get('/employer-dashboard/applied-jobs', [EmployerJobController::class, 'appliedJobs'])->name('employee.applied.jobs');

    Route::get('/employer-dashboard/applied-jobs/{slug}', [EmployerJobController::class, 'viewAppliedJob'])
        ->name('employer.view.applied.jobs');

    Route::get('/employer-dashboard/applied-jobs/{slug}/{id}', [EmployerBrowseCandidateController::class, 'view'])
        ->name('employer.view.candidate');

    Route::post('/employer-dashboard/applied-job/shortlist-candidate', [EmployerBrowseCandidateController::class, 'shortlistCandidate']);


    // Shortlist candidates
    Route::get('/employer-dashboard/candidate-shortlist', [EmployerCandidateShortlistController::class, 'index'])
    ->name('employer.candidate.shortlist');

    Route::get('/employer-dashboard/candidate-shortlist/search', [EmployerCandidateShortlistController::class, 'index'])
    ->name('employer.candidate.shortlist.search');

    Route::get('/employer-dashboard/candidate-list', [EmployerBrowseCandidateController::class, 'index'])->name('employer.candidate.list');

    Route::get('/employer-dashboard/candidate-list/search', [EmployerBrowseCandidateController::class, 'index'])
        ->name('employer.candidate.list.search');

    Route::get('/employer-dashboard/candidate-list/{id}', [EmployerBrowseCandidateController::class, 'view'])
        ->name('employer.candidate.view');

    Route::get('/employer-dashboard/package', function () {
        return view('employer.employer-package');
    })->name('employer.package');

    Route::get('/employer-dashboard/change-password', [EmployerChangePasswordController::class, 'index'])->name('employer.change.password');

    Route::post('/employer-dashboard/change-password/update', [EmployerChangePasswordController::class, 'update']);

    Route::get('/employer-dashboard/delete-profile', function () {
        return view('employer.employer-delete-profile');
    })->name('employer.delete.profile');

    // browse employees
    Route::get('/employer-dashboard/browse-candidates', [EmployerBrowseCandidateController::class, 'index'])->name('employer.browse.candidate');
    

});