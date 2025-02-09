<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamModel;
use Auth;

class ExaminationsController extends Controller
{
    public function exam_list()
    {
        $data['getRecord']= ExamModel::getRecord();
        $data['headet_title']= "Exam list";
        return view('admin.examinations.exam.list',$data);
    }
}
