<?php

namespace Modules\Report\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Business;
use App\Models\BusinessUser;
use App\Models\UserPhoto;
use App\Models\Staff;
use App\Models\Attendance;
use App\Models\Payrun;
use App\Models\Payroll;
use App\Models\WeeklyHolidayBusiness;
use App\Models\HolidayPolicy;
use App\Models\HolidayList;
use Carbon\Carbon;
use DB;
use PDF;
use ZipArchive;
use File;
use App\Models\StaffInfo;
use App\Exports\AttendanceReportExport;
use App\Exports\UserReportExport;
use App\Exports\SalaryReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
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
        $header_title = "Report";

        return view('report::reports', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    }

    public function attendanceReport()
    {
        $header_title = "Report";
        $staff_count = Staff::where('business_id', $this->business_id)->where('is_deactivate',0)->count();
        return view('report::reports_attendance_report', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile, 'staff_count' => $staff_count]);
    }

    public function salaryReport()
    {
        $header_title = "Report";
        $staff_count = Staff::where('business_id', $this->business_id)->where('is_deactivate',0)->count();
        return view('report::reports_salary_report', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile, 'staff_count' => $staff_count]);
    }

    public function reportUserListExport()
    {
        $header_title = "Report";
        $staff_count = Staff::where('business_id', $this->business_id)->where('is_deactivate',0)->count();
        return view('report::reports_user_list_export', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile, 'staff_count' => $staff_count]);
    }

    public function attendanceReportList(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        $business = Business::where('id', $this->business_id)->get();
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'name',
            1 => 'staff_id',
            2 => 'present_days',
            3 => 'absent_days',
            4 => 'total_work_hours',
        );
        $search_text = $request->searchValue;
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date);

        $totalDataRecord = Attendance::whereHas('Staff', function ($query) {
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->whereYear('date', $date->year)->whereMonth('date', $date->month);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->groupBy('staff_id')
            ->count();

        if ($search_text == null) {
            $post_data = Attendance::with(['Staff.StaffPhoto', 'Staff.Department', 'Staff' => function ($query) {
                $query->where('business_id', $this->business_id);
            }])
                ->where(function ($query) use ($date) {
                    if ($date !== null) {
                        $query->whereYear('date', $date->year)->whereMonth('date', $date->month);
                    } else {
                        $query->where('date', Carbon::now()->toDateString());
                    }
                })
                ->whereHas('Staff', function ($query) {
                    $query->where('business_id', $this->business_id);
                })
                ->groupBy('staff_id')
                ->get();
        } else {
            $post_data = Attendance::with(['Staff.StaffPhoto', 'Staff.Department', 'Staff' => function ($query) use ($search_text) {
                    $query->where('business_id', $this->business_id)->where('name', 'LIKE', "%{$search_text}%");
                }])
                ->where(function ($query) use ($date) {
                    if ($date !== null) {
                        $query->whereYear('date', $date->year)->whereMonth('date', $date->month);
                    } else {
                        $query->where('date', Carbon::now()->toDateString());
                    }
                })
                ->whereHas('Staff', function ($query) use ($search_text) {
                    $query->where('business_id', $this->business_id)->where('name', 'LIKE', "%{$search_text}%");
                })
                ->groupBy('staff_id')
                ->get();

            $totalFilteredRecord = Attendance::with(['Staff' => function ($query) use ($search_text) {
                $query->where('business_id',$this->business_id)->where('name', 'LIKE', "%{$search_text}%");
                }])
                ->where(function ($query) use ($date) {
                    if ($date !== null) {
                        $query->where('date', $date);
                    } else {
                        $query->where('date', Carbon::now()->toDateString());
                    }
                })
                ->whereHas('Staff', function ($query) use ($search_text) {
                    $query->where('business_id', $this->business_id)->where('name', 'LIKE', "%{$search_text}%");
                })
                ->count();
        }
        $data_val = array();
        if (!empty($post_data)) {
            foreach ($post_data as $post_val) {
                
                // ->whereMonth('date' , $date->month)->whereMonth('date', $date->month)->count();
                
                $present_days = Attendance::where('staff_id', $post_val['staff_id'])->whereYear('date', $date->year)->whereMonth('date', $date->month)->where('status', 'Present')->distinct('date')->count();
                $absent_days = Attendance::where('staff_id', $post_val['staff_id'])->whereYear('date', $date->year)->whereMonth('date', $date->month)->where('status', 'Absent')->distinct('date')->count();
                $total_hours = Attendance::where('staff_id', $post_val['staff_id'])->whereYear('date', $date->year)->whereMonth('date', $date->month)->where('status', 'Present')->pluck('total_time')->toArray();

                // $total_seconds = $total_hours ? array_reduce($total_hours, function ($carry, $time) {
                //     list($hours, $minutes, $seconds) = explode(':', $time);
                //     return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
                // }, 0) : '-';

                $total_seconds = $total_hours
                ? array_reduce($total_hours, function ($carry, $time) {
                    $timeParts = explode(':', $time);
                    if (count($timeParts) === 3) {
                        list($hours, $minutes, $seconds) = $timeParts;
                        return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
                    }
                    return $carry; // Return the existing carry value if the format is incorrect
                }, 0)
                : '-';
                
                
                if ($total_seconds !== '-') {
                    $totalHours = floor($total_seconds / 3600);
                    $totalMinutes = round(($total_seconds % 3600) / 60);
                    $totalTime = "{$totalHours}h {$totalMinutes}m";
                } else {
                    $totalHours = '-';
                    $totalMinutes = '-';
                    $totalTime = "0h 0m";
                }

                
                foreach ($post_val->Staff as $staff) {
                    $url = url('/assets/admin/images/dummy/dummy-user.png');
                    if(!empty($staff->staffPhoto[0]->photo)){
                        $url = url('/assets/admin/images/staff_photos/'.$staff->staffPhoto[0]->photo);
                    }
                    // ->whereYear('date', $date->year)->whereMonth('date', $date->month)->groupBy('date')->count();
                    $postnestedData['name'] = $staff['name'].' '.$staff['last_name'];
                    $postnestedData['id'] = $post_val->id;
                    $postnestedData['staff_ids'] = $staff['id'];
                    $postnestedData['staff_photo'] = $url;
                    $postnestedData['department_name'] = $staff['Department']['name'];
                }
                $postnestedData['staff_id'] = substr($business[0]['name'], 0, 3).''.$post_val->staff_id;
                $postnestedData['present_days'] = $present_days;
                $postnestedData['absent_days'] = $absent_days;
                $postnestedData['total_work_hours'] = $totalTime;
                // $postnestedData['fine'] = $post_val->fine;
                $data_val[] = $postnestedData;

            }
        }
        $request->session()->put('month', $date);
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw" => intval($draw_val),
            "recordsTotal" => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data" => $data_val,
        );
        echo json_encode($get_json_data);
    }

    public function attendanceExport(Request $request) 
    {
        if(!empty($request->input('selectedIds'))){
            // $searchValue = $request->session()->get('month');
            $data = Attendance::whereIn('id', $request->selectedIds)->get()->toArray();
            if(count($request->input('selectedIds')) == 1){
                $staff_id = Attendance::where('id', $request->input('selectedIds'))->value('staff_id');
                $staff = Staff::where('id', $staff_id)->first();
                return Excel::download(new AttendanceReportExport($request->input('selectedIds')), $staff['name'].' '. $staff['last_name'].'-Attendance-Report.xlsx');
            } else {
                return Excel::download(new AttendanceReportExport($request->input('selectedIds')), 'Attendance-Report.xlsx');
            }
        }
        else{
            return Excel::download(new AttendanceReportExport(), 'Attendance-Report.xlsx');
        }
    }

    public function UserReportList(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        $business = Business::where('id', $this->business_id)->get();
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'name',
            1 => 'staff_id',
            2 => 'salary_payment_type',
            3 => 'phone_number',
        );
        $search_text = $request->searchValue;
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date)->format('Y-m-d');

        $totalDataRecord = Staff::where('business_id', $this->business_id)->where('is_deactivate',0)
            ->count();

        if ($search_text == null) {
            $post_data = Staff::with('StaffPhoto','Department')->where('business_id', $this->business_id)->where('is_deactivate',0)
                ->orderBy('created_at','desc')
                ->get();
        } else {
            $post_data = Staff::with('StaffPhoto','Department')->where('business_id', $this->business_id)->where('is_deactivate',0)
                ->orderBy('created_at','desc')
            ->where('name', 'LIKE', "%{$search_text}%")->get();

            $totalFilteredRecord = Staff::where('business_id', $this->business_id)->where('name', 'LIKE', "%{$search_text}%")
                ->count();
        }
        $data_val = array();
        if (!empty($post_data)) {
            foreach ($post_data as $post_val) {
                $url = url('/assets/admin/images/dummy/dummy-user.png');
                if(!empty($post_val->staffPhoto[0]->photo)){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->staffPhoto[0]->photo);
                }
                $postnestedData['name'] = $post_val->name.' '.$post_val->last_name;
                $postnestedData['id'] = $post_val->id;
                $postnestedData['department_name'] = $post_val->Department['name'];
                $postnestedData['staff_photo'] = $url;
                $postnestedData['staff_id'] = substr($business[0]['name'], 0, 3).''.$post_val->id;
                $postnestedData['salary_payment_type'] = $business[0]['salary_calculation'];
                $postnestedData['phone_number'] = $post_val->phone_number;
                $data_val[] = $postnestedData;

            }
        }
        // $request->session()->put('month', $date);
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw" => intval($draw_val),
            "recordsTotal" => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data" => $data_val,
        );
        echo json_encode($get_json_data);
    }

    public function userExport(Request $request) 
    {   
        
        if(!empty($request->input('selectedIds'))){
            return Excel::download(new UserReportExport($request->input('selectedIds')), 'User-Report.xlsx');
        }
        else{
            // return response()->json(['message'=>'Select Report for export Excel', 'status'=>'0']);
            return Excel::download(new UserReportExport(), 'User-Report.xlsx');
        }
    }

    public function SalaryReportList(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        $business = Business::where('id', $this->business_id)->get();
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'name',
            1 => 'staff_id',
            2 => 'total_working_days',
            3 => 'present_days',
            4 => 'absent_days',
            5 => 'salary_amount',
        );
        $search_text = $request->searchValue;
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date);
        // return $date->month;
        

        $totalDataRecord = Staff::where('business_id', $this->business_id)  
            ->count();
        if ($search_text == null) {
            $post_data = Staff::with('StaffPhoto','Department')->where('business_id', $this->business_id)
                ->orderBy('created_at','desc')  
                ->get();
        } else {
            $post_data = Staff::with('StaffPhoto','Department')->where('business_id', $this->business_id)
            ->where('name', 'LIKE', "%{$search_text}%")->orderBy('created_at','desc')  ->get();
            $totalFilteredRecord = Staff::where('business_id', $this->business_id)->where('name', 'LIKE', "%{$search_text}%")
                ->count();
        }
        $data_val = array();
        if (!empty($post_data)) {
            foreach ($post_data as $post_val) {
                
                $startDate = Carbon::parse($date)->startOfMonth();
                $endDate = Carbon::parse($date)->endOfMonth();
                $workingDaysCount = 0;
                $days = $startDate->copy();               

                while ($days <= $endDate) {
                    if ($days->isWeekday()) {
                        $workingDaysCount++;
                    }
                    $days->addDay();
                }
                // return $workingDaysCount;
                $staff_salary = Staff::where('id', $post_val->id)->value('salary_amount');
                $perday_amt = $staff_salary / $workingDaysCount;

                $present_days = Attendance::where('staff_id', $post_val->id)->whereYear('date', $date->year)->whereMonth('date', $date->month)->where('status', 'Present')->distinct('date')->count();
                $absent_days = Attendance::where('staff_id', $post_val->id)->whereYear('date', $date->year)->whereMonth('date', $date->month)->where('status', 'Absent')->distinct('date')->count();

                $business_hour = Business::where('id', $this->business_id)->value('shift_hour');
            
                list($hours, $minutes, $seconds) = explode(':', $business_hour);
                $totalSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;
                $totalSecondsWorked = $totalSeconds * $workingDaysCount;
                $hours = floor($totalSecondsWorked / 3600);
                $minutes = floor(($totalSecondsWorked % 3600) / 60);
                $seconds = $totalSecondsWorked % 60;
                $working_hour = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
                // return $working_hour;

                $total_hours = Attendance::where('staff_id', $post_val->id)->whereYear('date', $date->year)->whereMonth('date', $date->month)->where('status', 'Present')->pluck('total_time')->toArray();

                $total_seconds = $total_hours
                ? array_reduce($total_hours, function ($carry, $time) {
                    $timeParts = explode(':', $time);
                    if (count($timeParts) === 3) {
                        list($hours, $minutes, $seconds) = $timeParts;
                        return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
                    }
                    return $carry; // Return the existing carry value if the format is incorrect
                }, 0)
                : '-';
                
                
                if ($total_seconds !== '-') {
                    $totalHours = floor($total_seconds / 3600);
                    $totalMinutes = round(($total_seconds % 3600) / 60);
                    $total_Second = $total_seconds % 60;
                } else {
                    $totalHours = '-';
                    $totalMinutes = '-';
                    $total_Second = '-'; 
                }
                if ($totalHours !== '-' && $totalMinutes !== '-' && $total_Second !== '-') {
                    $totalTime = sprintf('%02d:%02d:%02d', $totalHours, $totalMinutes, $total_Second);
                    $totalSeconds = ($totalHours * 3600) + ($totalMinutes * 60) + $total_Second;
                    $staff_days = $totalSeconds / (24 * 60 * 60);
                    $final_salary = round($perday_amt * $staff_days, 2);
                } else {
                    $totalTime = '-';
                    $staff_days = '-';
                    $final_salary = '-';
                }

                $url = url('/assets/admin/images/dummy/dummy-user.png');
                if(!empty($post_val->staffPhoto[0]->photo)){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->staffPhoto[0]->photo);
                }

                $postnestedData['name'] = $post_val->name.' '.$post_val->last_name;
                $postnestedData['id'] = $post_val->id;
                $postnestedData['department_name'] = $post_val->Department['name'];
                $postnestedData['staff_photo'] = $url;
                $postnestedData['staff_id'] = substr($business[0]['name'], 0, 3).''.$post_val->id;
                $postnestedData['total_working_days'] = $workingDaysCount;
                $postnestedData['present_days'] = $present_days;
                $postnestedData['absent_days'] = $absent_days;
                $postnestedData['salary_amount'] = $final_salary;
                $data_val[] = $postnestedData;
            }
        }
        $request->session()->put('month', $date);
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw" => intval($draw_val),
            "recordsTotal" => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data" => $data_val,
        );
        echo json_encode($get_json_data);
    }

    public function salaryExport(Request $request) 
    {   
        
        if(!empty($request->input('selectedIds'))){
            if(count($request->input('selectedIds')) == 1){
                $staff = Staff::where('id',  $request->input('selectedIds'))->first();
                return Excel::download(new SalaryReportExport($request->input('selectedIds')), $staff['name'].' '. $staff['last_name'].'-Salary-Report.xlsx');
            } else {
                return Excel::download(new SalaryReportExport($request->input('selectedIds')), 'Salary-Report.xlsx');
            }
        }
        else{
            // return response()->json(['message'=>'Select Report for export Excel', 'status'=>'0']);
            return Excel::download(new SalaryReportExport(), 'Salary-Report.xlsx');
        }
    }

    public function reportPayroll(){
        $header_title = "Reports";
        return view('report::reports_payroll', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    }
    public function bulkSalaryslip(){
        $header_title = "Payroll Reports";
        return view('report::bulk_salary_slip', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    }
    public function staffPayrollreport(){
        $header_title = "Payroll Reports";
        return view('report::staff_payroll_report', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    }

    public function StaffReportDownloadList(Request $request){
        $totalFilteredRecord = $totalDataRecord = $draw_val = 0; // Initialize as integers
        $columns_list = array(
            0 =>'id',
            1 =>'business_id',
            2 =>'report_cycle',
            3 =>'action',
        );
       
        $totalDataRecord = Payrun::where('business_id',$this->business_id)
            ->whereMonth('report_cycle',$request->month)
            ->whereYear('report_cycle',$request->year)
            ->count(); // Count the records instead of getting all records
        
        $post_data = Payrun::where("business_id", $this->business_id)
            ->whereMonth('report_cycle',$request->month)
            ->whereYear('report_cycle',$request->year)
            ->get();
       
        $data_val = array();
        if($post_data !== null) {
            foreach($post_data as $post_val){
                $postnestedData['id'] = $post_val->id;
                $postnestedData['staff_payment_type'] =  'Non Weekly Staff';
                $postnestedData['report_cycle'] = Carbon::parse($post_val->report_cycle)->format('M, Y');
                $postnestedData['report_type'] = 'Half Page';
                $postnestedData['generated_on'] = Carbon::parse($post_val->created_at)->format('d F, Y | g:i A');
                $postnestedData['action'] = '<div onclick="downloadPayrolls(' . $post_val->id . ')"><svg width="24" height="24" class="download-pdf-btn" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    }

    public function BulkSalarySlipList(Request $request){
      $totalFilteredRecord = $totalDataRecord = $draw_val = 0;
      $colum_list = array(
        0 => 'id',
        1 => 'business_id',
        2 => 'report_cycle',
        3 => 'action',
      );

      $data_list = Payrun::where('business_id',$this->business_id)
      ->WhereMonth('report_cycle',$request->month)
      ->WhereYear('report_cycle',$request->year)
      ->count();

      $post_data = Payrun::where('business_id',$this->business_id)
      ->WhereMonth('report_cycle',$request->month)
      ->WhereYear('report_cycle',$request->year)
      ->get();

        $data_val = array();
        if($post_data !== null) {
            foreach($post_data as $post_val){
                $postData['id'] = $post_val->id;
                $postData['staff_payment_type'] =  'Non Weekly Staff';
                $postData['busines_is'] = $post_val->business_id;  
                $postData['report_cycle'] = Carbon::parse($post_val->report_cycle)->format('M Y');
                $postData['report_type'] = 'Half Page';
                $postData['generated_on'] = Carbon::parse($post_val->created_at)->format('d F, Y | g:i A');
                $postData['action'] = '<div onclick="downloadPdf(' . $post_val->id . ')"><svg width="24" height="24" class="download-pdf-btn" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0009 3C12.3833 3 12.6932 3.30996 12.6932 3.69231V16.6154C12.6932 16.9977 12.3833 17.3077 12.0009 17.3077C11.6186 17.3077 11.3086 16.9977 11.3086 16.6154V3.69231C11.3086 3.30996 11.6186 3 12.0009 3Z" fill="#808080"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.69231 15.9238C4.07466 15.9238 4.38462 16.2338 4.38462 16.6161C4.38462 18.2729 5.72789 19.6161 7.38462 19.6161H16.6154C18.2721 19.6161 19.6154 18.2729 19.6154 16.6161C19.6154 16.2338 19.9253 15.9238 20.3077 15.9238C20.69 15.9238 21 16.2338 21 16.6161C21 19.0376 19.0368 21.0008 16.6154 21.0008H7.38462C4.96319 21.0008 3 19.0376 3 16.6161C3 16.2338 3.30996 15.9238 3.69231 15.9238Z" fill="#808080"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89423 11.5113C7.16462 11.241 7.60296 11.241 7.8733 11.5114L11.9991 15.6381L16.1259 11.5114C16.3962 11.241 16.8346 11.241 17.1049 11.5114C17.3753 11.7817 17.3753 12.2201 17.1049 12.4904L12.4886 17.1067C12.3588 17.2366 12.1827 17.3095 11.9991 17.3095C11.8154 17.3095 11.6393 17.2366 11.5095 17.1067L6.89413 12.4904C6.62379 12.22 6.62384 11.7817 6.89423 11.5113Z" fill="#808080"/>
                </svg></div>';
                $data_val[] = $postData;
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
    }

    public function BulkSalaryPdf(Request $request){
        $payrun_id = $request->payrun_id;
        $date = Payrun::where('id', $payrun_id)->value('report_cycle');
        $dateParts = explode('-', $date);
        // Extract year and month
        $currentMonth =ltrim($dateParts[1], '0');
        $currentYear = $dateParts[0];
        $currentMonthFullName = Carbon::createFromFormat('m', $currentMonth)->monthName;
        $weekly_holiday = WeeklyHolidayBusiness::where("business_id", $this->business_id)->pluck('days')->toArray();
        $startDate = Carbon::create($currentYear, $currentMonth, 1, 0, 0, 0)->startOfMonth();
        $endDate = Carbon::create($currentYear, $currentMonth, 1, 0, 0, 0)->endOfMonth();
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
        $holidayCount = $holidayList->filter(function ($holiday) use ($currentMonth, $currentYear) {
            $holidayDate = explode(' | ', $holiday->holiday_date)[0];
            $parsedDate = Carbon::createFromFormat('d M Y', $holidayDate);
            $holidayMonth = $parsedDate->month;
            $holidayYear = $parsedDate->year;
            return $holidayMonth == $currentMonth && $holidayYear == $currentYear;
        })->count();
        $workingDay = $totalWorkingDays - $holidayCount;
        $staff_ids = Payroll::where('payrun_id', $request->payrun_id)->pluck('staff_id');
        $staff_data = Staff::with(['StaffProfile:id,staff_id,address1,address2,city,state,pincode',
            'StaffInfo:id,staff_id,date_of_joining,designation','Department:id,name',
            'PayrollSalary'=>function($query) use ($payrun_id){
                $query->select('id','staff_id','net_salary')->where('payrun_id', $payrun_id);
            }])->whereIn('id',$staff_ids)->get();
            $pdf_names = array();
        foreach ($staff_data as $staff){
            $pdf_name = $staff->name.'-'.$currentMonthFullName.'-'.$currentYear.'-'.$staff->id.'.pdf';
            $pdf_names[] = $pdf_name;
            $staff_pdf = array(
                'address' =>($staff->StaffProfile) ? $staff->StaffProfile['address1'].', '.$staff->StaffProfile['address2'].' '.$staff->StaffProfile['city'] .' '.$staff->StaffProfile['state'].'-'.$staff->StaffProfile['pincode'] : '',
                'date_of_joining' =>($staff->StaffInfo) ? $staff->StaffInfo['date_of_joining'] : '',
                'pay_period' => $currentMonthFullName.' '.$currentYear,
                'working_days' => $workingDay,
                'employee_name'=>$staff->name.' '.$staff->middle_name.' '.$staff->last_name,
                'designation'=>($staff->StaffInfo) ? $staff->StaffInfo['designation'] : '',
                'department'=>($staff->Department) ? $staff->Department['name'] : '',
                'salary'=> ($staff->salary_amount) ? $staff->salary_amount : '',
                'incentive_pay' => 0,
                'house_rent_allowance' => 0,
                'meal_allowance' => 0,
                'total_earnings' => 0,
                'provident_fund' => 0,
                'profesional_tax' => 0,
                'lone' => 0,
                'total_deduction' => 0,
                'net_pay' =>$staff->PayrollSalary['net_salary'],
            );
            $pdf = PDF::loadView('report::bulk_salary_pdf', compact('staff_pdf'))
                ->setPaper('a4','potrait')
                ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
                ->setWarnings(false);
            
                $pdfFilePath = public_path('assets/admin/pdf/'.$pdf_name); 
                $pdf->save($pdfFilePath);
        }
        $zip = new ZipArchive();
        $fileName = 'salary-slip.zip';
        if ($zip->open(public_path('assets/admin/payroll_zip/'.$fileName), ZipArchive::CREATE) === TRUE)
        {
            $filesToZip = array();
            foreach ($pdf_names as $pdfName){
                $filesToZip[] = public_path('assets/admin/pdf/'.$pdfName);
            }
            foreach ($filesToZip as $file) {
                $zip->addFile($file, basename($file));
            }
            $zip->close();
        }
        // Create a response with the zip file
        $response = response()->download(public_path('assets/admin/payroll_zip/'.$fileName));
        // Delete the zip file after sending the response
        $response->deleteFileAfterSend(true);

        // Delete the individual PDF files if needed
        foreach ($pdf_names as $pdfName) {
            $pdfPath = public_path('assets/admin/pdf/' . $pdfName);
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }
        }
        return $response;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('report::create');
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
        return view('report::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('report::edit');
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
