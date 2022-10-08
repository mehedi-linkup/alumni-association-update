<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WelcomeNotes extends Model
{
    protected $guarded = [];
    public static function welcomenotesList()
    {
        return WelcomeNotes::orderby('id','desc')
            ->get([
                'id',
                'title',
                'date',
                'description',
                'image',
            ]);
    }
}
