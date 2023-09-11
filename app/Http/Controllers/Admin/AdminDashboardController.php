<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function getStudents(){
        $students = Student::all();
        return view('admin.students',compact('students'));
    }
    
    public function getTeachers(){
        $teachers = Teacher::all();
        return view('admin.teachers',compact('teachers'));
    }
}
