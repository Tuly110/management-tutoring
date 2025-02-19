<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    // GET ADMIN
    static public function getAdmin()
    {
        $return = self::select('users.*')
                    ->where('usertype','=',1)
                    ->where('is_delete','=',0);
                    // search by email
                    if(!empty( Request::get('query')))
                    {
                        $return = $return->where('email', 'like', '%'.Request::get('query').'%');
                        // $return_name = $return->where('name', 'like', '%'.Request::get('query').'%');
                        // $return = $return->where('email', 'like', '%'.Request::get('query').'%');
                    }
        $return = $return ->orderBy('id', 'desc')
                    // Phan trang
                    ->paginate(2);
        return $return;
    }


    // GET TEACHER CLASS
    static public function getTeacherClass()
    {
        $return = self::select('users.*')
            ->where('usertype','=',2)
            ->where('is_delete','=',0);
        $return = $return->orderBy('users.id', 'desc')->get();

        return $return;
    }

    // GET TEACHER
    static public function getTeacher()
    {
        $return = self::select('users.*')
                    ->where('usertype','=',2)
                    ->where('is_delete','=',0);
        if(!empty(Request::get('name')))
        {
            $return = $return->where('users.name', 'like','%'.Request::get('name').'%');
        }
        if(!empty(Request::get('date_of_join')))
        {
            $return = $return->where('users.date_of_join', 'like','%'.Request::get('date_of_join').'%');
        }
        if(!empty(Request::get('email')))
        {
            $return = $return->where('users.email', 'like','%'.Request::get('email').'%');
        }
        $return = $return ->orderBy('id', 'desc')
                    // Phan trang
                    ->paginate(2);
        return $return;
    }

    static function getAssignTeacher()
    {
        $return = User::where('is_delete', 0)
            ->where('status', 0)
            ->where('usertype', 2)
            ->get();

        return $return;

    }

    // GET STUDENT
    static public function getStudent()
    {
        $return = self::select('users.*', 'parent.last_name as parent_last_name', 'parent.name as parent_name', 'class.name as class_name')
        ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
        ->join('class', 'class.id', '=', 'users.class_id')

        ->where('users.usertype','=',3)
        ->where('users.is_delete','=',0);
        if(!empty(Request::get('name')))
        {
            $return = $return->where('users.name', 'like','%'.Request::get('name').'%');
        }
        if(!empty(Request::get('last_name')))
        {
            $return = $return->where('users.last_name', 'like','%'.Request::get('last_name').'%');
        }
        if(!empty(Request::get('email')))
        {
            $return = $return->where('users.email', 'like','%'.Request::get('email').'%');
        }
        $return = $return ->orderBy('users.id', 'desc')
        // Phan trang
        ->paginate(2);
    return $return;
    }

    static public function getStudentTeacher($teacher_id)
    {
        $return = self::select('users')
        ->select('users.*', 'class.name as class_name')
        ->join('class', 'class.id', '=', 'users.class_id')
        ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.id')
        ->where('users.usertype', '=', 3)
        ->where('users.is_delete', '=', 0)
        ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
        ->get();
        return $return;
    }
    
    static public function getParent()
    {
        $return = self::select('users.*')
        ->where('users.usertype','=',4)
        ->where('users.is_delete','=',0);
        if(!empty(Request::get('name')))
        {
            $return = $return->where('users.name', 'like','%'.Request::get('name').'%');
        }
        if(!empty(Request::get('last_name')))
        {
            $return = $return->where('users.last_name', 'like','%'.Request::get('last_name').'%');
        }
        if(!empty(Request::get('email')))
        {
            $return = $return->where('users.email', 'like','%'.Request::get('email').'%');
        }
        $return = $return ->orderBy('users.id', 'desc')
        // Phan trang
        ->paginate(2);
    return $return;
    }

    // tim kiem sinh vien cho ba me
    static public function getSearchStudent()
    {
        // dd(Request::all());
        if(!empty(Request::get('student_id')) ||!empty(Request::get('name')) || !empty(Request::get('last_name')) || !empty(Request::get('email')) )
        {
            $return = self::select('users.*', 'parent.last_name as parent_name')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
            ->where('users.usertype','=',3)
            ->where('users.is_delete','=',0);
            if(!empty(Request::get('student_id')))
            {
                $return = $return->where('users.id', '=' ,Request::get('student_id'));
            }
            if(!empty(Request::get('name')))
            {
                $return = $return->where('users.name', 'like','%'.Request::get('name').'%');
            }
            if(!empty(Request::get('last_name')))
            {
                $return = $return->where('users.last_name', 'like','%'.Request::get('last_name').'%');
            }
            if(!empty(Request::get('email')))
            {
                $return = $return->where('users.email', 'like','%'.Request::get('email').'%');
            }
            $return = $return ->orderBy('users.id', 'desc')
            ->limit(10)
            ->get();
        return $return;
        }
    }

    static public function getMyStudent($parent_id)
    {
        $return = self::select('users.*', 'parent.last_name as parent_name')
        ->join('users as parent', 'parent.id', '=', 'users.parent_id')
        ->join('users as class', 'class.id', '=', 'users.class_id', 'left')
        ->where('users.usertype','=',3)
        ->where('users.parent_id','=',$parent_id)
        ->where('users.is_delete','=',0)
        ->orderBy('users.id', 'desc')
        ->get();
    return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }
    // hien thi anh
    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }else{
            return "";
        }
    }
}
