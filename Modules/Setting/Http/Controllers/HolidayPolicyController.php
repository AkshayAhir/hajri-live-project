<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

// use App\Models\Attendance;
use App\Models\Business;
use App\Models\BusinessUser;
use App\Models\Staff;
use App\Models\UserPhoto;
use App\Models\HolidayPolicy;
use App\Models\HolidayList;
use App\Models\HolidayPolicyToStaff;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;


class HolidayPolicyController extends Controller
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
        return view('setting::holidaypolicy.business_settings_holiday_policy', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }

    public function holidayTemplate(Request $request)
    {
        $id = request('id');
        $holiday_template = HolidayPolicy::where('id',$id)->first();
        $holiday_list = HolidayList::where('template_id',$id)->get();
        $header_title = "Holiday Policy";
        return view('setting::holidaypolicy.business_settings_edit_template', 
            [
                'header_title' => $header_title, 
                'business' => $this->business, 
                'user_profile' => $this->user_profile,
                'holiday_template' => $holiday_template,
                'holiday_list' => $holiday_list,
                'id' => $id,
            ]
        );
    }

    public function holidayTemplateList(Request $request){ 
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 => 'name',
            1 => 'number_of_holiday',
            2 => 'apply_to',
            3 => 'action',
        );
        
        $totalDataRecord = HolidayPolicy::where('business_id', $this->business_id)->count();

        $post_data = HolidayPolicy::where('business_id', $this->business_id)->get();
        $totalFilteredRecord = HolidayPolicy::where('business_id', $this->business_id)->count();
        
        $data_val = array();
        if (!empty($post_data)) {
            foreach ($post_data as $post_val) {
                $apply_to = HolidayPolicyToStaff::where('template_id',$post_val->id)->count();
                $number_of_holiday = HolidayList::where('template_id',$post_val->id)->count();

                $postnestedData['name'] = $post_val->name;
                $postnestedData['number_of_holiday'] = $number_of_holiday.' Holiday’s';
                $postnestedData['apply_to'] = 'Applied to '.$apply_to.' Staff’s';
                $postnestedData['action'] = '
                    <div class="approve-main-sec">
                        <a href="'.route('manage_staff_list',['id' => $post_val->id]).'" class="create-data"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.0641 9.12744C12.4619 9.12744 12.7844 9.44994 12.7844 9.84776V10.5865C12.7844 10.9844 12.4619 11.3069 12.0641 11.3069C11.6662 11.3069 11.3438 10.9844 11.3438 10.5865V9.84776C11.3438 9.44994 11.6662 9.12744 12.0641 9.12744Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.0641 12.8198C12.4619 12.8198 12.7844 13.1423 12.7844 13.5401V14.2789C12.7844 14.6767 12.4619 14.9992 12.0641 14.9992C11.6662 14.9992 11.3438 14.6767 11.3438 14.2789V13.5401C11.3438 13.1423 11.6662 12.8198 12.0641 12.8198Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.51253 10.6062C9.70573 10.2585 10.1443 10.1332 10.492 10.3264L11.1569 10.6958C11.5047 10.889 11.63 11.3275 11.4368 11.6753C11.2436 12.023 10.805 12.1483 10.4573 11.9551L9.79238 11.5857C9.44463 11.3925 9.31933 10.954 9.51253 10.6062Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.6899 12.4524C12.8831 12.1047 13.3216 11.9794 13.6694 12.1726L14.3343 12.542C14.6821 12.7352 14.8073 13.1737 14.6141 13.5214C14.4209 13.8692 13.9824 13.9945 13.6347 13.8013L12.9698 13.4319C12.622 13.2387 12.4967 12.8002 12.6899 12.4524Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.4368 12.4524C11.63 12.8002 11.5047 13.2387 11.1569 13.4319L10.492 13.8013C10.1443 13.9945 9.70573 13.8692 9.51253 13.5214C9.31933 13.1737 9.44463 12.7352 9.79238 12.542L10.4573 12.1726C10.805 11.9794 11.2436 12.1047 11.4368 12.4524Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.6141 10.6062C14.8073 10.954 14.6821 11.3925 14.3343 11.5857L13.6694 11.9551C13.3216 12.1483 12.8831 12.023 12.6899 11.6753C12.4967 11.3275 12.622 10.889 12.9698 10.6958L13.6347 10.3264C13.9824 10.1332 14.4209 10.2585 14.6141 10.6062Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.5883 11.5384C12.2786 11.2287 11.8481 11.2287 11.5384 11.5384C11.2287 11.8481 11.2287 12.2786 11.5384 12.5883C11.8481 12.8981 12.2786 12.8981 12.5883 12.5883C12.8981 12.2786 12.8981 11.8481 12.5883 11.5384ZM13.607 10.5197C12.7347 9.6474 11.3921 9.6474 10.5197 10.5197C9.6474 11.3921 9.6474 12.7347 10.5197 13.607C11.3921 14.4793 12.7347 14.4793 13.607 13.607C14.4793 12.7347 14.4793 11.3921 13.607 10.5197Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.34502 3.12393C8.36634 2.21039 6.88355 2.21287 5.90762 3.13139C4.98183 4.00273 4.98937 5.53747 5.93848 6.5459C6.80981 7.47169 8.34455 7.46415 9.35298 6.51504C10.2954 5.62804 10.3207 4.10765 9.34502 3.12393ZM10.3375 2.0797C8.80419 0.639225 6.45263 0.640101 4.92026 2.08233C3.33418 3.57511 3.4744 6.02981 4.88941 7.53326C6.38219 9.11934 8.83689 8.97912 10.3403 7.56411C11.9064 6.09018 11.8844 3.62875 10.3586 2.10015C10.3552 2.09669 10.3517 2.09326 10.3482 2.08986C10.3447 2.08643 10.3411 2.08304 10.3375 2.0797Z"
                                    fill="#808080" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.04485 10.936C3.59571 10.936 2.44063 12.0911 2.44063 13.5402C2.44063 13.938 2.11814 14.2605 1.72032 14.2605C1.3225 14.2605 1 13.938 1 13.5402C1 11.2954 2.80007 9.49536 5.04485 9.49536H6.9657C7.36352 9.49536 7.68602 9.81786 7.68602 10.2157C7.68602 10.6135 7.36352 10.936 6.9657 10.936H5.04485Z"
                                    fill="#808080" />
                            </svg></a>
                        <a href="'.route('holiday_template',['id' => $post_val->id]).'" class="create-data">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M10.0996 15.0004H8.69961C8.29961 15.0004 8.09961 14.7004 8.09961 14.3004V12.9004C8.09961 12.5004 8.19961 12.2004 8.49961 11.9004L12.4996 7.80039C13.1996 7.10039 14.3996 7.10039 15.0996 7.80039C15.4996 8.20039 15.5996 8.60039 15.5996 9.10039C15.5996 9.60039 15.3996 10.1004 15.0996 10.4004L10.9996 14.4004C10.7996 14.8004 10.4996 15.0004 10.0996 15.0004ZM9.39961 13.7004H10.1996L14.2996 9.60039C14.3996 9.50039 14.4996 9.40039 14.4996 9.20039C14.4996 9.10039 14.3996 8.90039 14.2996 8.80039C14.0996 8.60039 13.6996 8.60039 13.4996 8.80039L9.49961 12.9004L9.39961 13.7004Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.80078 5.89922C3.80078 5.49922 4.10078 5.19922 4.50078 5.19922H10.1008C10.5008 5.19922 10.8008 5.49922 10.8008 5.89922C10.8008 6.29922 10.5008 6.59922 10.1008 6.59922H4.50078C4.10078 6.59922 3.80078 6.29922 3.80078 5.89922Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.80078 8.7C3.80078 8.3 4.10078 8 4.50078 8H8.00078C8.40078 8 8.70078 8.3 8.70078 8.7C8.70078 9.1 8.40078 9.4 8.00078 9.4H4.50078C4.10078 9.4 3.80078 9.1 3.80078 8.7Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.80078 11.5008C3.80078 11.1008 4.10078 10.8008 4.50078 10.8008H6.60078C7.00078 10.8008 7.30078 11.1008 7.30078 11.5008C7.30078 11.9008 7.00078 12.2008 6.60078 12.2008H4.50078C4.10078 12.2008 3.80078 11.9008 3.80078 11.5008Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6 8.79922C11.9 8.49922 12.3 8.49922 12.6 8.79922L14.3 10.4992C14.6 10.7992 14.6 11.1992 14.3 11.4992C14 11.7992 13.6 11.7992 13.3 11.4992L11.6 9.79922C11.3 9.49922 11.3 8.99922 11.6 8.79922Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 3.79922C1 2.59922 1.9 1.69922 3.1 1.69922H11.5C12.7 1.69922 13.6 2.59922 13.6 3.79922V5.89922C13.6 6.29922 13.3 6.59922 12.9 6.59922C12.5 6.59922 12.2 6.29922 12.2 5.89922V3.79922C12.2 3.39922 11.9 3.09922 11.5 3.09922H3.1C2.7 3.09922 2.4 3.39922 2.4 3.79922V12.8992C2.4 13.2992 2.7 13.5992 3.1 13.5992H5.9C6.3 13.5992 6.6 13.8992 6.6 14.2992C6.6 14.6992 6.3 14.9992 5.9 14.9992H3.1C1.9 14.9992 1 14.0992 1 12.8992V3.79922Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1004 1C10.5004 1 10.8004 1.3 10.8004 1.7V3.1C10.8004 3.5 10.5004 3.8 10.1004 3.8C9.70039 3.8 9.40039 3.5 9.40039 3.1V1.7C9.40039 1.3 9.70039 1 10.1004 1Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.29961 1C7.69961 1 7.99961 1.3 7.99961 1.7V3.1C7.99961 3.5 7.69961 3.8 7.29961 3.8C6.89961 3.8 6.59961 3.5 6.59961 3.1V1.7C6.59961 1.3 6.89961 1 7.29961 1Z" fill="#808080"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.50078 1C4.90078 1 5.20078 1.3 5.20078 1.7V3.1C5.20078 3.5 4.90078 3.8 4.50078 3.8C4.10078 3.8 3.80078 3.5 3.80078 3.1V1.7C3.80078 1.3 4.10078 1 4.50078 1Z" fill="#808080"/>
                                </svg></a>
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

    public function addEditHolidayTemplate(Request $request)
    {
        $id = request('id');
        if($id){
            if($request->holidays){
                // return $request;
                foreach($request->holidays as $holiday){
                    if(!HolidayList::where('template_id', $id)->where('holiday_name', $holiday['holiday_name'])->where('holiday_date', $holiday['holiday_date'])->exists()){
                        if(HolidayList::where('template_id', $id)->where('holiday_name', $holiday['holiday_name'])->exists()){
                            HolidayList::where('template_id', $id)->where('holiday_name', $holiday['holiday_name'])->update(['holiday_date' => $holiday['holiday_date']]);
                        } else if (HolidayList::where('template_id', $id)->where('holiday_date', $holiday['holiday_date'])->exists()){
                            HolidayList::where('template_id', $id)->where('holiday_date', $holiday['holiday_date'])->update(['holiday_name' => $holiday['holiday_name']]);
                        } else {
                            HolidayList::insert(['template_id' => $id ,'holiday_name' => $holiday['holiday_name'], 'holiday_date' => $holiday['holiday_date']]);
                        }
                    } else {
                        HolidayList::where('template_id', $id)->where('holiday_name', $holiday['holiday_name'])->where('holiday_date', $holiday['holiday_date'])->update(['holiday_name' => $holiday['holiday_name'], 'holiday_date' => $holiday['holiday_date']]);
                    }
                }
            }
            // if(HolidayPolicy::where('name', $request->template_name)->where('shift_start_time', $request->shift_start_time)->where('shift_end_time',$request->shift_end_time)->where('business_id', $business_id)->exists()){
            //     $template_id = HolidayPolicy::where('name', $request->template_name)->where('shift_start_time', $request->shift_start_time)->where('shift_end_time',$request->shift_end_time)->value('id');
            //     if($template_id){
            //         return response()->json(["message" => 'Template already exists', "status" => 0]);
            //     }
            // } else {
                $template_id = HolidayPolicy::where('id', $id)->update(array_filter(['name' => $request->template_name,'shift_start_time' => $request->shift_start_time, 'shift_end_time' => $request->shift_end_time]));
                if($template_id){
                    return response()->json(["message" => 'Update Template Successfully', "status" => 1]);
                }
            // }
        } else {
            if(HolidayPolicy::where('name', $request->template_name)->where('shift_start_time', $request->shift_start_time)->where('shift_end_time',$request->shift_end_time)->where('business_id', $this->business_id)->exists()){
                $template_id = HolidayPolicy::where('name', $request->template_name)->where('shift_start_time', $request->shift_start_time)->where('shift_end_time',$request->shift_end_time)->value('id');
                if($request->holidays){
                    // return $request;
                    foreach($request->holidays as $holiday){
                        if(!HolidayList::where('template_id', $template_id)->where('holiday_name', $holiday['holiday_name'])->where('holiday_date', $holiday['holiday_date'])->exists()){
                            HolidayList::insert(['template_id' => $template_id ,'holiday_name' => $holiday['holiday_name'], 'holiday_date' => $holiday['holiday_date']]);
                        }
                    }
                }
                if($template_id){
                    return response()->json(["message" => 'Template already exists', "status" => 0]);
                }
            } else {
                $id = HolidayPolicy::insertGetId(['name' => $request->template_name, 'shift_start_time' => $request->shift_start_time, 'shift_end_time' => $request->shift_end_time, 'business_id'=>$this->business_id]);
                if($request->holidays){
                    // return $request;
                    foreach($request->holidays as $holiday){
                        if(!HolidayList::where('template_id', $id)->where('holiday_name', $holiday['holiday_name'])->where('holiday_date', $holiday['holiday_date'])->exists()){
                            HolidayList::insert(['template_id' => $id ,'holiday_name' => $holiday['holiday_name'], 'holiday_date' => $holiday['holiday_date']]);
                        }
                    }
                }
                // return $this->holidayTemplate($request,$id);
                if($id){
                    return response()->json(["message" => 'Template add successfully', "status" => 1, 'id' => $id]);
                }else{
                    return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
                }
            }
        }
        // $header_title = "Holiday Policy";
        // return view('setting::holidaypolicy.business_settings_manage_staff_list', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile,]);
    }

    public function deleteTemplate(Request $request){
        $delete_holiday_template = HolidayPolicy::where('id', $request->id)->delete();
        if($delete_holiday_template){
            return response()->json(["message" => 'Delete holiday Policy.', "status" => 1,]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }

    public function deleteHoliday(Request $request){
        $delete_holiday = HolidayList::where('id', $request->id)->delete();
        if($delete_holiday){
            return response()->json(["message" => 'Delete holiday from template.', "status" => 1,]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }

    public function manageStaffList()
    {
        $id = request('id');
        $header_title = "Holiday Policy";
        $staff_count = Staff::where('business_id', $this->business_id)->count();
        $holiday_template = HolidayPolicy::where('id',$id)->first();
        return view('setting::holidaypolicy.business_settings_manage_staff_list', ['header_title' => $header_title, 'business' => $this->business, 'user_profile' => $this->user_profile, 'staff_count' => $staff_count, 'holiday_template' => $holiday_template]);
    }

    public function holidaystaffList(Request $request){
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'staff_id',
            3 =>'salary_payment_type',
            4 =>'phone_number',
        );
        $search_text = $request->searchValue;
        $staff_holiday = HolidayPolicyToStaff::whereNotIn('template_id',[$request->id])->pluck('staff_id');

        $totalDataRecord = Staff::whereNotIn('id', $staff_holiday)->whereNotIn('id', $staff_holiday)->where('business_id',$this->business_id)->where('is_deactivate',0)->count();
        if($search_text == null) {
            $post_data = Staff::with(['Department','StaffPhoto'])->whereNotIn('id', $staff_holiday)->where('business_id',$this->business_id)->where('is_deactivate',0)->get();
        } else {
            $post_data =  Staff::where('business_id',$this->business_id)->whereNotIn('id', $staff_holiday)->where('name','LIKE',"%{$search_text}%")->where('is_deactivate',0)->orWhere('phone_number','LIKE',"%{$search_text}%")
                ->get();
            $totalFilteredRecord = Staff::with(['Department','StaffPhoto'])->whereNotIn('id', $staff_holiday)->where('business_id',$this->business_id)->where('is_deactivate',0)->where('name','LIKE',"%{$search_text}%")->orWhere('phone_number','LIKE',"%{$search_text}%")
                ->count();
        }
        $data_val = array();
        $business = Business::where('id', $this->business_id)->first();
        if(!empty($post_data)) {
            foreach ($post_data as $post_val) {
                $url = url('/assets/admin/images/dummy/dummy-user.png');
                if(!empty($post_val->photo_face)){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->photo_face);
                }
                $apply_staff = HolidayPolicyToStaff::where('template_id', $request->id)->where('staff_id', $post_val->id)->value('staff_id');
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
        $draw_val = $request->input('draw');
        $get_json_data = array(
            "draw"            => intval($draw_val),
            "recordsTotal"    => intval($totalDataRecord),
            "recordsFiltered" => intval($totalFilteredRecord),
            "data"            => $data_val
        );
        echo json_encode($get_json_data);
    }

    public function holidayToStaff(Request $request){
        if($request->selectedIds){
            foreach($request->selectedIds as $selectedIds){
                if(!HolidayPolicyToStaff::where('staff_id',$selectedIds)->where('template_id', $request->id)->exists()){
                   $apply_policy = HolidayPolicyToStaff::insert(['staff_id' => $selectedIds, 'template_id' => $request->id]);
                } 
            }
        }
        if($request->unselectedIds){
            foreach($request->unselectedIds as $unselectedIds){
                if(HolidayPolicyToStaff::where('staff_id',$unselectedIds)->where('template_id', $request->id)->exists()){
                   $apply_policy = HolidayPolicyToStaff::where('staff_id' , $unselectedIds)->where('template_id', $request->id)->delete();
                }
            }            
        }
        return response()->json(["message" => 'Holiday policy apply to staff successfully.', "status" => 1,]);
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
