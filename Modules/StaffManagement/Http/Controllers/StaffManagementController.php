<?php

namespace Modules\StaffManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Session ,DateTime;
use Carbon\Carbon;
use DB;
use App\Imports\AddStaffImport;

use App\Exports\StaffAttendanceExport;
use App\Exports\DownloadTemplateExport;
use App\Exports\StaffInfoExport;
use Maatwebsite\Excel\Facades\Excel;
use function PHPUnit\Framework\isEmpty;

class StaffManagementController extends Controller
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
        $staff_count = Staff::where('business_id',$this->business_id)->where('is_deactivate',0)->count();
        $header_title = "Staff Management";
        $departments = Department::where('business_id', $this->business_id)->orWhereNull('business_id')->get();
        return view('staffmanagement::staff', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'staff_count'=>$staff_count,'departments'=>$departments]);
    }
    public function allStaff(Request $request){
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 =>'id',
            1 =>'name',
            2 =>'phone_number',
            3 =>'salary_amount',
            4 =>'salary_cycle',
            5=> 'department_id',
        );
        $character_page_sorting = $request->character_page_sorting;
        $number_page_sorting = $request->number_page_sorting;
        $search_text = $request->searchValue;
        $select_department = $request->select_department;
        $totalDataRecord = Staff::where('business_id',$this->business_id)->where(function($query) use ($select_department){
            if($select_department != null){
                $query->whereIn('department_id', $select_department);
            }
        })->where('is_deactivate',0)->count();
        if($search_text == null) {
            // return $select_department;
            $post_data = Staff::with(['Department','StaffPhoto'])->where(function($query) use ($select_department){
                if($select_department != null){
                    $query->whereIn('department_id', $select_department);
                }
            })->where('business_id',$this->business_id)
            ->when($character_page_sorting == 'newest', function ($query) {
                return $query->orderBy('created_at', 'desc');
            })
            ->when($character_page_sorting == 'oldest', function ($query) {
                return $query->orderBy('created_at', 'asc');
            })
            ->when($character_page_sorting == 'atoz', function ($query) {
                return $query->orderBy('name', 'asc');
            })
            ->when($character_page_sorting == 'ztoa', function ($query) {
                return $query->orderBy('name', 'desc');
            })
            ->where('is_deactivate',0)
            ->get();
        } else {
            // return $select_department;
            $post_data =  Staff::where('business_id',$this->business_id)->where(function($query) use ($select_department){
                if($select_department != null){
                    $query->whereIn('department_id', $select_department);
                }
            })->where('name','LIKE',"%{$search_text}%")
            ->when($character_page_sorting == 'newest', function ($query) {
                return $query->orderBy('created_at', 'desc');
            })
            ->when($character_page_sorting == 'oldest', function ($query) {
                return $query->orderBy('created_at', 'asc');
            })
            ->when($character_page_sorting == 'atoz', function ($query) {
                return $query->orderBy('name', 'asc');
            })
            ->when($character_page_sorting == 'ztoa', function ($query) {
                return $query->orderBy('name', 'desc');
            })
            ->where('is_deactivate',0)
            ->get();
            $totalFilteredRecord = Staff::with(['Department','StaffPhoto'])->where(function($query) use ($select_department){
                if($select_department != null){
                    $query->whereIn('department_id', $select_department);
                }
            })->where('is_deactivate',0)->where('business_id',$this->business_id)->where('name','LIKE',"%{$search_text}%")
            ->count();
        }
        $data_val = array();
        // return $post_data;
        if(!empty($post_data)) {
            foreach ($post_data as $post_val) {
                $url = url('/assets/admin/images/dummy/dummy-user.png');
                if(!empty($post_val->staffPhoto[0]->photo)){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->staffPhoto[0]->photo);
                }
                $postnestedData['id'] = $post_val->id;
                $postnestedData['name'] =  $post_val->name.' '. $post_val->last_name;
                $postnestedData['phone_number'] =  $post_val->phone_number;
                $postnestedData['salary_amount'] = $post_val->salary_amount;
                $postnestedData['salary_cycle'] = '-';
                // $postnestedData['salary_cycle'] = $post_val->salary_cycle;
                $postnestedData['department_name'] = $post_val->department['name'];
                $postnestedData['department_id'] = $post_val->department_id;
                $postnestedData['staff_photo'] = $url;
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
    public function addStaff(Request $request){
        $header_title = "Staff Management";
        $department = Department::where('business_id',$this->business_id)->orWhereNull('business_id')->orderBy('id','desc')->get();
        return view('staffmanagement::add-staff', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'departments'=>$department]);
    }
    public function uploadStaffPhoto(Request $request){
        $name = [];
        foreach ($request->file('file') as $key => $value) {
            $image = "staff_" . rand() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('assets/admin/images/staff_photos'), $image);
            $name[] = $image;
        }
        return response()->json([
            'name'=> $name,
        ]);
    }
    public function uploadStaffDocument(Request $request){
        $name = [];
        foreach ($request->file('file') as $key => $value) {
            $image = "staff_document_" . rand() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('assets/admin/images/staff_document'), $image);
            $name[] = $image;
        }
        return response()->json([
            'name'=> $name,
        ]);
    }
    public function addRecordStaff(Request $request){
        // return $request;
        // $date = DateTime::createFromFormat('d, M', $request->salary_cycle);
        // $salary_cycle = $date->format('d');
        if(Staff::where('email', $request->staff_email)->exists()){
            return response()->json(["message" => 'Email should not be duplicate (two employees can not have same email )', "status" => 2]);
        } else {
            $staff_id = Staff::insertGetId(['name'=>$request->first_name,'last_name'=>$request->last_name, 'middle_name'=>$request->middle_name, 'phone_number'=>str_replace(' ', '', $request->phone_number), 'salary_amount'=>$request->salary_amount, 'email' => $request->staff_email,
            // 'salary_cycle'=>$salary_cycle, 
            'department_id'=>$request->department_id, 'business_id'=>$this->business_id]);
            if($request->account_holder_name !=null || $request->account_number != null || $request->IFSC_code != null || $request->UPI_id !=null){
                StaffBankDetail::insert(['staff_id'=>$staff_id,'account_holder_name'=>$request->account_holder_name,'account_number'=>$request->account_number,'IFSC_code'=>$request->IFSC_code,'UPI_id'=>$request->UPI_id]);
            }
            // foreach ($request->photos as $value){
            //     $staff_photo = StaffPhoto::insert(['staff_id'=>$staff_id,'photo'=>$value]);
            // }
            if($staff_id){
                return response()->json(["message" => 'Staff insert successfully', "status" => 1]);
            }else{
                return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
            }
        }
    }
    public function deleteStaff(Request $request){
        $delete_staff = Staff::whereIn('id',$request->selectedIds)->delete();
        if($delete_staff){
            return response()->json(["message" => 'Staff deleted successfully', "status" => 1]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }

    public function staffProfile($id){
        if(Staff::where('id', $id)->having('business_id', $this->business_id)->exists()){
            // $month_count =date('t');
            // $attendanceCounts = Attendance::where('staff_id', $id)
            //     ->whereMonth('date', now()->month)
            //     ->groupBy('date')
            //     ->selectRaw('date, count(*) as count')
            //     ->get();
            // $present_count = $attendanceCounts->count();
            // $absent_count = $month_count - $present_count;
            $header_title = "Staff Profile";

            $month = Carbon::now();
            $startDate = \Carbon\Carbon::parse($month)->startOfMonth();
            $endDate = \Carbon\Carbon::parse($month)->now();

            $workingDaysCount = 0;
            $days = $startDate->copy();

            while ($days <= $endDate) {
                if ($days->isWeekday()) {
                    $workingDaysCount++;
                }
                $days->addDay();
            }
//            dd($workingDaysCount);
            $present_count = Attendance::where('staff_id', $id)->whereBetween('date', [$startDate, $endDate])->where('status', 'Present')->distinct('date')->count();
            $absent_count = Attendance::where('staff_id', $id)->whereBetween('date', [$startDate, $endDate])->where('status', 'Absent')->distinct('date')->count();
//            $absent_count = Attendance::where('staff_id', $id)->whereYear('date', $month->year)->whereMonth('date', $month->month)->where('status', 'Absent')->distinct('date')->count();
//            $absent_count = $workingDaysCount - $present_count;
            $halfday_count = Attendance::where('staff_id',$id)->whereBetween('date', [$startDate, $endDate])->where('status', 'Half Day')->distinct('date')->count();
            $paidleave_count = Attendance::where('staff_id',$id)->whereBetween('date', [$startDate, $endDate])->where('status', 'Paid Leave')->distinct('date')->count();

            $staff = Staff::with(['StaffPhoto:id,staff_id,photo', 'StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id', 'Department:id,name'])->where('id',$id)->get();
            return view('staffmanagement::staff_profile', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'staff'=>$staff,'month_count'=>$workingDaysCount,'present_count'=>$present_count,'absent_count'=>$absent_count, 'halfday_count'=>$halfday_count, 'paidleave_count'=>$paidleave_count, 'start_date' => $startDate->format('d M Y'), 'end_date' => $endDate->format('d M Y')]);
        } else {
            return redirect()->route('staff');
        }
    }
    public function updateStaffProfile(Request $request){
        if (!empty($request->deletedPreviewProfile)) {
            $get_record = StaffPhoto::whereIn('id',$request->deletedPreviewProfile)->get();
            foreach ($get_record as $value){

                $imagePath = public_path('assets/admin/images/staff_photos/' . $value->photo);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            StaffPhoto::whereIn('id',$request->deletedPreviewProfile)->delete();
        }
        //    $file_name = [];
        $i =0;
        if(!empty($request->profile)){
            foreach ($request->profile as $value){
                $file_name[] = $value->getClientOriginalName();
                $imageFileType = $value->getClientOriginalExtension();
                $file_path = $value->getPathName();
                $image_name = "staff_" . time(). "_".$i++."." . $imageFileType;
                $value->move(public_path('assets/admin/images/staff_photos'), $image_name);
                StaffPhoto::insert(['staff_id'=>$request->staff_id,'photo'=>$image_name]);
            }
        }
        return response()->json(["message" => 'Staff profile update', "status" => 1]);
    }


    public function bulkExcelAddStaff(){
        $header_title = "Add Staff";
        return view('staffmanagement::bulk_excel_add_staff', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile]);
    }
    public function bulkExcelAddStaffOnboarding(Request $request){
        $bulkExcelData = session('bulkExcelData');
        $header_title = "Add Staff";
        return view('staffmanagement::bulk_excel_add_staff_onboarding', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile,'data'=>$bulkExcelData]);
    }
    public function uploadExcelAddStaff(Request $request){
        $file_name = $request->file('import_file');
        if ($file_name) {
            $import = new AddStaffImport();
            Excel::import($import, $file_name);
            $importedData = $import->getImportedData();
            $importData = [];
            foreach ($importedData as $value){
                $my_array = collect($importData);
                $email_to_check = $value['email'];
                $phone_to_check = $value['phone_number'];
                $hasGoogle = $my_array->contains(function ($site, $key) use ($email_to_check,$phone_to_check) {
                    return $site['email'] == $email_to_check || $site['phone_number'] == $phone_to_check;
                });
                if($hasGoogle){
                    continue;
                }else{
                    if(Staff::where(function ($query) use ($value){
                        $query->where('phone_number',$value['phone_number'])->orWhere('email',$value['email']);
                    })->where('business_id',$this->business_id)->exists()){
                        $exists = 1;
                    }else{
                        $exists = 0;
                    }
                    $data = array(
                        'name' => $value['name'],
                        'middle_name' => $value['middle_name'],
                        'last_name' => $value['last_name'],
                        'phone_number' => $value['phone_number'],
                        'email' => $value['email'],
                        'salary_amount' => $value['salary_amount'],
                        'business_id' => $this->business_id,
                        'account_holder_name'=>$value['account_holder_name'],
                        'account_number'=>$value['account_number'],
                        'IFSC_code'=>$value['ifsc_code'],
                        'UPI_id'=>$value['upi_id'],
                        'exists'=>$exists
                    );
                    $importData[] = $data;
                }
            }
            session(['bulkExcelData' => $importData]);
            return response()->json(['message'=>'Excel file imported successfully', 'status'=>'1']);
        } else {
            return redirect()->back()->with('Fail', 'Excel file not import.');
        }
    }
    public function excelAddStaff(Request $request){
        $staff_record = [];
        $bank_staff_record = [];
        foreach ($request->data as $item) {
            $data = array(
                'name' => $item['name'],
                'middle_name' => $item['middle_name'],
                'last_name' => $item['last_name'],
                'phone_number' => $item['phone_number'],
                'email' => $item['email'],
                'department_id' => 1,
                'salary_amount' => $item['salary_amount'],
                'salary_cycle' => 1,
                'business_id' => $this->business_id
            );
            $bank_data = array(
                'account_holder_name'=>$item['account_holder_name'],
                'account_number'=>$item['account_number'],
                'IFSC_code'=>$item['IFSC_code'],
                'UPI_id'=>$item['UPI_id'],
            );
            $staff_record[] = $data;
            $bank_staff_record[] = $bank_data;
        }

        $add_staff = array_intersect_key($staff_record, array_flip($request->selectedIds));
        $add_bank_staff = array_intersect_key($bank_staff_record, array_flip($request->selectedIds));
        foreach ($add_staff as $key=>$staff){
            $staff_id = Staff::insertGetId($staff);
            $add_bank_staff[$key]['staff_id'] = $staff_id;
            $staffs = StaffBankDetail::insert($add_bank_staff[$key]);
        }
        session()->forget('bulkExcelData');
        if($staffs){
            return response()->json(["message" => 'Onboarding staff successfully', "status" => 1]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }

    public function staffAttendanceList(Request $request){
        DB::statement("SET SQL_MODE=''");
        $totalFilteredRecord = $totalDataRecord = $draw_val = "";
        $columns_list = array(
            0 =>'name',
            1 =>'date',
            2 =>'staff_time',
            3 =>'note',
            4 =>'status',
            5 =>'overtime',
            6 =>'fine',
            7 =>'action',
        );
        // $calender_date = str_replace(',', '', $request->calender_date);
        $start_date = Carbon::parse($request->start_date)->toDateString();
        $end_date = Carbon::parse($request->end_date)->toDateString();

        $totalDataRecord = Attendance::where('staff_id',$request->staff_id)
            ->whereBetween('date', [$start_date, $end_date])
            ->groupBy('date')
            ->count();
        $post_data = Attendance::with(['Staff.StaffPhoto','Staff.Department','Staff'])
            ->where('staff_id',$request->staff_id)
            ->whereBetween('date', [$start_date, $end_date])
            ->groupBy('date')
            ->get();

        $data_val = array();
        if (!empty($post_data)) {
            foreach ($post_data as $post_val) {
                $total_hours = Attendance::where('staff_id', $request->staff_id)->where('date', $post_val->date)->pluck('total_time')->toArray();

                // $total_seconds = array_reduce($total_hours, function ($carry, $time) {
                //     list($hours, $minutes, $seconds) = explode(':', $time);
                //     return $carry + ($hours * 3600) + ($minutes * 60) + $seconds;
                // }, 0);

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
                
                $totalHours = floor($total_seconds / 3600); // Calculate total hours
                $totalMinutes = round(($total_seconds % 3600) / 60); // Calculate total minutes

                $totalTime = "{$totalHours}h {$totalMinutes}m";

                $business_hour = Business::where('id', $this->business_id)->pluck('shift_hour')->toArray();
                if($totalTime > $business_hour){
                    $business_seconds = array_reduce($business_hour, function ($carry, $time) {
                        list($bh, $bm, $bs) = explode(':', $time);
                        return $carry + ($bh * 3600) + ($bm * 60) + $bs;
                    }, 0);
                    $differenceSeconds = abs($total_seconds - $business_seconds);
                    $hoursDifference = floor($differenceSeconds / 3600);
                    $minutesDifference = floor(($differenceSeconds % 3600) / 60);
                    $differenceFormat = "{$hoursDifference}h {$minutesDifference}m";
                }

                $formattedDate = Carbon::parse($post_val->date)->format('d M | D');
                $url = url('/assets/admin/images/dummy/dummy-user.png');
                if(!empty($post_val->StaffPhoto[0])){
                    $url = url('/assets/admin/images/staff_photos/'.$post_val->StaffPhoto[0]->photo);
                }
                foreach ($post_val->Staff as $staff) {
                    $postnestedData['name'] = $staff['name'];
                    $postnestedData['id'] = $post_val->id;
                    $postnestedData['staff_ids'] = $staff['id'];
                    $postnestedData['staff_photo'] = $url;
                    $postnestedData['department_name'] = $staff['Department']['name'];
                }
                $postnestedData['date'] = $formattedDate;
                $postnestedData['staff_time'] = $totalTime;
                $postnestedData['note'] = $post_val->note ? $post_val->note : '-';
                $postnestedData['status'] = $post_val->status;
                $postnestedData['overtime'] = $differenceFormat ?? '-';
                $postnestedData['fine'] = $post_val->fine ? $post_val->fine : '-';;
                if ($post_val->note) {
                    $note_icon = '<div class="atten-action-main">
                    <div onclick="displayNote(\'' . $post_val->date . '\', ' . $request->staff_id . ')" class="create-data dropdown-toggle proxima_nova_bold" data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7093 8.33625C13.1573 7.88825 13.884 7.88758 14.332 8.33625V8.33625C14.78 8.78425 14.78 9.51092 14.3313 9.95892L10.482 13.8049C10.3573 13.9296 10.188 13.9996 10.0113 13.9996H8.66797V12.6563C8.66797 12.4796 8.73797 12.3103 8.8633 12.1849L12.7093 8.33625V8.33625Z" stroke="#2F8CFF" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.01953 5.99961C4.01953 5.64062 4.31055 5.34961 4.66953 5.34961H10.0029C10.3618 5.34961 10.6529 5.64062 10.6529 5.99961C10.6529 6.35859 10.3618 6.64961 10.0029 6.64961H4.66953C4.31055 6.64961 4.01953 6.35859 4.01953 5.99961Z" fill="#2F8CFF"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.01953 8.66562C4.01953 8.30664 4.31055 8.01562 4.66953 8.01562H8.00286C8.36185 8.01562 8.65286 8.30664 8.65286 8.66562C8.65286 9.02461 8.36185 9.31562 8.00286 9.31562H4.66953C4.31055 9.31562 4.01953 9.02461 4.01953 8.66562Z" fill="#2F8CFF"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.01953 11.3336C4.01953 10.9746 4.31055 10.6836 4.66953 10.6836H6.66953C7.02852 10.6836 7.31953 10.9746 7.31953 11.3336C7.31953 11.6926 7.02852 11.9836 6.66953 11.9836H4.66953C4.31055 11.9836 4.01953 11.6926 4.01953 11.3336Z" fill="#2F8CFF"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3935 8.72651C11.6473 8.47267 12.0589 8.47267 12.3127 8.72651L13.9394 10.3532C14.1933 10.607 14.1933 11.0186 13.9394 11.2724C13.6856 11.5263 13.274 11.5263 13.0202 11.2724L11.3935 9.64575C11.1397 9.39191 11.1397 8.98035 11.3935 8.72651Z" fill="#2F8CFF"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.35156 3.99896C1.35156 2.90331 2.23924 2.01562 3.3349 2.01562H11.3349C12.4305 2.01562 13.3182 2.90331 13.3182 3.99896V5.99896C13.3182 6.35794 13.0272 6.64896 12.6682 6.64896C12.3092 6.64896 12.0182 6.35794 12.0182 5.99896V3.99896C12.0182 3.62128 11.7126 3.31562 11.3349 3.31562H3.3349C2.95721 3.31562 2.65156 3.62128 2.65156 3.99896V12.6656C2.65156 13.0433 2.95721 13.349 3.3349 13.349H6.00156C6.36055 13.349 6.65156 13.64 6.65156 13.999C6.65156 14.3579 6.36055 14.649 6.00156 14.649H3.3349C2.23924 14.649 1.35156 13.7613 1.35156 12.6656V3.99896Z" fill="#2F8CFF"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0016 1.34961C10.3605 1.34961 10.6516 1.64062 10.6516 1.99961V3.33294C10.6516 3.69193 10.3605 3.98294 10.0016 3.98294C9.64258 3.98294 9.35156 3.69193 9.35156 3.33294V1.99961C9.35156 1.64062 9.64258 1.34961 10.0016 1.34961Z" fill="#2F8CFF"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33359 1.34961C7.69258 1.34961 7.98359 1.64062 7.98359 1.99961V3.33294C7.98359 3.69193 7.69258 3.98294 7.33359 3.98294C6.97461 3.98294 6.68359 3.69193 6.68359 3.33294V1.99961C6.68359 1.64062 6.97461 1.34961 7.33359 1.34961Z" fill="#2F8CFF"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.66953 1.34961C5.02852 1.34961 5.31953 1.64062 5.31953 1.99961V3.33294C5.31953 3.69193 5.02852 3.98294 4.66953 3.98294C4.31055 3.98294 4.01953 3.69193 4.01953 3.33294V1.99961C4.01953 1.64062 4.31055 1.34961 4.66953 1.34961Z" fill="#2F8CFF"></path>
                        </svg>
                    </div>';
                }else{
                    $note_icon = '<div class="atten-action-main">
                        <div onclick="displayNote(\'' . $post_val->date . '\', ' . $request->staff_id . ')" class="create-data  dropdown-toggle proxima_nova_bold" data-bs-toggle="offcanvas" data-bs-target="#create-toggle-right" aria-controls="create-toggle-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.68359 5.33359C4.68359 4.97461 4.97461 4.68359 5.33359 4.68359H10.6669C11.0259 4.68359 11.3169 4.97461 11.3169 5.33359C11.3169 5.69258 11.0259 5.98359 10.6669 5.98359H5.33359C4.97461 5.98359 4.68359 5.69258 4.68359 5.33359Z" fill="#808080"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.68359 7.99961C4.68359 7.64062 4.97461 7.34961 5.33359 7.34961H8.66693C9.02591 7.34961 9.31693 7.64062 9.31693 7.99961C9.31693 8.35859 9.02591 8.64961 8.66693 8.64961H5.33359C4.97461 8.64961 4.68359 8.35859 4.68359 7.99961Z" fill="#808080"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.68359 10.6656C4.68359 10.3066 4.97461 10.0156 5.33359 10.0156H7.33359C7.69258 10.0156 7.98359 10.3066 7.98359 10.6656C7.98359 11.0246 7.69258 11.3156 7.33359 11.3156H5.33359C4.97461 11.3156 4.68359 11.0246 4.68359 10.6656Z" fill="#808080"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.01562 4.12799C2.01562 3.01917 2.84839 2.01562 3.99896 2.01562H11.999C13.1495 2.01562 13.9823 3.01917 13.9823 4.12799V12.5366C13.9823 13.6454 13.1495 14.649 11.999 14.649H3.99896C2.84839 14.649 2.01562 13.6454 2.01562 12.5366V4.12799ZM3.99896 3.31562C3.67677 3.31562 3.31562 3.62152 3.31562 4.12799V12.5366C3.31562 13.0431 3.67677 13.349 3.99896 13.349H11.999C12.3211 13.349 12.6823 13.0431 12.6823 12.5366V4.12799C12.6823 3.62152 12.3211 3.31562 11.999 3.31562H3.99896Z" fill="#808080"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3336 1.34961C10.6926 1.34961 10.9836 1.64062 10.9836 1.99961V3.33294C10.9836 3.69193 10.6926 3.98294 10.3336 3.98294C9.97461 3.98294 9.68359 3.69193 9.68359 3.33294V1.99961C9.68359 1.64062 9.97461 1.34961 10.3336 1.34961Z" fill="#808080"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99766 1.34961C8.35664 1.34961 8.64766 1.64062 8.64766 1.99961V3.33294C8.64766 3.69193 8.35664 3.98294 7.99766 3.98294C7.63867 3.98294 7.34766 3.69193 7.34766 3.33294V1.99961C7.34766 1.64062 7.63867 1.34961 7.99766 1.34961Z" fill="#808080"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33359 1.34961C5.69258 1.34961 5.98359 1.64062 5.98359 1.99961V3.33294C5.98359 3.69193 5.69258 3.98294 5.33359 3.98294C4.97461 3.98294 4.68359 3.69193 4.68359 3.33294V1.99961C4.68359 1.64062 4.97461 1.34961 5.33359 1.34961Z" fill="#808080"></path>
                            </svg>
                        </div>';
                }
                $postnestedData['action'] = $note_icon.'<div onclick="viewLog('. $post_val->id . ')" class="create-data  dropdown-toggle proxima_nova_bold" data-bs-toggle="offcanvas" data-bs-target="#view-toggle-right" aria-controls="view-toggle-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33238 2.64766C3.84993 2.64766 2.64766 3.84993 2.64766 5.33238V10.6679C2.64766 12.1504 3.84993 13.3527 5.33238 13.3527H10.6679C12.1504 13.3527 13.3527 12.1504 13.3527 10.6679V5.33238C13.3527 3.84993 12.1504 2.64766 10.6679 2.64766H5.33238ZM1.34766 5.33238C1.34766 3.13196 3.13196 1.34766 5.33238 1.34766H10.6679C12.8684 1.34766 14.6527 3.13196 14.6527 5.33238V10.6679C14.6527 12.8684 12.8684 14.6527 10.6679 14.6527H5.33238C3.13196 14.6527 1.34766 12.8684 1.34766 10.6679V5.33238Z" fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08204 5.50149C7.07982 4.99121 7.49381 4.58203 7.99811 4.58203C8.50307 4.58203 8.91551 4.99057 8.91551 5.49877C8.91551 6.00503 8.50502 6.4155 7.99877 6.4155C7.49342 6.4155 7.08351 6.00648 7.08204 5.50149Z" fill="#808080" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.75 7.62305C6.75 7.20883 7.08579 6.87305 7.5 6.87305H8.16694C8.58116 6.87305 8.91694 7.20883 8.91694 7.62305V10.791C8.91694 11.2052 8.58116 11.541 8.16694 11.541C7.75273 11.541 7.41694 11.2052 7.41694 10.791V8.3685C7.04181 8.32717 6.75 8.00919 6.75 7.62305Z" fill="#808080" />
                        </svg>
                    </div>
                </div>';
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
    public function staffDisplayNoteData(Request $request){
        $staff_name = Staff::select('id','name')->where('id',$request->staff_id)->get();
        $staff_note = Attendance::select('id','note','date')->where('staff_id',$request->staff_id)->where('date',$request->date)->first();
        return response()->json(['message' => 'success', 'status' => 1, 'staff_note' => $staff_note, 'staff_name' => $staff_name]);
    }
    public function addStaffNote(Request $request){
        //        return $request;
        $staff_note = Attendance::where('staff_id',$request->staff_id)->where('date',$request->attendance_date)->update(['note'=>$request->note_area]);
        if($staff_note){
            return response()->json(["message" => 'Add note successfully', "status" => 1]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }

    public function attendanceStaffOnDateChange(Request $request){
            // if(!($request->start_date && $request->end_date)){
            //     $start_date = Carbon::parse($request->start_date)->toDateString();
            //     $end_date = Carbon::parse($request->end_date)->toDateString();
            // }

            $start_date = Carbon::parse($request->start_date)->toDateString();
            $end_date = Carbon::parse($request->end_date)->toDateString();
//            $from = Carbon::parse($request->start_date);
//            $to = Carbon::parse($request->end_date);
//            $workingDaysCount = $to->diffInWeekdays($from);

//            $to = Carbon::parse($request->end_date)->endOfDay();
//            $from = Carbon::parse($request->start_date)->startOfDay();
//
//
//            $workingDaysCount = $from->diffInDaysFiltered(function (Carbon $date) {
//                return $date->isWeekday();
//            }, $to);

            // $month = Carbon::now();
            // $startDate = \Carbon\Carbon::parse($month)->startOfMonth();
            // $endDate = \Carbon\Carbon::parse($month)->endOfMonth();
            // $workingDaysCount = 0;
            // $days = $startDate->copy();

            // while ($days <= $endDate) {
            //     if ($days->isWeekday()) {
            //         $workingDaysCount++;
            //     }
            //     $days->addDay();
            // }
        $present_count = Attendance::where('staff_id',$request->staff_id)->whereBetween('date', [$start_date, $end_date])->where('status', 'Present')->distinct('date')->count();
        $absent_count = Attendance::where('staff_id',$request->staff_id)->whereBetween('date', [$start_date, $end_date])->where('status', 'Absent')->distinct('date')->count();
//            $absent_count = $workingDaysCount - $present_count;
        $halfday_count = Attendance::where('staff_id',$request->staff_id)->whereBetween('date', [$start_date, $end_date])->where('status', 'Half Day')->distinct('date')->count();
        $paidleave_count = Attendance::where('staff_id',$request->staff_id)->whereBetween('date', [$start_date, $end_date])->where('status', 'Paid Leave')->distinct('date')->count();
        $workingDaysCount = $present_count + $absent_count;
        return response()->json(['message' => 'success', 'status' => 1, 'month_count'=>$workingDaysCount,'present_count'=>$present_count,'absent_count'=>$absent_count,'halfday_count'=>$halfday_count, 'paidleave_count'=>$paidleave_count]);
    }

    public function sttafattendanceStatusChange(Request $request){
        $start_date = Carbon::parse($request->start_date)->toDateString();
        $end_date = Carbon::parse($request->end_date)->toDateString();
        $from = Carbon::parse($request->start_date);
        $to = Carbon::parse($request->end_date);
        $workingDaysCount = $to->diffInWeekdays($from);
        $staff_id = Attendance::where('id', $request->attendance_id)->value('staff_id');
        $staff_name = Staff::where('id', $staff_id)->value('name');
        $attendance_date = Attendance::where('id', $request->attendance_id)->where('staff_id', $staff_id)->value('date');
        
        $attendance = Attendance::where('staff_id', $staff_id)->where('date', $attendance_date)->orderBy('created_at', 'desc')->get()->take(1);
        if($attendance[0]->in_time){
            $status = Attendance::where('staff_id', $staff_id)->where('date', $attendance_date)->update(['status' => $request->status,]);
        } else {
            $status = Attendance::where('staff_id', $staff_id)->where('date', $attendance_date)->update(['status' => $request->status, 'in_time' => Carbon::Now('Asia/Kolkata')->toTimeString()]);
        }
        $admin = Auth::user();
        // if (Log::where('staff_id', $staff_id)->where('log_by', $admin['id'])->whereDate('created_at', Carbon::now())->exists()) {
        //     Log::where('staff_id', $staff_id)->where('log_by', $admin['id'])->whereDate('created_at', Carbon::now())->update(['detail' => $request->status]);
        // } else {
            $log = Log::insert(['staff_id' => $staff_id, 'log_by' => $admin['id'], 'detail' => $request->status]);
        // }

        $present_count = Attendance::where('staff_id',$staff_id)->whereBetween('date', [$start_date, $end_date])->where('status', 'Present')->distinct('date')->count();
        $absent_count = Attendance::where('staff_id',$staff_id)->whereBetween('date', [$start_date, $end_date])->where('status', 'Absent')->distinct('date')->count();
//        $absent_count = $workingDaysCount - $present_count;
        $halfday_count = Attendance::where('staff_id',$staff_id)->whereBetween('date', [$start_date, $end_date])->where('status', 'Half Day')->distinct('date')->count();
        $paidleave_count = Attendance::where('staff_id',$staff_id)->whereBetween('date', [$start_date, $end_date])->where('status', 'Paid Leave')->distinct('date')->count();

        // $this->attendanceStaffOnDateChange($request);
        return response()->json(['message' => $staff_name .' marked '. $request->status.' Successfully', 'status' => 1, 'present_count'=>$present_count,'absent_count'=>$absent_count,'halfday_count'=>$halfday_count, 'paidleave_count'=>$paidleave_count]);
    }

    public function viewProfile($id){
        $header_title = "Edit Profile";
        $department = Department::where('business_id',$this->business_id)->orWhereNull('business_id')->orderBy('id','desc')->get();
        $staff = Staff::with(['StaffPhoto:id,staff_id,photo', 'StaffBankDetail:id,staff_id,account_holder_name,account_number,IFSC_code,UPI_id', 'Department:id,name'])->where('id',$id)->get();
        $staff_personal_info = StaffProfile::where('staff_id',$id)->get();
        if($staff_personal_info->isEmpty()){
            $date_of_birthday = null;
        }else{
            $date_of_birthday = $staff_personal_info[0]->date_of_birth ? Carbon::parse($staff_personal_info[0]->date_of_birth)->format('d M Y') : null;
        }
        $staff_info = StaffInfo::where('staff_id',$id)->get();
        if($staff_info->isEmpty()){
            $date_of_joining = null;
        }else{
            $date_of_joining = $staff_info[0]->date_of_joining ? Carbon::parse($staff_info[0]->date_of_joining)->format('d M Y') : null ;
        }
        $staff_documents = StaffDcoument::where('staff_id',$id)->get();
        $staff_bank_details = StaffBankDetail::where('staff_id',$id)->get();
        return view('staffmanagement::view_profile', ['header_title'=>$header_title, 'business'=>$this->business, 'user_profile'=>$this->user_profile , 'staff'=>$staff,
            'departments'=>$department,'staff_personal_info'=>$staff_personal_info,'staff_info'=>$staff_info,'staff_documents'=>$staff_documents,'staff_bank_details'=>$staff_bank_details,'date_of_birthday'=>$date_of_birthday,'date_of_joining'=>$date_of_joining]);
    }
    public function staffInfo(Request $request){
        $date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
        $date_of_joining = Carbon::parse($request->date_of_joining)->format('Y-m-d');
        if($request->remove_documents != null){
            foreach ($request->remove_documents as $value){
                $staff_document_id[] = StaffDcoument::where('documents',$value)->value('id');
                $imagePath = public_path('assets/admin/images/staff_document/' . $value);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            StaffDcoument::whereIn('id',$staff_document_id)->delete();
        }
        if($request->new_documents != null){
            foreach ($request->new_documents as $value){
                StaffDcoument::insert(['staff_id'=>$request->staff_id,'documents'=>$value]);
            }
        }
        if(Staff::where('id',$request->staff_id)->value('email') == null){
            if(Staff::where('email',$request->staff_email)->exists()){
                return response()->json(["message" => 'Email should not be duplicate (two employees can not have same email )', "status" => 2]);
            }
        }
        Staff::where('id',$request->staff_id)->update(['name'=>$request->first_name,'last_name'=>$request->last_name,'middle_name'=>$request->middle_name,'phone_number'=>str_replace(' ', '', $request->phone_number),'department_id'=>$request->department_id,'email' => $request->staff_email]);
        if(StaffProfile::where('staff_id',$request->staff_id)->exists()){
            StaffProfile::where('staff_id',$request->staff_id)->update(['date_of_birth'=>$date_of_birth,'gender'=>$request->gender,'address1'=>$request->address1,
                'address2'=>$request->address2,'city'=>$request->city,'state'=>$request->state,'pincode'=>$request->pincode]);
        }else{
            StaffProfile::insert(['staff_id'=>$request->staff_id,'date_of_birth'=>$date_of_birth,'gender'=>$request->gender,'address1'=>$request->address1,
                'address2'=>$request->address2,'city'=>$request->city,'state'=>$request->state,'pincode'=>$request->pincode]);
        }
        if(StaffInfo::where('staff_id',$request->staff_id)->exists()){
            $staff_info = StaffInfo::where('staff_id',$request->staff_id)->update(['date_of_joining'=>$date_of_joining,'designation'=>$request->designation,'UAN_number'=>$request->UAN_number,
                'ESI_number'=>$request->ESI_number,'PAN_number'=>$request->PAN_number]);
        }else{
            $staff_info = StaffInfo::insert(['staff_id'=>$request->staff_id,'date_of_joining'=>$date_of_joining,'designation'=>$request->designation,'UAN_number'=>$request->UAN_number,
                'ESI_number'=>$request->ESI_number,'PAN_number'=>$request->PAN_number]);
        }
        if($staff_info){
            return response()->json(["message" => 'Staff profile update successfully', "status" => 1]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }

    public function staffBankDetails(Request $request){
        if(StaffBankDetail::where('staff_id',$request->staff_id)->exists()){
            $bank_detail = StaffBankDetail::where('staff_id',$request->staff_id)->update(['account_holder_name'=>$request->account_holder_name,'account_number'=>$request->account_number,
                'IFSC_code'=>$request->IFSC_code,'UPI_id'=>$request->UPI_id]);
        }else{
            $bank_detail = StaffBankDetail::insert(['staff_id'=>$request->staff_id,'account_holder_name'=>$request->account_holder_name,'account_number'=>$request->account_number,
                'IFSC_code'=>$request->IFSC_code,'UPI_id'=>$request->UPI_id]);
        }
        if($bank_detail){
            return response()->json(["message" => 'Bank details update successfully', "status" => 1]);
        }else{
            return response()->json(['message'=>'Something is wrong.', 'status'=>0]);
        }
    }

    public function staffAttendanceExport(Request $request) 
    {  
        $staffId = $request->input('staff_id');
        $calender_date = $request->input('calender_date');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $staff = Staff::where('id', $staffId)->first();
            // return $data = Attendance::where('staff_id', $request->staff_id)->whereMonth('date',$month->month)->get();
            
        return Excel::download(new StaffAttendanceExport($staffId, $calender_date,$start_date, $end_date), $staff['name'].' '. $staff['last_name'].'-Attendance-report.xlsx');
    }

    public function downloadTemplateExcel(Request $request){
        return Excel::download(new DownloadTemplateExport(), 'sample-add-staff.xlsx');
    }

    public function StaffInfoExport(Request $request) 
    {  
        $selectedIds = $request->input('selectedIds');
        return Excel::download(new StaffInfoExport($selectedIds), 'Staff-Information.xlsx');
    }

    public function deactivateStaff(Request $request){
        // return $request;
        $deactivate_staff = Staff::where('id',$request->staff_id)->update(['is_deactivate' => 1, 'deactivate_date' => Carbon::now()->toDateString()]);
        if($deactivate_staff){
            return response()->json(["message" => 'Staff deactivated successfully', "status" => 1]);
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
        return view('staffmanagement::create');
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
        return view('staffmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('staffmanagement::edit');
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
