<?php

use Illuminate\Support\Facades\Route;
use Modules\Report\Http\Controllers\ReportController;

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
    Route::get('report', [ReportController::class, 'index'])->name('report');
});

Route::group(['prefix'=>'report','middleware' => 'auth'], function () {
    Route::get('attendance_report', [ReportController::class, 'attendanceReport'])->name('attendance_report');
    Route::get('salary_report', [ReportController::class, 'salaryReport'])->name('salary_report');
    Route::get('report_user_list_export', [ReportController::class, 'reportUserListExport'])->name('report_user_list_export');
    Route::post('attendance_report_list', [ReportController::class, 'attendanceReportList'])->name('attendance_report_list');
    Route::post('user_report_list', [ReportController::class, 'UserReportList'])->name('user_report_list');
    Route::post('salary_report_list', [ReportController::class, 'SalaryReportList'])->name('salary_report_list');


    Route::get('attendance_report_excel', [ReportController::class, 'attendanceExport'])->name('attendance_report_excel');
    Route::get('user_export', [ReportController::class, 'userExport'])->name('user_export');
    Route::get('salary_export', [ReportController::class, 'salaryExport'])->name('salary_export');


});

