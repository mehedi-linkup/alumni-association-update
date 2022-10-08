<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $guarded = [];
    public static function aboutusList()
    {
        return AboutUs::orderby('id','desc')
            ->get([
                'id',
                'title',
                'date',
                'about_type',
                'description',
                'image',
            ]);
    }
}
