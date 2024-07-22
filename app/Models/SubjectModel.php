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
                    ->paginate(2);       
        return $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
}
