<?php

use Illuminate\Support\Facades\Route;
use Modules\Attendance\Http\Controllers\AttendanceController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance');
});

Route::group(['prefix'=>'attendance','middleware' => 'auth'], function () {
    Route::get('review_fines', [AttendanceController::class, 'review_fines'])->name('review_fines');
    Route::get('review_overtime', [AttendanceController::class, 'review_overtime'])->name('review_overtime');
    Route::get('attendance_punches', [AttendanceController::class, 'attendancePunches'])->name('attendance_punches');
    Route::get('attendance_leave', [AttendanceController::class, 'attendanceLeave'])->name('attendance_leave');
    Route::get('attendance_settings', [AttendanceController::class, 'attendanceSettings'])->name('attendance_settings');

    // attendance
    Route::post('attendance_list', [AttendanceController::class, 'attendanceList'])->name('attendance_list');
    Route::post('attendance_on_date_change', [AttendanceController::class, 'attendanceOnDateChange'])->name('attendance_on_date_change');
    Route::post('add_note', [AttendanceController::class, 'addNote'])->name('add_note');
    Route::post('display_note_and_log_data', [AttendanceController::class, 'displayNoteAndLog'])->name('display_note_and_log_data');
    Route::post('change_attendance_status', [AttendanceController::class, 'changeAttendanceStatus'])->name('change_attendance_status');

    // review_fine
    Route::post('review_fine_list', [AttendanceController::class, 'allReviewFine'])->name('review_fine_list');
    // Route::post('review_fine_on_date_change', [AttendanceController::class, 'reviewFineOnDatechange'])->name('review_fine_on_date_change');

    // attendance punches
    Route::post('attendance_punches_list', [AttendanceController::class, 'allAttendancePunches'])->name('attendance_punches_list');
    Route::post('delete_check_punches', [AttendanceController::class, 'deleteCheckedPunches'])->name('delete_check_punches');

    Route::post('attendance_approve_decline', [AttendanceController::class, 'attendanceApproveDecline'])->name('attendance_approve_decline');
    Route::post('all_attendance_approve_decline', [AttendanceController::class, 'allAttendanceApproveDecline'])->name('all_attendance_approve_decline');

    Route::post('attendance_reject_select', [AttendanceController::class, 'AttendanceRejectSelect'])->name('attendance_reject_select');

});
