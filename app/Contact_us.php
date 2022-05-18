<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_us extends Model
{
    protected $fillable = [
        'email',
        'number',
        'name',
        'message'
    ];

    public function  toArray()
    {
        $data['id'] = $this->id;
        $data['email'] = $this->serv_email;
        $data['number'] = $this->serv_mumber;
        $data['name'] = $this->serv_name;
        $data['message'] = $this->serv_message;
    }

    public function getServEmailAttribute()
    {
        $attribute = "";
        if ($this->email)
            $attribute = $this->email;
        return $attribute;
    }

    public function getServMobileAttribute()
    {
        $attribute = "";
        if ($this->number)
            $attribute = $this->number;
        return $attribute;
    }

    public function getServnameAttribute()
    {
        $attribute = "";
        if ($this->name)
            $attribute = $this->name;
        return $attribute;
    }

    public function getServMessageAttribute()
    {
        $attribute = "";
        if ($this->message)
            $attribute = $this->message;
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
