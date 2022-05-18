<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_images extends Model
{
    protected $fillable = [
        'item_id',
        'image',
    ];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['image'] = $this->serv_image;
        return $data;
    }
    function getServImageAttribute()
    {
        $attribute = "";
        if ($this->image)
            $attribute = $this->image;
        return $attribute;
    }

    public function getDashImageAttribute()
{
    $attribute = "";
    if ($this->image)
        $attribute = $this->image;
    return $attribute;
}
}
