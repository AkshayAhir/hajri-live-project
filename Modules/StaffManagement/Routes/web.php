<?php
use Illuminate\Support\Facades\Route;
use Modules\StaffManagement\Http\Controllers\StaffManagementController;
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

//Route::prefix('staffmanagement')->group(function() {
//    Route::get('/', 'StaffManagementController@index');
//});
Route::group(['middleware' => 'auth'], function () {
    Route::get('staff', [StaffManagementController::class, 'index'])->name('staff');
});

Route::group(['prefix'=>'staff','middleware' => 'auth'], function () {
    Route::post('all-staff', [StaffManagementController::class, 'allStaff'])->name('all-staff');
    Route::get('add-staff', [StaffManagementController::class, 'addStaff'])->name('add-staff');
    Route::post('add-record-staff', [StaffManagementController::class, 'addRecordStaff'])->name('add-record-staff');
    Route::post('delete_staff', [StaffManagementController::class, 'deleteStaff'])->name('delete_staff');
    Route::post('uploadStaffPhoto', [StaffManagementController::class, 'uploadStaffPhoto'])->name('uploadStaffPhoto');
    Route::post('uploadStaffDocument', [StaffManagementController::class, 'uploadStaffDocument'])->name('uploadStaffDocument');
    Route::get('staff-profile/{id}', [StaffManagementController::class, 'staffProfile'])->name('staff-profile');
    Route::post('update_staff_profile', [StaffManagementController::class, 'updateStaffProfile'])->name('update_staff_profile');

    Route::get('view_profile/{id}', [StaffManagementController::class, 'viewProfile'])->name('view_profile');
    Route::post('staff_info/', [StaffManagementController::class, 'staffInfo'])->name('staff_info');
    Route::post('staff_bank_details', [StaffManagementController::class, 'staffBankDetails'])->name('update_bank_details');

    Route::get('bulk_excel_add_staff', [StaffManagementController::class, 'bulkExcelAddStaff'])->name('bulk-excel-add-staff');
    Route::get('bulk_excel_add_staff_onboarding', [StaffManagementController::class, 'bulkExcelAddStaffOnboarding'])->name('bulk-excel-add-staff-onboarding');
    Route::post('upload_excel_add_staff', [StaffManagementController::class, 'uploadExcelAddStaff'])->name('upload-excel-add-staff');
    Route::post('excel_add_staff', [StaffManagementController::class, 'excelAddStaff'])->name('excel-add-staff');
    Route::get('download_template_excel', [StaffManagementController::class, 'downloadTemplateExcel'])->name('download_template_excel');

    Route::post('staff_attendance_list', [StaffManagementController::class, 'staffAttendanceList'])->name('staff_attendance_list');
    Route::post('staff_display_note_data', [StaffManagementController::class, 'staffDisplayNoteData'])->name('staff_display_note_data');
    Route::post('add_staff_note', [StaffManagementController::class, 'addStaffNote'])->name('add_staff_note');
    Route::post('attendance_staff_on_date_change', [StaffManagementController::class, 'attendanceStaffOnDateChange'])->name('attendance_staff_on_date_change');
    Route::post('staff_attendance_change_status', [StaffManagementController::class, 'sttafattendanceStatusChange'])->name('staff_attendance_change_status');
    Route::get('staff_attendance_excel', [StaffManagementController::class, 'staffAttendanceExport'])->name('staff_attendance_excel');
    Route::get('staff_info_export', [StaffManagementController::class, 'StaffInfoExport'])->name('staff_info_export');

    Route::post('deactivate_staff', [StaffManagementController::class, 'deactivateStaff'])->name('deactivate_staff');

});