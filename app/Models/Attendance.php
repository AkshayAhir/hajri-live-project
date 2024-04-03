<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory,SoftDeletes;
    public function Staff(){
        return $this->hasMany(Staff::class,'id','staff_id');
    }

    public function StaffNote(){
        return $this->belongsTo(Staff::class,'staff_id','id');
    }

    public function StaffLog(){
        return $this->hasMany(Log::class,'staff_id','staff_id');
    }
}
