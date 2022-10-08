<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];
    public static function sliderList()
    {
        return Slider::orderby('id','desc')
            ->get([
                'id',
                'title',
                'image',
            ]);
    }
}
