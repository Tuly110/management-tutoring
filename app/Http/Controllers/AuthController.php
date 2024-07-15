<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make('01102004'));
        if(!empty(Auth::check())){
            if(Auth::user()->usertype ==1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->usertype ==2)
            {
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->usertype ==3)
            {
                return redirect('student/dashboard');
            }
            else if(Auth::user()->usertype ==4)
            {
                return redirect('parent/dashboard');
            }
        }
        return view('auth.login');
    }

    // public function AuthLogin(Request $request){
    //     dd($request->all());
    // }
    //Xu li login
    public function Authlogin(Request $request){
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->usertype ==1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->usertype ==2)
            {
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->usertype ==3)
            {
                return redirect('student/dashboard');
            }
            else if(Auth::user()->usertype ==4)
            {
                return redirect('parent/dashboard');
            }
            
        }else{
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
