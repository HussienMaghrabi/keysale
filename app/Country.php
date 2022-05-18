<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'image',
        'name_ar',
        'name_en',
        'currency_ar',
        'currency_en',
        'code_name',
        'code',
    ];
    public function toArray()
    {
        $data['id'] = $this->id;
        $data['image'] = $this->serv_image;
        $data['name'] = $this->serv_name;
        $data['code'] = $this->code;
        return $data;
    }

    public function getServImageAttribute()
    {
        $attribute = "";
        if ($this->image)
            $attribute = $this->image;
        return $attribute;
    }

    public function getServNameAttribute()
    {
        if (\request()->lang == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }

    public function getServCurrencyAttribute()
    {
        if (\request()->lang == "en")
            return $this->currency_en;
        else
            return $this->currency_ar;
    }

    public function getDashNameAttribute()
    {
        if (app()->getLocale() == "en")
            return $this->name_en;
        else
            return $this->name_ar;
    }



    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }
}
