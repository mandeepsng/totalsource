<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{ UserController, RegisterController , JobsController };
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [ UserController::class, 'all_users' ]);

// auth
Route::post('/register',[RegisterController::class, 'register' ]);

Route::post('/login', [ RegisterController::class, 'process_login' ] );

Route::get('job_listing',[JobsController::class, 'index']);

Route::post('/job_store',[JobsController::class, 'store']);

Route::post('/get_company',[\App\Http\Controllers\CompanyController::class, 'get_company_data' ] );
Route::post('/update_company_profile',[\App\Http\Controllers\CompanyController::class, 'update_company_profile' ] );


