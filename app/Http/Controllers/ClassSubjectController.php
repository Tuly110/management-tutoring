<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassSubjectModel::getassign_subject();
        $data['header_title'] = "Subject assign List";
        return view('admin.assign_subject.list', $data);
    }
    public function add()
    {
        // $data['getRecord'] = SubjectModel::getSubject();
        $data['getSubject_assign'] = SubjectModel::getSubject_assign();
        $data['getClass_assign'] = ClassModel::getClass_assign();
        $data['header_title'] = "Subject assign Add";
        return view('admin.assign_subject.add', $data);
    }
    public function insert(Request $request)
    {
        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }else{
                    $class_subject = new ClassSubjectModel();
                    $class_subject->class_id = $request->class_id;
                    $class_subject->subject_id = $subject_id;
                    $class_subject->status = $request->status;
                    $class_subject->created_by = Auth::user()->id;
                    $class_subject->save();
                }        
            }
            return redirect('admin/assign_subject/list')->with('success', "Add new Assign Subject successfully");
        }
        else
        {
            return redirect()->back()->with('error', "Due to some error please try again!");
        }
    }
    public function edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord']= $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getSubject_assign'] = SubjectModel::getSubject_assign();
            $data['getClass_assign'] = ClassModel::getClass_assign();
            $data['header_title'] = "Subject assign Edit";
            return view('admin.assign_subject.edit', $data);
        }else{
            abort(404);
        }
    }
    public function update(Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);
        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }else{
                    $class_subject = new ClassSubjectModel();
                    $class_subject->class_id = $request->class_id;
                    $class_subject->subject_id = $subject_id;
                    $class_subject->status = $request->status;
                    $class_subject->created_by = Auth::user()->id;
                    $class_subject->save();
                }        
            }
        }
        return redirect('admin/assign_subject/list')->with('success', "Update Assign Subject successfully");
    }
    public function delete($id)
    {
        $assign = ClassSubjectModel::getSingle($id);
        $assign->is_delete=1;
        $assign->save();
        return redirect('admin/assign_subject/list')->with('success', "Delete Assign Subject successfully");
    }

    public function edit_single($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord']= $getRecord;
            $data['getSubject_assign'] = SubjectModel::getSubject_assign();
            $data['getClass_assign'] = ClassModel::getClass_assign();
            $data['header_title'] = "Subject assign Edit";
            return view('admin.assign_subject.edit_single', $data);
        }else{
            abort(404);
        }
    }
    public function update_single(Request $request, $id)
    {
        $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
        if(!empty($getAlreadyFirst))
        {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_subject/list')->with('success', "Status successfully");

        }else{
            $class_subject =ClassSubjectModel::getSingle($id);
            $class_subject->class_id = $request->class_id;
            $class_subject->subject_id =$request->subject_id;
            $class_subject->status = $request->status;
            $class_subject->save();
            return redirect('admin/assign_subject/list')->with('success', "Update Assign Subject Single successfully");

        }     
    }
}
