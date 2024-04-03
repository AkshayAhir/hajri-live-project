<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\Business;
use App\Models\BusinessUser;
use App\Models\Staff;
use App\Models\UserPhoto;
use App\Models\HolidayPolicy;
use App\Models\HolidayList;
use App\Models\HolidayPolicyToStaff;
use App\Models\WeeklyHolidayBusiness;
use App\Models\WeeklyHolidayStaff;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;

class WeeklyHolidayPolicyController extends Controller
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
    public function index()
    {
        $header_title = "Business Settings";
        return view('setting::weeklyholidaypolicy.business_settings_weekly_holiday_policy_business_level', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile, 'business_id' => $this->business_id]);
    }

    public function staffLevel()
    {
        $header_title = "Business Settings";

        $sunday_staff = Staff::whereHas('WeeklyHolidayStaff', function($query){
            $query->where('business_id', $this->business_id)->where('days',1);
        });
        if($sunday_staff->count() > 10){
            $sunday = $sunday_staff->limit(5)->get();
        } else {
            $sunday = $sunday_staff->get();
        }

        $monday_staff = Staff::whereHas('WeeklyHolidayStaff', function($query){
            $query->where('business_id', $this->business_id)->where('days',2);
        });
        if($monday_staff->count() > 10){
            $monday = $monday_staff->limit(5)->get();
        } else {
            $monday = $monday_staff->get();
        }
        $tuesday_staff = Staff::whereHas('WeeklyHolidayStaff', function($query){
            $query->where('business_id', $this->business_id)->where('days',3);
        });
        if($tuesday_staff->count() > 10){
            $tuesday = $tuesday_staff->limit(5)->get();
        } else {
            $tuesday = $tuesday_staff->get();
        }

        $wednesday_staff = Staff::whereHas('WeeklyHolidayStaff', function($query){
            $query->where('business_id', $this->business_id)->where('days',4);
        });
        if($wednesday_staff->count() > 10){
            $wednesday = $wednesday_staff->limit(5)->get();
        } else {
            $wednesday = $wednesday_staff->get();
        }

        $thursday_staff = Staff::whereHas('WeeklyHolidayStaff', function($query){
            $query->where('business_id', $this->business_id)->where('days',5);
        });
        if($thursday_staff->count() > 10){
            $thursday = $thursday_staff->limit(5)->get();
        } else {
            $thursday = $thursday_staff->get();
        }

        $friday_staff = Staff::whereHas('WeeklyHolidayStaff', function($query){
            $query->where('business_id', $this->business_id)->where('days',6);
        });
        if($friday_staff->count() > 10){
            $friday = $friday_staff->limit(5)->get();
        } else {
            $friday = $friday_staff->get();
        }

        $saturday_staff = Staff::whereHas('WeeklyHolidayStaff', function($query){
            $query->where('business_id', $this->business_id)->where('days',7);
        });
        if($saturday_staff->count() > 10){
            $saturday = $saturday_staff->limit(5)->get();
        } else {
            $saturday = $saturday_staff->get();
        }

        $sunday_count = $sunday_staff->count();
        $monday_count = $monday_staff->count();
        $tuesday_count = $tuesday_staff->count();
        $wednesday_count = $wednesday_staff->count();
        $thursday_count = $thursday_staff->count();
        $friday_count = $friday_staff->count();
        $saturday_count = $saturday_staff->count();

        return view('setting::weeklyholidaypolicy.business_settings_weekly_holiday_policy_staff_level', [
            'header_title' => $header_title, 
            'business' => $this->business, 
            'user_profile' => $this->user_profile,
            'sunday_staff' => $sunday,
            'monday_staff' => $monday,
            'tuesday_staff' => $tuesday,
            'wednesday_staff' => $wednesday,
            'thursday_staff' => $thursday,
            'friday_staff' => $friday,
            'saturday_staff' => $saturday,
            'sunday_count' => $sunday_count,
            'monday_count' => $monday_count,
            'tuesday_count' => $tuesday_count,
            'wednesday_count' => $wednesday_count,
            'thursday_count' => $thursday_count,
            'friday_count' => $friday_count,
            'saturday_count' => $saturday_count,
        ]); 
    }

    public function staffManage()
    {
        $day = request()->day;
<<<<<<< HEAD
        $staff_day = request()->staff_day;
        $header_title = "Business Settings";
        return view('setting::weeklyholidaypolicy.business_settings_weekly_holiday_policy_manage_staff_list', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile, 'day' => $day, 'staff_day' => $staff_day]);
