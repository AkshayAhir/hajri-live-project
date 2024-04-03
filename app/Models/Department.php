<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\GlobalSearchable;

class Department extends Model
{
    use HasFactory, SoftDeletes, GlobalSearchable;
    protected static $globalSearchColumns = ['name'];
    public function Staff(){
        return $this->hasMany(Staff::class,'department_id','id');
    }
    public function departmentStaff(){
        return $this->hasMany(Staff::class, 'department_id', 'id', 'business_id');
    }
}
