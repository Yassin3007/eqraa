<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherDashboardController extends Controller
{
    public function index(){
        return view('teachers.dashboard.index');
    }

    public function table(){
        $hours =[8,9,10,11,12,1,2,3,4,5,6,7,8,9,10,11,12];
        return view('teachers.dashboard.table',compact('hours'));
    }

    public function students(){
        $students = auth('teacher')->user()->students ;
        return view('teachers.dashboard.students',compact('students')); 
    }

    public function teacher_rewards(){
        $teacher = auth('teacher')->user();
        $rewards  = $teacher->rewards ;

        return view('teachers.dashboard.rewards',compact('rewards'));
    }
}
