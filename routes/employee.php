<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Candidate\CandidateDashboardController;
use App\Http\Controllers\Candidate\CandidateDeleteProfileController;
use App\Http\Controllers\Candidate\CandidateJobController;
use App\Http\Controllers\Candidate\CandidateJobShortlistedController;
use App\Http\Controllers\Candidate\CandidatePasswordController;
use App\Http\Controllers\Candidate\CandidateProfileController;
use App\Http\Controllers\Candidate\CandidateResumeController;

/*
* Employee Middleware
*/
Route::group(['middleware' => ['auth', 'auth.redirect', 'candidate', 'prevent-back-history']], function () {

    Route::get('/candidate-dashboard', [CandidateDashboardController::class, 'index'])->name('employee');

    Route::get('/candidate-dashboard/resume', [CandidateResumeController::class, 'index'])->name('employee.resume');
    Route::post('/candidate-dashboard/resume/file', [CandidateResumeController::class, 'storeFile']); 
    Route::post('/candidate-dashboard/resume/degree', [CandidateResumeController::class, 'storeDegree']);
    Route::post('/candidate-dashboard/resume/certification', [CandidateResumeController::class, 'storeCertification']);
    Route::post('/candidate-dashboard/resume/highschool', [CandidateResumeController::class, 'storeHighSchool']);
    Route::post('/candidate-dashboard/resume/skills', [CandidateResumeController::class, 'storeSkills']);
    Route::post('/candidate-dashboard/resume/skills/delete', [CandidateResumeController::class, 'deleteSkill']);
    Route::get('/candidate-dashboard/resume/skills/get', [CandidateResumeController::class, 'getSkills']);
    Route::post('/candidate-dashboard/resume/delete-file', [CandidateResumeController::class, 'deleteResumeFile']);

    Route::get('/candidate-dashboard/profile', [CandidateProfileController::class, 'index'])->name('employee.profile');
    Route::post('/candidate-dashboard/profile/save', [CandidateProfileController::class, 'store'])->name('employee.profile.store');
    Route::post('/candidate/dashboard/profile/update', [CandidateProfileController::class, 'updateAvatar'])->name('candidate.update.avatar');
    Route::post('/candidate/dashboard/profile/delete-avatar', [CandidateProfileController::class, 'deleteAvatar']);

    Route::get('/candidate-dashboard/job-shortlisted', [CandidateJobShortlistedController::class, 'index'])->name('employee.job.shortlisted');
    Route::get('/candidate-dashboard/job-shortlisted/search', [CandidateJobShortlistedController::class, 'index'])->name('employee.job.shortlisted.search');

    Route::get('/candidate-dashboard/following-employer', function () {
        return view('employee.employee-following-employer');
    })->name('employee.following-employer');

    Route::get('/candidate-dashboard/delete-profile', [CandidateDeleteProfileController::class, 'index'])->name('employee.delete-profile');

    Route::delete('/candidate-dashboard/delete-profile/delete', [CandidateDeleteProfileController::class, 'destroy'])
        ->name('employee.delete-profile.delete');

    Route::get('/candidate-dashboard/change-password', [CandidatePasswordController::class, 'index'])->name('employee.change.password');
    Route::post('/candidate-dashboard/change-password/update', [CandidatePasswordController::class, 'store'])
        ->name('employee.update.password')
        ->middleware('throttle:3,10');


    Route::get('/candidate-dashboard/applied-job', [CandidateJobController::class, 'index'])->name('employee.applied.job');
    Route::get('/candidate-dashboard/applied-job/search', [CandidateJobController::class, 'index'])->name('employee.applied.job.search');

});
