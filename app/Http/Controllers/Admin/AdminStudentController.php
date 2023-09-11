<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminStudentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all(['name','id']);
        return view('admin.students.add',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phone'=>'required',
            'teacher_id'=>'required',
        ]);
        $data = array_merge($request->only(['name','email','password','phone','teacher_id','lessons_no']),[
            'password'=>bcrypt($request->password),
            'pass'=>$request->password,
        ]);
        Student::create($data);
        return redirect()->route('admin_students');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::all(['id','name']);
        return view('admin.students.edit',compact('student','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phone'=>'required',
            'teacher_id'=>'required',
        ]);
        $data = array_merge($request->only(['name','email','password','phone','teacher_id','lessons_no']),[
            'password'=>bcrypt($request->password),
            'pass'=>$request->password,
        ]);
        $student->update($data);
        return redirect()->route('admin_students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function block_student($id){

        $student = Student::findOrFail($id)->update([
            'block'=>1
        ]);
        return back();
    }
    public function active_student($id){

        $student = Student::findOrFail($id)->update([
            'block'=>0
        ]);
        return back();
    }

    public function add_student_notes($id ,Request $request){

        $student = Student::findOrFail($id)->update([
            'notes'=>$request->notes
        ]);
        return back();
    }
}
