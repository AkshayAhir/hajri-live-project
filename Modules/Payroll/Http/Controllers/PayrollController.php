<?php

namespace Modules\Payroll\Http\Controllers;

use App\Exports\PayrollExport;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\HolidayList;
use App\Models\HolidayPolicy;
use App\Models\Payrun;
use App\Models\Staff;
use App\Models\Payroll;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\UserPhoto;
use App\Models\BusinessUser;
use App\Models\Business;
use App\Models\WeeklyHolidayBusiness;
use Illuminate\Support\Facades\DB;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Carbon\Carbon;


class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user_profile;
    public $business;
    public $business_id;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->business_id = Session::get('business_id');
            $this->user_profile = UserPhoto::where('user_id', Auth::user()->id)->get();
            $business_id = BusinessUser::where('user_id', Auth::user()->id)->pluck('business_id');
            $this->business = Business::select('id', 'name')->whereIn('id', $business_id)->get();
            return $next($request);
        });
    }
    public function index()
    {
        $header_title = "Payroll";
        return view('payroll::payroll-info', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }
    public function setPayrollSession(Request $request){
      
//        Session::put('manual_process_payroll',['month'=>$request->month,'year'=>$request->year]);
//        $data = array(
//            'month'=>$request->month,
//            'year'=>$request->year
//        );
        $processed = Payroll::whereYear('date',$request->year)->whereMonth('date',$request->month)->count();
        $payroll_staff_ids  = Payroll::where('business_id',$this->business_id)
            ->whereMonth('date',$request->month)
            ->whereYear('date',$request->year)
            ->pluck('staff_id');
        $pending = Staff::where('is_deactivate',0)
            ->where('business_id',$this->business_id)
            ->whereNotIn('id', $payroll_staff_ids)
            ->count();
        $data = array(
            'month'=>$request->month,
            'year'=>$request->year,
            'processed'=>$processed,
            'pending'=>$pending
        );
        Session::put('manual_process_payroll',['month'=>$request->month,'year'=>$request->year,'processed'=>$processed,'pending'=>$pending]);
        return response()->json(['message' => 'Session value set successfully','status'=>1,'data'=>$data]);
    }
    public function payroll(){
        $header_title = "Payroll";
        return view('payroll::payroll', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }
    public function payrollList(Request $request){
       // Retrieve weekly holidays for the business
       $weekly_holiday = WeeklyHolidayBusiness::where("business_id", $this->business_id)->pluck('days')->toArray();

       // Define start and end dates of the current month
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
       
       // Initialize counter for total working days in the month
        $totalWorkingDays = 0;
       
       // Iterate through each day of the month
        $currentDate = $startDate;
        while ($currentDate->lte($endDate)) {
            // Check if the current date is not included in the weekly holidays
            if (!in_array($currentDate->dayOfWeek, $weekly_holiday)) {
                $totalWorkingDays++;
            }

            // Move to the next day
            $currentDate->addDay();
        }
    }

    public function payrollApprovals(){
        $header_title = "Payroll Approvals";
        $manual_process_payroll = Session::get('manual_process_payroll');
        $payroll_staff_ids  = Payroll::where('business_id',$this->business_id)->whereMonth('date',$manual_process_payroll['month'])->whereYear('date',$manual_process_payroll['year'])->pluck('staff_id');
        $staff_count = Staff::where("business_id", $this->business_id)->where('is_deactivate',0)->whereNotIn('id', $payroll_staff_ids)->count();
        return view('payroll::payroll-approvals', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,'staff_count'=>$staff_count]);
    }

    public function approvalPunches(){
        $header_title = "Approve";
        return view('payroll::approvals-punches', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }

    public function payrollReview(){
        $header_title = "Approve Approvals";
        return view('payroll::approvals-review', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }

    public function payrollReviewDetail(){
        $header_title = "Review Details";
        $departments = Department::where('business_id',$this->business_id)->orWhereNull('business_id')->get();
        return view('payroll::attendance-review-details', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,'departments'=>$departments]);

    }

    public function payrollTotalPay(){
        $header_title = "Review Details";
        $departments = Department::where('business_id',$this->business_id)->orWhereNull('business_id')->get();
        return view('payroll::total-pay-review', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,'departments'=>$departments]);
    }

    public function approveOvertime(){
        $header_title = "Approve";
        return view('payroll::approvals-overtime', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }

    public function approveLeaves(){
        $header_title = "Approve";
        return view('payroll::approvals-leaves', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }

    public function payrollSummary(){
        $header_title = "Payroll";
        return view('payroll::payroll-summary', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }

    public function payrollExport(Request $request){
        return Excel::download(new PayrollExport($request->input('payrun_id')), 'Payroll-Report.xlsx');
    }
    
    public function allAttendanceReview(Request $request){
        $manual_process_payroll = Session::get('manual_process_payroll');
//        $currentMonth = Carbon::now()->month;
//        $currentYear = Carbon::now()->year;
        $currentMonth = $manual_process_payroll['month'];
        $currentYear = $manual_process_payroll['year'];
        // function call totalHours
        $data =  $this->totalHours();

        $totalFilteredRecord = $totalDataRecord = $draw_val = "";

        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'phone_number',
            3 =>'salary_amount',
            4 =>'salary_cycle',
            5=> 'department_id',
        );
        $search_text = $request->searchValue;
        $select_department = $request->department_id;
        $totalDataRecord = Staff::where('business_id',$this->business_id)
            ->where(function($query) use ($select_department){
                if($select_department != null){
                    $query->where('department_id', $select_department);
                }
            })->where('is_deactivate',0)->count();
        if($search_text == null) {
            $post_data = Staff::with(['Department','StaffPhoto'])
                ->where(function($query) use ($select_department){
                    if($select_department != null){
                        $query->where('department_id', $select_department);
                    }
                })
                ->where("business_id", $this->business_id)
                ->where('is_deactivate',0)
                ->get();
        }else{
            $totalFilteredRecord = Staff::where(function($query) use ($select_department){
                    if($select_department != null){
                        $query->where('department_id', $select_department);
                    }
                })
                ->where('is_deactivate',0)
                ->where('business_id',$this->business_id)
                ->where('name','LIKE',"%{$search_text}%")
                ->count();
            $post_data = Staff::with(['Department','StaffPhoto'])
                ->where(function($query) use ($select_department){
                    if($select_department != null){
                        $query->where('department_id', $select_department);
                    }
                })
                ->where('name','LIKE',"%{$search_text}%")
                ->where("business_id", $this->business_id)
                ->where('is_deactivate',0)
                ->get();
        }
        $data_val = array();
        if(!empty($post_data)) {
            foreach ($post_data as $post_val) {
                $present_days = Attendance::where('staff_id', $post_val->id)->whereYear('date', $currentYear)->whereMonth('date', $currentMonth)->where('status', 'Present')->distinct('date')->count();
                $absent_days = Attendance::where('staff_id', $post_val->id)->whereYear('date', $currentYear)->whereMonth('date', $currentMonth)->where('status', 'Absent')->distinct('date')->count();
                $half_day_days = Attendance::where('staff_id', $post_val->id)->whereYear('date', $currentYear)->whereMonth('date', $currentMonth)->where('status', 'Half Day')->distinct('date')->count();
                // Convert total_working_hours to seconds
                list($totalHours, $totalMinutes) = explode(':', $data['total_working_hours']);
                $totalWorkingHoursInSeconds = ($totalHours * 3600) + ($totalMinutes * 60);
                // Retrieve the total working hours for the staff member
                $working_hour = Attendance::where('staff_id', $post_val->id)
                    ->whereYear('date', $currentYear)
                    ->whereMonth('date', $currentMonth)
                    ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(total_time))) as working_hour'))
                    ->groupBy('staff_id')
                    ->first();
                if ($working_hour && isset($working_hour->working_hour)) {
                    // Convert working_hour to seconds
                    list($workingHours, $workingMinutes) = explode(':', $working_hour->working_hour);
                    $workingHoursInSeconds = ($workingHours * 3600) + ($workingMinutes * 60);
                    // Calculate overtime in seconds
                    if ($workingHoursInSeconds > $totalWorkingHoursInSeconds) {
                        $overtimeInSeconds = $workingHoursInSeconds - $totalWorkingHoursInSeconds;
                        // Convert overtime back to HH:MM format
                        $overtimeHours = floor($overtimeInSeconds / 3600);
                        $overtimeMinutes = floor(($overtimeInSeconds % 3600) / 60);
                        $overtime = sprintf("%02d:%02d", $overtimeHours, $overtimeMinutes);
                    } else {
                        $overtime = "00:00";
                    }
                }else{
                    $overtime = "00:00";
                }
                $url = url('/assets/admin/images/dummy/dummy-user.png');
                if(!empty($post_val->staffPhoto[0]->photo)){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->staffPhoto[0]->photo);
                }
                $postnestedData['id'] = $post_val->id;
                $postnestedData['name'] =  $post_val->name.' '. $post_val->last_name;
                $postnestedData['department_name'] = $post_val->department['name'];
                $postnestedData['department_id'] = $post_val->department_id;
                $postnestedData['staff_photo'] = $url;
                $postnestedData['present'] = $present_days .' Days';
                $postnestedData['absent'] = $absent_days . ' Days';
                $postnestedData['haft_day'] = $half_day_days . ' Days';
                $postnestedData['paid_leaves'] = '0 Days';
                $postnestedData['overtime'] = $overtime . ' Mins';
                $data_val[] = $postnestedData;

            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw"            => intval($draw_val),
            "recordsTotal"    => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data"            => $data_val
        );
        echo json_encode($get_json_data);
    }
    public function allTotalPayReview(Request $request){
        $manual_process_payroll = Session::get('manual_process_payroll');
        $currentMonth = $manual_process_payroll['month'];
        $currentYear = $manual_process_payroll['year'];
        // function call totalHours
        $data = $this->totalHours();

       
        // Retrieve weekly holidays for the business
        $weekly_holiday = WeeklyHolidayBusiness::where("business_id", $this->business_id)->pluck('days')->toArray();
        // Define start and end dates of the current month
//        $startDate = Carbon::now()->startOfMonth();
//        $endDate = Carbon::now()->endOfMonth();
        $startDate = Carbon::create($manual_process_payroll['year'], $manual_process_payroll['month'], 1, 0, 0, 0)->startOfMonth();
        $endDate = Carbon::create($manual_process_payroll['year'], $manual_process_payroll['month'], 1, 0, 0, 0)->endOfMonth();

        // Initialize counter for total working days in the month
        $totalWorkingDays = 0;

        // Iterate through each day of the month
        $currentDate = $startDate;
        
        while ($currentDate->lte($endDate)) {
            // Check if the current date is not included in the weekly holidays
            if (!in_array($currentDate->dayOfWeek, $weekly_holiday)) {
                $totalWorkingDays++;
            }
            // Move to the next day
            $currentDate->addDay();
        }

        $holiday =  HolidayPolicy::where("business_id", $this->business_id)->pluck('id');
        $holidayList = HolidayList::whereIn('template_id',$holiday)->get();
//        $currentMonth = Carbon::now()->month;
//        $currentYear = Carbon::now()->year;
        $holidayCount = $holidayList->filter(function ($holiday) use ($currentMonth,$currentYear) {
            $holidayDate = explode(' | ', $holiday->holiday_date)[0];
            $parsedDate = Carbon::createFromFormat('d M Y', $holidayDate);
            $holidayMonth = $parsedDate->month;
            $holidayYear = $parsedDate->year;
            return $holidayMonth === $currentMonth && $holidayYear === $currentYear;
        })->count();
       
        $workingDay = $totalWorkingDays - $holidayCount;
        
        $business_hours = Business::where('id',$this->business_id)->value('shift_hour');
        // Convert business hours string to hours and minutes
        list($hours, $minutes, $seconds) = sscanf($business_hours, "%d:%d:%d");
        $businessHoursInMinutes = ($hours * 60) + $minutes;
        $totalMinutes = $workingDay * $businessHoursInMinutes;
        // Calculate total hours and remaining minutes
        $totalHours = floor($totalMinutes / 60);
        $remainingMinutes = $totalMinutes % 60;
        $total_working_hours = sprintf("%02d:%02d", $totalHours, $remainingMinutes);


        $totalFilteredRecord = $totalDataRecord = $draw_val = "";

        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'phone_number',
            3 =>'salary_amount',
            4 =>'salary_cycle',
            5=> 'department_id',
        );
        
        $search_text = $request->searchValue;
        $select_department = $request->department_id;
        $totalDataRecord = Staff::where('business_id',$this->business_id)
            ->where(function($query) use ($select_department){
                if($select_department != null){
                    $query->where('department_id', $select_department);
                }
            })->where('is_deactivate',0)->count();
        if($search_text == null) {
            $post_data = Staff::with(['Department','StaffPhoto'])
                ->where(function($query) use ($select_department){
                    if($select_department != null){
                        $query->where('department_id', $select_department);
                    }
                })
                ->where("business_id", $this->business_id)
                ->where('is_deactivate',0)
                ->get();
        }else{
            $totalFilteredRecord = Staff::where(function($query) use ($select_department){
                if($select_department != null){
                    $query->where('department_id', $select_department);
                }
            })
                ->where('is_deactivate',0)
                ->where('business_id',$this->business_id)
                ->where('name','LIKE',"%{$search_text}%")
                ->count();
            $post_data = Staff::with(['Department','StaffPhoto'])
                ->where(function($query) use ($select_department){
                    if($select_department != null){
                        $query->where('department_id', $select_department);
                    }
                })
                ->where('name','LIKE',"%{$search_text}%")
                ->where("business_id", $this->business_id)
                ->where('is_deactivate',0)
                ->get();
        }
        $data_val = array();
        if(!empty($post_data)) {
            foreach ($post_data as $post_val) {
                // Convert total_working_hours to seconds
                list($totalHours, $totalMinutes) = explode(':', $data['total_working_hours']);
                $totalWorkingHoursInSeconds = ($totalHours * 3600) + ($totalMinutes * 60);
                // Retrieve the total working hours for the staff member
                // return $totalWorkingHoursInSeconds;
                $working_hour = Attendance::where('staff_id', $post_val->id)
                    ->whereYear('date', $currentYear)
                    ->whereMonth('date', $currentMonth)
                    ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(total_time))) as working_hour'))
                    ->groupBy('staff_id')
                    ->first();
                if ($working_hour && isset($working_hour->working_hour)) {
                    // Convert working_hour to seconds
                    list($workingHours, $workingMinutes) = explode(':', $working_hour->working_hour);
                    $workingHoursInSeconds = ($workingHours * 3600) + ($workingMinutes * 60);
                    // Calculate overtime in seconds
                    if ($workingHoursInSeconds > $totalWorkingHoursInSeconds) {
                        $overtimeInSeconds = $workingHoursInSeconds - $totalWorkingHoursInSeconds;
                        // Convert overtime back to HH:MM format
                        $overtimeHours = floor($overtimeInSeconds / 3600);
                        $overtimeMinutes = floor(($overtimeInSeconds % 3600) / 60);
                        $overtime = sprintf("%02d:%02d", $overtimeHours, $overtimeMinutes);
                    } else {
                        $overtime = "00:00";
                    }
                }else{
                    $overtime = "00:00";
                }
                $net_salary = 0;
                if ($working_hour && isset($working_hour->working_hour)) {
                    $per_hour_salary = number_format($post_val->salary_amount / $totalHours, 2);
                    $per_30minutes_salary = number_format($per_hour_salary / 2, 2);
                    $per_15minutes_salary = number_format($per_30minutes_salary / 2, 2);
                    list($workingHours, $workingMinutes) = explode(':', $working_hour->working_hour);
                    $salary = 0;
                    if ($workingMinutes <= 15) {
                        // Minutes in range 1 to 15
                        $salary = $per_15minutes_salary;
                    } elseif ($workingMinutes <= 30) {
                        // Minutes in range 16 to 30
                        $salary = $per_30minutes_salary;
                    } elseif ($workingMinutes <= 45) {
                        // Minutes in range 31 to 45
                        $salary = $per_30minutes_salary + $per_15minutes_salary;
                    } else {
                        // Minutes in range 46 to 60
                        $workingHours = $workingHours + 1;
                    }
                    $net_salary = $workingHours * $per_hour_salary;
                    $net_salary = $net_salary + $salary;
                }
                $url = url('/assets/admin/images/dummy/dummy-user.png');
                if(!empty($post_val->staffPhoto[0]->photo)){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->staffPhoto[0]->photo);
                }
                $postnestedData['id'] = $post_val->id;
                $postnestedData['name'] =  $post_val->name.' '. $post_val->last_name;
                $postnestedData['department_name'] = $post_val->department['name'];
                $postnestedData['department_id'] = $post_val->department_id;
                $postnestedData['staff_photo'] = $url;
                $postnestedData['worked_hour'] = (isset($working_hour->working_hour)) ? $working_hour->working_hour : '-';
                $postnestedData['total_working_hours'] = $data['total_working_hours'];
                $postnestedData['overtime'] = $overtime . ' Mins';
                $postnestedData['net_salary'] = '₹'.$net_salary;
                $data_val[] = $postnestedData;
            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw"            => intval($draw_val),
            "recordsTotal"    => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data"            => $data_val
        );
        echo json_encode($get_json_data);
    }
    public function allProcessPayroll(Request $request){
//        $currentMonth = Carbon::now()->month;
        $manual_process_payroll = Session::get('manual_process_payroll');
//        dd($manual_process_payroll);
        $currentMonth = $manual_process_payroll['month'];
        $currentYear = $manual_process_payroll['year'];

        // function call totalHours
        $data = $this->totalHours();
        $payroll_staff_ids  = Payroll::where('business_id',$this->business_id)
            ->whereMonth('date',$currentMonth)
            ->whereYear('date',$currentYear)
            ->pluck('staff_id');

        $totalFilteredRecord = $totalDataRecord = $draw_val = "";

        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'phone_number',
            3 =>'salary_amount',
            4 =>'salary_cycle',
            5=> 'department_id',
        );
        $search_text = $request->searchValue;
        $select_department = $request->department_id;
        $totalDataRecord = Staff::where('business_id',$this->business_id)
            ->where(function($query) use ($select_department){
                if($select_department != null){
                    $query->where('department_id', $select_department);
                }
            })->where('is_deactivate',0)
            ->whereNotIn('id', $payroll_staff_ids)
            ->count();
        if($search_text == null) {
            $post_data = Staff::with(['Department','StaffPhoto'])
                ->where(function($query) use ($select_department){
                    if($select_department != null){
                        $query->where('department_id', $select_department);
                    }
                })
                ->where("business_id", $this->business_id)
                ->where('is_deactivate',0)
                ->whereNotIn('id', $payroll_staff_ids)
                ->get();
        }else{
            $totalFilteredRecord = Staff::where(function($query) use ($select_department){
                if($select_department != null){
                    $query->where('department_id', $select_department);
                }
            })
                ->where('is_deactivate',0)
                ->where('business_id',$this->business_id)
                ->where('name','LIKE',"%{$search_text}%")
                ->whereNotIn('id', $payroll_staff_ids)
                ->count();
            $post_data = Staff::with(['Department','StaffPhoto'])
                ->where(function($query) use ($select_department){
                    if($select_department != null){
                        $query->where('department_id', $select_department);
                    }
                })
                ->where('name','LIKE',"%{$search_text}%")
                ->where("business_id", $this->business_id)
                ->where('is_deactivate',0)
                ->whereNotIn('id', $payroll_staff_ids)
                ->get();
        }
        $data_val = array();
        if(!empty($post_data)) {
            foreach ($post_data as $post_val) {
                // Retrieve the total working hours for the staff member
                $working_hour = Attendance::where('staff_id', $post_val->id)
                    ->whereYear('date', $currentYear)
                    ->whereMonth('date', $currentMonth)
                    ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(total_time))) as working_hour'))
                    ->groupBy('staff_id')
                    ->first();
                $net_salary = 0;
                if ($working_hour && isset($working_hour->working_hour)) {
                    $per_hour_salary = number_format($post_val->salary_amount / $data['totalHours'], 2);
                    $per_30minutes_salary = number_format($per_hour_salary / 2, 2);
                    $per_15minutes_salary = number_format($per_30minutes_salary / 2, 2);
                    list($workingHours, $workingMinutes) = explode(':', $working_hour->working_hour);
                    $salary = 0;
                    if ($workingMinutes <= 15) {
                        // Minutes in range 1 to 15
                        $salary = $per_15minutes_salary;
                    } elseif ($workingMinutes <= 30) {
                        // Minutes in range 16 to 30
                        $salary = $per_30minutes_salary;
                    } elseif ($workingMinutes <= 45) {
                        // Minutes in range 31 to 45
                        $salary = $per_30minutes_salary + $per_15minutes_salary;
                    } else {
                        // Minutes in range 46 to 60
                        $workingHours = $workingHours + 1;
                    }
                    $net_salary = $workingHours * $per_hour_salary;
                    $net_salary = $net_salary + $salary;
                }
                $firstThreeCharacters = substr($this->business[0]->name, 0, 3);
                $staff_prefix = strtoupper($firstThreeCharacters);

                $url = url('/assets/admin/images/dummy/dummy-user.png');
                if(!empty($post_val->staffPhoto[0]->photo)){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->staffPhoto[0]->photo);
                }
                $postnestedData['id'] = $post_val->id;
                $postnestedData['name'] =  $post_val->name.' '. $post_val->last_name;
                $postnestedData['department_name'] = $post_val->department['name'];
                $postnestedData['department_id'] = $post_val->department_id;
                $postnestedData['staff_photo'] = $url;
                $postnestedData['worked_hour'] = (isset($working_hour->working_hour)) ? $working_hour->working_hour : '-';
                $postnestedData['phone_number'] = $post_val->phone_number;
                $postnestedData['staff_id'] = $staff_prefix.$post_val->id;
                $postnestedData['net_salary'] = '₹'.$net_salary;
                $data_val[] = $postnestedData;
            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw"            => intval($draw_val),
            "recordsTotal"    => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data"            => $data_val
        );
        echo json_encode($get_json_data);
    }
    public function allDownloadPayroll(Request $request){
        $manual_process_payroll = Session::get('manual_process_payroll');
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 =>'id',
            1 =>'business_id',
            2 =>'report_cycle',
            3 => 'action',
        );
        $totalDataRecord = Payrun::where('business_id',$this->business_id)
            ->whereYear('report_cycle', $manual_process_payroll['year'])
            ->whereMonth('report_cycle', $manual_process_payroll['month'])
            ->count();
        $post_data = Payrun::where("business_id", $this->business_id)
            ->whereYear('report_cycle', $manual_process_payroll['year'])
            ->whereMonth('report_cycle', $manual_process_payroll['month'])
            ->latest()
            ->first();
