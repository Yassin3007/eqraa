<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupervisorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supervisor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Supervisor $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supervisor $supervisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supervisor $supervisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supervisor $supervisor)
    {
        //
    }

    public function getStudents(){
        $students = Student::all();
        return view('supervisor.students',compact('students'));
    }
    
    public function getTeachers(){
        $teachers = Teacher::all();
        return view('supervisor.teachers',compact('teachers'));
    }
}
