<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    protected $guarded = [];
    public static function massageList()
    {
        return Massage::orderby('id','desc')
            ->get([
                'id',
                'desingnation',
                'name',
                'description',
                'image',
                'file'
            ]);
    }
}
