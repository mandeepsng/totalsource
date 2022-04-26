<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\{UserController,
    RegisterController,
    JobsController,
    MediaUploadController,
    AgencyController,
    FreelancerController,
    ProposalController,
    ContractController,
    VerifyEmailController};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//
//    return redirect('/home');
//})->middleware(['auth', 'signed'])->name('verification.verify');


//Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//    ->middleware(['signed', 'throttle:6,1'])
//    ->name('verification.verify');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->name('verification.verify')->middleware('auth:sanctum');

Route::post('/new_token', [VerifyEmailController::class, 'generate_sanctum_token']);
Route::post('email/verification-notification', [VerifyEmailController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');

Route::post('users/verify', [VerifyEmailController::class, 'resend']); // resend email verification


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/users', [ UserController::class, 'all_users' ]);
});

//Route::get('/users', [ UserController::class, 'all_users' ]);

// auth
Route::post('/register',[RegisterController::class, 'register' ]);
//Route::get('email/verify', [RegisterController::class, 'register' ])->name('verification.verify');
//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');


Route::post('/login', [ RegisterController::class, 'process_login' ] );

Route::get('job_listing',[JobsController::class, 'index']);
Route::post('get_client_job_post',[JobsController::class, 'getClientJobPost']);
Route::get('get_client_job_post/{id}',[JobsController::class, 'getClientJobPostById']);
Route::post('show_job_by_id',[JobsController::class, 'show_job_by_id']);
Route::get('job_view/{id}',[JobsController::class, 'jobViewById']);
Route::post('client_job_view_by_id',[JobsController::class, 'clientJobViewById']);

Route::get('client_job_view/{id}',[JobsController::class, 'clientJobViewById']);

Route::post('update_job_by_id',[JobsController::class, 'update_job_by_id']);
Route::post('jobPostDestroyById',[JobsController::class, 'jobPostDestroyById']);
Route::post('jobsCount',[JobsController::class, 'jobsCount']);
Route::post('sendEmail',[JobsController::class, 'sendEmail']);

// images upload
Route::post('profileImageInsert',[MediaUploadController::class, 'profileImageInsert']);

Route::post('/job_store',[JobsController::class, 'store']);

Route::post('/get_company',[\App\Http\Controllers\CompanyController::class, 'get_company_data' ] );
Route::post('/update_company_profile',[\App\Http\Controllers\CompanyController::class, 'update_company_profile' ] );

// agency api
Route::post('/get_agency',[AgencyController::class, 'get_agency_data' ] );
Route::post('/update_agency_profile',[AgencyController::class, 'update_agency_profile' ] );


// freelancer api
Route::post('/get_freelancer',[FreelancerController::class, 'get_freelancer_data' ] );
Route::post('/update_freelancer_profile',[FreelancerController::class, 'update_freelancer_profile' ] );

// proposal
Route::post('/store_proposal',[ProposalController::class, 'store']);
Route::post('/get_proposal_by_id', [ProposalController::class, 'get_proposal_by_id'] );
Route::post('/check_exit_bid_by_id', [ProposalController::class, 'check_exit_bid_by_id'] );

// job

Route::post('/create_contract', [JobsController::class, 'create_contract']);
