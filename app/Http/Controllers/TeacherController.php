<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.teacher.list', $data);
    }
    public function add()
    {
        // $data['getClass_assign'] = ClassModel::getClass_assign();
        $data['header_title'] = "Add new teacher";
        // set title
        return view('admin.teacher.add', $data);
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        $teacher = new User();
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$teacher->id,
            'address' => 'max:50',
            'qualification' => 'max:50',
            'work_experience' => 'max:50',
            'mobile_number' => 'max:15|min:8',
        ]);
        $teacher->name = trim($request->teacher_name);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->marital_status = trim($request->marital_status);
        $teacher->gender = trim($request->gender);
        $teacher->qualification = trim($request->qualification);
        $teacher->address = trim($request->address);
        $teacher->work_experience = trim($request->work_experience );
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->date_of_birth = trim($request->date_of_birth);
        $teacher->date_of_join = trim($request->date_of_join);
        $teacher->note = trim($request->note);
        $teacher->password = Hash::make($request->password);
        if(!empty($request->file('profile_pic')))
        {
            $ext= $request->file('profile_pic')->getClientOriginalExtension();
            $file= $request->file('profile_pic');
            $randomStr = date('Ymdis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $teacher->profile_pic =  $filename;

        }
        $teacher->usertype=2;
        $teacher->save();
        return redirect('admin/teacher/list')->with('success',"Add teacher sucessfully");
    }
    public function edit($id)
    {
        $data['getRecord']=User::getSingle($id);
        if(!empty( $data['getRecord']))
        {
            // $data['getClass_assign'] = ClassModel::getClass_assign();
            $data['header_title'] = "Edit teacher";
            // set title
            return view('admin.teacher.edit', $data);
        }else{
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        // dd($request->all());
        $teacher = User::getSingle($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$teacher->id,
            'address' => 'max:255',
            'qualification' => 'max:255',
            'work_experience' => 'max:255',
            'note' => 'max:255',
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
        $teacher->status = trim($request->status);
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
        return redirect('admin/teacher/list')->with('success',"Update teacher sucessfully");
    }
    public function delete( $id)
    {
        $teacher = User::getSingle($id);
        if(!empty($teacher))
        {
            $teacher->is_delete =1;
            $teacher->save();
            return redirect('admin/teacher/list')->with('success', "Delete teacher successfully"); 
        }else{
            abort(404);
        }
         
    }
}
