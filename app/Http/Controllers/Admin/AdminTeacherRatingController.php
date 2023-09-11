<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherRating;
use App\Http\Controllers\Controller;

class AdminTeacherRatingController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all(['id','name']);
        return view('admin.teacher_ratings',compact('teachers'));
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
    public function edit( $id)
    {

         $teacherRating = Teacher::findOrFail($id)->supervisorRating ;
        return view('admin.edit_rating',compact('teacherRating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
        $request->validate([
            'camera'=>'required|numeric|max:10',
            'background'=>'required|numeric|max:10',
            'material'=>'required|numeric|max:10',
            'interaction'=>'required|numeric|max:10',
            'regularity'=>'required|numeric|max:10',
        ]);

        $teacherRating = TeacherRating::findOrFail($id);
        $data = $request->only(['camera','background','material','interaction','regularity']);
        $data['average'] = array_sum($data) / count($data);
        $teacherRating->update($data);
        return redirect()->route('teachers_rating.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherRating $teacherRating)
    {
        //
    }
}
