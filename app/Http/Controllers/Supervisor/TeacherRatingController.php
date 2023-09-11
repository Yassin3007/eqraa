<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use App\Models\TeacherRating;
use App\Http\Controllers\Controller;
use App\Models\Teacher;

class TeacherRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all(['id','name']);
        return view('supervisor.teacher_ratings',compact('teachers'));
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
    public function show(TeacherRating $teacherRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherRating $teacherRating)
    {
        return view('supervisor.edit_rating',compact('teacherRating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherRating $teacherRating)
    {
        $request->validate([
            'camera'=>'required|numeric|max:10',
            'background'=>'required|numeric|max:10',
            'material'=>'required|numeric|max:10',
            'interaction'=>'required|numeric|max:10',
            'regularity'=>'required|numeric|max:10',
        ]);
        $data = $request->only(['camera','background','material','interaction','regularity']);
        $data['average'] = array_sum($data) / count($data);
        $teacherRating->update($data);
        return redirect()->route('teacher_rating.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherRating $teacherRating)
    {
        //
    }
}
