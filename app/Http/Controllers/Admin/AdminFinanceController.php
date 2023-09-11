<?php

namespace App\Http\Controllers\Admin;

use App\Models\Finance;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFinanceController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all(['id','name']);
        $rewards = Finance::all();
        return view('admin.finance.rewards',compact('teachers','rewards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all(['id','name']);
        return view('admin.finance.add',compact('teachers'));

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
       return redirect()->route('reward.index');

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
        return view('admin.finance.edit',compact('teachers','reward'));
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
