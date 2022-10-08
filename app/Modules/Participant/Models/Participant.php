<?php

namespace App\Modules\Participant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Participant  extends Authenticatable
{
    use Notifiable;
    protected $table = 'participants';

    protected $guarded = ['id'];
    public static function participantList($status)
    {
        return DB::table('participants')->where('status',$status)
            ->get([
                'id',
                'registration_id',
                'name',
                'fathers_name',
                'mother_name',
                'email',
                'phone',
                'passing_year',
                'present_address',
                'permanent_address',
                'blood_group',
                'gender',
                'dress',
                'image',
                'status',
            ]);
    }
    public static function participantactiveList($status)
    {
        return DB::table('participants')->join('transaction','participants.id','=','transaction.user_id')->where('participants.status',$status)->where('transaction.status','Success')
            ->get([
                'participants.id',
                'registration_id',
                'name',
                'fathers_name',
                'mother_name',
                'email',
                'phone',
                'passing_year',
                'present_address',
                'permanent_address',
                'blood_group',
                'tx_id',
                'participants.status',
                'amount',
            ]);
    }

    public static function participantyearList($year){
        return DB::table('participants')->join('transaction','participants.id','=','transaction.user_id')->where('participants.passing_year',$year)->where('participants.status',1)->where('transaction.status','Success')
        ->get([
            'participants.id',
            'registration_id',
            'name',
            'fathers_name',
            'mother_name',
            'email',
            'phone',
            'passing_year',
            'present_address',
            'permanent_address',
            'blood_group',
            'tx_id',
            'participants.status',
        ]);
    }
}
