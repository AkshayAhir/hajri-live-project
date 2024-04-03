<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Traits\GlobalSearchable;

class Staff extends Authenticatable
{
    use HasApiTokens,HasFactory ,SoftDeletes, LogsActivity, GlobalSearchable;
    
    protected static $globalSearchColumns = ['name'];

    protected $casts = [
        'img_bytes' => 'array',
        // 'photo_face' => 'array',
    ];
    protected $fillable = ['name', 'phone_number'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['phone_number']) // Log only changes to phone_number
            ->logOnlyDirty();
    }

    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()->useLogName('Staff')->logAll();
    // }

    public function StaffPhoto(){
        return $this->hasMany(StaffPhoto::class,'staff_id','id');
    }
    public function StaffBankDetail(){
        return $this->belongsTo(StaffBankDetail::class,'id','staff_id');
    }
    public function StaffInfo(){
        return $this->belongsTo(StaffInfo::class,'id','staff_id');
    }    
    public function Department(){
        return $this->belongsTo(Department::class,'department_id','id')->withTrashed();
    }
    public function Attendance(){
        return $this->hasMany(Attendance::class,'staff_id','id');
    }
    public function WeeklyHolidayStaff(){
        return $this->belongsTo(WeeklyHolidayStaff::class,'id','staff_id');
    }
    public function StaffProfile(){
        return $this->belongsTo(StaffProfile::class,'id','staff_id');
    }
    public function PayrollSalary(){
        return $this->belongsTo(Payroll::class,'id','staff_id');
    }
    public function Business(){
        return $this->belongsTo(Business::class,'business_id','id');
    }
}
