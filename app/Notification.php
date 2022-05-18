<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function getTime()
    {
        $time = Notification::find($this->id)->created_at;
        $time = $time->diffForHumans();
        return $time;
    }
}
