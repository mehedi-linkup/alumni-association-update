<?php

namespace App\Modules\Event\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Downloads extends Model
{
    protected $table = 'downloads';

    protected $guarded = ['id'];
    public static function downloadList($type)
    {
        return DB::table('downloads')->where("type",$type)
            ->get([
                'id',
                'document_name',
                'date',
                'type',
                'file',
            ]);
    }
}
