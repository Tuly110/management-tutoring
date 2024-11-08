<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title']= "Parent List";
        return view('admin/parent/list', $data);
    }
   
    public function add()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title']= "Add new Parent";
        return view('admin/parent/add', $data);
    }
    public function insert(Request $request)
    {
        $parent = new User();
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$parent->id,
            'mobile_number' => 'max:15|min:8',
            'address'=>'max:50',
        ]);
        $parent->name= trim($request->first_name);
        $parent->last_name= trim($request->last_name);
        $parent->mobile_number= trim($request->mobile_number);
        $parent->gender= trim($request->gender);
        $parent->occupation= trim($request->occupation);
        $parent->address= trim($request->address);
        $parent->status= trim($request->status);
        if(!empty($request->file('profile_pic')))
        {
            $ext= $request->file('profile_pic')->getClientOriginalExtension();
            $file= $request->file('profile_pic');
            $randomStr = date('Ymdis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $parent->profile_pic =  $filename;
            $parent->status= trim($request->status);
        }
        $parent->email = trim($request->email );
        $parent->password = Hash::make($request->password);
        $parent->usertype = 4;
        $parent->save();
        return redirect('admin/parent/list')->with('success', "Add parent successfully");

    }
    
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']= "Edit Parent";
            return view('admin/parent/edit', $data);
        }else{
            abort(404);
        }
        
    }

    public function update($id, Request $request)
    {
        $parent = User::getSingle($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$parent->id,
            'address'=>'max:50',
            'mobile_number' => 'max:15|min:8',
        ]);
        $parent->name= trim($request->first_name);
        $parent->last_name= trim($request->last_name);
        $parent->mobile_number= trim($request->mobile_number);
        $parent->gender= trim($request->gender);
        $parent->occupation= trim($request->occupation);
        $parent->address= trim($request->address);
        $parent->status= trim($request->status);
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
        $parent->status= trim($request->status);
        }
        $parent->email = trim($request->email );
        $parent->password = Hash::make($request->password);
        $parent->save();
        return redirect('admin/parent/list')->with('success', "Update parent successfully");
    }

    public function delete($id)
    {
        $parent = User::getSingle($id);
        if(!empty($parent))
        {
            $parent->is_delete=1;
            $parent->save();
            return redirect('admin/parent/list')->with('success', "Delete parent successfully");
        }else{
            abort(404);
        }
    }

    public function myStudent($id)
    {
        $data['getParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title']= "Parent Student List";
        return view('admin/parent/my_student', $data);
    }

    public function assignStudentParent($student_id, $parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();
        return redirect() -> back() ->with('success', "Student successfully assign");

    }
    public function assignStudentParentDelete($student_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();
        return redirect() -> back() ->with('success', "Student successfully assign deleted");
    }

    public function myStudentParent()
    {
        $id = Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title']= "Parent Student List";
        return view('parent/my_student', $data);
    }
}
