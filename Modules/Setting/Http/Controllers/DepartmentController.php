<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessUser;
use App\Models\Department;
use App\Models\UserPhoto;
use App\Models\Staff;
use App\Models\HolidayPolicy;
use App\Models\HolidayList;
use App\Models\HolidayPolicyToStaff;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
class DepartmentController extends Controller
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
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('setting::index');
    }
    public function department()
    {
        $department = Department::where('business_id',$this->business_id)->orWhereNull('business_id')->get();
        $header_title = "Business Settings";
        return view('setting::department.department', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'department'=>$department]);
    }
    public function allDepartment(Request $request){
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'business_id',
        );
        $totalDataRecord = Department::where('business_id',$this->business_id)->orWhereNull('business_id')->count();

        $post_data = Department::withCount(['Staff' => function($query){
            $query->where('is_deactivate',0)->where('business_id',$this->business_id);
        }])->where('business_id',$this->business_id)->orWhereNull('business_id')->get();

        $data_val = array();
        if(!empty($post_data)) {
            foreach ($post_data as $post_val) {
                $postnestedData['id'] = $post_val->id;
                $postnestedData['name'] =  $post_val->name;
                $postnestedData['business_id'] =  $post_val->business_id;
                $postnestedData['staff_count'] =  $post_val->staff_count;
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
    public function addDepartment(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $department = Department::insert(['name'=>$request->name,'business_id'=>$this->business_id]);
        if($department){
            return response()->json(["message" => 'Department insert successfully', "status" => 1]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }
    public function editDepartment(Request $request){
        $department = Department::where('id', $request->department_id)->get();
        if (!$department) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'success', 'status'=>'1', 'data'=>$department]);
        }
    }
    public function updateDepartment(Request $request){
        $department = Department::where('id', $request->department_id)->update(['name'=>$request->edit_name]);
        if (!$department) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'Department update successfully', 'status'=>'1']);
        }
    }
    public function deleteDepartment(Request $request){
        $staff_data = Staff::where('department_id',$request->delete_id)->get();
        foreach ($staff_data as $staff){
            Staff::where('id',$staff->id)->update(['department_id'=>1]);
        }
        $department = Department::where('id', $request->delete_id)->delete();
        if (!$department) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'Department delete successfully', 'status'=>'1']);
        }
    }

    public function AssignStaff()
    {
        $id = request()->id;
        $department = Department::where('business_id',$this->business_id)->get();
        $header_title = "Business Settings";
        return view('setting::department.business_settings_show_departments_assign_staff', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'department'=>$department, 'id' => $id]);
    }

    public function departmentstaffList(Request $request){
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $department_id = $request->department_id;
        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'staff_id',
            3 =>'salary_payment_type',
            4 =>'phone_number',
        );
        $search_text = $request->searchValue;
        $totalDataRecord = Staff::where('business_id',$this->business_id)->where('is_deactivate',0)->count();
        if($search_text == null) {
            $post_data = Staff::with(['Department','StaffPhoto'])->where('business_id',$this->business_id)->where('is_deactivate',0)->get();
        } else {
            $post_data =  Staff::where('business_id',$this->business_id)->where('is_deactivate',0)->where('name','LIKE',"%{$search_text}%")->orWhere('phone_number','LIKE',"%{$search_text}%")
                ->get();
            $totalFilteredRecord = Staff::with(['Department','StaffPhoto'])->where('business_id',$this->business_id)->where('is_deactivate',0)->where('name','LIKE',"%{$search_text}%")->orWhere('phone_number','LIKE',"%{$search_text}%")
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
                $apply_staff = Staff::where('id', $post_val->id)->where('department_id', $department_id)->value('id');
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

    public function applyDepartmentToStaff(Request $request){
        // return $request;
        $staff = Staff::where(function($query) use ($request){
            if($request->selectedIds){
                $query->whereIn('id', $request->selectedIds);
            }
            if($request->unselectedIds){
                $query->whereIn('id', $request->unselectedIds);
            }
        })->where('business_id', $this->business_id)->update(['department_id' => $request->department_id]);
        if (!$staff) {
            return response()->json(['message'=>'fail', 'status'=>'0']);
        }
        else {
            return response()->json(['message'=>'Apply Department to selecte staff successfully', 'status'=>'1']);
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
