<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeacherRating;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
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
       return view('teachers.add');
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
        ]);
        DB::beginTransaction();
        $data = array_merge($request->only(['name','email','password','phone']),[
            'password'=>bcrypt($request->password),
            'pass'=>$request->password,

        ]);
        $teacher =Teacher::create($data);
        TeacherRating::create([
            'teacher_id'=>$teacher->id
        ]);
        DB::commit();
        return redirect()->route('supervisor_teachers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phone'=>'required',
        ]);
       
        $data = array_merge($request->only(['name','email','password','phone']),[
            'password'=>bcrypt($request->password),
            'pass'=>$request->password,

        ]);
        $teacher->update($data);
        
       
        return redirect()->route('supervisor_teachers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    public function block_teacher($id){

        $teacher = Teacher::findOrFail($id)->update([
            'block'=>1
        ]);
        return back();
    }
    public function active_teacher($id){

        $teacher = Teacher::findOrFail($id)->update([
            'block'=>0
        ]);
        return back();
    }
}
