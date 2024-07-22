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
        $return = ClassModel::select('class.*', 'users.name as create_by_name ')
                    ->join('users', 'users.id', 'class.create_by')
                    ->orderBy('class.id', 'desc')
                    ->where('class.is_delete','=',0)
                    ->paginate(1);
                    // search by email
        //             if(!empty( Request::get('query')))
        //             {
        //                 $return = $return->where('email', 'like', '%'.Request::get('query').'%');
        //                 // $return_name = $return->where('name', 'like', '%'.Request::get('query').'%');
        //                 // $return = $return->where('email', 'like', '%'.Request::get('query').'%');
        //             }
                    // Phan trang
                    
        return $return;
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
}
