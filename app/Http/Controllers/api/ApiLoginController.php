<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Business;
use App\Models\BusinessUser;
use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffBankDetail;
use App\Models\StaffPhoto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ApiLoginController extends Controller
{
//    login api function
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^[6-9]\d{9}$/|min:10',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $otp = rand(1000, 9999);
        if(User::where('phone_number',$request->phone)->exists()) {
            $user = User::where('phone_number', $request->phone)->get();
            $user_data = User::where('id', $user[0]['id'])->update(['otp' => $otp]);
            if ($user_data) {
                return response()->json(['message' => 'OTP Sent', 'status' => 1, 'data' => ['phone' => $request->phone, 'otp' => $otp]]);
            } else {
                return response()->json(['message' => 'error', 'status' => 0]);
            }
        }else{
            $user = new User;
            $user->country_code = '91';
            $user->phone_number = $request->phone;
            $user->otp = $otp;
            $user->save();
        //    $user_data = User::select('id','phone_number')->where('id',$user->id)->get();
            if (!$user) {
                return response()->json(['message'=>'Something is wrong.', 'status'=> 0]);
            } else {
                return response()->json(['message' => 'OTP Sent', 'status' => 1, 'data' => ['phone' => $request->phone, 'otp' => $otp]]);
            }
        }
    }
    public function verifyOtp(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^[6-9]\d{9}$/|min:10',
            'otp'=>'required'
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        if(User::where('phone_number',$request->phone)->where('otp',$request->otp)->exists()) {
            $user = User::where('phone_number', $request->phone)->first();
            if($user->token != ''){
                if ($user) {
                    Auth::login($user);
                    $token = $user->createToken('token')->accessToken;
                    User::where('id', $user->id)->update(["token" => $token]);
                    $user_data = User::with('UserPhoto:id,user_id,photo','BusinessUser.business','BusinessUser.Department','BusinessUser.Department.departmentStaff')->where('id', $user->id)->first(); // Append the business data to the user data.
                    return response()->json(["message" => 'You are logged in successfully.','is_register'=>1 ,"status" => "1",'data'=>$user_data]);
                }
            }else{
                $user_data = User::with('UserPhoto:id,user_id,photo','BusinessUser.business','BusinessUser.Department','BusinessUser.Department.departmentStaff')->where('id', $user->id)->first();
                return response()->json(["message" => 'You are logged in successfully.','is_register'=>0, "status" => "1",'data'=>$user_data]);
            }
        }else{
            return response()->json(['message'=>'Wrong otp.', 'status'=> 0]);
        }
    }
    public function staffLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^[6-9]\d{9}$/|min:10',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $otp = rand(1000, 9999);
        if(Staff::where('phone_number',$request->phone)->exists()) {
            $staff_id = Staff::where('phone_number', $request->phone)->value('id');
            $staff_data = Staff::where('id', $staff_id)->update(['otp' => $otp]);
            if ($staff_data) {
                return response()->json(['message' => 'OTP Sent', 'status' => 1, 'data' => ['phone' => $request->phone, 'otp' => $otp]]);
            } else {
                return response()->json(['message' => 'error', 'status' => 0]);
            }
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=> 0]);
        }
    }
    public function staffVerifyOtp(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^[6-9]\d{9}$/|min:10',
            'otp'=>'required'
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        if(Staff::where('phone_number',$request->phone)->where('otp',$request->otp)->exists()) {
            $business = Staff::with('Business:id,name')->select('id','name','email','phone_number','business_id')->where('phone_number',$request->phone)->get();
            return response()->json(["message" => 'success', "status" => "1","data"=>$business]);
//            $staff = Staff::where('phone_number', $request->phone)->first();
//            if($staff->token == ''){
//                if ($staff) {
//                    Auth::guard('staff')->setUser($staff);
//                    $business = Staff::with('Business:id,name')->select('id','name','email','phone_number','business_id')->where('phone_number',$request->phone)->get();
//                    $token = $staff->createToken('token')->accessToken;
//                    Staff::where('id', $staff->id)->update(["token" => $token]);
//                    $staff_data = Staff::with(['StaffPhoto:id,staff_id,photo', 'StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id', 'Department:id,name'])->where('id', $staff->id)->first(); // Append the business data to the user data.
//                    $staff_data['business'] = $business;
//                    return response()->json(["message" => 'You are logged in successfully.','is_register'=>1 ,"status" => "1",'data'=>$staff_data]);
//                }
//            }else{
//                $business = Staff::with('Business:id,name')->select('id','name','email','phone_number','business_id')->where('phone_number',$request->phone)->get();
//                $staff_data['business'] = $business;
//                $staff_data = Staff::with(['StaffPhoto:id,staff_id,photo', 'StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id', 'Department:id,name'])->where('id', $staff->id)->first();
//                return response()->json(["message" => 'You are logged in successfully.','is_register'=>0, "status" => "1",'data'=>$staff_data]);
//            }
        }else{
            return response()->json(['message'=>'Wrong otp.', 'status'=> 0]);
        }
    }
    public function setBusiness(Request $request){
        $staff = Staff::where('id', $request->staff_id)->first();
        if($staff->token == ''){
            Auth::guard('staff')->setUser($staff);
            $token = $staff->createToken('token')->accessToken;
            Staff::where('id', $request->staff_id)->update(["token" => $token]);
            $staff_data = Staff::with(['StaffPhoto:id,staff_id,photo', 'StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id', 'Department:id,name','Business:id,name,business_address'])->where('id', $request->staff_id)->first(); // Append the business data to the user data.
            return response()->json(["message" => 'You are logged in successfully.','is_register'=>1 ,"status" => "1",'data'=>$staff_data]);
        }else{
            $staff_data = Staff::with(['StaffPhoto:id,staff_id,photo', 'StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id', 'Department:id,name','Business:id,name,business_address'])->where('id', $staff->id)->first();
            return response()->json(["message" => 'You are logged in successfully.','is_register'=>0, "status" => "1",'data'=>$staff_data]);
        }
    }
    public function addBusiness(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'email'=>'required',
            'business_name'=>'required',
            'business_address'=>'required',
            'salary_calculation'=>'required',
            'shift_hour'=>'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        User::where('id',$request->user_id)->update(['name'=>$request->name,'email'=>$request->email]);
        $business_data = array(
            'name'=>$request->business_name,
            'business_address'=>$request->business_address,
            'salary_calculation'=>$request->salary_calculation,
            'shift_hour'=>$request->shift_hour,
        );
        $business_id = Business::insertGetId($business_data);
        $business_user = BusinessUser::insert(['user_id'=>$request->user_id,'business_id'=>$business_id]);
        $user = User::where('id', $request->user_id)->first();
        if ($user) {
            Auth::login($user);
            $token = $user->createToken('token')->accessToken;
            User::where('id', $user->id)->update(["token" => $token]);
        }
        $user_data = User::with('UserPhoto:id,user_id,photo','BusinessUser.business','BusinessUser.Department','BusinessUser.Department.departmentStaff')->where('id', $user->id)->first();
        if (!$business_user) {
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        } else {
            return response()->json(["message" => 'Account successfully created', "status" => "1",'data'=>$user_data]);
        }
    }
    public function editBusiness(Request $request){
        $login_user = Auth::user()->id;
        if(BusinessUser::where('user_id', $login_user)->where('business_id', $request->business_id)->exists()){
            $business_data = array(
                'name'=>$request->business_name,
                'business_address'=>$request->business_address,
                'salary_calculation'=>$request->salary_calculation,
                'shift_hour'=>$request->shift_hour,
            );
            $edit_business = Business::where('id', $request->business_id)->update(array_filter(['name' => $request->business_name, 'business_address'=>$request->business_address, 'salary_calculation'=>$request->salary_calculation,'shift_hour'=>$request->shift_hour]));
            $edit_user = User::where('id', $login_user)->update(array_filter(['name' => $request->name, 'email' =>$request->email]));
            return response()->json(['message'=>'Business edit succesfulle', 'status'=> 1]);
        }
        return response()->json(['message'=>'This is not your business', 'status'=> 0]);
    }
    public function getUser(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $user = User::with('UserPhoto:id,user_id,photo','BusinessUser.business','BusinessUser.Department','BusinessUser.Department.departmentStaff')->where('id', $request->user_id)->first();
        if (!$user) {
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        } else {
            return response()->json(["message" => 'success', "status" => "1",'data'=>$user]);
        }
    }
    public function logout(){
        $user = Auth::user();
        User::where('id',$user->id)->update(['otp'=>null]);
        $user->token()->revoke();
        return response()->json(["message" => 'Logout successfully', "status" => "1"]);
    }
    public function staffLogout(){
        $user = Auth::guard('staff')->user();
        Staff::where('id',$user->id)->update(['otp'=>null]);
        $user->token()->revoke();
        return response()->json(["message" => 'Logout successfully', "status" => "1"]);
    }
    public function deleteUser(Request $request){
        $login_user = Auth::user()->phone_number;
        if($login_user == $request->phone){
            if(User::where('phone_number', $login_user)->exists()){
                $delete = User::where('phone_number', $login_user)->delete();
                if ($delete != 1) {
                    return response()->json(['message'=>'error.', 'status'=>'0']);
                } else {
                    return response()->json(["message" => 'Delete business user successfull', "status" => "1"]);
                }
            }
        }
        return response()->json(["message" => 'This number is not login', "status" => 0]);
    }
