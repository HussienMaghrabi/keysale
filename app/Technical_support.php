<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Technical_support extends Model
    {
        protected $fillable = [
            'user_id',
            'message'
        ];

        public function toArray()
        {
            $data["id"] = $this->id;
            $data["message"] = $this->message;
            return $data;
        }
    }
