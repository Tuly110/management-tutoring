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
        if(Auth::user()->usertype==2)
        {
            return view('teacher.my_account', $data);
        }else if(Auth::user()->usertype==3)
        {
            return view('student.my_account', $data);
        }else{
            return view('parent.my_account', $data);
        }
        
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

    public function update_my_account_student(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id;
        $student = User::getSingle($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$student->id,
            'mobile_number' => 'max:15|min:8',
        ]);
        $student->name = trim($request->first_name);
        $student->last_name = trim($request->last_name);
        $student->mobile_number = trim($request->mobile_number);
        $student->gender = trim($request->gender);
        $student->email = trim($request->email);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
         // upload anh
         if(!empty($request->file('profile_pic')))
         {
             if(!empty($student->getProfile()))
             {
                 unlink('upload/profile/'.$student->profile_pic);
             }
             $ext= $request->file('profile_pic')->getClientOriginalExtension();
             $file= $request->file('profile_pic');
             $randomStr = date('Ymdis').Str::random(20);
             $filename = strtolower($randomStr).'.'.$ext;
             $file->move('upload/profile/',$filename);
             $student->profile_pic =  $filename;
 
         }
        $student->save();
        return redirect()->back()-> with('success', "Account updated successfully");
    }
    public function update_my_account_parent(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id;
        $parent = User::getSingle($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$parent->id,
            'address'=>'max:255',
            'occupation'=>'max:255',
            'mobile_number' => 'max:15|min:8',
        ]);
        $parent->name = trim($request->first_name);
        $parent->last_name = trim($request->last_name);
        $parent->mobile_number = trim($request->mobile_number);
        $parent->email = trim($request->email);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
         // upload anh
         if(!empty($request->file('profile_pic')))
         {
             if(!empty($parent->getProfile()))
             {
                 unlink('upload/profile/'.$parent->profile_pic);
             }
             $ext= $request->file('profile_pic')->getClientOriginalExtension();
             $file= $request->file('profile_pic');
             $randomStr = date('Ymdis').Str::random(20);
             $filename = strtolower($randomStr).'.'.$ext;
             $file->move('upload/profile/',$filename);
             $parent->profile_pic =  $filename;
 
         }
        $parent->save();
        return redirect()->back()-> with('success', "Account updated successfully");
    }
}
