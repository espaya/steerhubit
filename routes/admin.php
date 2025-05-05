<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Management\InvoiceController;
use App\Http\Controllers\Management\ManagementBlockedUsers;
use App\Http\Controllers\Management\ManagementBlogCategoryController;
use App\Http\Controllers\Management\ManagementController;
use App\Http\Controllers\Management\ManagementEmployeesController;
use App\Http\Controllers\Management\ManagementEmployersController;
use App\Http\Controllers\Management\ManagementJobsController;
use App\Http\Controllers\Management\ManagementSettingsController;
use App\Http\Controllers\Management\ManagementBlogController;
use App\Http\Controllers\Management\ManagementBlogDraftController;
use App\Http\Controllers\Management\ManagementCommentController;
use App\Http\Controllers\Management\ManagementContactController;
use App\Http\Controllers\Management\ManagementSubscribersController;


Route::group(['middleware' => ['auth', 'auth.redirect', 'admin', 'prevent-back-history', 'otp.verified']], function(){
    // Management route
    Route::get('/0246520325/management', [ManagementController::class, 'index'])->name('management');
    Route::get('0246520325/management/employers', [ManagementEmployersController::class, 'index'])->name('management.employers');
    Route::get('0246520325/management/candidates', [ManagementEmployeesController::class, 'index'])->name('management.employees');
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

    Route::get('0246520325/management/comments', [ManagementCommentController::class, 'index'])->name('admin.comments');
    Route::post('0246520325/management/comments/approve/{id}', [ManagementCommentController::class, 'approveComment'])
        ->name('admin.comments.approve');
    Route::get('0246520325/management/comments/search', [ManagementCommentController::class, 'index'])->name('comments.search');


    Route::delete('0246520325/management/blog/delete/{id}', [ManagementBlogController::class, 'destroy'])->name('management.blog.destroy');
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

    Route::get('0246520325/management/subscribers', [
        ManagementSubscribersController::class, 
        'index'
    ])->name('management.subscribers');

    Route::delete('0246520325/management/subscribers/delete/{id}', [
        ManagementSubscribersController::class, 
        'destroy'
    ])->name('management.subscribers.delete');

    Route::get('0246520325/management/blog/draft', [ManagementBlogDraftController::class, 'index'])->name('management.blog.draft');

    Route::get('0246520325/management/contacts', [ManagementContactController::class, 'index'])->name('management.contact');
    Route::get('0246520325/management/contacts/search', [ManagementContactController::class, 'index'])->name('management.contact.search');
        
    Route::delete('0246520325/management/contacts/delete/{id}', [ManagementContactController::class, 'destroy'])->name('management.contact.delete');

    Route::get('/0246520325/management/invoice', [InvoiceController::class, 'index'])->name('management.invoice');
    Route::get('/0246520325/management/invoice/search', [InvoiceController::class, 'index'])->name('management.invoice.search');
    Route::get('/0246520325/management/invoice/create', [InvoiceController::class, 'create'])->name('management.invoice.create');
    Route::post('/0246520325/management/invoice/store', [InvoiceController::class, 'store'])->name('management.invoice.store');
    Route::get('/0246520325/management/invoice/{invoice_number}', [InvoiceController::class, 'show'])->name('management.invoice.show');
    Route::delete('/0246520325/management/invoice/destroy/{id}', [InvoiceController::class, 'destroy'])->name('management.invoice.destroy');

});