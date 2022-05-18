<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_request extends Model
{
    protected $fillable = [
        'item_id',
        'user_id',
        'status_id',
        'price'
    ];

    public function toArray()
    {
       $data["id"] = $this->id;
       $data["item_id"] = $this->item_id;
       $data["user_id"] = $this->user_id;
       $data["user_name"] = $this->user->serv_name;
       $data["price"] = $this->price;
       $data["status"] = $this->getServStatusNameAttribute();
       $data["status_id"] = $this->status_id;
       return $data;
    }

    public function getServStatusNameAttribute()
    {
        if($this->status_id == 1){
            return "Pending";
        }
        if($this->status_id == 2){
            return "sold";
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
