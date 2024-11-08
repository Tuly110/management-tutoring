<?php

namespace App\Models;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassTeacherModel extends Model
{
    use HasFactory;
    protected $table = 'assign_class_teacher';

    static public function getAlreadyFirst($class_id, $teacher_id)
    {
        return self::where('class_id', '=', $class_id)
            ->where ('teacher_id', '=', $teacher_id)->first();
    }

    static public function getAssignClassTeacher()
    {
        $return = AssignClassTeacherModel::select('assign_class_teacher.*', 
            'users.name as created_by_name',
            'class.name as class_id_name', 
            'teacher.name as teacher_id_name')
            ->join('users', 'users.id', 'assign_class_teacher.created_by')
            ->join('class', 'class.id', 'assign_class_teacher.class_id')
            ->join('users as teacher', 'teacher.id', 'assign_class_teacher.teacher_id')
            ->where('assign_class_teacher.is_deleted','=',0);
            if(!empty(Request::get('class_name')))
            {
                $return = $return->where('class.name', 'like','%'.Request::get('class_name').'%');
            }
            if(!empty(Request::get('teacher_name')))
            {
                $return = $return->where('teacher.name', 'like','%'.Request::get('teacher_name').'%');
            }
            if(!empty(Request::get('date')))
            {
                $return = $return->where('assign_class_teacher.created_at', 'like','%'.Request::get('date').'%');
            }
            $return = $return->orderBy('assign_class_teacher.id', 'asc')
            ->paginate(5);     
        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getAssignSubjectID($class_id)
    {
        return self::where('class_id', '=', $class_id)
        ->where ('is_deleted', '=', 0)->get();
    } 

    static public function deleteTeacher($class_id)
    {
        return self::where('class_id', '=', $class_id)->delete();
    }


}
