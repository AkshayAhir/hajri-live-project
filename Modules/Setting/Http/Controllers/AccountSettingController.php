<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Business;
use App\Models\BusinessUser;
use App\Models\Department;
use App\Models\Attendance;
use App\Models\Staff;
use App\Models\StaffBankDetail;
use App\Models\StaffDcoument;
use App\Models\StaffInfo;
use App\Models\StaffPhoto;
use App\Models\StaffProfile;
use App\Models\UserPhoto;
use App\Models\User;
use App\Models\BusinessCategory;
use Illuminate\Support\Facades\Auth;
use Session ,DateTime;
use Carbon\Carbon;
use DB;

class AccountSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user_profile;
    public $business;
    public $business_id;
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->business_id = Session::get('business_id');
            $this->user_profile = UserPhoto::where('user_id',Auth::user()->id)->get();
            $business_id = BusinessUser::where('user_id', Auth::user()->id)->pluck('business_id');
            $this->business = Business::whereIn('id',$business_id)->get();
            return $next($request);
        });
    }
    public function index()
    {
        $login_user = Auth::user();
        $staff_count = Staff::where('business_id',$this->business[0]['id'])->count();
        $business_category = BusinessCategory::all();
        $header_title = "Account Setting";
        $business_data = Business::where('id',$this->business_id)->get();
        return view('setting::accountsetting.account_setting_login_details', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'staff_count'=>$staff_count, 'login_user' => $login_user, 'business_data'=>$business_data]);
    }
    public function manageBusiness()
    {
        $login_user = Auth::user();
        $staff_count = Staff::where('business_id',$this->business[0]['id'])->count();
        $header_title = "Business Setting";
        // $time = Carbon::createFromFormat('H:i:s', $this->business[0]['shift_hour']);
        // $formattedTime = $time->format('h:i') . ' Hrs';
        $business_data = Business::where('id',$this->business_id)->get();
        $business_category = BusinessCategory::all();
//        dd($business_category);
        return view('setting::accountsetting.account_setting_login_details_manage_business', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'staff_count'=>$staff_count,'business_data' => $business_data, 'login_user' => $login_user,'business_category'=> $business_category]);
    }
    public function newBusinessAccount()
    {
        $login_user = Auth::user();
        $staff_count = Staff::where('business_id',$this->business[0]['id'])->count();
        // $header_title = "Manage Business";
        $header_title = "Business Setting";
        $business_data = Business::where('id',$this->business_id)->get();
        return view('setting::accountsetting.account_setting_login_details_add_new_business', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'staff_count'=>$staff_count, 'login_user' => $login_user]);
    }

    public function editAccount(Request $request){
        $login_user = Auth::user()->id;
        $account = User::where('id', $login_user)->update(['phone_number' => $request->phone_number, 'email' => $request->email]);
        if($account != 1){
            return response()->json(["message" => 'Somthing went wrong..', "status" => 0]);
        } else {
            return response()->json(["message" => 'Your Profile Details updated.', "status" => 1]);
        }
    }

    public function editBusiness(Request $request){

        $login_user = Auth::user()->id;
        // $shift_hour = $request->shift_hour;
        // list($time, $hrs) = explode(' ', $shift_hour);
        // $time = Carbon::createFromFormat('H:i', $time)->setSeconds(0);
        // $formattedTime = $time->format('H:i:s');
        $business = Business::where('id', $this->business[0]['id'])->update(['name' => $request->business_name, 'business_address' => $request->business_address, 'shift_hour' => $request->shift_hour, 'bank_account' => $request->business_bank_account, 'business_logo' => $request->photo,'category_id' => $request->select_business_category, 'salary_calculation' => $request->business_salary_cal,]);

        $account = User::where('id', $login_user)->update(['email' => $request->email, ]);
        if($business != 1){
            return response()->json(["message" => 'Somthing went wrong..', "status" => 0]);
        } else {
            return response()->json(["message" => 'Business Detail Save.', "status" => 1]);
        }
    }

    public  function addBusiness(Request $request){
        $login_user = Auth::user()->id;
        $add_business = Business::insertGetId(['name' => $request->business_name, 'business_address' => $request->business_address, 'salary_calculation' => $request->business_salary_cal, 'shift_hour' => $request->shift_hour, 'bank_account' => $request->business_bank_detail]);
        $user = User::where('id', $login_user)->update(['email' => $request->business_email]);
        if(!$add_business){
            return response()->json(["message" => 'Somthing went wrong..', "status" => 0]);
        } else {
            BusinessUser::insert(['business_id' => $add_business, 'user_id' => $login_user]);
            return response()->json(["message" => 'Business Added Successfully.', "status" => 1]);
        }
    }

    public function addBusinessLogo(Request $request){
        // return $request;
        // $business_data = Business::where('id',$this->business_id)->first();
        // if($business_data->business_logo){
        //     $imagePath = public_path('assets/admin/images/business_logo/' . $business_data->business_logo);
        //     if (file_exists($imagePath)) {
        //         unlink($imagePath);
        //     }
        // }
        $image = $request->business_name ."_".rand(). '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(public_path('assets/admin/images/business_logo'), $image);
        return response()->json([
            'photo'=> $image,
        ]);
    }

    public function uploadBusinessLogo(Request $request){
        $business_data = Business::where('id',$this->business_id)->first();
        if($business_data->business_logo){
            $imagePath = public_path('assets/admin/images/business_logo/' . $business_data->business_logo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $image = $business_data['name'] ."_".rand(). '.' . $request->file('file')->getClientOriginalExtension();
        $image = str_replace(' ', '', $image);
        $request->file('file')->move(public_path('assets/admin/images/business_logo'), $image);
        return response()->json([
            'photo'=> $image,
        ]);
    }

    public function BusinessInfo()
    {
        $header_title = "Business Info";
        $business_data = Business::where('id',$this->business_id)->get();
        return view('setting::accountsetting.business_info', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'business_data' => $business_data]);
    }

    public function editBusinessInfo(Request $request){
        $business = Business::where('id', $this->business_id)->update(['name' => $request->business_name, 'business_address' => $request->business_address, 'shift_hour' => $request->shift_hour, 'bank_account' => $request->bank_account]);
        if($business != 1){
            return response()->json(["message" => 'Somthing went wrong..', "status" => 0]);
        } else {
            return response()->json(["message" => 'Business Information Save.', "status" => 1]);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setting::create');
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
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('setting::edit');
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
