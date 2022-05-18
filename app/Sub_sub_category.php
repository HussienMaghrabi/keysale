<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_sub_category extends Model
{
    protected $fillable = [
        'sub_category_id',
        'name_ar',
        'name_en',
        'image',
    ];
    public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->serv_name;
        $data['image'] = $this->serv_image;
        $data['has_subcategory'] = false;
        return $data;
    }

    public function getServHasSubcategoryAttribute()
    {
        $attribute = "";
        if (count($this->sub_categories) > 0) {
            $attribute = true;
        } else {
            $attribute = false;
        }
        return $attribute;
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


    public function getDashImageAttribute()
    {
        $attribute = "";
        if ($this->image)
            $attribute = $this->image;
        return $attribute;
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


    public function sub_sub_categories()
    {
        return $this->hasMany(Items::class, 'sub_sub_category_id');
    }


}
