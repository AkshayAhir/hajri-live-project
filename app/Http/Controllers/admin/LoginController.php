<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;
use App\Models\BusinessUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
class LoginController extends Controller
{
    public function landingPage(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('admin.landing');
    }
    public function index(){
        // if(Auth::check()){
        //     return redirect()->route('dashboard');
        // }
        return view('admin.login');
    }
   
    public function registerNumber(Request $request){
       
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|regex:/^[6-9]\d{9}$/|min:10',
        ]);
        if($validator->fails()){
            
            $error_msg = $validator->errors()->first();
            return response()->json(['message' => $error_msg, 'status' => '0', 'data' => []]);
        }
        $otp = rand(1000,9999);
       
        if(User::where('phone_number',$request->phone_number)->exists()){
            $user = User::where('phone_number',$request->phone_number)->get();
            
            $user_data = User::where('id',$user[0]['id'])->update(['otp'=>$otp]);
            // set otp in input field 
            $user = User::where('phone_number',$request->phone_number)->get();
            $users = $user->first();
            
            if ($users->token === null) {
                return response()->json(["message" => 'OTP Sent', "status" => "2",'data'=>$user]);
            } else {
                // dd($users);
                return response()->json(["message" => 'OTP Sent', "status" => "1",'data'=>$user]);
            }
            
            // return response()->json(["message" => 'success', "status" => "1"]);
            // ----------------------
            // if (!$user_data) {
            //     return response()->json(['message'=>'Something is wrong.', 'status'=>'0']);
            // } else {
            //     return response()->json(["message" => 'OTP Sent', "status" => "1",'data'=>$user]);
            // }
        }else{
            $user = new User;
            
            $user->country_code = '91';
            $user->phone_number = $request->phone_number;
            $user->otp = $otp;
            $user->save();
            $user_data = User::select('id','phone_number','otp')->where('id',$user->id)->get();
            if (!$user) {
                return response()->json(['message'=>'Something is wrong.', 'status'=>'0']);
            } else {
                return response()->json(["message" => 'OTP Sent', "status" => "2", "data" => $user_data]);
            }
        }
    }
    public function verifyOtp(Request $request){
        if(User::where('phone_number',$request->phone_number)->where('otp',$request->otp)->exists()){
        //    $user = User::where('phone_number', $request->phone_number)->where('otp', $request->otp)->first();
        //    $token =  $user->createToken('token')->accessToken;
        //    User::where('id', $user->id)->update(["token" => $token]);
        //    $user = User::where('phone_number', $request->phone_number)->first();
            session()->forget('business_id');
            $user = User::where('phone_number', $request->phone_number)->first();
            if($user->token != ''){
                if ($user) {
                    Auth::login($user);
                    $token = $user->createToken('token')->accessToken;
                    User::where('id', $user->id)->update(["token" => $token]);
                }
                $business_id = BusinessUser::where('user_id', $user['id'])->pluck('business_id');
                // return $business_id[0];
                Session::put('business_id',$business_id[0]);
                return response()->json(["message" => 'You are logged in successfully.', "status" => "2"]);
            }
            return response()->json(["message" => 'success', "status" => "1"]);
        }else{
            return response()->json(['message'=>'OTP verification failed.', 'status'=>'0']);
        }
    }
    public function storeBusiness(Request $request){
        $user_id = $request->data['data_register_number']['id'];
        $user = User::where('id',$user_id)->update(['name'=>$request->data['data_business_information']['name'],'email'=>$request->data['data_business_information']['email']]);
        $business_data = array(
            'name'=>$request->data['data_business_information']['business_name'],
            'business_address'=>$request->data['data_business_information']['business_address'],
            'salary_calculation'=>$request->data['data_salary_calculation']['salary_calculation'],
            'shift_hour'=> $request->time,
        );
        $business_id = Business::insertGetId($business_data);
        $business_user = BusinessUser::insert(['user_id'=>$user_id,'business_id'=>$business_id]);
        Session::put('business_id',$business_id);
        $user = User::where('id', $user_id)->first();
        if ($user) {
            Auth::login($user);
            $token = $user->createToken('token')->accessToken;
            User::where('id', $user->id)->update(["token" => $token]);
        }
        if (!$business_user) {
            return response()->json(['message'=>'Something is wrong.', 'status'=>'0']);
        } else {
            return response()->json(["message" => 'Account successfully created', "status" => "1"]);
        }
    }
    public function logout(){
        $user = Auth::user();
        User::where('id',$user->id)->update(['otp'=>null]);
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
