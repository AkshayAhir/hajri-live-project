<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    use HasFactory;
    public function business(){
        return $this->belongsTo(Business::class,'business_id','id')->select('id','name','business_address','salary_calculation','shift_hour');
    }
    public function Department(){
        return $this->hasMany(Department::class,'business_id','business_id' );
    }
}
