<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [ 'image','link'];

    public function toArray()
    {
        $data['image'] = $this->serv_image;
        $data['link'] = $this->serv_link;
        return $data;
    }

    public function getServImageAttribute()
    {
        $attribute = "";
        if ($this->image)
            $attribute = $this->image;
        return $attribute;
    }

     public function getServLinkAttribute()
    {
        $attribute = "";
        if ($this->link)
            $attribute = $this->link;
        return $attribute;
    }


    public function getDashImageAttribute()
    {
        $attribute = "";
        if ($this->image)
            $attribute = $this->image;
        return $attribute;
    }

    public function getDashLinkAttribute()
    {
        $attribute = "";
        if ($this->link)
            $attribute = $this->link;
        return $attribute;
    }

    public function getDashCreatedAttribute()
    {
        $attribute = "";
        if ($this->created_at)
            $attribute = $this->created_at->format('Y-m-d');
        return $attribute;
    }



}
