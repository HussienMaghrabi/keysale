<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
    ];

    public function toArray()
    {
        $data['name'] = $this->Serv_name;
        return $data;
    }

    public function getServNameAttribute()
    {
        if (\request()->lang == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }
}
