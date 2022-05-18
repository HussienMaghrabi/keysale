<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
    ];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['name'] = $this->serv_name;
        $data['image'] = $this->serv_image;
        $data['has_subcategory'] = $this->serv_has_subcategory;
        return $data;
    }

    public function getServHasSubcategoryAttribute()
    {
        $attribute = "";
        if (count($this->categories) > 0) {
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

    public function getDashNameAttribute()
    {
        if (app()->getLocale() == "en")
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
    public function getDashCreatedAttribute()
    {
        $attribute = "";
        if ($this->created_at)
            $attribute = $this->created_at->format('Y-m-d');
        return $attribute;
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'main_category_id');
    }
}
