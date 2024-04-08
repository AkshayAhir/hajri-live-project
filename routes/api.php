<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiLoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[ApiLoginController::class,'login'])->name('api.login');
Route::post('verify_otp',[ApiLoginController::class,'verifyOtp'])->name('api.verify_otp');
Route::post('add_business',[ApiLoginController::class ,'addBusiness'])->name('api.add-business');

Route::post('staff_login',[ApiLoginController::class,'staffLogin'])->name('api.staff_login');
Route::post('staff_verify_otp',[ApiLoginController::class,'staffVerifyOtp'])->name('api.staff_verify_otp');
Route::post('set_business', [ApiLoginController::class, 'setBusiness'])->name('api.set-business');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('edit_business',[ApiLoginController::class ,'editBusiness'])->name('api.edit_business');

    Route::post('get_user', [ApiLoginController::class, 'getUser'])->name('api.get_user');
    Route::get('logout', [ApiLoginController::class, 'logout'])->name('api.logout');
    //    staff api route
    Route::post('get_staff', [ApiLoginController::class, 'getStaff'])->name('api.get-staff');
    Route::post('add_edit_staff', [ApiLoginController::class, 'addStaff'])->name('api.add-staff');
    Route::post('delete_staff', [ApiLoginController::class, 'deleteStaff'])->name('api.delete-staff');
    Route::post('delete_user',[ApiLoginController::class,'deleteUser'])->name('api.delete_user');


    //    department api route
    Route::post('get_department', [ApiLoginController::class, 'getDepartment'])->name('api.get-department');
    Route::post('add_edit_department', [ApiLoginController::class, 'addDepartment'])->name('api.add-department');
    Route::post('delete_department', [ApiLoginController::class, 'deleteDepartment'])->name('api.delete-department');

    //    attendance api route
    Route::post('get_attendance', [ApiLoginController::class, 'getAttendance'])->name('api.get-attendance');
    Route::post('add_attendance', [ApiLoginController::class, 'addAttendance'])->name('api.add-attendance');

});
Route::group(['middleware' => 'auth:staff'], function () {
    //staff business
    Route::post('staff_businesses', [ApiLoginController::class, 'staffBusinesses'])->name('api.staff-businesses');
    Route::post('get_staff_attendance', [ApiLoginController::class, 'getStaffAttendance'])->name('api.get-staff-attendance');
    Route::get('staff-logout', [ApiLoginController::class, 'staffLogout'])->name('api.staff-logout');
});