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
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$student->id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'mobile_number' => 'max:15|min:8',
        ]);
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
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->status = trim($request->status);
        $student->usertype = 3;
        $student->save();
        return redirect('admin/student/list')->with('success', "Add student successfully");
    }
    public function edit($id)
    {
        
        // $data['getRecord'] = User::getStudent();
        $data['getRecord']=User::getSingle($id);
        if(!empty( $data['getRecord']))
        {
            $data['getClass_assign'] = ClassModel::getClass_assign();
            $data['header_title'] = "Edit student";
            // set title
            return view('admin.student.edit', $data);
        }else{
            abort(404);
        }
        
    }
    public function update(Request $request, $id)
    {
        $student = User::getSingle($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'height' => 'max:10',
            'weight' => 'max:10',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'mobile_number' => 'max:15|min:8',
        ]);
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
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }
        $student->status = trim($request->status);
        
        $student->save();
        return redirect('admin/student/list')->with('success', "Update student successfully");
    }
    public function delete( $id)
    {
        $student = User::getSingle($id);
        if(!empty($student))
        {
            $student->is_delete =1;
            $student->save();
            return redirect('admin/student/list')->with('success', "Delete student successfully"); 
        }else{
            abort(404);
        }
         
    }
}
