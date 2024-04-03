<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Attendance;
use App\Models\Business;
use App\Models\WeeklyHolidayBusiness;
use App\Models\HolidayPolicy;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
//            $present_staff = Attendance::where('date', Carbon::now()->toDateString())->distinct('staff_id')->pluck('staff_id');
//            $staff_ids = Staff::whereNotIn('id', $present_staff)->where('is_deactivate', 0)->pluck('id');
//            foreach($staff_ids as $staff_id){
//                if(!Attendance::where('staff_id', $staff_id)->where('date', Carbon::now()->toDateString())->exists()){
//                    Attendance::insert(['staff_id' => $staff_id, 'in_time' => null, 'out_time' => null, 'total_time' => null,  'status' => 'Absent', 'date' => Carbon::now()->toDateString()]);
//                }
//            }
            $present_staff = Attendance::where('date', Carbon::now()->toDateString())->distinct('staff_id')->pluck('staff_id');
            //business holiday not Absent entry
            $business_ids = Business::pluck('id')->toArray();
            $business_holidays = WeeklyHolidayBusiness::select('id','business_id','days')->whereIn('business_id',$business_ids)->get()->groupBy('business_id');
            foreach($business_holidays as $key=>$value){
                foreach ($value as $obj) {
                    if ($obj["days"] == Carbon::now()->format('w')) {
                        $keyToRemove = array_search($obj["business_id"], $business_ids);
                        if ($keyToRemove !== false) {
                            unset($business_ids[$keyToRemove]);
                        }
                        break;
                    }
                }
            }
            //holiday list not Absent entry
            $holidays = HolidayPolicy::with('HolidayList')->whereIn('business_id',$business_ids)->get()->groupBy('business_id');
            foreach ($holidays as $businessId => $businessHolidays) {
                foreach ($businessHolidays as $holidayPolicy) {
                    foreach ($holidayPolicy->HolidayList as $holiday) {
                        if ($holiday["holiday_date"] == Carbon::now()->format('d M Y | D')){
                            $keyToRemove = array_search($businessId, $business_ids);
                            if ($keyToRemove !== false) {
                                unset($business_ids[$keyToRemove]);
                            }
                            break;
                        }
                    }
                }
            }
            $staff_ids = Staff::whereIn('business_id', $business_ids)->whereNotIn('id', $present_staff)->where('is_deactivate', 0)->pluck('id');
            foreach($staff_ids as $staff_id){
                if(!Attendance::where('staff_id', $staff_id)->where('date', Carbon::now()->toDateString())->exists()){
                    Attendance::insert(['staff_id' => $staff_id, 'in_time' => null, 'out_time' => null, 'total_time' => null,  'status' => 'Absent', 'date' => Carbon::now()->toDateString()]);
                }
            }
//            \Illuminate\Support\Facades\Log::info($staff_ids);
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