=======
        $business_id = Session::get('business_id');
        $header_title = "Business Settings";
        return view('setting::weeklyholidaypolicy.business_settings_weekly_holiday_policy_manage_staff_list', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile, 'day' => $day]);
>>>>>>> 9ee7d98de403d43c1e001aefae0ecaf8228cb55b
    }

    public function saveWeeklyBusinessHoliday(Request $request)
    {
        if($request->checkDays){
            foreach($request->checkDays as $checkDays){
                if(!WeeklyHolidayBusiness::where('business_id', $this->business_id)->where('days', $checkDays)->exists()){
                    $business_holiday = WeeklyHolidayBusiness::insert(['business_id' => $this->business_id, 'days' => $checkDays]);
                }
            }
        }

        if($request->uncheckDays){
            foreach($request->uncheckDays as $uncheckDays){
                if(WeeklyHolidayBusiness::where('business_id', $this->business_id)->where('days', $uncheckDays)->exists()){
                    $business_holiday = WeeklyHolidayBusiness::where('business_id', $this->business_id)->where('days', $uncheckDays)->delete();
                }
            }
        }
        return response()->json(["message" => 'Business holiday saved.', "status" => 1,]);
    }
    
    public function weeklyholidaystaffList(Request $request){
        $business = Business::where('id', $this->business_id)->first();
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'staff_id',
            3 =>'salary_payment_type',
            4 =>'phone_number',
        );
        $search_text = $request->searchValue;
        $day = $request->day;
        $staff_day = $request->staff_day;
        $staff_holiday = WeeklyHolidayStaff::whereNotIn('days',[$staff_day])->pluck('staff_id');
        $day_holiday = WeeklyHolidayStaff::whereNotIn('days',[$day])->pluck('staff_id');
        if($staff_day){
            $totalDataRecord = Staff::whereHas('WeeklyHolidayStaff', function($query) use ($staff_day){
                if($staff_day){
                    $query->where('days', $staff_day);
                }
            })->whereNotIn('id', $staff_holiday)->where('business_id',$this->business_id)->where('is_deactivate',0)->count();

            if($search_text == null) {
                $post_data = Staff::whereHas('WeeklyHolidayStaff', function($query) use ($staff_day){
                    if($staff_day){
                        $query->where('days', $staff_day);
                    }
                })->with(['Department','StaffPhoto'])->whereNotIn('id', $staff_holiday)->where('business_id',$this->business_id)->where('is_deactivate',0)->get();
            } else {
                $post_data =  Staff::whereHas('WeeklyHolidayStaff', function($query) use ($staff_day){
                    if($staff_day){
                        $query->where('days', $staff_day);
                    }
                })->whereNotIn('id', $staff_holiday)->where('business_id',$this->business_id)->where('is_deactivate',0)->where('name','LIKE',"%{$search_text}%")->orWhere('phone_number','LIKE',"%{$search_text}%")
                    ->get();
                $totalFilteredRecord = Staff::whereHas('WeeklyHolidayStaff', function($query) use ($staff_day){
                    if($staff_day){
                        $query->where('days', $staff_day);
                    }
                })->with(['Department','StaffPhoto'])->whereNotIn('id', $staff_holiday)->where('business_id',$this->business_id)->where('is_deactivate',0)->where('name','LIKE',"%{$search_text}%")->orWhere('phone_number','LIKE',"%{$search_text}%")
                    ->count();
            }
            $data_val = array();
            if(!empty($post_data)) {
                foreach ($post_data as $post_val) {
                    $url = url('/assets/admin/images/dummy/dummy-user.png');
                    if(!empty($post_val->staffPhoto[0]->photo)){
                        $url = url('/assets/admin/images/staff_photos/'.$post_val->staffPhoto[0]->photo);
                    }
                    // if($day){
                        $apply_staff = WeeklyHolidayStaff::where('staff_id', $post_val->id)->where('days', $staff_day)->value('staff_id');
                    // }
                    $postnestedData['id'] = $post_val->id;
                    $postnestedData['apply_id'] = $apply_staff;
                    $postnestedData['name'] =  $post_val->name;
                    $postnestedData['staff_photo'] = $url;
                    $postnestedData['department_name'] = $post_val->department['name'];
                    $postnestedData['staff_id'] = substr($business['name'], 0, 3).''.$post_val->id;
                    $postnestedData['salary_payment_type'] = $post_val->salary_payment_type;
                    $postnestedData['phone_number'] =  '+91 '.$post_val->phone_number;
                    $data_val[] = $postnestedData;
    
                }
            }
        } else {
            $totalDataRecord = Staff::where('business_id',$this->business_id)->where('is_deactivate',0)->whereNotIn('id', $day_holiday)->count();
            if($search_text == null) {
                $post_data = Staff::with(['Department','StaffPhoto'])->where('is_deactivate',0)->whereNotIn('id', $day_holiday)->where('business_id',$this->business_id)->get();
            } else {
                $post_data =  Staff::where('business_id',$this->business_id)->where('is_deactivate',0)->whereNotIn('id', $day_holiday)->where('name','LIKE',"%{$search_text}%")->orWhere('phone_number','LIKE',"%{$search_text}%")
                    ->get();
                $totalFilteredRecord = Staff::with(['Department','StaffPhoto'])->whereNotIn('id', $day_holiday)->where('is_deactivate',0)->where('business_id',$this->business_id)->where('name','LIKE',"%{$search_text}%")->orWhere('phone_number','LIKE',"%{$search_text}%")
                    ->count();
            }
            $data_val = array();
            if(!empty($post_data)) {
                foreach ($post_data as $post_val) {
                    $url = url('/assets/admin/images/dummy/dummy-user.png');
                    if(!empty($post_val->staffPhoto[0]->photo)){
                        $url = url('/assets/admin/images/staff_photos/'.$post_val->staffPhoto[0]->photo);
                    }
                    // if($day){
                        $apply_staff = WeeklyHolidayStaff::where('staff_id', $post_val->id)->where('days', $day)->value('staff_id');
                    // }
                    $postnestedData['id'] = $post_val->id;
                    $postnestedData['apply_id'] = $apply_staff;
                    $postnestedData['name'] =  $post_val->name;
                    $postnestedData['staff_photo'] = $url;
                    $postnestedData['department_name'] = $post_val->department['name'];
                    $postnestedData['staff_id'] = substr($business['name'], 0, 3).''.$post_val->id;
                    $postnestedData['salary_payment_type'] = $post_val->salary_payment_type;
                    $postnestedData['phone_number'] =  '+91 '.$post_val->phone_number;
                    $data_val[] = $postnestedData;
    
                }
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

    public function weeklyHolidayToStaff(Request $request){
        if($request->staff_day){
            if($request->selectedIds){
                foreach($request->selectedIds as $selectedIds){
                    if(!WeeklyHolidayStaff::where('staff_id',$selectedIds)->where('days', $request->staff_day)->exists()){
                       $apply_policy = WeeklyHolidayStaff::insert(['staff_id' => $selectedIds, 'days' => $request->staff_day]);
                    } 
                }
            }
            if($request->unselectedIds){
                foreach($request->unselectedIds as $unselectedIds){
                    if(WeeklyHolidayStaff::where('staff_id',$unselectedIds)->where('days', $request->staff_day)->exists()){
                       $apply_policy = WeeklyHolidayStaff::where('staff_id' , $unselectedIds)->where('days', $request->staff_day)->delete();
                    }
                }            
            }
            return response()->json(["message" => 'Weekly Holiday policy apply to staff successfully.', "status" => 1,]);
        } else {
            if($request->selectedIds){
                foreach($request->selectedIds as $selectedIds){
                    if(!WeeklyHolidayStaff::where('staff_id',$selectedIds)->where('days', $request->day)->exists()){
                       $apply_policy = WeeklyHolidayStaff::insert(['staff_id' => $selectedIds, 'days' => $request->day]);
                    } 
                }
            }
            if($request->unselectedIds){
                foreach($request->unselectedIds as $unselectedIds){
                    if(WeeklyHolidayStaff::where('staff_id',$unselectedIds)->where('days', $request->day)->exists()){
                       $apply_policy = WeeklyHolidayStaff::where('staff_id' , $unselectedIds)->where('days', $request->day)->delete();
                    }
                }            
            }
            return response()->json(["message" => 'Weekly Holiday policy apply to staff successfully.', "status" => 1,]);
        }
    }

    public function businessHoliday(Request $request){
        $business_holiday = WeeklyHolidayBusiness::where('business_id', $this->business_id)->pluck('days');
        if($business_holiday){
            return response()->json(["message" => 'success', "status" => 1, 'business_holiday' => $business_holiday]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
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
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('setting::edit');
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
