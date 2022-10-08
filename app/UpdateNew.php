<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateNew extends Model
{
    protected $guarded = [];
    public static function updatenewsList()
    {
        return UpdateNew::orderby('id','desc')
            ->get([
                'id',
                'description',
            ]);
    }
}