//        dd($post_data->id);
        $data_val = array();
        if($post_data !== null) {
            // Check if $post_data is not null before iterating over it
            $postnestedData['id'] = $post_data->id;
            $postnestedData['staff_payment_type'] =  'Non Weekly Staff';
            $postnestedData['report_cycle'] = Carbon::parse($post_data->report_cycle)->format('M, Y');
            $postnestedData['report_type'] = 'Half Page';
            $postnestedData['generated_on'] = Carbon::parse($post_data->created_at)->format('d F, Y | g:i A');
            $postnestedData['action'] = '<div onclick="downloadPayrolls(' . $post_data->id . ')"><svg width="24" height="24" class="download-pdf-btn" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0009 3C12.3833 3 12.6932 3.30996 12.6932 3.69231V16.6154C12.6932 16.9977 12.3833 17.3077 12.0009 17.3077C11.6186 17.3077 11.3086 16.9977 11.3086 16.6154V3.69231C11.3086 3.30996 11.6186 3 12.0009 3Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.69231 15.9238C4.07466 15.9238 4.38462 16.2338 4.38462 16.6161C4.38462 18.2729 5.72789 19.6161 7.38462 19.6161H16.6154C18.2721 19.6161 19.6154 18.2729 19.6154 16.6161C19.6154 16.2338 19.9253 15.9238 20.3077 15.9238C20.69 15.9238 21 16.2338 21 16.6161C21 19.0376 19.0368 21.0008 16.6154 21.0008H7.38462C4.96319 21.0008 3 19.0376 3 16.6161C3 16.2338 3.30996 15.9238 3.69231 15.9238Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89423 11.5113C7.16462 11.241 7.60296 11.241 7.8733 11.5114L11.9991 15.6381L16.1259 11.5114C16.3962 11.241 16.8346 11.241 17.1049 11.5114C17.3753 11.7817 17.3753 12.2201 17.1049 12.4904L12.4886 17.1067C12.3588 17.2366 12.1827 17.3095 11.9991 17.3095C11.8154 17.3095 11.6393 17.2366 11.5095 17.1067L6.89413 12.4904C6.62379 12.22 6.62384 11.7817 6.89423 11.5113Z" fill="#808080"/>
                            </svg></div>';
            $data_val[] = $postnestedData;
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw"            => intval($draw_val),
            "recordsTotal"    => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data"            => $data_val
        );
        echo json_encode($get_json_data);
    }
    public function addPayrollRecord(Request $request){
        $data = $this->totalHours();
        $manual_process_payroll = Session::get('manual_process_payroll');
//        $currentMonth = Carbon::now()->month;
//        $currentYear = Carbon::now()->year;
        $currentMonth = $manual_process_payroll['month'];
        $currentYear = $manual_process_payroll['year'];
        $report_cycle = sprintf("%04d-%02d-01", $currentYear, $currentMonth);
        $payrun_id = Payrun::insertGetId([
            'business_id'=>$this->business_id,
            'report_cycle'=>$report_cycle
        ]);
        $payroll = array();
        foreach ($request->selectedIds as $staff_id) {
            $working_hour = Attendance::where('staff_id', $staff_id)
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $currentMonth)
                ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(total_time))) as working_hour'))
                ->groupBy('staff_id')
                ->first();
            $staff_salary = Staff::where('id',$staff_id)->value('salary_amount');
            $net_salary = 0;
            if ($working_hour && isset($working_hour->working_hour)) {
                $per_hour_salary = number_format($staff_salary / $data['totalHours'], 2);
                $per_30minutes_salary = number_format($per_hour_salary / 2, 2);
                $per_15minutes_salary = number_format($per_30minutes_salary / 2, 2);
                list($workingHours, $workingMinutes) = explode(':', $working_hour->working_hour);
                $salary = 0;
                if ($workingMinutes <= 15) {
                    // Minutes in range 1 to 15
                    $salary = $per_15minutes_salary;
                } elseif ($workingMinutes <= 30) {
                    // Minutes in range 16 to 30
                    $salary = $per_30minutes_salary;
                } elseif ($workingMinutes <= 45) {
                    // Minutes in range 31 to 45
                    $salary = $per_30minutes_salary + $per_15minutes_salary;
                } else {
                    // Minutes in range 46 to 60
                    $workingHours = $workingHours + 1;
                }
                $net_salary = $workingHours * $per_hour_salary;
                $net_salary = $net_salary + $salary;
            }
            list($totalHours, $totalMinutes) = explode(':', $data['total_working_hours']);
            $totalWorkingHoursInSeconds = ($totalHours * 3600) + ($totalMinutes * 60);
            if ($working_hour && isset($working_hour->working_hour)) {
                // Convert working_hour to seconds
                list($workingHours, $workingMinutes) = explode(':', $working_hour->working_hour);
                $workingHoursInSeconds = ($workingHours * 3600) + ($workingMinutes * 60);
                // Calculate overtime in seconds
                if ($workingHoursInSeconds > $totalWorkingHoursInSeconds) {
                    $overtimeInSeconds = $workingHoursInSeconds - $totalWorkingHoursInSeconds;
                    // Convert overtime back to HH:MM format
                    $overtimeHours = floor($overtimeInSeconds / 3600);
                    $overtimeMinutes = floor(($overtimeInSeconds % 3600) / 60);
                    $overtime = sprintf("%02d:%02d", $overtimeHours, $overtimeMinutes);
                } else {
                    $overtime = "00:00";
                }
            }else{
                $overtime = "00:00";
            }
            $payrolls[] = array(
                'business_id'=>$this->business_id,
                'staff_id'=>$staff_id,
                'payrun_id'=> $payrun_id,
                'date'=>sprintf("%04d-%02d-01", $currentYear, $currentMonth),
                'total_hours'=>$data['total_working_hours'],
                'worked_hours'=>(isset($working_hour->working_hour)) ? $working_hour->working_hour : null,
                'overtime'=>$overtime,
                'net_salary'=>$net_salary
            );
        }
        foreach ($payrolls as $payroll ){
            $payroll_record = Payroll::insert($payroll);
        }
        if($payroll_record){
            return response()->json(["message" => 'Add payroll successfully', "status" => 1]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }
    public function totalHours(){
       $manual_process_payroll = Session::get('manual_process_payroll');
        // Retrieve weekly holidays for the business
        $weekly_holiday = WeeklyHolidayBusiness::where("business_id", $this->business_id)->pluck('days')->toArray();

        // Define start and end dates of the current month
//        $startDate = Carbon::now()->subMonth()->startOfMonth();
//        $endDate = Carbon::now()->subMonth()->endOfMonth();

        $startDate = Carbon::create($manual_process_payroll['year'], $manual_process_payroll['month'], 1, 0, 0, 0)->startOfMonth();
        $endDate = Carbon::create($manual_process_payroll['year'], $manual_process_payroll['month'], 1, 0, 0, 0)->endOfMonth();

        // Initialize counter for total working days in the month
        $totalWorkingDays = 0;
        // Iterate through each day of the month
        $currentDate = $startDate;
        while ($currentDate->lte($endDate)) {
            // Check if the current date is not included in the weekly holidays
            if (!in_array($currentDate->dayOfWeek, $weekly_holiday)) {
                $totalWorkingDays++;
            }
            // Move to the next day
            $currentDate->addDay();
        }

        $holiday =  HolidayPolicy::where("business_id", $this->business_id)->pluck('id');
        $holidayList = HolidayList::whereIn('template_id',$holiday)->get();
//        $currentMonth = Carbon::now()->subMonth()->month;
//        $currentYear = Carbon::now()->year;
        $currentMonth = $manual_process_payroll['month'];
        $currentYear = $manual_process_payroll['year'];
        $holidayCount = $holidayList->filter(function ($holiday) use ($currentMonth, $currentYear) {
            $holidayDate = explode(' | ', $holiday->holiday_date)[0];
            $parsedDate = Carbon::createFromFormat('d M Y', $holidayDate);
            $holidayMonth = $parsedDate->month;
            $holidayYear = $parsedDate->year;
            return $holidayMonth == $currentMonth && $holidayYear == $currentYear;
        })->count();
        $workingDay = $totalWorkingDays - $holidayCount;

        $business_hours = Business::where('id',$this->business_id)->value('shift_hour');
// Convert business hours string to hours and minutes
        list($hours, $minutes, $seconds) = sscanf($business_hours, "%d:%d:%d");
        $businessHoursInMinutes = ($hours * 60) + $minutes;
        $totalMinutes = $workingDay * $businessHoursInMinutes;
// Calculate total hours and remaining minutes
        $totalHours = floor($totalMinutes / 60);
        $remainingMinutes = $totalMinutes % 60;
        $total_working_hours = sprintf("%02d:%02d", $totalHours, $remainingMinutes);
        $data = array(
            'workingDay'=>$workingDay,
            'totalHours'=>$totalHours,
            'remainingMinutes'=>$remainingMinutes,
            'total_working_hours'=>$total_working_hours
        );
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payroll::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('payroll::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('payroll::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
