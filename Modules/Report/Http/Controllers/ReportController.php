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
use Carbon\Carbon;
use DB;

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

                // $total_seconds = array_reduce($total_hours, function ($carry, $time) {
                //     list($hours, $minutes, $seconds) = explode(':', $time);
                //     return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
                // }, 0);
                
                // $totalHours = floor($total_seconds / 3600);
                // $totalMinutes = round(($total_seconds % 3600) / 60);
                // $total_Second = $total_seconds % 60;

                // $totalTime = "{$totalHours}h {$totalMinutes}m";
                // $totalTime = sprintf('%02d:%02d:%02d', $totalHours, $totalMinutes, $total_Second);
                // $totalSeconds = ($totalHours * 3600) + ($totalMinutes * 60) + $total_Second;

                // Calculate total seconds
                // $final_time = ($hours * 3600) + ($minutes * 60) + $seconds;
                
                // Calculate total days
                // $staff_days = $totalSeconds / (24 * 60 * 60);
                // $final_salary = round($perday_amt * $staff_days, 2);
                
                // return $final_salary; 

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
