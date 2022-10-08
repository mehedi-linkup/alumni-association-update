<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderContent extends Model
{
    protected $fillable = [
        "email",
        "phone",
    ];
}
