<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ClassModel;
use Illuminate\Support\Str;
class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }
    public function add()
    {
        $data['getClass_assign'] = ClassModel::getClass_assign();
        $data['header_title'] = "Add new student";
        // set title
        return view('admin.student.add', $data);
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        $student = new User();
        $student->name = trim($request->first_name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_numer = trim($request->roll_numer);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }  
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }  
        
        if(!empty($request->file('profile_pic')))
        {
            $ext= $request->file('profile_pic')->getClientOriginalExtension();
            $file= $request->file('profile_pic');
            $randomStr = date('Ymdis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $student->profile_pic =  $filename;

        }
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->status = trim($request->status);
        $student->usertype = 3;
        $student->save();
        return redirect('admin/student/list')->with('success', "Add student successfully");
    }
}
