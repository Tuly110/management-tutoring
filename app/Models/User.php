<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Http\Client\Request;
use Request;


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

    static public function getSingle($id)
    {
        return self::find($id);
    }


    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }
}
