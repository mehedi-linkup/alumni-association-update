<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committe extends Model
{
    protected $guarded = [];
    public static function committeeList()
    {
        return Committe::orderby('id','desc')
            ->get([
                'id',
                'name',
                'desingnation',
                'batch',
                'committee_type',
                'image',
            ]);
    }
}
