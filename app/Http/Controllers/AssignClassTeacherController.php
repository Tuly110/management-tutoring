<?php

// Phan cong lop cho giao vien
    namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    class AssignClassTeacherController extends Controller
    {
        public function list()
        {
            $data['header_title'] = "Assign class teacher";
            $data['getRecord']=AssignClassTeacherModel::getAssignClassTeacher();
            return view('admin.assign_class_teacher.list', $data);
        }

        public function add()
        {
            $data['header_title'] = "Add new assign class teacher";
            $data['getClass'] =ClassModel::getClass();
            $data['getTeacher'] =User::getTeacherClass();
            return view('admin.assign_class_teacher.add', $data);
        }

        public function insert(Request $request)
        {
            if(!empty($request->teacher_id))
            {
                foreach($request->teacher_id as $teacher_id)
                {
                    $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                    if(!empty($getAlreadyFirst))
                    {
                        $getAlreadyFirst->status = $request->status;
                        $getAlreadyFirst->save();
                    }else{
                        $assign_class_teacher = new AssignClassTeacherModel();
                        $assign_class_teacher->class_id = $request->class_id;
                        $assign_class_teacher->teacher_id = $teacher_id;
                        $assign_class_teacher->status = $request->status;
                        $assign_class_teacher->created_by = Auth::user()->id;
                        $assign_class_teacher->save();
                    }        
                }
                return redirect('admin/assign_class_teacher/list')->with('success', "Add new Assign Class Teacher successfully");
            }
            else
            {
                return redirect()->back()->with('error', "Due to some error please try again!");
            }
        }

        public function edit($id)
        {
            $getRecord = AssignClassTeacherModel::getSingle($id);
            if(!empty($getRecord))
            {
                $data['getRecord']= $getRecord;
                $data['getAssignClassTeacherID'] = AssignClassTeacherModel::getAssignSubjectID($getRecord->class_id);
                $data['getAssignTeacher'] = User::getAssignTeacher();
                $data['getClass_assign'] = ClassModel::getClass_assign();
                $data['header_title'] = "Subject assign Edit";
                return view('admin.assign_class_teacher.edit', $data);
            }else{
                abort(404);
            }
        }

        public function update(Request $request)
        {
            //Làm mới dữ liệu trước khi cập nhật thông tin mới.
            AssignClassTeacherModel::deleteTeacher($request->class_id);
            echo ($request->class_id);
            if(!empty($request->teacher_id))
            {
                foreach($request->teacher_id as $teacher_id)
                {
                    $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id,$teacher_id);
                    if(!empty($getAlreadyFirst))
                    {
                        $getAlreadyFirst->status= $request->status;
                        dd($request->all());
                        $getAlreadyFirst->save();
                        
                    }else{
                        $assign_class_teacher = new AssignClassTeacherModel();
                        $assign_class_teacher->class_id = $request->class_id;
                        $assign_class_teacher->teacher_id = $teacher_id;
                        $assign_class_teacher->status = $request->status;
                        $assign_class_teacher->created_by = Auth::user()->id;
                        dd($request->all());
                        $assign_class_teacher->save();

                    }
                }
            }
            return redirect('admin/assign_class_teacher/list')->with('success', "Update assign class teacher successfully");
        }

        public function delete($id)
        {
            $delete = AssignClassTeacherModel::getSingle($id);
            $delete->is_deleted =1;
            $delete->save();
            return redirect('admin/assign_class_teacher/list')->with('success', "Deleted assign class teacher successfully");
        }
    }
?>

