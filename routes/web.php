<?php

use App\Http\Controllers\{SuperadminController, LoginController, HomeController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



//
////Route::resource('/admin',SuperadminController::class);
//Route::post('/admin/login',[LoginController::class, 'login'])->name('super.login');
//
//Route::get('/admin/home', [SuperadminController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


///*****************ADMIN ROUTES*******************/
// Route::Group(['prefix' => 'admin'], function () {
//     Route::get('/index_admin', function () {
//         return view('admin.index_admin');
//     })->name('pagee');
//     Route::get('/appointment-list', function () {
//         return view('admin.appointment-list');
//     })->name('appointment-list');
//     Route::get('/specialities', function () {
//         return view('admin.specialities');
//     })->name('specialities');
//     Route::get('/doctor-list', function () {
//         return view('admin.doctor-list');
//     })->name('doctor-list');
//     Route::get('/patient-list', function () {
//         return view('admin.patient-list');
//     })->name('patient-list');
//     Route::get('/reviews', function () {
//         return view('admin.reviews');
//     })->name('reviews');
//     Route::get('/transactions-list', function () {
//         return view('admin.transactions-list');
//     })->name('transactions-list');
//     Route::get('/settings', function () {
//         return view('admin.settings');
//     })->name('settings');
//     Route::get('/invoice-report', function () {
//         return view('admin.invoice-report');
//     })->name('invoice-report');
//     Route::get('/profile', function () {
//         return view('admin.profile');
//     })->name('profile');
//     Route::get('/login', function () {
//         return view('admin.login');
//     })->name('login');
//     Route::get('/register', function () {
//         return view('admin.register');
//     })->name('register');
//     Route::get('/forgot-password', function () {
//         return view('admin.forgot-password');
//     })->name('forgot-password');
//     Route::get('/lock-screen', function () {
//         return view('admin.lock-screen');
//     })->name('lock-screen');
//     Route::get('/error-404', function () {
//         return view('admin.error-404');
//     })->name('error-404');
//     Route::get('/error-500', function () {
//         return view('admin.error-500');
//     })->name('error-500');
//     Route::get('/blank-page', function () {
//         return view('admin.blank-page');
//     })->name('blank-page');
//     Route::get('/components', function () {
//         return view('admin.components');
//     })->name('components');
//     Route::get('/form-basic-inputs', function () {
//         return view('admin.form-basic-inputs');
//     })->name('form-basic');
//     Route::get('/form-input-groups', function () {
//         return view('admin.form-input-groups');
//     })->name('form-inputs');
//     Route::get('/form-horizontal', function () {
//         return view('admin.form-horizontal');
//     })->name('form-horizontal');
//     Route::get('/form-vertical', function () {
//         return view('admin.form-vertical');
//     })->name('form-vertical');
//     Route::get('/form-mask', function () {
//         return view('admin.form-mask');
//     })->name('form-mask');
//     Route::get('/form-validation', function () {
//         return view('admin.form-validation');
//     })->name('form-validation');
//     Route::get('/tables-basic', function () {
//         return view('admin.tables-basic');
//     })->name('tables-basic');
//     Route::get('/data-tables', function () {
//         return view('admin.data-tables');
//     })->name('data-tables');
//     Route::get('/invoice', function () {
//         return view('invoice');
//     })->name('invoice');
//     Route::get('/calendar', function () {
//         return view('admin.calendar');
//     })->name('calendar');
//     Route::get('/blog', function () {
//         return view('admin.blog');
//     })->name('blog');
//     Route::get('/blog-details', function () {
//         return view('admin.blog-details');
//     })->name('blog-details');
//     Route::get('/add-blog', function () {
//         return view('admin.add-blog');
//     })->name('add-blog');
//     Route::get('/edit-blog', function () {
//         return view('admin.edit-blog');
//     })->name('edit-blog');
//     Route::get('/product-list', function () {
//         return view('admin.product-list');
//     })->name('product-list');
//     Route::get('/pharmacy-list', function () {
//         return view('admin.pharmacy-list');
//     })->name('pharmacy-list');
//     Route::get('/pending-blog', function () {
//         return view('admin.pending-blog');
//     })->name('pending-blog');
// });
///********************ADMIN ROUTES END******************************/

Route::get('/', [HomeController::class,'index'] );

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'notallowed'])->name('home');
Route::get('/error-404', [App\Http\Controllers\HomeController::class, 'error'])->name('error-404');


Route::middleware(['is_admin'])->group( function () {
    //client
    Route::get('index_admin', [SuperadminController::class, 'adminHome'])->name('super.adminHome');
    Route::get('client-list', [SuperadminController::class, 'allClientList'])->name('super.allClientList');
    Route::get('client-project/{id}', [SuperadminController::class, 'clientProjectById'])->name('super.clientProjectById');
    Route::get('client-job/{id}', [SuperadminController::class, 'allProposalByJobId'])->name('super.allProposalByJobId');
    Route::get('user/{id}', [SuperadminController::class, 'userData'])->name('super.userData');


    // freelancer
    Route::get('freelancer-list', [SuperadminController::class, 'allFreelancerList'])->name('super.allFreelancerList');
    Route::get('freelancer-project/{id}', [SuperadminController::class, 'freelancerJobsById'])->name('super.freelancerJobsById');
    Route::get('freelancer-mannual-approval', [SuperadminController::class, 'freelancer_mannual_approval'])->name('super.freelancer_mannual_approval');
    Route::post('user_mannual_approval', [SuperadminController::class, 'user_mannual_approval'])->name('super.user_mannual_approval');


    //agency
    Route::get('agency-list', [SuperadminController::class, 'allAgencyList'])->name('super.allAgencyList');
    Route::get('agency-mannual-approval', [SuperadminController::class, 'agency_mannual_approval'])->name('super.agency_mannual_approval');


});


Route::get('send-mail', function () {

    $subject = 'Mail from Rvs Dev';

    $details = [
        'subject' => $subject,
        'message' => 'This is for testing email using smtp'
    ];

    \Mail::to('towici5237@aregods.com')->send(new \App\Mail\SendEmail($details));

    dd("Email is Sent.");
});


