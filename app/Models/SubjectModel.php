<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;
    // Database
    protected $table = 'subject';
    static public function getSubject()
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'subject.created_by')
                    ->orderBy('subject.id', 'desc')
                    ->where('subject.is_delete','=',0)
                    // ->get()
                    ->paginate(20);     

        return $return;
    }
    static public function getSubject_assign()
    {
        $return = SubjectModel::select('subject.*')
                    ->join('users', 'users.id', 'subject.created_by')
                    ->where('subject.is_delete','=',0)
                    ->where('subject.status', '=',0 )
                    ->orderBy('subject.name', 'asc')
                    ->get();     

        return $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
}
