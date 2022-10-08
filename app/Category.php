<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public static function categoryList()
    {
        return Category::orderby('id','desc')
            ->get([
                'id',
                'name',
                'url',
                'parent_id',
                'description',
            ]);
    }
    public function categories(){
        return $this->hasMany('App\Category','parent_id');
    }
}
