<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
       
        $data['header_title'] = "Add new student";
        // set title
        return view('admin.student.add', $data);
    }
    // public function insert(Request $request)
    // {
    //     // dd($request->all());
    //     $class = new User();
    //     // $request->validate([
    //     //     'email' => 'required|email|unique:classs,email,'.$class->id,
    //     // ]);
    //     $class->name = trim($request->name);
    //     $class->status = trim($request->status);
    //     $class->create_by = Auth::user()->id;
    //     $class->save();
    //     return redirect('admin/class/list')->with('success', "Add class successfully");
    // }
}
