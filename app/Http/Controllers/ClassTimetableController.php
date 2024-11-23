<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\weekModel;
use App\Models\ClassSubjectTimetableModel;

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


}
