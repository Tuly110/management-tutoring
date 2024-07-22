<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';
    static public function getClass()
    {
        $return = ClassModel::select('class.*', 'users.name as create_by_name')
                    ->join('users', 'users.id', 'class.create_by')
                    ->orderBy('class.id', 'desc')
                    ->where('class.is_delete','=',0)
                    ->paginate(2);

                    
        return $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
}
