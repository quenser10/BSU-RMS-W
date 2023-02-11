<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Applicants\UserController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Administrator\ApplicantController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\ExcelController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Applicants\JobListingsController;
use App\Models\Applicant;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/', 'applicants.index')->name('/');

//APPLICANT ROUTES  

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth:web', 'verified']], function() {

    Route::get('/job-application/{openedJob}', [JobListingsController::class, 'showJobApplication'])->name('job-application')->middleware('auth');
    
     Route::get('/my-application', [JobListingsController::class, 'myApplication']);

     Route::post('/my-application/update/{id}', [JobListingsController::class, 'postApplicantProfileEdit']);

});

//Route::group(['middleware' => 'verified'], function() {

    Route::get('/job-offers', [JobListingsController::class, 'showJobOffers'])->name('job.offers');

//});
Route::get('/logout', [UserController::class, 'logoutApplicant'])->name('logout.applicant');

Route::get('/contact-us', [JobListingsController::class, 'showContactUs'])->name('contact.us');

Route::get('job-description/{job_id}', [JobListingsController::class, 'jobDescription']);


Route::get('/access-denied', [JobListingsController::class, 'showAccessDenied'])->name('access.denied');

Route::post('/applicant/submit-application/{user_id}', [JobListingsController::class, 'storeApplication'])->name('submit.application');
    
Route::post('/applicant/login', [UserController::class, 'applicantLogin'])->name('applicant.login');

Route::post('/applicant/register', [UserController::class, 'applicantRegister'])->name('applicant.register');


Route::post('/applicant/disqualify/{applicant_id}', [DashboardController::class, 'applicantDisqualify']);

//Google Login
Route::get('login/google', [SocialController::class, 'redirectToGoogle'])->name('login.google');
Route::get('public/login/google/callback', [SocialController::class, 'handleGoogleCallback']);

//Facebook Login
Route::get('login/facebook', [SocialController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('public/login/facebook/callback', [SocialController::class, 'handleFacebookCallback']);

//Linkedin Login
Route::get('login/linkedin', [SocialController::class, 'redirectToLinkedin'])->name('login.linkedin');
Route::get('public/login/linkedin/callback', [SocialController::class, 'handleLinkedinCallback']);

Route::get('/contact-us', [JobListingsController::class, 'contactUs']);

Route::get('/help', function(){ return view('applicants.help');});

Route::get('/transparency-seal', [JobListingsController::class, 'transparencySeal']);

Route::get('/applicant/password-reset', [JobListingsController::class, 'passwordReset']);

// Route::post('/applicant/password-reset', [JobListingsController::class, 'passwordReset']);

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('forgot.password');

Route::get('view-applicant/{id}', [JobListingsController::class, 'viewApplicant']);

//DASHBOARD ROUTES
Route::get('/web-edit-content', [DashboardController::class, 'editWebPage']);

Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin', function () {return view('auth.admin.login-page');})->name('admin.login-page');

Route::get('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout'); //****** */

Route::get('/admin/register', [DashboardController::class, 'adminRegister']);

Route::post('/admin/register-account', [DashboardController::class, 'adminRegisterAccount']);


// Administrator Group Route w/ middleware
Route::group(['middleware' => ['admin_user']], function() { 

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/year-filter', [DashboardController::class, 'yearFilter']);

Route::get('/admin/qualification-filter', [DashboardController::class, 'qualificationFilter']);

Route::get('/admin/masterlist', [DashboardController::class, 'showMasterlist'])->name('admin.masterlist');

Route::get('/admin/masterlist/applicant-profile/{id}', [DashboardController::class, 'applicantProfile']);

// Route::get('/admin/masterlist/applicant-profile/edit/{id}', [DashboardController::class, 'getApplicantProfileEdit']);

// Route::post('/admin/masterlist/applicant-profile/edit-profile/{id}', [DashboardController::class, 'postApplicantProfileEdit']);



Route::post('/admin/masterlist/applicant-profile/delete/{id}', [DashboardController::class, 'deleteApplicant']);

Route::get('admin/audit-trail', [DashboardController::class, 'auditTrail']);
    
Route::get('/admin/admin-management/edit/{id}', [DashboardController::class, 'editAdmin']);

Route::post('/admin/admin-management/update/{id}', [DashboardController::class, 'updateAdmin']);

Route::delete('/admin/admin-management/delete/{id}', [DashboardController::class, 'deleteAdmin'])->name('admin.delete');

Route::post('/admin/admin-management/add', [DashboardController::class, 'createAdmin']);

Route::get('/admin/admin-management/add-admin', [DashboardController::class, 'addAdmin']);

Route::get('/admin/job-management/open-a-job', [DashboardController::class, 'getOpenJob']);
Route::get('/admin/job-management/opened-jobs', [DashboardController::class, 'getOpenedJobs']);
Route::get('/admin/job-management/closed-jobs', [DashboardController::class, 'getClosedJobs']);

Route::post('/job-management/open-job', [JobController::class, 'openJob']);
Route::post('/job-management/update-job', [JobController::class, 'updateJob']);

Route::post('/admin/job-management/closed-jobs/republish/{job_id}', [JobController::class, 'republishJob']);

Route::get('/admin/job-management/closed-jobs/republish-page/{job_id}', [JobController::class, 'republishPage']);

Route::get('/admin/job-management/edit-job/{job_id}', [JobController::class, 'getEditJob']);

Route::put('/admin/job-management/edit-job/update/{job_id}', [JobController::class, 'updateJob']);

Route::get('/admin/job-management/edit-job/{job_id}', [JobController::class, 'getEditJob']);

Route::post('/admin/job-management/opened-jobs/close/{job_id}', [JobController::class, 'closeJob']);

Route::get('/applicant-tracking', [DashboardController::class, 'showApplicantTracking']);

//Show Backup Database
Route::get('/backup-database', [DashboardController::class, 'showBackupDatabase']);

Route::get('/restore-database', [DashboardController::class, 'showRestoreDatabase'])->name('restore.database');

//Show Initial Assessment
Route::get('/initial-assessment', [DashboardController::class, 'showInitialAssessment']);

//Show Final Comparative Assessment Form
Route::get('/final-comparative-form/{applicant_id}', [DashboardController::class, 'showComparativeForm']);

//SHOW APPLICAnt Initial assessment
Route::get('/initial-assessment/evaluate/{applicant_id}', [ApplicantController::class, 'showApplicantAssessment']);


Route::get('/admin/admin-management', [DashboardController::class, 'adminManagementPage']);

Route::post('/comparative-assessment',[DashboardController::class, 'comparativeAssessment']);

Route::post('/initial-assessment/evaluation-qualify/{applicant_id}', [DashboardController::class, 'applicantQualify']);

Route::post('/initial-assessment/evaluation-disqualify/{applicant_id}', [DashboardController::class, 'applicantDisqualify']);

Route::post('/applicant-tracking/generate-form/{applicant_id}', [DashboardController::class, 'generateForm']);

Route::get('/applicant-tracking/pdf/{applicant_id}', [DashboardController::class, 'pdf']);

Route::post('/admin/prequalification-report', [ExcelController::class, 'prequalificationReport']);

Route::post('/admin/preliminary-assessment-report', [ExcelController::class, 'preliminaryAssessmentReport']);


Route::post('/admin/restore-database', [DashboardController::class, 'restoreDatabase']);

Route::get('/admin/on-site-application', [DashboardController::class, 'viewOnSiteApplication']);

Route::post('/admin/submit-application', [DashboardController::class, 'submitApplication']);


Route::get('/admin/applicant-accounts', [DashboardController::class, 'applicantAccounts']);

});









