<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getClass();
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data);
    }
    public function add()
    {
       
        $data['header_title'] = "Add new class";
        // set title
        return view('admin.class.add', $data);
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        $class = new ClassModel();
        // $request->validate([
        //     'email' => 'required|email|unique:classs,email,'.$class->id,
        // ]);
        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->create_by = Auth::user()->id;
        $class->save();
        return redirect('admin/class/list')->with('success', "Add class successfully");
    }
    public function edit($id)
    {
        $data['getRecord']=ClassModel::getSingle($id);
        if(!empty( $data['getRecord']))
        {
            // set title
            $data['header_title'] = "Edit class";
            return view('admin.class.edit', $data);
        }else{
            abort(404);
        }
        
    }
    public function update(Request $request, $id)
    {

        $class = ClassModel::getSingle($id);
        
        $class->name = trim($request->name);
        $class->status = trim($request->status);
        $class->save();
        return redirect('admin/class/list')->with('success', "Update admin successfully");
    }
    public function delete( $id)
    {
        $class = ClassModel::getSingle($id);
        $class->is_delete =1;
        $class->save();
        return redirect('admin/class/list')->with('success', "Delete admin successfully");  
    }

}
