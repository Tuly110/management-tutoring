<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ExamModel extends Model
{
    use HasFactory;
    protected $table = 'exam';

    static public function getRecord()
    {
        $return= self::select('exam.*', 'users.name as created_name')
            -> join('users', 'users.id', '=', 'exam.created_by');

            if(!empty(Request::get('name')))
            {
                $return = $return->where('exam.name', 'like','%'.Request::get('name').'%');
            }
            if(!empty(Request::get('date')))
            {
                $return = $return->where('exam.created_at', 'like','%'.Request::get('date').'%');
            }

            $return = $return->where('exam.is_deleted', '=', '0')
            -> orderBy('exam.id', 'asc')
            ->paginate(20);

        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
