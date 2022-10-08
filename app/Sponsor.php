<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $guarded = [];
    public static function sponsorList()
    {
        return Sponsor::orderby('id','desc')
            ->get([
                'id',
                'title',
                'image',
            ]);
    }
}
