<?php

namespace App\Modules\Event\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Event extends Model
{
    protected $table = 'photo_gallery';

    protected $guarded = ['id'];
    public static function galleryList()
    {
        return DB::table('photo_gallery')
            ->get([
                'id',
                'event_name',
                // 'event_type',
                'date',
            ]);
    }
    


    public static function getimage($id){
        $image = DB::table('photo')->where('event_id',$id)->get();
        $total = "";
        foreach ($image as $im)
        {
            $total .= ' <a target="_blank"><img src="'.asset('/').$im->photo.'" height="60" width="110"></a>';
        }
        return $total;
    }
}
