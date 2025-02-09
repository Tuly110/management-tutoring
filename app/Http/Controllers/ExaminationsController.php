<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamModel;
use Illuminate\Support\Facades\Auth;

class ExaminationsController extends Controller
{
    public function exam_list()
    {
        $data['getRecord']= ExamModel::getRecord();
        $data['header_title']= "Exam list";
        return view('admin.examinations.exam.list',$data);
    }

    public function exam_add()
    {
        $data['header_title']= "Add new Exam";
        return view('admin.examinations.exam.add',$data);
    }

    public function exam_insert(Request $request)
    {
        $exam = new ExamModel();
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();
        return redirect('admin/examinations/exam/list')->with('success', "Add new exam successfully");
    }

    public function exam_edit($id)
    {
        $data['getRecord']= ExamModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']='Edit Exam';
            return view('admin/examinations/exam/edit', $data);
        } 
        else
        {
            abort(404);
        }
    }
    public function exam_update($id, Request $request)
    {
        $exam= ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();
        return redirect('admin/examinations/exam/list')->with('success', "Add new exam successfully");
    }

    public function exam_delete($id)
    {
        $exam= ExamModel::getSingle($id);
        if(!empty($exam))
        {
            $exam->is_deleted =1;
            $exam->save();
            return redirect('admin/examinations/exam/list')->with('success', "Delete an exam successfully");  
        } 
        else
        {
            abort(404);
        }
       
    }
}
