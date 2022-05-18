<?php

    namespace App;

    use Auth;
    use Illuminate\Database\Eloquent\Model;

    class ChatRoom extends Model
    {
        protected $table = "chat_rooms";
        protected $fillable = [
            'person_one',
            'person_two',
            'item_id',
        ];

        public function toArray()
        {
            $data["id"] = $this->id;
            $data["profile"] = $this->profile;
            $data["product"] = $this->product;
            return $data;
        }

        public function obj()
        {
            $data["room_id"] = $this->id;
            return $data;
        }

        public function getProfileAttribute()
        {
            if ($this->person_one == request()->user()->id) {
                return User::where("id", $this->person_two)->first();
            } else {
                return User::where("id", $this->person_one)->first();
            }
        }



        public function person_one_rel()
        {
            return $this->belongsTo(User::class, 'person_one');
        }

        public function person_two_rel()
        {
            return $this->belongsTo(User::class, 'person_two');
        }

        public function product()
        {
            return $this->belongsTo(Items::class, 'item_id');
        }


    }
