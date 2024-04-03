<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
//use App\Http\Controllers\admin\DashboardController;
use Modules\Dashboard\Http\Controllers\DashboardController;
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

//Route::prefix('dashboard')->group(function() {
//    Route::get('/', 'DashboardController@index');
//});
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::group(['prefix'=>'dashboard','middleware' => 'auth'], function () {
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    Route::post('set-session',[DashboardController::class, 'setSession'])->name('set-session');
    Route::get('profile',[DashboardController::class, 'profile'])->name('profile');
    Route::post('edit-profile',[DashboardController::class, 'editProfile'])->name('edit-profile');
    Route::get('approve-punches',[DashboardController::class,'approvePunches'])->name('approve_punches');
    Route::get('approve-overtime',[DashboardController::class,'approveOvertime'])->name('approve_overtime');
    Route::get('review-fine',[DashboardController::class,'reviewFine'])->name('review_fine');
    Route::get('manage-leave',[DashboardController::class,'manageLeave'])->name('manage_leave');
    Route::get('detailed-attendance-view',[DashboardController::class,'detailedAttendanceView'])->name('detailed_attendance_view');
    Route::get('attendance-upcoming-leaves',[DashboardController::class,'attendanceUpcomingLeaves'])->name('attendance-upcoming-leaves');
    Route::get('attendance-daily-work-entries',[DashboardController::class,'attendanceDailyWorkEntries'])->name('attendance-daily-work-entries');
    Route::get('on_time',[DashboardController::class,'onTime'])->name('on_time');
    Route::get('late',[DashboardController::class,'late'])->name('late');
    Route::get('absent',[DashboardController::class,'absent'])->name('absent');
    Route::get('leave',[DashboardController::class,'leave'])->name('leave');
    Route::get('notification',[DashboardController::class,'notification'])->name('notification');

    Route::post('staff_attendance_status',[DashboardController::class,'staffStatus'])->name('staff_attendance_status');
    Route::post('months_attendance_chart',[DashboardController::class,'monthAttendanceChart'])->name('months_attendance_chart');

});