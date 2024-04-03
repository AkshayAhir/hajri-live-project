<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\GlobalSearchController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('admin.login');
//})->name('login');
Route::get('/',[LoginController::class ,'landingPage'])->name('landing');
Route::get('/a_admin/login',[LoginController::class ,'index'])->name('login');
Route::post('register-number',[LoginController::class ,'registerNumber'])->name('register_number');
Route::post('verify-otp',[LoginController::class ,'verifyOtp'])->name('verify_otp');
Route::post('store_business',[LoginController::class ,'storeBusiness'])->name('store_business');
Route::post('global_search',[GlobalSearchController::class ,'search'])->name('global_search');
