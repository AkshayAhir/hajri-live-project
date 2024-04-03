<?php

namespace Modules\Dashboard\Http\Controllers;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\Business;
use App\Models\BusinessUser;
use App\Models\User;
use App\Models\UserPhoto;
use App\Models\Staff;
use App\Models\Attendance;
use App\Models\HolidayPolicy;
use App\Models\HolidayList;

use Illuminate\Support\Facades\Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public $user_profile;
    public $business;
    public $business_id;
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->business_id = Session::get('business_id');
            $this->user_profile = UserPhoto::where('user_id',Auth::user()->id)->get();
            $business_id = BusinessUser::where('user_id', Auth::user()->id)->pluck('business_id');
            $this->business = Business::select('id','name')->whereIn('id',$business_id)->get();
            return $next($request);
        });
    }
//    public function business(){
//        $user_id = Auth::user()->id;
//        $business_id = BusinessUser::where('user_id', $user_id)->pluck('business_id');
//        return Business::select('id','name')->whereIn('id',$business_id)->get();
//    }
    public function setSession(Request $request){
        // dd($request);
        Session::put('business_id',$request->business_id);
        return response()->json(['message' => 'Session value set successfully']);
    }
    public function index(){
        $business_id = Session::get('business_id');
        DB::statement("SET SQL_MODE=''");
        $start_month = Carbon::now()->format('Y-m-d');
        // $start_month = Carbon::now()->startOfYear()->format('Y-m-d');
        $end_month = Carbon::now()->endOfYear()->format('Y-m-d');
        $header_title = "Dashboard";
        $current_day = Carbon::now()->format('l, d M Y');
        $total_staff = Staff::where('business_id', $business_id)->where('is_deactivate',0)->count();
        // dd($total_staff);
        // current day count
            $present_count = Attendance::whereHas('Staff', function ($query) use ($business_id){
                    $query->where('business_id', $business_id)->where('is_deactivate',0);
                })
                ->where('date', Carbon::now()->toDateString())
                ->where('status', 'LIKE', 'Present')
                ->distinct('staff_id')
                ->count();

            
            // $absent_count = Attendance::whereHas('Staff', function ($query) use ($business_id){
            //         $query->where('business_id', $business_id);
            //     })
            //     ->where('date', Carbon::now()->toDateString())
            //     ->where('status', 'LIKE', 'Absent')
            //     ->distinct('staff_id')
            //     ->count();
            // dd($present_count);
            $half_day = Attendance::whereHas('Staff', function ($query) use ($business_id){
                $query->where('business_id', $business_id)->where('is_deactivate',0);
            })
            ->where('date', Carbon::now()->toDateString())
            ->where('status', 'LIKE', 'Half Day')
            ->distinct('staff_id')
            ->count();

            $absent_count = $total_staff - ($present_count + $half_day);
            // dd($absent_count);
        // end current day count

        // this month holiday
            
            $currentMonth = Carbon::now()->format('M Y');
            $currentYear = now()->year;
            
            $holiday_template = HolidayPolicy::where('business_id', $this->business_id) ->where(function ($query) use ($currentYear) {
                $query->where('shift_start_time', 'like', "%$currentYear%")
                    ->orWhere('shift_end_time', 'like', "%$currentYear%");
            })  ->value('id');
            $holiday = HolidayList::where('template_id', $holiday_template) ->where('holiday_date', 'LIKE', '%' . $currentMonth . '%')->get();
     
            // end this month holiday

        // staff status
            $presentstaff = Attendance::with('Staff.Department')->whereHas('Staff',function($query){
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })->where('status', 'Present')->where('date', Carbon::now()->toDateString())->orderBy('in_time', 'desc')->groupBy('staff_id')->get()->take(5);
               
            $presentstaff_count = Attendance::with('Staff.Department')->whereHas('Staff',function($query){
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })->where('status', 'Present')->where('date', Carbon::now()->toDateString())->distinct('staff_id')->count();
            
            $absentstaff = Attendance::with('Staff.Department')->whereHas('Staff',function($query){
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })->where('status', 'Absent')->where('date', Carbon::now()->toDateString())->orderBy('in_time', 'desc')->groupBy('staff_id')->get()->take(5);
            $absentstaff_count = Attendance::with('Staff.Department')->whereHas('Staff',function($query){
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })->where('status', 'Absent')->where('date', Carbon::now()->toDateString())->distinct('staff_id')->count();
            
            // return $absentstaff[0]->Staff[0]->StaffPhoto[0];
            $halfleave = Attendance::with('Staff.Department')->whereHas('Staff',function($query){
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })->where('status', 'Half Day')->where('date', Carbon::now()->toDateString())->orderBy('in_time', 'desc')->groupBy('staff_id')->get()->take(5);
           
            $halfleave_count = Attendance::with('Staff.Department')->whereHas('Staff',function($query){
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })->where('status', 'Half Day')->where('date', Carbon::now()->toDateString())->distinct('staff_id')->count();
            
        // end staff status
        
        return view('dashboard::dashboard', [
            'header_title'=>$header_title, 
            'business'=>$this->business, 
            'user_profile'=>$this->user_profile, 
            'current_day' => $current_day,
            'start_month' => $start_month,
            'end_month' => $end_month,
            'total_staff' => $total_staff,
            'present_count' => $present_count,
            'absent_count' => $absent_count,
            'half_day' => $half_day,
            'holiday' => $holiday,
            'presentstaff' => $presentstaff,
            'presentstaff_count' => $presentstaff_count,
            'absentstaff' => $absentstaff,
            'absentstaff_count' => $absentstaff_count,
            'halfleave' => $halfleave,
            'halfleave_count' => $halfleave_count,
        ]);
        
    }

    public function monthAttendanceChart(Request $request){
       
        //  attendance status chart
            DB::statement("SET SQL_MODE=''");  
            // Carbon::parse($request->start_month)->startOfMonth()->toDateString();
            // $start_month = Carbon::createFromFormat('M Y', $request->start_month)->startOfMonth()->toDateString();
            // $end_month = Carbon::createFromFormat('M Y', $request->start_month)->endOfMonth()->toDateString();

                  
            // for ($month = 1; $month <= 12; $month++) {
            //     $monthName = Carbon::create(null, $month, 1)->format('M');
            //     $months[] = $monthName;
            // }
            // $monthsCollection = collect($months);
            // return $filteredMonths = $monthsCollection->filter(function ($month) use ($start_month, $end_month) {
            //     $currentMonth = Carbon::parse("1 $month")->startOfMonth();
            //     return $currentMonth->between($start_month, $end_month);
            // });


            $start_month = Carbon::parse($request->start_month)->startOfMonth()->toDateString();
           
            $end_month = Carbon::parse($request->start_month)->endOfMonth()->toDateString();
            $days = [];  
            $currentDate = Carbon::parse($start_month);
            while ($currentDate->lte(Carbon::parse($end_month))) {
                $days[] = $currentDate->format('d M');
                $currentDate->addDay();
            }

            // return $filteredMonths = collect($days);
            $daysCollection = collect($days);
            
            $filteredMonths = $daysCollection->filter(function ($days) use ($start_month, $end_month) {
                return $currentMonth = Carbon::parse("$days")->startOfMonth();
                // return $currentMonth->between($start_month, $end_month);
            });
            
            $present_status = Attendance::selectRaw('COUNT(DISTINCT staff_id) as count, DATE_FORMAT(date, "%e %b") as month')
            ->whereHas('Staff', function ($query) {
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })
            ->where('status', 'LIKE', 'Present')
            ->whereBetween('date', [$start_month, $end_month])
            ->groupBy('month')
            ->groupBy('staff_id')
            ->get()
            ->groupBy('month')
            ->map(function ($item) {
                return $item->count();
            });

            $present_statusData = $filteredMonths->map(function ($days) use ($present_status) {
                $formattedDay = Carbon::parse($days)->format('j M');
                return [
                    'month' => ucfirst($days),
                    'count' => isset($present_status[$formattedDay]) ? $present_status[$formattedDay] : 0,
                ];
                
            });

            $absent_status = Attendance::selectRaw('COUNT(DISTINCT staff_id) as count, DATE_FORMAT(date, "%e %b") as month')
            ->whereHas('Staff', function ($query) {
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })
            ->where('status', 'LIKE', 'Absent')
            ->whereBetween('date', [$start_month, $end_month])
            ->groupBy('month')
            ->groupBy('staff_id')
            ->get()
            ->groupBy('month')
            ->map(function ($item) {
                return $item->count();
            });
            

            $absent_statusData = $filteredMonths->map(function ($days) use ($absent_status) {
                $formattedDay = Carbon::parse($days)->format('j M');
                return [
                    'month' => ucfirst($days),
                    'count' => isset($absent_status[$formattedDay]) ? $absent_status[$formattedDay] : 0,
                ];
            });

            $halfday_status = Attendance::selectRaw('COUNT(DISTINCT staff_id) as count, DATE_FORMAT(date, "%e %b") as month')
            ->whereHas('Staff', function ($query) {
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })
            ->where('status', 'LIKE', 'Half Day')
            ->whereBetween('date', [$start_month, $end_month])
            ->groupBy('month')
            ->groupBy('staff_id')
            ->get()
            ->groupBy('month')
            ->map(function ($item) {
                return $item->count();
            });          

            $halfday_statusData = $filteredMonths->map(function ($days) use ($halfday_status) {
                $formattedDay = Carbon::parse($days)->format('j M');
                return [
                    'month' => ucfirst($days),
                    'count' => isset($halfday_status[$formattedDay]) ? $halfday_status[$formattedDay] : 0,
                ];
            });
            return response()->json(['message'=>'success', 'status'=>'1', 'present_statusData'=>$present_statusData,'absent_statusData'=>$absent_statusData,'halfday_statusData'=>$halfday_statusData, 'filteredMonths' => $filteredMonths]);
        //  attendance status chart
            
    }

    public function profile(){
        $header_title = "My Profile";
        $user = Auth::user();        
        $business_data = Business::where('id',$this->business_id)->get();
        //    return view('dashboard::profile',compact('header_title','business','user','business_data','user_profile'));
        return view('dashboard::profile',['header_title'=>$header_title,'business'=>$this->business,'user'=>$user,'business_data'=>$business_data,'user_profile'=>$this->user_profile]);
    }
    public function editProfile(Request $request){
        $user_id = Auth::user()->id;

        if($request->profile != ""){
            $file_name = $request->profile->getClientOriginalName();
            $imageFileType = $request->profile->getClientOriginalExtension();
            $file_path = $request->profile->getPathName();
            $image_name = "profile_" . time(). "." . $imageFileType;
            $request->profile->move(public_path('assets/admin/images/profile'), $image_name);
            $userPhoto = UserPhoto::where('user_id',$user_id)->value('photo');
            if ($userPhoto) {
                $imagePath = public_path('assets/admin/images/profile/' . $userPhoto);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $profile = UserPhoto::where('user_id',$user_id)->delete();
            UserPhoto::insert(['user_id'=>$user_id,'photo'=>$image_name]);
        }
        User::where('id',$user_id)->update(['name'=>$request->name]);
        
        $business = Business::where('id',$this->business_id)->update(['name'=>$request->business_name,'business_address'=>$request->business_address]);
        if (!$business) {
            return response()->json(['message'=>'Something is wrong.', 'status'=>'0']);
        } else {
            return response()->json(["message" => 'Profile updated', "status" => "1"]);
        }
    }
    public function approvePunches(Request $request){
        $header_title = "Dashboard";
        return view('dashboard::approve_punches', ['header_title' => $header_title,'business' => $this->business, 'user_profile' => $this->user_profile]);
    }
    public function approveOvertime(Request $request){
        $header_title = "Dashboard";
        return view('dashboard::approve_overtime',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile]);
    }
    public function reviewFine(Request $request){
        $header_title = "Dashboard";
        return view('dashboard::review_fine',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile]);
    }
    public function manageLeave(Request $request){
        $header_title = "Dashboard";
        return view('dashboard::manage_leave',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile]);
    }
    public function detailedAttendanceView(Request $request){
        $header_title = "Attendance";
        return view('dashboard::detailed_attendance_view',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile]);
    }
    public function attendanceUpcomingLeaves(Request $request){
        $header_title = "Attendance";
        return view('dashboard::attendance-upcoming-leaves',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile]);
    }
    public function attendanceDailyWorkEntries(Request $request){
        $header_title = "Attendance";
        return view('dashboard::attendance-daily-work-entries',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile]);
    }
    public function onTime(Request $request){
        $header_title = "Dashboard";
        $status = request()->status;
        return view('dashboard::on_time',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile, 'status' => $status]);
    }

    public function late(Request $request){
        $header_title = "Dashboard";
        return view('dashboard::late',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile]);
    }
    public function absent(Request $request){
        $status = request()->status;
        $header_title = "Dashboard";
        return view('dashboard::absent',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile, 'status' => $status]);
    }
    public function leave(Request $request){
        $status = request()->status;
        $header_title = "Dashboard";
        return view('dashboard::on-leave',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile, 'status' => $status]);
    }
    public function notification(Request $request){
        $header_title = "Dashboard";
        return view('dashboard::notification',['header_title'=>$header_title,'business'=>$this->business,'user_profile'=>$this->user_profile]);
    }

    public function staffStatus(Request $request){
        DB::statement("SET SQL_MODE=''");        
        $business = Business::where('id', $this->business_id)->first();
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $status = $request->status;
        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'phone_number',
            3 =>'salary_amount',
            4 =>'salary_cycle',
            5=> 'department_id',
        );
        $search_text = $request->searchValue;
        $totalDataRecord = Attendance::whereHas('Staff', function ($query){
            $query->where('business_id', $this->business_id);
        })
        ->where('date', Carbon::now()->toDateString())
        ->where('status', 'LIKE' ,$status)
        ->count();
        if($search_text == null) {
            $post_data = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->with('Staff.StaffPhoto', 'Staff.Department')
            ->where('date', Carbon::now()->toDateString())
            ->where('status', 'LIKE' ,$status)
            ->groupBy('staff_id')
            ->get();
            // Staff::with(['Department','StaffPhoto'])->where('business_id',$this->business_id)->get();
        } else {
            $post_data =  Attendance::whereHas('Staff', function ($query){
                    $query->where('business_id', $this->business_id);
                })->
                whereHas('Staff', function ($query) use ($search_text) {
                    $query->where('name','LIKE',"%{$search_text}%");
                })
                ->with('Staff.StaffPhoto', 'Staff.Department')
                ->where('date', Carbon::now()->toDateString())
                ->where('status', 'LIKE' ,$status)
                ->groupBy('staff_id')
                ->get();
            $totalFilteredRecord = Attendance::whereHas('Staff', function ($query){
                    $query->where('business_id', $this->business_id);
                })->
                whereHas('Staff', function ($query) use ($search_text) {
                    $query->where('name','LIKE',"%{$search_text}%");
                })
                ->with('Staff.StaffPhoto', 'Staff.Department')
                ->where('date', Carbon::now()->toDateString())
                ->where('status', 'LIKE' ,$status)
                ->groupBy('staff_id')
                ->count();
        }
        $data_val = array();
        // return $post_data;
        if(!empty($post_data)) {
            foreach ($post_data as $post_val) {
                $url = url('/assets/admin/images/dummy/dummy-user.png');
        
                $break_time = $post_val->break_time ? Carbon::parse($post_val->break_time) : null;
                if($break_time == null){
                    $formatted_time = '-';
                } else{
                    if ($break_time->hour > 0) {
                        $formatted_time = $break_time->format('H:i \H\r\s');
                    } else { 
                        $formatted_time = $break_time->format('i \M\i\n\s');
                    }
                }

                $last_out_time = Attendance::where('staff_id', $post_val->staff_id)->where('date', Carbon::now()->toDateString())->orderBy('id','desc')->limit(1)->first();
                $punchout_time = '-';
                if($last_out_time['out_time'] !== null){
                    $punchout_time = Carbon::parse($last_out_time['out_time'])->format('h:i');
                    $inTime = Carbon::parse($post_val->in_time);
                    $out_time = Carbon::parse($last_out_time['out_time']);
                    $hour = $inTime->diffInHours($out_time);
                    $minutes = $inTime->diffInMinutes($out_time) % 60;
                    if ($hour > 0 && $minutes > 0) {
                        $total_time = sprintf("%02d:%02d Hrs", $hour, $minutes);
                    } elseif ($hour > 0) {
                        $total_time = sprintf("%02d Hrs", $hour);
                    } elseif ($minutes > 0) {
                        $total_time = sprintf("%02d Mins", $minutes);
                    }
                } 
                else{
                    $total_time = '-';
                }
    
                if(!empty($post_val->Staff[0]['StaffPhoto'][0])){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->Staff[0]['StaffPhoto'][0]->photo);
                }
                // return $post_val->Staff[0]->department;
                $postnestedData['id'] = $post_val->id;
                $postnestedData['name'] =  $post_val->Staff[0]['name'];
                $postnestedData['department_name'] = $post_val->Staff[0]->department['name'];
                $postnestedData['staff_photo'] = $url;
                $postnestedData['staff_ids'] = $post_val->Staff[0]['id'];
                $postnestedData['staff_id'] = substr($business['name'], 0, 3).''. $post_val->Staff[0]['id'];
                $postnestedData['note'] = $post_val->note;
                $postnestedData['break_time'] = $formatted_time;
                $postnestedData['in_time'] = Carbon::parse($post_val->in_time)->format('h:i');
                $postnestedData['out_time'] = $punchout_time;
                $postnestedData['total_time'] = $total_time;
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
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dashboard::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
