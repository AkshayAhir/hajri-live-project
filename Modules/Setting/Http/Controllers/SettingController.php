<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessUser;
use App\Models\Department;
use App\Models\User;
use App\Models\UserPhoto;
use App\Models\HolidayPolicy;
use App\Models\WeeklyHolidayBusiness;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
class SettingController extends Controller
{
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
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $header_title = "Settings";
        $login_user = User::where('id', Auth::user()->id)->first();
        $businesses = BusinessUser::where('user_id', Auth::user()->id)->count();
        $department = Department::where('business_id', $this->business_id)->count();
        $business_data = Business::where('id',$this->business_id)->get();
        $business_category = BusinessCategory::where('id', $business_data[0]['category_id'])->value('name');
        $holiday_template_count = HolidayPolicy::where('business_id', $this->business_id)->count();
        $weekly_holiday_count = WeeklyHolidayBusiness::where('business_id', $this->business_id)->count();
        return view('setting::setting', [
            'header_title'=>$header_title, 
            'business'=>$this->business, 
            'user_profile'=>$this->user_profile, 
            'login_user'=>$login_user, 
            'business_data'=>$business_data,
            'business_category'=>$business_category,
            'businesses'=>$businesses,
            'department'=>$department,
            'holiday_template_count'=>$holiday_template_count,
            'weekly_holiday_count'=>$weekly_holiday_count,
        ]);
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
