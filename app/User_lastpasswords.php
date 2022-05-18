<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_lastpasswords extends Model
{
    protected $fillable = [
        'user_id',
        'passCode',
        'expired_at'
    ];
}
