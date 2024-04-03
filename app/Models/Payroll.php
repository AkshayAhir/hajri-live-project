<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    public function Staff(){
        return $this->belongsTo(Staff::class,'staff_id','id')->withTrashed();
    }
}
