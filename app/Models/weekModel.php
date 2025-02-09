<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weekModel extends Model
{
    use HasFactory;
    protected $table = 'week';
    static public function getRecord()
    {
        return weekModel::get();
    }

    static public function getWeekUsingName($weekname)
    {
        return weekModel::where('name', '=', $weekname)->first();
    }
}