//    end login api function
//    staff api function
//    public function oldgetStaff(Request $request){
//        $search_text = $request->search;
//        $staff = Department::with(['Staff.StaffPhoto:id,staff_id,photo',
//            'Staff.StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id',
//            'Staff.Department:id,name','Staff' => function ($subquery) use ($search_text) {
//                $subquery->where('name', 'LIKE', "%{$search_text}%");
//            }])
//            ->whereHas("Staff", function($query) use ($search_text) {
//                $query->where('name', 'LIKE', "%{$search_text}%");
//            })
//            ->where('business_id', $request->business_id)
//            ->get();
//        if (!$staff) {
//            return response()->json(['message'=>'Something is wrong.', 'status'=>'0']);
//        } else {
//            return response()->json(["message" => 'success', "status" => "1",'data'=>$staff]);
//        }
//    }
    public function getStaff(Request $request){
        DB::statement("SET SQL_MODE=''");
        $search_text = $request->search;
        $department_id = $request->department_id;
        $staff_count = Staff::where('business_id', $request->business_id)->where('is_deactivate',0)->count();
        $present_count = Attendance::whereHas('Staff' ,function($query) use ($request){
            $query->where('business_id', $request->business_id)->where('is_deactivate',0);
        })->where('date', Carbon::now()->toDateString())->where('status','Present')->distinct('staff_id')->count();
        $absent_count = Attendance::whereHas('Staff' ,function($query) use ($request){
            $query->where('business_id', $request->business_id)->where('is_deactivate',0);
        })->where('date', Carbon::now()->toDateString())->where('status','Absent')->distinct('staff_id')->count();
        $halfday_count = Attendance::whereHas('Staff' ,function($query) use ($request){
            $query->where('business_id', $request->business_id)->where('is_deactivate',0);
        })->where('date', Carbon::now()->toDateString())->where('status','Half Day')->distinct('staff_id')->count();
        // return Staff::with('Attendance')->where('business_id', $request->business_id)->get();
    
        $staff = Staff::with(['StaffPhoto:id,staff_id,photo', 'StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id', 'Department:id,name',
            'Attendance'=>function($query){
                $query->whereDate('date',Carbon::now()->toDateString())->groupBy('staff_id')->select('id','staff_id','status');
            }])
            ->where(function ($query) use ($search_text, $department_id) {
                if ($search_text != null) {
                    $query->where('name', 'LIKE', "%{$search_text}%");
                }
                if ($department_id != null) {
                    $query->where('department_id', $department_id);
                }
            })
            ->where('is_deactivate',0)
            ->where('business_id', $request->business_id);
        if($request->page == 0){
            $staff = $staff->get();
            $staff->each(function ($staffs) {
                // return $staffs;
                if ($staffs->Attendance->count() > 0) {
                    $staffs->status = $staffs->Attendance[0]->status; // Set status to "Present" if there is attendance
                } else {
                    $staffs->status = 'Absent';
                }
            });
            if(!$staff){
                return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
            } else {
                return response()->json(['message'=>'success', 'status'=>'1', 'staff_count' => $staff_count, 'present_count'=>$present_count, 'absent_count'=> $absent_count,'halfday_count' => $halfday_count,'data'=>$staff]);
            }
            
        } else {
            $staff = $staff->paginate(10);
            $staff->each(function ($staffs) {
                // return $staffs->Attendance[0]->status;
                if ($staffs->Attendance->count() > 0) {
                    $staffs->status = $staffs->Attendance[0]->status; // Set status to "Present" if there is attendance
                } else {
                    $staffs->status = 'Absent';
                }
            });
            $result = $staff->toArray();
            $staff = $result["data"];
            $current = $result["current_page"];
            $last = $result["last_page"];
            $total = $result["total"];
            if(empty($staff)){
                return response()->json(['message'=>'fail', 'status'=>'0', 'data'=>[]]);
            } else {
                return response()->json(['message'=>'success', 'status'=>'1', 'staff_count' => $staff_count, 'present_count'=>$present_count, 'absent_count'=> $absent_count,'halfday_count' => $halfday_count,'data'=>$staff, 'current_page'=>$current, 'last_page'=>$last, 'total'=>$total]);
            }
        }

    }
    public function addStaff(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'phone_number'=>'required',
            'salary_amount'=>'required',
            'salary_cycle'=>'required',
            'business_id'=>'required',
            'department_id'=>'required',
            'account_holder_name'=>'required',
            'account_number'=>'required',
            'IFSC_code'=>'required',
            'UPI_id'=>'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        if($request->id == null){
            $image_name = "";
            if($request->photo_face){
                // $i=0;
                // foreach ($request->photo_face as $value){
                    $file_name = $request->photo_face->getClientOriginalName();
                    $imageFileType = $request->photo_face->getClientOriginalExtension();
                    $file_path = $request->photo_face->getPathName();
                    $image_name = "photo_face" . rand().".". $imageFileType;
                    $request->photo_face->move(public_path('assets/admin/images/staff_photos'), $image_name);
                    // $imageNames[] = $image_name;
                // }
            }
            if(Staff::where('id',$request->id)->value('email') == null){
                if(Staff::where('email',$request->email)->exists()){
                    return response()->json(["message" => 'Email should not be duplicate (two employees can not have same email )', "status" => 2]);
                }
            }
            $staff_id = Staff::insertGetId(['name'=>$request->name, 'phone_number'=>$request->phone_number, 'salary_amount'=>$request->salary_amount,
                'salary_cycle'=>$request->salary_cycle, 'department_id'=>$request->department_id, 'business_id'=>$request->business_id, 'img_bytes' => $request->img_bytes,
                'photo_face' => $image_name,'last_name'=>$request->last_name,'middle_name'=>$request->middle_name,'email' => $request->email,'is_remote'=>$request->is_remote]);
            $staff_bank_detail = StaffBankDetail::insert(['staff_id'=>$staff_id,'account_holder_name'=>$request->account_holder_name,'account_number'=>$request->account_number,'IFSC_code'=>$request->IFSC_code,'UPI_id'=>$request->UPI_id]);
            if($request->photo){
                $i=0;
                foreach ($request->photo as $value){
                    $file_name = $value->getClientOriginalName();
                    $imageFileType = $value->getClientOriginalExtension();
                    $file_path = $value->getPathName();
                    $image_name = "staff_" . time(). "_".$i++."." . $imageFileType;
                    $value->move(public_path('assets/admin/images/staff_photos'), $image_name);
                    $staff_photo = StaffPhoto::insert(['staff_id'=>$staff_id,'photo'=>$image_name]);
                }
            }

            if($staff_bank_detail){
                $staff = Staff::with('StaffPhoto:id,staff_id,photo','StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id','Department:id,name')
                    ->where('id',$staff_id)
                    ->get();
                return response()->json(["message" => 'Insert successfully', "status" => "1",'data'=>$staff]);
            }else{
                return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
            }
        }else{
            $image_name = "";
            if($request->photo_face){
                // $i=0;
                // foreach ($request->photo_face as $value){
                    $file_name = $request->photo_face->getClientOriginalName();
                    $imageFileType = $request->photo_face->getClientOriginalExtension();
                    $file_path = $request->photo_face->getPathName();
                    $image_name = "photo_face" . rand().".". $imageFileType;
                    $request->photo_face->move(public_path('assets/admin/images/staff_photos'), $image_name);
                    // $imageNames[] = $image_name;
                // }
                $photo_face = Staff::where('id',$request->id)->value('photo_face');
                if($photo_face){
                    $imagePath = public_path('assets/admin/images/staff_photos/' . $photo_face);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        
            if($request->photo){
                $i=0;
                foreach ($request->photo as $value){
                    $file_name = $value->getClientOriginalName();
                    $imageFileType = $value->getClientOriginalExtension();
                    $file_path = $value->getPathName();
                    $image_name = "staff_" . time(). "_".$i++.".". $imageFileType;
                    $value->move(public_path('assets/admin/images/staff_photos'), $image_name);
                    $staff_photo = StaffPhoto::where('staff_id',$request->id)->value('photo');
                    if($staff_photo){
                        $imagePath = public_path('assets/admin/images/staff_photos/' . $staff_photo);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                        StaffPhoto::where('staff_id',$request->id)->delete();
                    }
                    StaffPhoto::insert(['staff_id'=>$request->id,'photo'=>$image_name]);
                }
            }

            if(Staff::where('id',$request->id)->value('email') == null){
                if(Staff::where('email',$request->email)->exists()){
                    return response()->json(["message" => 'Email should not be duplicate (two employees can not have same email )', "status" => 2]);
                }
            }

            Staff::where('id',$request->id)->update(['name'=>$request->name, 'last_name'=>$request->last_name,'middle_name'=> $request->middle_name,
                'phone_number'=>$request->phone_number, 'salary_amount'=>$request->salary_amount, 'salary_cycle'=>$request->salary_cycle, 'department_id'=>$request->department_id,
                'business_id'=>$request->business_id, 'img_bytes' => $request->img_bytes, 'photo_face' => $image_name, 'email' => $request->email,'is_remote'=>$request->is_remote]);

            StaffBankDetail::where('id',$request->id)->update(['staff_id'=>$request->id,'account_holder_name'=>$request->account_holder_name,'account_number'=>$request->account_number,'IFSC_code'=>$request->IFSC_code,'UPI_id'=>$request->UPI_id]);

            // $staff_photo = StaffPhoto::where('staff_id',$request->id)->get();
            // foreach ($staff_photo as $photo) {
            //     $imagePath = public_path('assets/admin/images/staff_photos/' . $photo->photo);
            //     if (file_exists($imagePath)) {
            //         unlink($imagePath);
            //     }
            // }
            // if(!empty($request->delete_photo)){
            //     $inputString = $request->delete_photo;
            //     $validJsonString = '[' . $inputString . ']';
            //     $resultArray = json_decode($validJsonString);
            //     foreach ($resultArray as $photo) {
            //         $imagePath = public_path('assets/admin/images/staff_photos/' . $photo);
            //         if (file_exists($imagePath)) {
            //             unlink($imagePath); // Delete the file
            //         }
            //         StaffPhoto::where('photo',$photo)->delete();
            //     }
            // }
            $staff = Staff::with('StaffPhoto:id,staff_id,photo','StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id','Department:id,name')
            ->where('id',$request->id)
            ->get();
            if($staff){
                return response()->json(["message" => 'update successfully', "status" => "1", 'data'=>$staff]);
            }else{
                return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
            }
        }
    }

    public function deleteStaff(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=>'required'
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $staff = Staff::where('id',$request->id)->delete();
        if($staff){
            return response()->json(["message" => 'Delete successfully', "status" => "1"]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }
//    end staff api function
//    department api function
    public function getDepartment(Request $request){
        $validator = Validator::make($request->all(), [
            'business_id'=>'required'
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $department = Department::with(['Staff'=>function($query) use ($request){
            $query->where('business_id',$request->business_id);
        }])->where('business_id',$request->business_id)->orWhereNull('business_id')->get();
        if($department){
            return response()->json(["message" => 'success', "status" => "1",'data'=>$department]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }
    public function addDepartment(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'business_id'=>'required'
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        if($request->id == null){
            $department = Department::insertGetId(['name'=>$request->name,'business_id'=>$request->business_id]);
            if($department){
                $department_data = Department::where('id',$department)->get();
                return response()->json(["message" => 'Insert successfully', "status" => "1",'data'=>$department_data]);
            }else{
                return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
            }
        }else{
            $department = Department::where('id',$request->id)->update(['name'=>$request->name,'business_id'=>$request->business_id]);
            if($department){
                return response()->json(["message" => 'Update successfully', "status" => "1"]);
            }else{
                return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
            }
        }
    }
    public function deleteDepartment(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $department = Department::where('id',$request->id)->delete();
        if($department){
            return response()->json(["message" => 'Delete successfully', "status" => "1"]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }
//    and department api function
//    attendance api function
    public function getAttendance(Request $request){
        DB::statement("SET SQL_MODE=''");
        $validator = Validator::make($request->all(), [
            'date' => 'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $search_text = $request->search;
        $date = $request->date;
        $business_id = $request->business_id;
        $staff_count = Staff::where('business_id', $business_id)->where('is_deactivate',0)->count();
        
        $present_count = Attendance::whereHas('Staff', function ($query) use ($business_id) {
                $query->where('business_id', $business_id)->where('is_deactivate',0);
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
        $absent = Attendance::whereHas('Staff', function ($query) use ($business_id) {
                $query->where('business_id', $business_id)->where('is_deactivate',0);
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
        $half_day = Attendance::whereHas('Staff', function ($query) use ($business_id) {
                $query->where('business_id', $business_id)->where('is_deactivate',0);
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

        $paid_leave = Attendance::whereHas('Staff', function ($query) use ($business_id) {
                $query->where('business_id', $business_id)->where('is_deactivate',0);
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
        $count = [
            'present_count'=>$present_count,
            'absent_count'=>$absent,
            'halfday_count'=>$half_day,
            'staff_count'=>$staff_count,
            // 'leave'=>$paid_leave,
            // 'fine'=>0,
            // 'overtime'=>0,
        ];
        $attendance = Staff::with(['StaffPhoto:id,staff_id,photo','Department:id,name,business_id','Attendance','Attendance' => function ($query) use ($date) {
            $query->where('date', $date);
            }])
            ->where(function ($query) use ($search_text) {
                if ($search_text != null) {
                    $query->where('name', 'LIKE', "%{$search_text}%");
                }
            })
            ->where('business_id',$request->business_id)->where('is_deactivate',0)->get();
            $attendance->each(function ($attendances) {
                $attendance = $attendances->Attendance;
                if ($attendance->count() > 0) {
                    $attendances->status = $attendances->Attendance[0]['status'];
                } else {
                    $attendances->status = 'Absent';
                }
            });
        if($attendance){
            return response()->json(["message" => 'success', "status" => "1",'count'=>$count,"data"=>$attendance]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }
//    public function addAttendance(Request $request){
//        $validator = Validator::make($request->all(), [
//            'staff_id' => 'required',
//        ]);
//        if($validator->fails()){
//            $error_msg = $validator->errors()->first();
//            return response()->json(['message' => $error_msg, 'status' => 0]);
//        }
//        if(Staff::where('id', $request->staff_id)->where('is_deactivate',1)->exists()){
//            return response()->json(["message" => 'This staff is deactivated.', "status" => "0"]);
//        } else {
//            if($request->status == 1){
//                if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->exists()) {
//                    if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->where('status','LIKE',"Absent")->exists() OR
//                    Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->where('status','LIKE',"Half Day")->exists()) {
//                        Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['status' => "Present"]);
//                        if(Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->value('in_time') == null){
//                            $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['in_time'=> Carbon::now('Asia/Kolkata')->toTimeString()]);
//                        }
//                        // $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->delete();
//                        return response()->json(["message" => 'success', "status" => "1"]);
//                    }
//                    $attendance = Attendance::where('staff_id', $request->staff_id)->orderBy('id','desc')->limit(1)->get();
//                    // return Carbon::now('Asia/Kolkata')->toTimeString();
//                    $in_time_diff = Carbon::createFromFormat('H:i:s', $attendance[0]['in_time'])->diff(Carbon::createFromFormat('H:i:s', $request->time))->format('%H:%I:%S');
//                    $out_time_diff = $attendance[0]['out_time'] ? Carbon::createFromFormat('H:i:s', $attendance[0]['out_time'])->diff(Carbon::createFromFormat('H:i:s', $request->time))->format('%H:%I:%S') : '-';
//                    if($in_time_diff < '00:15:00'){
//                        return response()->json(["message" => 'Attendance Already Recorded', "status" => "0"]);
//                    }
//                    if($out_time_diff != '-'){
//                        if($out_time_diff < '00:15:00'){
//                            return response()->json(["message" => 'Attendance Already Recorded', "status" => "0"]);
//                        }
//                    }
//                    if($attendance[0]->out_time == null){
//                        $outTime = Carbon::parse($request->time);
//                        $hours = $outTime->diffInHours($attendance[0]['in_time']);
//                        $minutes = $outTime->diffInMinutes($attendance[0]['in_time']) % 60;
//                        $seconds = $outTime->diffInSeconds($attendance[0]['in_time']) % 60;
//                        $total_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
//                        $attendance = Attendance::where('id',$attendance[0]->id)->update(['out_time'=>$request->time, 'total_time' => $total_time]);
//                    }else{
//                        $out_time = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->value('out_time');
//                        $last_out_time = Carbon::parse($out_time);
//                        $again_in_time = Carbon::parse($request->time);
//                        $minutes = $last_out_time->diffInMinutes($again_in_time);
//                        $hours = $last_out_time->diffInHours($again_in_time) % 60;
//                        $break_time = sprintf("%02d:%02d:%02d", ($minutes / 60) % 60, $minutes % 60,($minutes / 60) / 60);
//                        $attendance = Attendance::insert([
//                            'staff_id' => $request->staff_id,
//                            'in_time' => $request->time,
//                            'status' => "Present",
//                            'date' => $request->date,
//                            'total_time' => '00:00:00',
//                        ]);
//                        // if(Attendance::where('staff_id', $request->['staff_id'])->where('date', $request->date)->where('out_time','!=' ,null)->exists()){
//                        Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['break_time' => $break_time]);
//                        // }
//                    }
//
//                }else{
//                    $attendance = Attendance::insert([
//                        'staff_id' => $request->staff_id,
//                        'in_time' => $request->time,
//                        'status' => "Present",
//                        'date' => $request->date,
//                        'total_time' => '00:00:00',
//                    ]);
//                }
//                if($attendance){
//                    return response()->json(["message" => 'success', "status" => "1"]);
//                }else{
//                    return response()->json(["message" => 'Something is wrong.', "status" => 0]);
//                }
//            } else if ($request->status == 2){
//                if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->exists()) {
//                    $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['status' => "Absent"]);
//                    // $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->delete();
//                    return response()->json(["message" => 'success', "status" => "1"]);
//                }
//                // if($attendance){
//                // }else{
//                //     return response()->json(["message" => 'Something is wrong.', "status" => 0]);
//                // }
//            } else if ($request->status == 3){
//                if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->exists()) {
//                    $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['status' => "Half Day"]);
//                    return response()->json(["message" => 'success', "status" => "1"]);
//                    // $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->delete();
//                }
//            }
//        }
//
//        // $today_date = Carbon::now()->toDateString();
//        //return $attendance;
//        // if($attendance){
//        //     return response()->json(["message" => 'success', "status" => "1"]);
//        // }else{
//        //     return response()->json(["message" => 'Something is wrong.', "status" => 0]);
//        // }
//    }
    public function addAttendance(Request $request){
        $validator = Validator::make($request->all(), [
            'staff_id' => 'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }

        if(Staff::where('id', $request->staff_id)->where('is_deactivate',1)->exists()){
            return response()->json(["message" => 'This staff is deactivated.', "status" => "0"]);
        } else {
            if($request->is_manual == 1){
                if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->exists()) {
                    if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->where('status','LIKE',"Absent")->exists()){
                        if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->value('in_time') == null) {
                            $attendance = Attendance::where('staff_id', $request->staff_id)
                                ->where('date', $request->date)
                                ->update([
                                    'in_time' => $request->time,
                                    'is_manual' => $request->is_manual, // corrected the syntax here
                                    'attendance_status' => 0
                                ]);
                            if($attendance){
                                return response()->json(["message" => 'success', "status" => "1"]);
                            }else{
                                return response()->json(["message" => 'Something is wrong.', "status" => 0]);
                            }
                        }
                        $attendance = Attendance::where('staff_id', $request->staff_id)->orderBy('id','desc')->limit(1)->get();
                        // return Carbon::now('Asia/Kolkata')->toTimeString();
                        $in_time_diff = Carbon::createFromFormat('H:i:s', $attendance[0]['in_time'])->diff(Carbon::createFromFormat('H:i:s', $request->time))->format('%H:%I:%S');
                        $out_time_diff = $attendance[0]['out_time'] ? Carbon::createFromFormat('H:i:s', $attendance[0]['out_time'])->diff(Carbon::createFromFormat('H:i:s', $request->time))->format('%H:%I:%S') : '-';
                        if($in_time_diff < '00:15:00'){
                            return response()->json(["message" => 'Attendance Already Recorded', "status" => "0"]);
                        }
                        if($out_time_diff != '-'){
                            if($out_time_diff < '00:15:00'){
                                return response()->json(["message" => 'Attendance Already Recorded', "status" => "0"]);
                            }
                        }
                        if($attendance[0]->out_time == null){
                            $outTime = Carbon::parse($request->time);
                            $hours = $outTime->diffInHours($attendance[0]['in_time']);
                            $minutes = $outTime->diffInMinutes($attendance[0]['in_time']) % 60;
                            $seconds = $outTime->diffInSeconds($attendance[0]['in_time']) % 60;
                            $total_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                            $attendance = Attendance::where('id',$attendance[0]->id)->update(['out_time'=>$request->time, 'total_time' => $total_time]);
                        }else{
                            $out_time = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->orderBy('id','desc')->value('out_time');
                            $breakSeconds = Attendance::where('staff_id', $request->staff_id)->whereDate('date', $request->date)->orderBy('id','desc')->value('break_time');
        
                            $last_out_time = Carbon::parse($out_time);
                            $again_in_time = Carbon::parse($request->time);
                            $minutes = $last_out_time->diffInMinutes($again_in_time);
                            $hours = $last_out_time->diffInHours($again_in_time) % 60;
                            if($breakSeconds == null){
                                $break_time = sprintf("%02d:%02d:%02d", ($minutes / 60) % 60, $minutes % 60,($minutes / 60) / 60);
                            }else{
                                $additionalBreakTime = sprintf("%02d:%02d:%02d", ($minutes / 60) % 60, $minutes % 60,($minutes / 60) / 60);
                                list($breakHours, $breakMinutes, $breakSeconds) = explode(':', $breakSeconds);
                                $totalBreakSeconds = $breakHours * 3600 + $breakMinutes * 60 + $breakSeconds;
                                list($additionalHours, $additionalMinutes, $additionalSeconds) = explode(':', $additionalBreakTime);
                                $additionalTotalSeconds = $additionalHours * 3600 + $additionalMinutes * 60 + $additionalSeconds;
                                $totalBreakSeconds += $additionalTotalSeconds;
                                $break_time = sprintf("%02d:%02d:%02d", ($totalBreakSeconds / 3600), ($totalBreakSeconds / 60 % 60), ($totalBreakSeconds % 60));
                            }
                            $attendance = Attendance::insert([
                                'staff_id' => $request->staff_id,
                                'in_time' => $request->time,
                                'status' => "Absent",
                                'date' => $request->date,
                                'total_time' => '00:00:00',
                                'is_manual' => $request->is_manual,
                                'attendance_status' => 0
                            ]);
                            // if(Attendance::where('staff_id', $request->['staff_id'])->where('date', $request->date)->where('out_time','!=' ,null)->exists()){
                            Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['break_time' => $break_time]);
                            // }
                        }
                    }
                }else{
                    $attendance = Attendance::insert([
                        'staff_id' => $request->staff_id,
                        'in_time' => $request->time,
                        'status' => "Absent",
                        'date' => $request->date,
                        'total_time' => '00:00:00',
                        'is_manual' => $request->is_manual,
                        'attendance_status' => 0
                    ]);
                }
                if($attendance){
                    return response()->json(["message" => 'success', "status" => "1"]);
                }else{
                    return response()->json(["message" => 'Something is wrong.', "status" => 0]);
                }
            }else{  
                if($request->status == 1){
                    if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->exists()) {
                        if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->where('status','LIKE',"Absent")->exists() OR
                            Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->where('status','LIKE',"Half Day")->exists()) {
                            Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['status' => "Present"]);
                            if(Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->value('in_time') == null){
                                $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['in_time'=> $request->time]);
                            }
                            // $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->delete();
                            return response()->json(["message" => 'success', "status" => "1"]);
                        }
                        $attendance = Attendance::where('staff_id', $request->staff_id)->orderBy('id','desc')->limit(1)->get();
                        // return Carbon::now('Asia/Kolkata')->toTimeString();
                        $in_time_diff = Carbon::createFromFormat('H:i:s', $attendance[0]['in_time'])->diff(Carbon::createFromFormat('H:i:s', $request->time))->format('%H:%I:%S');
                        $out_time_diff = $attendance[0]['out_time'] ? Carbon::createFromFormat('H:i:s', $attendance[0]['out_time'])->diff(Carbon::createFromFormat('H:i:s', $request->time))->format('%H:%I:%S') : '-';
                        if($in_time_diff < '00:15:00'){
                            return response()->json(["message" => 'Attendance Already Recorded', "status" => "0"]);
                        }
                        if($out_time_diff != '-'){
                            if($out_time_diff < '00:15:00'){
                                return response()->json(["message" => 'Attendance Already Recorded', "status" => "0"]);
                            }
                        }
                        if($attendance[0]->out_time == null){
                            $outTime = Carbon::parse($request->time);
                            $hours = $outTime->diffInHours($attendance[0]['in_time']);
                            $minutes = $outTime->diffInMinutes($attendance[0]['in_time']) % 60;
                            $seconds = $outTime->diffInSeconds($attendance[0]['in_time']) % 60;
                            $total_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                            $attendance = Attendance::where('id',$attendance[0]->id)->update(['out_time'=>$request->time, 'total_time' => $total_time]);
                        }else{
                            $out_time = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->orderBy('id','desc')->value('out_time');
                            $breakSeconds = Attendance::where('staff_id', $request->staff_id)->whereDate('date', $request->date)->orderBy('id','desc')->value('break_time');

                            $last_out_time = Carbon::parse($out_time);
                            $again_in_time = Carbon::parse($request->time);
                            $minutes = $last_out_time->diffInMinutes($again_in_time);
                            $hours = $last_out_time->diffInHours($again_in_time) % 60;
                            if($breakSeconds == null){
                                $break_time = sprintf("%02d:%02d:%02d", ($minutes / 60) % 60, $minutes % 60,($minutes / 60) / 60);
                            }else{
                                $additionalBreakTime = sprintf("%02d:%02d:%02d", ($minutes / 60) % 60, $minutes % 60,($minutes / 60) / 60);
                                list($breakHours, $breakMinutes, $breakSeconds) = explode(':', $breakSeconds);
                                $totalBreakSeconds = $breakHours * 3600 + $breakMinutes * 60 + $breakSeconds;
                                list($additionalHours, $additionalMinutes, $additionalSeconds) = explode(':', $additionalBreakTime);
                                $additionalTotalSeconds = $additionalHours * 3600 + $additionalMinutes * 60 + $additionalSeconds;
                                $totalBreakSeconds += $additionalTotalSeconds;
                                $break_time = sprintf("%02d:%02d:%02d", ($totalBreakSeconds / 3600), ($totalBreakSeconds / 60 % 60), ($totalBreakSeconds % 60));
                            }
                            $attendance = Attendance::insert([
                                'staff_id' => $request->staff_id,
                                'in_time' => $request->time,
                                'status' => "Present",
                                'date' => $request->date,
                                'total_time' => '00:00:00',
                                'is_manual' => $request->is_manual,
                                'attendance_status' => 1
                            ]);
                            // if(Attendance::where('staff_id', $request->['staff_id'])->where('date', $request->date)->where('out_time','!=' ,null)->exists()){
                            Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['break_time' => $break_time]);
                            // }
                        }

                    }else{
                        $attendance = Attendance::insert([
                            'staff_id' => $request->staff_id,
                            'in_time' => $request->time,
                            'status' => "Present",
                            'date' => $request->date,
                            'total_time' => '00:00:00',
                            'is_manual' => $request->is_manual,
                            'attendance_status' => 1
                        ]);
                    }
                    if($attendance){
                        return response()->json(["message" => 'success', "status" => "1"]);
                    }else{
                        return response()->json(["message" => 'Something is wrong.', "status" => 0]);
                    }
                } else if ($request->status == 2){
                    if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->exists()) {
                        $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['status' => "Absent"]);
                        // $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->delete();
                        return response()->json(["message" => 'success', "status" => "1"]);
                    }
                // if($attendance){
                // }else{
                //     return response()->json(["message" => 'Something is wrong.', "status" => 0]);
                // }
                } else if ($request->status == 3){
                    if (Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->exists()) {
                        $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->update(['status' => "Half Day"]);
                        return response()->json(["message" => 'success', "status" => "1"]);
                        // $attendance = Attendance::where('staff_id', $request->staff_id)->where('date', $request->date)->delete();
                    }
                }
            }
        }

        // $today_date = Carbon::now()->toDateString();
        //return $attendance;
        // if($attendance){
        //     return response()->json(["message" => 'success', "status" => "1"]);
        // }else{
        //     return response()->json(["message" => 'Something is wrong.', "status" => 0]);
        // }
    }
    public function addAttendanceOld(Request $request){
        $validator = Validator::make($request->all(), [
            'staff_id' => 'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $today_date = Carbon::now()->toDateString();
        if (Attendance::where('staff_id', $request->staff_id)->where('date', $today_date)->exists()) {
            $attendance = Attendance::where('staff_id', $request->staff_id)->orderBy('id','desc')->limit(1)->get();
            if($attendance[0]->out_time == null){
                $attendance = Attendance::where('id',$attendance[0]->id)->update(['out_time'=>$request->time]);
            }else{
                $out_time = Attendance::where('staff_id', $request->staff_id)->where('date', $today_date)->value('out_time');
                $last_out_time = Carbon::parse($out_time);
                $again_in_time = Carbon::parse($request->time);
                $minutes = $last_out_time->diffInMinutes($again_in_time);
                $hours = $last_out_time->diffInHours($again_in_time) % 60;
                $break_time = sprintf("%02d:%02d:%02d", ($minutes / 60) % 60, $minutes % 60,($minutes / 60) / 60);
                $attendance = Attendance::insert([
                    'staff_id' => $request->staff_id,
                    'in_time' => $request->time,
                    'status' => $request->status,
                    'date' => $today_date,
                ]);
                // if(Attendance::where('staff_id', $request->['staff_id'])->where('date', $today_date)->where('out_time','!=' ,null)->exists()){
                Attendance::where('staff_id', $request->staff_id)->where('date', $today_date)->update(['break_time' => $break_time]);
                // }
            }
        }else{
            $attendance = Attendance::insert([
                'staff_id' => $request->staff_id,
                'in_time' => $request->time,
                'status' => $request->status,
                'date' => $today_date,
            ]);
        }
        if($attendance){
            return response()->json(["message" => 'success', "status" => "1"]);
        }else{
            return response()->json(["message" => 'Something is wrong.', "status" => 0]);
        }
    }
    // public function addAttendanceOld(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         '*.staff_id' => 'required',
    //     ]);
    //     if($validator->fails()){
    //         $error_msg = $validator->errors()->first();
    //         return response()->json(['message' => $error_msg, 'status' => 0]);
    //     }
    //     $today_date = Carbon::now()->toDateString();
    //     $jsonArray = json_decode($request->getContent(), true);
    //     foreach ($jsonArray as $value) {
    //         if (Attendance::where('staff_id', $value['staff_id'])->where('date', $today_date)->exists()) {
    //             $attendance = Attendance::where('staff_id', $value['staff_id'])->orderBy('id','desc')->limit(1)->get();
    //             if($attendance[0]->out_time == null){
    //                 $attendance = Attendance::where('id',$attendance[0]->id)->update(['out_time'=>$value['time']]);
    //             }else{
    //                 $out_time = Attendance::where('staff_id', $value['staff_id'])->where('date', $today_date)->value('out_time');
    //                 $last_out_time = Carbon::parse($out_time);
    //                 $again_in_time = Carbon::parse($value['time']);
    //                 $minutes = $last_out_time->diffInMinutes($again_in_time);
    //                 $hours = $last_out_time->diffInHours($again_in_time) % 60;
    //                 $break_time = sprintf("%02d:%02d:%02d", ($minutes / 60) % 60, $minutes % 60,($minutes / 60) / 60);                  
    //                 $attendance = Attendance::insert([
    //                     'staff_id' => $value['staff_id'],
    //                     'in_time' => $value['time'],
    //                     'status' => $value['status'],
    //                     'date' => $today_date,
    //                 ]);
    //                 // if(Attendance::where('staff_id', $value['staff_id'])->where('date', $today_date)->where('out_time','!=' ,null)->exists()){
    //                     Attendance::where('staff_id', $value['staff_id'])->where('date', $today_date)->update(['break_time' => $break_time]);
    //                 // }
    //             }
    //         }else{

    //             $attendance = Attendance::insert([
    //                 'staff_id' => $value['staff_id'],
    //                 'in_time' => $value['time'],
    //                 'status' => $value['status'],
    //                 'date' => $today_date,
    //             ]);
    //         }
    //     }
    //     if($attendance){
    //         return response()->json(["message" => 'success', "status" => "1"]);
    //     }else{
    //         return response()->json(["message" => 'Something is wrong.', "status" => 0]);
    //     }
    // }
    //and attendance api function


    //staff business api
    public function staffBusinesses(Request $request){
        $business = Staff::with('Business:id,name')->select('id','name','email','phone_number','business_id')->where('phone_number',$request->phone_number)->get();
        if($business){
             return response()->json(["message" => 'success', "status" => "1","data"=>$business]);
        }else{
             return response()->json(["message" => 'Something is wrong.', "status" => 0]);
        }
    }
    public function getStaffAttendance(Request $request){
        DB::statement("SET SQL_MODE=''");
        $validator = Validator::make($request->all(), [
            'month' => 'required',
            'year' => 'required',
            'staff_id' => 'required',
        ]);
        if($validator->fails()){
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => 0]);
        }
        $staff_id = $request->staff_id;
        $month = $request->month;
        $year = $request->year;
        $business_id = $request->business_id;

        $present_count = Attendance::whereHas('Staff', function ($query) use ($business_id) {
                $query->where('business_id', $business_id)->where('is_deactivate', 0);
            })
            ->where('status', 'LIKE', 'Present')
            ->whereYear('date', $request->year)
            ->whereMonth('date', $request->month)
            ->where('staff_id', $request->staff_id)
            ->distinct('staff_id')
            ->count();
        $absent = Attendance::whereHas('Staff', function ($query) use ($business_id) {
                $query->where('business_id', $business_id)->where('is_deactivate',0);
            })
            ->whereYear('date', $request->year)
            ->whereMonth('date', $request->month)
            ->where('staff_id', $request->staff_id)
            ->where('status', 'LIKE', 'Absent')
            ->distinct('staff_id')
            ->count();
        $half_day = Attendance::whereHas('Staff', function ($query) use ($business_id) {
                $query->where('business_id', $business_id)->where('is_deactivate',0);
            })
            ->whereYear('date', $request->year)
            ->whereMonth('date', $request->month)
            ->where('staff_id', $request->staff_id)
            ->where('status', 'LIKE', 'Half Day')
            ->distinct('staff_id')
            ->count();

        $paid_leave = Attendance::whereHas('Staff', function ($query) use ($business_id) {
                $query->where('business_id', $business_id)->where('is_deactivate',0);
            })
            ->whereYear('date', $request->year)
            ->whereMonth('date', $request->month)
            ->where('staff_id', $request->staff_id)
            ->where('status', 'LIKE', 'Paid Leave')
            ->distinct('staff_id')
            ->count();
        $count = [
            'present_count'=>$present_count,
            'absent_count'=>$absent,
            'halfday_count'=>$half_day,
            'leave'=>$paid_leave,
            // 'fine'=>0,
            // 'overtime'=>0,
        ];
        $attendance = Attendance::select('id', 'staff_id', 'in_time', 'out_time', 'total_time', 'status', 'break_time', 'overtime', 'fine', 'date')
            ->whereYear('date', $request->year)
            ->whereMonth('date', $request->month)
            ->where('staff_id', $request->staff_id)
            ->orderBy('date', 'desc')
            ->groupBy('date')
            ->get();

        // Calculate total time for each date
        foreach ($attendance as $record) {
            $totalTime = DB::table('attendances')
                ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(total_time))) AS total_time'))
                ->where('staff_id', $request->staff_id)
                ->whereDate('date', $record->date)
                ->value('total_time');

            $record->total_time = $totalTime;
        }
        if($attendance){
            return response()->json(["message" => 'success', "status" => "1",'count'=>$count,"attendance"=>$attendance]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }
    //end staff business api
}
