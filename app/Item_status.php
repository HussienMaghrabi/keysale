<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_status extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
    ];

    public function toArray()
    {
        $data['id'] = $this->id;
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

    public function getDashNameAttribute()
    {
        if (app()->getLocale() == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }
    public function getDashCreatedAttribute()
    {
        $attribute = "";
        if ($this->created_at)
            $attribute = $this->created_at->format('Y-m-d');
        return $attribute;
    }

}
