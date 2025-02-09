<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\weekModel;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassSubjectTimetableModel;
use App\Models\SubjectModel;
use App\Models\User;

class ClassTimetableController extends Controller
{
    public function list(Request $request)
    {
        $data['header_title'] = "Class Timetable List";
        if(!empty($request->class_id))
        {
            $data['getSubject'] = ClassSubjectModel::mySubject($request->class_id);
        }

        $getWeek = weekModel::getRecord();
        $week = array();
        foreach($getWeek as $value)
        {
            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name']= $value->name;
            if(!empty($request->class_id) && !empty($request->subject_id))
            {
                $ClassSubject= ClassSubjectTimetableModel::getRecordSubjectTimetable($request->class_id,$request->subject_id, $value->id);
                if(!empty($ClassSubject))
                {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                }else{
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
            }
            else{
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }
            $week[] = $dataW;
        }
        $data['week'] = $week;

        $data['getClass_assign'] = ClassModel::getClass_assign();
        // $data['getRecord']=AssignClassTeacherModel::getAssignClassTeacher(); 
        return view('admin.class_timetable.list', $data);
    }

    public function get_subject(Request $request)
    {
        $getSubject = ClassSubjectModel::mySubject($request->class_id);
        $html = '<option value="">Select Subject</option>';
        foreach ($getSubject as $value) {
            $html .= '<option value="' . $value->subject_id . '">' . $value->subject_name . '</option>';
        }
        return response()->json(['html' => $html]);
    }

    public function insert_update(Request $request)
    {
        ClassSubjectTimetableModel::where('class_id', '=', $request->class_id)
        ->where('subject_id', '=', $request->subject_id)->delete();
        foreach($request->timetable as $timetable)
        {
            if(!empty($timetable['week_id']) 
            && !empty($timetable['start_time']) 
            && !empty($timetable['end_time']) 
            && !empty($timetable['room_number']))
            // dd($request->all());
            {
                $save = new ClassSubjectTimetableModel;
                $save->class_id= $request-> class_id;
                $save->subject_id= $request-> subject_id;
                $save->week_id= $timetable['week_id'];
                $save->start_time= $timetable['start_time'];
                $save->end_time= $timetable['end_time'];
                $save->room_number= $timetable['room_number'];
                // dd($request->all());
                $save->save();
            }
            // return redirect()->back()->with('error'. "Not enough information");

        }
        return redirect()->back()->with('success'. "Class time table sucessfully saved");
    }

    // student side
    public function myTimetable(Request $request)
    {
        $result= array();
        $getRecord=ClassSubjectModel::mySubject(Auth::user()->class_id);
        foreach($getRecord as $value)
        {
            $dataSubject['Subject_Name']= $value->subject_name;
            $getWeek = weekModel::getRecord();
            $week= array();
            foreach($getWeek as $valueW)
            {
                $dataW= array();
                $ClassSubject= ClassSubjectTimetableModel::getRecordSubjectTimetable
                ($value->class_id,$value->subject_id, $valueW->id);
                if(!empty($ClassSubject))
                {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                }else{
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
                $dataW['week_name'] = $valueW->name;
                $week[]= $dataW;
            }
            $dataSubject['week']=$week;
            $result[]= $dataSubject;
            
        }
        $data['getRecord']= $result;
        // dd($result);
        $data['header_title'] = "My Timetable";
        // $data['getRecord']=AssignClassTeacherModel::getAssignClassTeacher(); 
        return view('student.my_timetable', $data);
    }


// teacher
    public function class_timetable_teacher($class_id, $subject_id)
    {
        $data['getClass']= ClassModel::getSingle($class_id);
        $data['getSubject']= SubjectModel::getSingle($subject_id);
        $getWeek = weekModel::getRecord();
        $week= array();
        foreach($getWeek as $valueW)
        {
            $dataW= array();
            $dataW['week_name'] = $valueW->name;
            $ClassSubject= ClassSubjectTimetableModel::getRecordSubjectTimetable
            ($class_id,$subject_id, $valueW->id);
            if(!empty($ClassSubject))
            {
                $dataW['start_time'] = $ClassSubject->start_time;
                $dataW['end_time'] = $ClassSubject->end_time;
                $dataW['room_number'] = $ClassSubject->room_number;
            }else{
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }
            // $dataW['week_name'] = $valueW->name;
            // $week[]= $dataW;
            $result[]=$dataW;
        }
        $data['getRecord']= $result;
        // dd($result);
        $data['header_title'] = "My Timetable";
        // $data['getRecord']=AssignClassTeacherModel::getAssignClassTeacher(); 
        return view('teacher.class_timetable_teacher', $data);
    }

     // parent side
     public function class_timetable_parent($class_id, $subject_id, $student_id)
     {
         $data['getClass']= ClassModel::getSingle($class_id);
         $data['getSubject']= SubjectModel::getSingle($subject_id);
         $data['getStudent']= User::getSingle($student_id);

         $getWeek = weekModel::getRecord();
         $week= array();
         foreach($getWeek as $valueW)
         {
             $dataW= array();
             $dataW['week_name'] = $valueW->name;
             $ClassSubject= ClassSubjectTimetableModel::getRecordSubjectTimetable
             ($class_id,$subject_id, $valueW->id);
             if(!empty($ClassSubject))
             {
                 $dataW['start_time'] = $ClassSubject->start_time;
                 $dataW['end_time'] = $ClassSubject->end_time;
                 $dataW['room_number'] = $ClassSubject->room_number;
             }else{
                 $dataW['start_time'] = '';
                 $dataW['end_time'] = '';
                 $dataW['room_number'] = '';
             }
             // $dataW['week_name'] = $valueW->name;
             // $week[]= $dataW;
             $result[]=$dataW;
         }
         $data['getRecord']= $result;
         // dd($result);
         $data['header_title'] = "My Timetable";
         // $data['getRecord']=AssignClassTeacherModel::getAssignClassTeacher(); 
         return view('parent.class_timetable_parent', $data);
        //  return view('teacher.class_timetable_teacher', $data);
     }
 

}
