<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
    // Forgot Password
    public function forgotpassword()
    {
        return view('auth.forgot');
    }
    // post forgot 
    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = Str::random(20);
            $user->save();
            
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', "Please check your email and reset your password");

        }else{
            return redirect()->back()->with('error', "Email not found in the system");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
