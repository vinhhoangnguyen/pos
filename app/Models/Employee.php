<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function advance(){
        //return $this->hasMany(AdvanceSalary::class,'employee_id','id'); //return Collection, Json
        return $this->belongsTo(AdvanceSalary::class,'id','employee_id'); //return Object
    }


}
