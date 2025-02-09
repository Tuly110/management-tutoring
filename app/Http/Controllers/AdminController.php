<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        // set title
        $data['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add new admin";
        // set title
        return view('admin.admin.add', $data);
    }
    public function edit($id)
    {
        $data['getRecord']=User::getSingle($id);
        if(!empty( $data['getRecord']))
        {
            $data['header_title'] = "Edit admin";
            // set title
            return view('admin.admin.edit', $data);
        }else{
            abort(404);
        }
        
    }
    public function insert(Request $request)
    {
        $user = new User();
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->usertype = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success', "Add admin successfully");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $user = User::getSingle($id);
        
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('admin/admin/list')->with('success', "Update admin successfully");
    }
    public function delete( $id)
    {
        $user = User::getSingle($id);
        $user->is_delete =1;
        $user->save();
        return redirect('admin/admin/list')->with('success', "Delete admin successfully");  
    }

}
