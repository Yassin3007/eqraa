<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name','email','password','phone','block','pass'];

    public function supervisorRating(){
        return $this->hasOne(TeacherRating::class,'teacher_id');
    }

    public function students(){
        return $this->hasMany(Student::class , 'teacher_id');
    }

    public function rewards(){
        return $this->hasMany(Finance::class , 'teacher_id');
    }
    
}
