<?php

namespace App\Http\Controllers\Finance;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all(['id','name']);
        $rewards = Finance::all();
        return view('finance.rewards',compact('teachers','rewards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all(['id','name']);
        return view('finance.add',compact('teachers'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'teacher_id'=>'required|exists:teachers,id',
        'money'=>'required|numeric',
        'type'=>'required',
       ]);
       if($request->type == 1){
        Finance::create([
            'teacher_id'=>$request->teacher_id,
            'reward'=>$request->money ,
            'reason'=>$request->reason 
        ]);
       }elseif($request->type == 2){
        Finance::create([
            'teacher_id'=>$request->teacher_id,
            'penalty'=>-$request->money ,
            'reason'=>$request->reason 
        ]);
       }
       return redirect()->route('rewards.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finance $reward)
    {
        $teachers = Teacher::all(['id','name']);
        return view('finance.edit',compact('teachers','reward'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Finance::findOrFail($id)->delete();
        return back();
    }
}
