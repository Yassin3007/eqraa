<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginType($type){

        return view('auth.login',compact('type'));
    }

    public function postLogin(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(auth()->guard($request->type)->attempt(['email'=>$request->email ,'password'=>$request->password])){
            return redirect()->route($request->type .'_index'); 
        }else{
            return back();
        }
    }

    public function logout($type){

        auth()->guard($type)->logout();
        return redirect()->route('selection');
    }
}
