<?php

namespace Modules\Attendance\Http\Controllers;

use App\Models\Attendance;
use App\Models\Business;
use App\Models\BusinessUser;
use App\Models\Log;
use App\Models\Staff;
use App\Models\UserPhoto;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
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
    public function index(Request $request)
    {
        $status = $request->status;
        $staff_count = Staff::where('business_id', $this->business_id)->where('is_deactivate',0)->count();
        $present_count = Attendance::whereHas('Staff', function ($query) {
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })
            ->where('date', Carbon::now()->toDateString())
            ->where('status', 'LIKE', 'Present')
            ->distinct('staff_id')
            ->count();

        // $absent_count = Attendance::whereHas('Staff', function ($query) {
        //         $query->where('business_id', $this->business_id);
        //     })
        //     ->where('date', Carbon::now()->toDateString())
        //     ->where('status', 'LIKE', 'Absent')
        //     ->distinct('staff_id')
        //     ->count();

        $half_day = Attendance::whereHas('Staff', function ($query) {
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })
            ->where('date', Carbon::now()->toDateString())
            ->where('status', 'LIKE', 'Half Day')
            ->distinct('staff_id')
            ->count();

        $paid_leave = Attendance::whereHas('Staff', function ($query) {
                $query->where('business_id', $this->business_id)->where('is_deactivate',0);
            })
            ->where('date', Carbon::now()->toDateString())
            ->where('status', 'LIKE', 'Paid Leave')
            ->distinct('staff_id')
            ->count();

        $absent_count = $staff_count - ($present_count + $half_day + $paid_leave);
        $header_title = "Attendance";

        return view('attendance::attendance', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile, 'staff_count' => $staff_count, 'present_count' => $present_count, 'absent_count' => $absent_count, 'half_day' => $half_day, 'paid_leave' => $paid_leave,'status' =>$status]);
    }

    public function attendanceOnDateChange(Request $request)
    {
        $staff_count = Staff::where('business_id', $this->business_id)->where('is_deactivate',0)->count();
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date)->format('Y-m-d');

        $present_count = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->where('status', 'LIKE', 'Present')
            ->distinct('staff_id')
            ->count();

        $absent_count = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->where('status', 'LIKE', 'Absent')
            ->distinct('staff_id')
            ->count();

        $half_day = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->where('status', 'LIKE', 'Half Day')
            ->distinct('staff_id')
            ->count();

        $paid_leave = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->where('status', 'LIKE', 'Paid Leave')
            ->distinct('staff_id')
            ->count();

        return response()->json(['message' => 'success', 'status' => 1, 'staff_count' => $staff_count, 'present_count' => $present_count, 'absent_count' => $absent_count, 'half_day' => $half_day, 'paid_leave' => $paid_leave]);

    }

    public function attendanceList(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        $status = $request->status;
        $business = Business::where('id', $this->business_id)->get();
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'name',
            1 => 'in_time',
            2 => 'out_time',
            3 => 'break_time',
            4 => 'staff_time',
            5 => 'status',
            6 => 'overtime',
            // 6 => 'fine',
            7 => 'action',
        );
        $search_text = $request->searchValue;
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date)->format('Y-m-d');

        $totalDataRecord = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function($query) use ($status){
                if($status != 'all' && $status != null){
                    $query->where('status', $status);
                }
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->count();

        if ($search_text == null or $date == null) {
            $post_data = Attendance::with(['Staff.StaffPhoto', 'Staff.Department', 'Staff' => function ($query){
                $query->where('business_id', $this->business_id);
            }])
            ->where(function($query) use ($status){
                if($status != 'all' && $status != null){
                    $query->where('status', $status);
                }
            })
            // ->where('status', 'LIKE' ,$status)
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->groupBy('staff_id')
            ->orderBy('in_time', 'desc')
            ->get();
        } else {
            $post_data = Attendance::with(['Staff.StaffPhoto', 'Staff.Department', 'Staff' => function ($query) use ($search_text) {
                $query->where('business_id', $this->business_id)->where('name', 'LIKE', "%{$search_text}%");
            }])
            ->where(function($query) use ($status){
                if($status != 'all' && $status != null){
                    $query->where('status', $status);
                }
            })
                // ->where('status', 'LIKE' ,$status)
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
                ->groupBy('staff_id')
                ->orderBy('in_time', 'desc')
                ->get();

            $totalFilteredRecord = Attendance::with(['Staff' => function ($query) use ($search_text) {
                $query->where('business_id', $this->business_id)->where('name', 'LIKE', "%{$search_text}%");
            }])
            ->where(function($query) use ($status){
                if($status != 'all' && $status != null){
                    $query->where('status', $status);
                }
            })
                // ->where('status', 'LIKE' ,$status)
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
                $inTimeData = Attendance::where('staff_id', $post_val->staff_id)
                    ->where('date', $post_val->date)
                    ->pluck('in_time');

                // Parse the retrieved times as Carbon instances
                $inTimeformat = $inTimeData->map(function ($time) {
                    if ($time !== null) {
                        return Carbon::parse($time)->format('h:i A');
                    }
                    return '-';
                });
                $inTimeformat = $inTimeformat->reject(fn($time) => $time === null)->implode('<br>'); 

                $outTimeData = Attendance::where('staff_id', $post_val->staff_id)
                    ->where('date', $post_val->date)
                    ->pluck('out_time');

                // Parse the retrieved times as Carbon instances
                $outTimeformat = $outTimeData->map(function ($time) {
                    if ($time !== null) {
                        return Carbon::parse($time)->format('h:i A');
                    }
                    return '-';
                });
                $outTimeformat = $outTimeformat->reject(fn($time) => $time === null)->implode('<br>'); 

                // $inTime = Carbon::parse($post_val->in_time);
                // $outTime = $post_val->out_time ? Carbon::parse($post_val->out_time) : null;
                // $final_outtime = ($post_val->out_time) ? Carbon::parse($post_val->out_time)->format('h:i A') : '-';

                $total_hours = Attendance::where('staff_id', $post_val->staff_id)->where('date', $post_val->date)->pluck('total_time')->toArray();

                $total_seconds = $total_hours
                ? array_reduce($total_hours, function ($carry, $time) {
                    $timeParts = explode(':', $time);
                    if (count($timeParts) === 3) {
                        list($hours, $minutes) = $timeParts;
                        return $carry + ($hours * 3600) + ($minutes * 60);
                    }
                    return $carry; // Return the existing carry value if the format is incorrect
                }, 0)
                : '-';
                
                if ($total_seconds !== '-') {
                    $totalHours = floor($total_seconds / 3600);
                    $totalMinutes = round(($total_seconds % 3600) / 60);
                    $totalTime = sprintf("%02d:%02d", $totalHours, $totalMinutes);
                } else {
                    $totalTime = "-";
                }
                // if ($outTime) {
                //     $hours = $outTime->diffInHours($inTime);
                //     $minutes = $outTime->diffInMinutes($inTime) % 60;
                //     $formattedTimeDifference = sprintf("%02d:%02d", $hours, $minutes);
                //     // $over_time = $business[0]['shift_hour'] - $hours;
                // } else {
                //     $formattedTimeDifference = '-';
                //     $over_time = '-';
                // }
                foreach ($post_val->Staff as $staff) {
                    $url = url('/assets/admin/images/dummy/dummy-user.png');
                    if(!empty($staff->staffPhoto[0]->photo)){
                        $url = url('/assets/admin/images/staff_photos/'.$staff->staffPhoto[0]->photo);
                    }
                    $postnestedData['name'] = $staff['name'].' '.$staff['last_name'];
                    $postnestedData['staff_id'] = $staff['id'];
                    $postnestedData['staff_photo'] = $url;
                    $postnestedData['department_name'] = $staff['Department']['name'];
                }
                // $postnestedData['in_time'] = $post_val->in_time ? Carbon::parse($post_val->in_time)->format('h:i A') : '-';
                $postnestedData['in_time'] = nl2br($inTimeformat);
                // $postnestedData['out_time'] = $final_outtime;
                $postnestedData['out_time'] = nl2br($outTimeformat);
                $postnestedData['break_time'] = $post_val->break_time ? $post_val->break_time : '-';
                $postnestedData['staff_time'] = $totalTime;
                $postnestedData['status'] = '
                        <select class="mySelect">
                            <option value="Present" data-record-id="' . $post_val->id . '" data-image="' . url('assets/admin/images/attendance/present2.svg') . '"';
                                if ($post_val->status == 'Present') {
                                    $postnestedData['status'] .= ' selected';
                                }
                                $postnestedData['status'] .= '>Present
                            </option>
                            <option value="Absent" data-record-id="' . $post_val->id . '" data-image="' . url('assets/admin/images/attendance/Absent2.svg') . '"';
                                if ($post_val->status == 'Absent') {
                                    $postnestedData['status'] .= ' selected';
                                }
                                $postnestedData['status'] .= '>Absent
                            </option>
                            <option value="Half Day" data-record-id="' . $post_val->id . '" data-image="' . url('assets/admin/images/attendance/halfday2.svg') . '"';
                                if ($post_val->status == 'Half Day') {
                                    $postnestedData['status'] .= ' selected';
                                }
                                $postnestedData['status'] .= '>Half Day
                            </option>                            
                        </select>
                    ';
                    // <option value="Paid Leave" data-record-id="' . $post_val->id . '" data-image="' . url('assets/admin/images/attendance/paid.svg') . '"';
                    //     if ($post_val->status == 'Paid Leave') {
                    //         $postnestedData['status'] .= ' selected';
                    //     }
                    //     $postnestedData['status'] .= '>Paid Leave
                    // </option>
                    // <option value="Holiday" data-record-id="' . $post_val->id . '" data-image="' . url('assets/admin/images/attendance/holiday.svg') . '"';
                    //     if ($post_val->status == 'Holiday') {
                    //         $postnestedData['status'] .= ' selected';
                    //     }
                    //     $postnestedData['status'] .= '>Holiday
                    // </option>
                $postnestedData['overtime'] = $post_val->over_time;
                // $postnestedData['fine'] = $post_val->fine;
                $postnestedData['action'] = '
                    <div class="atten-action-main">
                        <div onclick="displayNote(' . $post_val->id . ')" class="create-data  dropdown-toggle proxima_nova_bold"
                            data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right"
                            aria-controls="create-toggle-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.34356 3.3166C2.96581 3.3166 2.65156 3.6263 2.65156 4.0186V12.6479C2.65156 13.0402 2.96581 13.3499 3.34356 13.3499H12.6596C13.0373 13.3499 13.3516 13.0402 13.3516 12.6479V8.71127C13.3516 8.35228 13.6426 8.06127 14.0016 8.06127C14.3605 8.06127 14.6516 8.35228 14.6516 8.71127V12.6479C14.6516 13.749 13.7645 14.6499 12.6596 14.6499H3.34356C2.23864 14.6499 1.35156 13.749 1.35156 12.6479V4.0186C1.35156 2.91757 2.23864 2.0166 3.34356 2.0166H8.00156C8.36055 2.0166 8.65156 2.30762 8.65156 2.6666C8.65156 3.02559 8.36055 3.3166 8.00156 3.3166H3.34356Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.1515 2.59748C11.926 1.82297 13.1816 1.82297 13.9561 2.59748L13.4965 3.0571L13.9561 2.59748L14.0708 2.71215C14.8453 3.48666 14.8453 4.74221 14.0708 5.51672L8.47742 11.1101L8.47563 11.1118C8.30797 11.2782 8.09809 11.3982 7.86549 11.4564C7.86547 11.4564 7.86546 11.4564 7.86545 11.4564L5.39012 12.0754C5.33547 12.0902 5.27849 12.098 5.22047 12.0979C5.04608 12.0981 4.88106 12.0275 4.76081 11.9075C4.64077 11.7872 4.57019 11.6222 4.57031 11.4478C4.57027 11.3898 4.57805 11.3328 4.59288 11.2781L5.21187 8.80279C5.21188 8.80277 5.21188 8.80276 5.21188 8.80275C5.26968 8.5716 5.38922 8.35978 5.55818 8.19082L11.1515 2.59748ZM6.1139 10.5543L7.55011 10.1952L7.55015 10.1952C7.55214 10.1947 7.55546 10.1934 7.55963 10.1894C7.55975 10.1893 7.55986 10.1891 7.55997 10.189L13.1515 4.59748C13.4183 4.33066 13.4183 3.89821 13.1515 3.63139L13.0368 3.51672C12.77 3.2499 12.3376 3.2499 12.0708 3.51672L6.47742 9.11005C6.47572 9.11175 6.47393 9.11458 6.47306 9.11808L6.47305 9.11812L6.1139 10.5543Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.0966 3.65327C10.3505 3.39943 10.762 3.39943 11.0159 3.65327L13.0159 5.65327C13.2697 5.90711 13.2697 6.31867 13.0159 6.57251C12.762 6.82635 12.3505 6.82635 12.0966 6.57251L10.0966 4.57251C9.84279 4.31867 9.84279 3.90711 10.0966 3.65327Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.77438 8.32084C5.8206 8.31425 5.94266 8.29688 6.05157 8.29688C7.33122 8.29688 8.36823 9.33389 8.36823 10.6135C8.36823 10.7251 8.35178 10.8394 8.34414 10.8926C8.34295 10.9008 8.34197 10.9076 8.3413 10.9127C8.2943 11.2685 7.96768 11.519 7.61179 11.4719C7.2559 11.4249 7.00549 11.0983 7.0525 10.7424C7.05451 10.7272 7.05679 10.7108 7.05864 10.6975C7.05924 10.6932 7.0598 10.6892 7.06028 10.6857C7.06257 10.6691 7.06421 10.6568 7.0655 10.6458C7.06807 10.6239 7.06823 10.6154 7.06823 10.6135C7.06823 10.0519 6.61326 9.59689 6.05159 9.59687C6.05147 9.59688 6.04942 9.5969 6.04483 9.59724C6.03959 9.59762 6.03209 9.59834 6.02083 9.59968C6.00908 9.60109 5.99637 9.6028 5.97833 9.60526L5.97491 9.60572C5.95887 9.60791 5.93804 9.61076 5.91669 9.61337C5.56038 9.65707 5.2361 9.40365 5.1924 9.04733C5.1487 8.69102 5.40213 8.36674 5.75844 8.32304C5.7616 8.32265 5.76703 8.32188 5.77438 8.32084Z"
                                    fill="#808080" />
                            </svg>
                        </div>
                        <div onclick="displayNote(' . $post_val->id . ')" class="create-data  dropdown-toggle proxima_nova_bold"
                            data-bs-toggle="offcanvas" data-bs-target="#view-toggle-right"
                            aria-controls="view-toggle-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.33238 2.64766C3.84993 2.64766 2.64766 3.84993 2.64766 5.33238V10.6679C2.64766 12.1504 3.84993 13.3527 5.33238 13.3527H10.6679C12.1504 13.3527 13.3527 12.1504 13.3527 10.6679V5.33238C13.3527 3.84993 12.1504 2.64766 10.6679 2.64766H5.33238ZM1.34766 5.33238C1.34766 3.13196 3.13196 1.34766 5.33238 1.34766H10.6679C12.8684 1.34766 14.6527 3.13196 14.6527 5.33238V10.6679C14.6527 12.8684 12.8684 14.6527 10.6679 14.6527H5.33238C3.13196 14.6527 1.34766 12.8684 1.34766 10.6679V5.33238Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.08204 5.50149C7.07982 4.99121 7.49381 4.58203 7.99811 4.58203C8.50307 4.58203 8.91551 4.99057 8.91551 5.49877C8.91551 6.00503 8.50502 6.4155 7.99877 6.4155C7.49342 6.4155 7.08351 6.00648 7.08204 5.50149Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 7.62305C6.75 7.20883 7.08579 6.87305 7.5 6.87305H8.16694C8.58116 6.87305 8.91694 7.20883 8.91694 7.62305V10.791C8.91694 11.2052 8.58116 11.541 8.16694 11.541C7.75273 11.541 7.41694 11.2052 7.41694 10.791V8.3685C7.04181 8.32717 6.75 8.00919 6.75 7.62305Z"
                                    fill="#808080" />
                            </svg>
                        </div>
                    </div>';
                $data_val[] = $postnestedData;

            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw" => intval($draw_val),
            "recordsTotal" => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data" => $data_val,
        );
        echo json_encode($get_json_data);
    }

    public function addNote(Request $request)
    {
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date)->format('Y-m-d');
        $staff_id = Attendance::where('id', $request->attendance_id)->value('staff_id');
        $add_note = Attendance::where('staff_id', $staff_id)->where('date', $date)->update(['note' => $request->note_area]);
        if (!$add_note) {
            return response()->json(['message' => 'error', 'status' => 0]);
        } else {
            return response()->json(['message' => 'Note added.', 'status' => 1]);
        }
    }

    public function displayNoteAndLog(Request $request)
    {
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date)->format('d M | D');
        $staff_note = Attendance::with(['StaffNote', 'StaffLog.User', 'StaffLog' => function($query){
            $query->orderBy('created_at','desc');
        }])->where('id', $request->attendance_id)->get();
        $logTimes = [];
        foreach ($staff_note[0]['StaffLog'] as $note) {
            if ($note) {
                $updatedTime = Carbon::parse($note['updated_at']);
                $indianTime = $updatedTime->tz('Asia/Kolkata');
                $logTime = $indianTime->format('d F, h:i A');
                $logTimes[] = $logTime;
            }
        }
        return response()->json(['message' => 'success', 'status' => 1, 'data' => $staff_note, 'date' => $date, 'log_time' => $logTimes]);
    }

    public function changeAttendanceStatus(Request $request)
    {
        $staff_count = Staff::where('business_id', $this->business_id)->where('is_deactivate',0)->count();
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date)->format('Y-m-d');
        
        
        $staff_id = Attendance::where('id', $request->id)->value('staff_id');
        $staff_name = Staff::where('id', $staff_id)->value('name');
        $attendance_date = Attendance::where('id', $request->id)->where('staff_id', $staff_id)->value('date');
        $attendance = Attendance::where('staff_id', $staff_id)->where('date', $attendance_date)->orderBy('created_at', 'desc')->get()->take(1);
        if($attendance[0]->in_time){
            $status = Attendance::where('staff_id', $staff_id)->where('date', $attendance_date)->update(['status' => $request->status,]);
        } else {
            $status = Attendance::where('staff_id', $staff_id)->where('date', $attendance_date)->update(['status' => $request->status, 'in_time' => Carbon::Now('Asia/Kolkata')->toTimeString()]);
        }
        // if($request->status == "Absent"){
        //     $status = Attendance::where('staff_id', $staff_id)->where('date', $attendance_date)->update(['status' => $request->status,'in_time' => null, 'out_time' => null, 'total_time' => null,'break_time' => null, ]);
        // } else {
            // $status = Attendance::where('staff_id', $staff_id)->where('date', $attendance_date)->update(['status' => $request->status, 'in_time' => Carbon::Now('Asia/Kolkata')->toTimeString()]);
        // }

        $present_count = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->where('status', 'LIKE', 'Present')
            ->distinct('staff_id')
            ->count();

        // $absent_count = Attendance::whereHas('Staff', function ($query){
        //         $query->where('business_id', $this->business_id);
        //     })
        //     ->where(function ($query) use ($date) {
        //         if ($date !== null) {
        //             $query->where('date', $date);
        //         } else {
        //             $query->where('date', Carbon::now()->toDateString());
        //         }
        //     })
        //     ->where('status', 'LIKE', 'Absent')
        //     ->distinct('staff_id')
        //     ->count();

        $half_day = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->where('status', 'LIKE', 'Half Day')
            ->distinct('staff_id')
            ->count();

        $paid_leave = Attendance::whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->where('status', 'LIKE', 'Paid Leave')
            ->distinct('staff_id')
            ->count();        
        $absent_count = $staff_count - ($present_count + $half_day + $paid_leave);
        // $status = Attendance::where('id', $request->id)->update(['status' => $request->status]);
        // $staff_id = Attendance::where('id', $request->id)->value('staff_id');
        $admin = Auth::user();
        // if (Log::where('staff_id', $staff_id)->where('log_by', $admin['id'])->whereDate('created_at', Carbon::now())->exists()) {
        //     Log::where('staff_id', $staff_id)->where('log_by', $admin['id'])->whereDate('created_at', Carbon::now())->update(['detail' => $request->status]);
        // } else {
            $log = Log::insert(['staff_id' => $staff_id, 'log_by' => $admin['id'], 'detail' => $request->status]);
        // }
        // return $this->attendanceOnDateChange($request);
        return response()->json(['message' => $staff_name .' marked '. $request->status.' Successfully', 'status' => 1,'present_count' => $present_count, 'absent_count' => $absent_count, 'half_day' => $half_day, 'paid_leave' => $paid_leave]);
    }

    // public function review_fines()
    // {
    //     $header_title = "Attendance";
    //     return view('attendance::review_fine', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    // }

    // public function allReviewFine(Request $request)
    // {
    //     DB::statement("SET SQL_MODE=''");
    //     $business_id = Session::get('business_id');
    //     $totalFilteredRecord = $totalDataRecord = $draw_val = "";
    //     $columns_list = array(
    //         0 => 'name',
    //         1 => 'late_time',
    //         2 => 'reason',
    //         3 => 'salary',
    //         4 => 'total',
    //         5 => 'action',
    //     );
    //     $search_text = $request->searchValue;
    //     $calender_date = str_replace(',', '', $request->calender_date);
    //     $date = Carbon::parse($calender_date)->format('Y-m-d');

    //     $totalDataRecord = Attendance::with(['Staff' => function ($query){
    //         $query->where('business_id', $business_id);
    //     }])
    //         ->whereHas('Staff', function ($query){
    //             $query->where('business_id', $business_id);
    //         })
    //         ->where(function ($query) use ($date) {
    //             if ($date !== null) {
    //                 $query->where('date', $date);
    //             } else {
    //                 $query->where('date', Carbon::now()->toDateString());
    //             }
    //         })
    //         ->distinct('staff_id')
    //         ->count();

    //     if ($search_text == null or $date == null) {
    //         $post_data = Attendance::with(['Staff.StaffPhoto', 'Staff.Department', 'Staff' => function ($query){
    //             $query->where('business_id', $business_id);
    //         }])
    //             ->where(function ($query) use ($date) {
    //                 if ($date !== null) {
    //                     $query->where('date', $date);
    //                 } else {
    //                     $query->where('date', Carbon::now()->toDateString());
    //                 }
    //             })
    //             ->whereHas('Staff', function ($query){
    //                 $query->where('business_id', $business_id);
    //             })
    //             ->groupBy('staff_id')
    //             ->get();
    //     } else {
    //         $post_data = Attendance::with(['Staff.StaffPhoto', 'Staff.Department', 'Staff' => function ($query) use ($business_id, $search_text) {
    //             $query->where('business_id', $business_id)->where('name', 'LIKE', "%{$search_text}%");
    //         }])
    //             ->where(function ($query) use ($date) {
    //                 if ($date !== null) {
    //                     $query->where('date', $date);
    //                 } else {
    //                     $query->where('date', Carbon::now()->toDateString());
    //                 }
    //             })
    //             ->whereHas('Staff', function ($query) use ($business_id, $search_text) {
    //                 $query->where('business_id', $business_id)->where('name', 'LIKE', "%{$search_text}%");
    //             })
    //             ->groupBy('staff_id')
    //             ->get();

    //         $totalFilteredRecord = Attendance::with(['Staff' => function ($query) use ($business_id, $search_text) {
    //             $query->where('business_id', $business_id)->where('name', 'LIKE', "%{$search_text}%");
    //         }])
    //             ->where(function ($query) use ($date) {
    //                 if ($date !== null) {
    //                     $query->where('date', $date);
    //                 } else {
    //                     $query->where('date', Carbon::now()->toDateString());
    //                 }
    //             })
    //             ->whereHas('Staff', function ($query) use ($business_id, $search_text) {
    //                 $query->where('business_id', $business_id)->where('name', 'LIKE', "%{$search_text}%");
    //             })
    //             ->groupBy('staff_id')
    //             ->count();
    //     }
    //     $data_val = array();
    //     if (!empty($post_data)) {
    //         foreach ($post_data as $post_val) {
    //             $shift_time = Carbon::parse("09:00:00");
    //             $inTime = Carbon::parse($post_val->in_time);
    //             if ($inTime) {
    //                 $hour = $inTime->diffInHours($shift_time);
    //                 $minutes = $inTime->diffInMinutes($shift_time) % 60;
    //                 if ($hour > 0 && $minutes > 0) {
    //                     $formattedTimeDifference = sprintf("%02d:%02d Hrs", $hour, $minutes);
    //                 } elseif ($hour > 0) {
    //                     $formattedTimeDifference = sprintf("%02d Hrs", $hour);
    //                 } elseif ($minutes > 0) {
    //                     $formattedTimeDifference = sprintf("%02d Mins", $minutes);
    //                 }
    //             } else {
    //                 $formattedTimeDifference = '-';
    //             }
    //             $postnestedData['id'] = $post_val->id;

    //             foreach ($post_val->Staff as $staff) {
    //                 $postnestedData['name'] = $staff['name'];
    //                 $postnestedData['staff_photo'] = url('/assets/admin/images/staff_photos/' . $staff['StaffPhoto'][0]['photo']);
    //                 $postnestedData['department_name'] = $staff['Department']['name'];
    //             }
    //             $postnestedData['late_time'] = $formattedTimeDifference;
    //             $postnestedData['reason'] = $post_val->name;
    //             $postnestedData['salary'] = '<div class="filters sidebar-select select_mate_option atten-salary">
    //                             <select id="main_select_services"
    //                                 class="form-select create-select section_sub_title select-club-services"
    //                                 name="club-services">
    //                                 <option value="">Fixed Amount</option>
    //                                 <option value="Salary" selected>1x Salary</option>
    //                                 <option value="Salary">1.5x Salary</option>
    //                                 <option value="Salary">2x Salary</option>
    //                                 <option value="Salary">Add Custom Salary Multiple</option>
    //                             </select>
    //                         </div>';
    //             $postnestedData['total'] = $post_val->name;
    //             $postnestedData['action'] = '
    //                 <div class="approve-main-sec">
    //                     <button class="atten-coming-btn approve_success"><svg
    //                             xmlns="http://www.w3.org/2000/svg" width="16" height="16"
    //                             viewBox="0 0 16 16" fill="none">
    //                         <path fill-rule="evenodd" clip-rule="evenodd"
    //                             d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
    //                             fill="#808080" />
    //                         </svg>
    //                     </button>
    //                     <button class="atten-coming-btn reject_danger"><svg
    //                                     xmlns="http://www.w3.org/2000/svg" width="16" height="16"
    //                                     viewBox="0 0 16 16" fill="none">
    //                                     <path fill-rule="evenodd" clip-rule="evenodd"
    //                                         d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
    //                                         fill="#808080" />
    //                                     <path fill-rule="evenodd" clip-rule="evenodd"
    //                                         d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
    //                                         fill="#808080" />
    //                                 </svg></button>

    //                 </div>';
    //             $data_val[] = $postnestedData;

    //         }
    //     }
    //     $draw_val = $request->input('draw');
    //     $get_json_data = array(
    //         "draw" => intval($draw_val),
    //         "recordsTotal" => intval($totalDataRecord),
    //         "recordsFiltered" => intval($totalFilteredRecord),
    //         "data" => $data_val,
    //     );
    //     echo json_encode($get_json_data);
    // }

    // public function review_overtime()
    // {
    //     $header_title = "Attendance";
    //     return view('attendance::review_overtime', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    // }

    public function attendancePunches()
    {
        $header_title = "Attendance";
        return view('attendance::attendance_punches', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    }

    public function allAttendancePunches(Request $request)
    {
        DB::statement("SET SQL_MODE=''");
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'name',
            1 => 'break_time',
            2 => 'in_time',
            3 => 'out_time',
            4 => 'total_time',
            5 => 'action',
        );
        $search_text = $request->searchValue;
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date)->format('Y-m-d');

        $totalDataRecord = Attendance::with(['Staff' => function ($query){
            $query->where('business_id', $this->business_id);
            }])
            ->whereHas('Staff', function ($query){
                $query->where('business_id', $this->business_id);
            })
            ->where(function ($query) use ($date) {
                if ($date !== null) {
                    $query->where('date', $date);
                } else {
                    $query->where('date', Carbon::now()->toDateString());
                }
            })
            ->distinct('staff_id')
            ->count();
        if ($search_text == null or $date == null) {
            $post_data = Attendance::with(['Staff.StaffPhoto', 'Staff.Department', 'Staff' => function ($query){
                $query->where('business_id', $this->business_id);
            }])
                ->where(function ($query) use ($date) {
                    if ($date !== null) {
                        $query->where('date', $date);
                    } else {
                        $query->where('date', Carbon::now()->toDateString());
                    }
                })
                ->whereHas('Staff', function ($query){
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
                        $query->where('date', $date);
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
                $query->where('business_id', $this->business_id)->where('name', 'LIKE', "%{$search_text}%");
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
                ->groupBy('staff_id')
                ->count();
        }
        $data_val = array();
        if (!empty($post_data)) {
            foreach ($post_data as $post_val) {
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
                $last_out_time = Attendance::where('staff_id', $post_val->staff_id)->where(function ($query) use ($date) {
                    if ($date !== null) {
                        $query->where('date', $date);
                    } else {
                        $query->where('date', Carbon::now()->toDateString());
                    }
                })->orderBy('id','desc')->limit(1)->first();
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
                } else{
                    $total_time = '-';
                }
                
                $postnestedData['id'] = $post_val->id;

                foreach ($post_val->Staff as $staff) {
                    $postnestedData['name'] = $staff['name'];
                    $postnestedData['staff_photo'] = url('/assets/admin/images/staff_photos/' . $staff['StaffPhoto'][0]['photo']);
                    $postnestedData['department_name'] = $staff['Department']['name'];
                }
                $postnestedData['break_time'] = $formatted_time;
                $postnestedData['in_time'] = Carbon::parse($post_val->in_time)->format('h:i');
                $postnestedData['out_time'] = $punchout_time;
                $postnestedData['total_time'] = $total_time;
                $postnestedData['action'] = '
                    <div class="approve-main-sec">
                        <button class="atten-coming-btn approve_success"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.6882 3.98043C13.8835 4.17569 13.8835 4.49228 13.6882 4.68754L6.35486 12.0209C6.15959 12.2161 5.84301 12.2161 5.64775 12.0209L2.31442 8.68754C2.11915 8.49228 2.11915 8.17569 2.31442 7.98043C2.50968 7.78517 2.82626 7.78517 3.02152 7.98043L6.0013 10.9602L12.9811 3.98043C13.1763 3.78517 13.4929 3.78517 13.6882 3.98043Z"
                                fill="#808080" />
                            </svg>
                        </button>
                        <button class="atten-coming-btn reject_danger"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.84154 2.84154C3.07296 2.61011 3.44817 2.61011 3.67959 2.84154L13.1611 12.323C13.3925 12.5544 13.3925 12.9296 13.1611 13.1611C12.9296 13.3925 12.5544 13.3925 12.323 13.1611L2.84154 3.67959C2.61011 3.44817 2.61011 3.07296 2.84154 2.84154Z"
                                fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.1611 2.84154C13.3925 3.07296 13.3925 3.44817 13.1611 3.67959L3.67959 13.1611C3.44817 13.3925 3.07296 13.3925 2.84154 13.1611C2.61011 12.9296 2.61011 12.5544 2.84154 12.323L12.323 2.84154C12.5544 2.61011 12.9296 2.61011 13.1611 2.84154Z"
                                fill="#808080" />
                        </svg>
                        </button>
                    </div>';
                $data_val[] = $postnestedData;
            }
        }
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw" => intval($draw_val),
            "recordsTotal" => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data" => $data_val,
        );
        echo json_encode($get_json_data);
    }
    public function deleteCheckedPunches(Request $request){
        $ids = $request->selectedIds;
        $calender_date = str_replace(',', '', $request->calender_date);
        $date = Carbon::parse($calender_date)->format('Y-m-d');
        foreach($ids as $id){
            $staff_id = Attendance::where('id', $id)->value('staff_id');
            $attendance_id = Attendance::where('staff_id', $staff_id)->where('date', $date)->pluck('id');
            $delete = Attendance::whereIn('id', $attendance_id)->delete();
        }
        if (!$delete) {
            return response()->json(['message' => 'error', 'status' => 0]);
        } else {
            return response()->json(['message' => 'Delete selected reocrd', 'status' => 1]);
        }
    }
    public function attendanceLeave()
    {
        $header_title = "Attendance";
        return view('attendance::attendance_leave', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    }
    public function attendanceSettings()
    {
        $header_title = "Attendance";
        return view('attendance::attendance_settings', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('attendance::create');
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
        return view('attendance::show');
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('attendance::edit');
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
