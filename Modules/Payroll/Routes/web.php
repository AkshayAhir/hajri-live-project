<?php

use Illuminate\Support\Facades\Route;
use Modules\Payroll\Http\Controllers\PayrollController;

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
    Route::get('payroll',[PayrollController::class,'index'])->name('payroll');
//     Route::resource('payroll', PayrollController::class)->names('payroll');
});
Route::group(['prefix'=>'payroll','middleware' => 'auth'], function () {
    
    Route::get('payroll',[PayrollController::class,'payroll'])->name('payroll-page');
    Route::post('payroll-list',[PayrollController::class,'payrollList'])->name('payroll-list');
    Route::post('all-attendance-review',[PayrollController::class,'allAttendanceReview'])->name('all-attendance-review');
    Route::get('payroll-approvals',[PayrollController::class,'payrollApprovals'])->name('payroll-approvals');
    Route::post('all-process-payroll',[PayrollController::class,'allProcessPayroll'])->name('all-process-payroll');
    Route::post('all-download-payroll',[PayrollController::class,'allDownloadPayroll'])->name('all-download-payroll');
    Route::get('payroll-approval-review',[PayrollController::class,'payrollReview'])->name('payroll-review');
    Route::post('add-payroll-record',[PayrollController::class,'addPayrollRecord'])->name('add-payroll-record');
    Route::post('set-session-payroll',[PayrollController::class,'setPayrollSession'])->name('set-session-payroll');

    Route::get('payroll_export', [PayrollController::class, 'payrollExport'])->name('payroll_export');

    // Review Details
    Route::get('payroll-review-details',[PayrollController::class,'payrollReviewDetail'])->name('payroll-reviewdetail');
    Route::get('payroll-total-pay',[PayrollController::class,'payrollTotalPay'])->name('payroll-totalpay');
    Route::post('all-total-pay-review',[PayrollController::class,'allTotalPayReview'])->name('all-total-pay-review');
  
    // Payroll Approvals
    Route::get('payroll-approval-punches',[PayrollController::class,'approvalPunches'])->name('approval-punches');
    Route::get('payroll-approve-overtime',[PayrollController::class,'approveOvertime'])->name('approval-overtime');
    Route::get('payroll-approve-leaves',[PayrollController::class,'approveLeaves'])->name('approval-leaves');

    Route::get('payroll-approve-summary', [PayrollController::class,'payrollSummary'])->name('payroll-summary');

});




