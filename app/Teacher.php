<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];
    public static function teacherList()
    {
        return Teacher::orderby('id','desc')
            ->get([
                'id',
                'name',
                'qualification',
                'depertment',
                'degingnation_title',
                'teacher_type',
                'image',
            ]);
           
    }
}
