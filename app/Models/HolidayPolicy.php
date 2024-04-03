<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPolicy extends Model
{
    use HasFactory;
    public function HolidayList(){
        return $this->hasMany(HolidayList::class,'template_id','id');
    }
}
