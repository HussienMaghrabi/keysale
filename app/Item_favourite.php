<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Item_favourite extends Model
    {
        protected  $fillable = [
            'user_id',
            'item_id'
        ];

        public function toArray()
        {
            $data['id'] = $this->id;
            $data['item_id'] = $this->serv_item_id;
            $data['item_name'] = $this->serv_item_name;
            $data['price'] = $this->price;
            return $data;
        }

        public function getServItemNameAttribute()
        {
            $attribute = "";
            if ($this->item)
                $attribute = $this->item->name;
            return $attribute;
        }

        public function getServItemIdAttribute()
        {
            $attribute = "";
            if ($this->item)
                $attribute = $this->item->id;
            return $attribute;
        }


        public function user()
        {
            return $this->belongsTo('App\User', 'user_id');
        }

        public function item()
        {
            return $this->belongsTo('App\Items', 'item_id');
        }
    }
