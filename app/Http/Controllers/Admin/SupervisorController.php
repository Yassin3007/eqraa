<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $supervisors = Supervisor::all();
        return view('admin.supervisors.index',compact('supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supervisors.add');
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
        $data = array_merge($request->only(['name','email','password','phone']),[
            'password'=>bcrypt($request->password),
            'pass'=>$request->password,

        ]);
        $teacher =Supervisor::create($data);
       
        return redirect()->route('supervisor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supervisor $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supervisor $supervisor)
    {
        return view('admin.supervisors.edit',compact('supervisor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supervisor $supervisor)
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
        $supervisor->update($data);
        
       
        return redirect()->route('supervisor.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supervisor::findOrFail($id)->delete();
        return back();
    }
}
