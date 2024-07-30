<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function change_password()
    {
        $data['header_title']= "Change password";
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Password updated successfully");
        }else
        {
            return redirect()->back()->with('error', "Old password is invalid");
        }
    }
    public function my_account()
    {
        $data['getRecord']= User::getSingle(Auth::user()->id);
        $data['header_title']= "My account";
        return view('teacher.my_account', $data);
    }
    public function update_my_account(Request $request)
    {
        $id = Auth::user()->id;
        $teacher = User::getSingle($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$teacher->id,
            'address' => 'max:255',
            'qualification' => 'max:255',
            'work_experience' => 'max:255',
            'date_of_join' => 'max:255',
            'mobile_number' => 'max:15|min:8',
        ]);
        $teacher->name = trim($request->teacher_name);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->gender = trim($request->gender);
        $teacher->qualification = trim($request->qualification);
        $teacher->address = trim($request->address);
        $teacher->work_experience = trim($request->work_experience );
        $teacher->email = trim($request->email);
        $teacher->date_of_birth = trim($request->date_of_birth);
        $teacher->date_of_join = trim($request->date_of_join);
        $teacher->note = trim($request->note);
        $teacher->password = Hash::make($request->password);
         // upload anh
         if(!empty($request->file('profile_pic')))
         {
             if(!empty($teacher->getProfile()))
             {
                 unlink('upload/profile/'.$teacher->profile_pic);
             }
             $ext= $request->file('profile_pic')->getClientOriginalExtension();
             $file= $request->file('profile_pic');
             $randomStr = date('Ymdis').Str::random(20);
             $filename = strtolower($randomStr).'.'.$ext;
             $file->move('upload/profile/',$filename);
             $teacher->profile_pic =  $filename;
 
         }
        $teacher->save();
        return redirect()->back()-> with('success', "Account updated successfully");
    }
}
