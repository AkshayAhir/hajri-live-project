<?php
use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\SettingController;
use Modules\Setting\Http\Controllers\DepartmentController;
use Modules\Setting\Http\Controllers\HolidayPolicyController;
use Modules\Setting\Http\Controllers\WeeklyHolidayPolicyController;
use Modules\Setting\Http\Controllers\LeavePolicyController;
use Modules\Setting\Http\Controllers\AccountSettingController;
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

//Route::prefix('setting')->group(function() {
//    Route::get('/', 'SettingController@index');
//});
Route::group(['middleware' => 'auth'], function () {
    Route::get('setting', [SettingController::class, 'index'])->name('setting');
});

Route::group(['prefix'=>'setting','middleware' => 'auth'], function () {
    // account setting
    Route::get('account_setting', [AccountSettingController::class, 'index'])->name('account_setting');
    Route::get('business_info', [AccountSettingController::class, 'BusinessInfo'])->name('business_info');
    Route::get('manage_business', [AccountSettingController::class, 'manageBusiness'])->name('manage_business');
    Route::get('new_business_account', [AccountSettingController::class, 'newBusinessAccount'])->name('new_business_account');
    Route::post('edit_account', [AccountSettingController::class, 'editAccount'])->name('edit_account');
    Route::post('edit_business', [AccountSettingController::class, 'editBusiness'])->name('edit_business');
    Route::post('edit_business_info', [AccountSettingController::class, 'editBusinessInfo'])->name('edit_business_info');
    Route::post('add_business', [AccountSettingController::class, 'addBusiness'])->name('add_business');
    Route::post('uploadBusinessLogo', [AccountSettingController::class, 'uploadBusinessLogo'])->name('uploadBusinessLogo');
    Route::post('addBusinessLogo', [AccountSettingController::class, 'addBusinessLogo'])->name('addBusinessLogo');

    // department
    Route::get('departments', [DepartmentController::class, 'department'])->name('departments');
    Route::post('all_department', [DepartmentController::class, 'allDepartment'])->name('all-department');
    Route::post('add_department', [DepartmentController::class, 'addDepartment'])->name('add-department');
    Route::post('edit_department', [DepartmentController::class, 'editDepartment'])->name('edit-department');
    Route::post('update_department', [DepartmentController::class, 'updateDepartment'])->name('update-department');
    Route::post('delete_department', [DepartmentController::class, 'deleteDepartment'])->name('delete-department');
    Route::get('assing_staff', [DepartmentController::class, 'AssignStaff'])->name('assing_staff');
    Route::post('department_staff_list', [DepartmentController::class, 'departmentstaffList'])->name('department_staff_list');
    Route::post('apply_department_to_staff', [DepartmentController::class, 'applyDepartmentToStaff'])->name('apply_department_to_staff');

    // holiday policy
    Route::get('holiday_policy', [HolidayPolicyController::class, 'index'])->name('holiday_policy');
    Route::get('holiday_template', [HolidayPolicyController::class, 'holidayTemplate'])->name('holiday_template');
    Route::post('holiday_template_list', [HolidayPolicyController::class, 'holidayTemplateList'])->name('holiday_template_list');
    Route::post('add_edit_holiday_template', [HolidayPolicyController::class, 'addEditHolidayTemplate'])->name('add_edit_holiday_template');
    Route::post('delete_template', [HolidayPolicyController::class, 'deleteTemplate'])->name('delete_template');
    Route::post('delete_holiday', [HolidayPolicyController::class, 'deleteHoliday'])->name('delete_holiday');
    Route::get('manage_staff_list', [HolidayPolicyController::class, 'manageStaffList'])->name('manage_staff_list');
    Route::post('holiday_staff_list', [HolidayPolicyController::class, 'holidaystaffList'])->name('holiday_staff_list');
    Route::post('holiday_to_staff', [HolidayPolicyController::class, 'holidayToStaff'])->name('holiday_to_staff');

    // weekly holiday policy
    Route::get('weekly_holiday_policy_business_level', [WeeklyHolidayPolicyController::class, 'index'])->name('weekly_holiday_policy_business_level');
    Route::get('weekly_holiday_policy_staff_level', [WeeklyHolidayPolicyController::class, 'staffLevel'])->name('weekly_holiday_policy_staff_level');
    Route::get('weekly_holiday_policy_staff_manage', [WeeklyHolidayPolicyController::class, 'staffManage'])->name('weekly_holiday_policy_staff_manage');
    Route::post('save_weekly_business_holiday', [WeeklyHolidayPolicyController::class, 'saveWeeklyBusinessHoliday'])->name('save_weekly_business_holiday');
    Route::post('business_holiday', [WeeklyHolidayPolicyController::class, 'businessHoliday'])->name('business_holiday');
    Route::post('weekly_holiday_staff_list', [WeeklyHolidayPolicyController::class, 'weeklyholidaystaffList'])->name('weekly_holiday_staff_list');
    Route::post('weekly_holiday_to_staff', [WeeklyHolidayPolicyController::class, 'weeklyHolidayToStaff'])->name('weekly_holiday_to_staff');

    //leave policy
    Route::get('leave_policy', [LeavePolicyController::class, 'index'])->name('leave_policy');
    Route::get('leave_template', [LeavePolicyController::class, 'leaveTemplate'])->name('leave_template');
    Route::post('leave_template_list', [LeavePolicyController::class, 'leaveTemplateList'])->name('leave_template_list');
    Route::post('add_edit_leave_policy', [LeavePolicyController::class, 'addEditLeaveTemplate'])->name('add_edit_leave_policy');
    Route::get('leave_manage_staff_list', [LeavePolicyController::class, 'leaveManageStaffList'])->name('leave_manage_staff_list');
    Route::post('leave_to_staff_list', [LeavePolicyController::class, 'leaveToStaffList'])->name('leave_to_staff_list');
    Route::post('leave_to_staff', [LeavePolicyController::class, 'LeaveToStaff'])->name('leave_to_staff');
});