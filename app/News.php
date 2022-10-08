<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];
    public static function newsList()
    {
        return News::orderby('id','desc')
            ->get([
                'id',
                'title',
                'news_type',
                'description',
                'image',
            ]);
    }
}
