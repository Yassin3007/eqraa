<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name','email','password','phone','teacher_id','lessons_no','block','pass','notes'];

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

}
