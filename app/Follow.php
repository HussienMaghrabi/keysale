<?php

    namespace App;

    use App\Http\Resources\UserAuth\UserLoginResource;
    use Illuminate\Database\Eloquent\Model;

    class Follow extends Model
    {
        protected $fillable = [
            'person_one',
            'person_two',
        ];

        public function toArray()
        {
            $data["id"] = $this->id;
            $data["time"] = $this->time;
            $data["profile"] = $this->profile;
            return $data;
        }

        public function getTimeAttribute()
        {
            $time = $this->created_at->diffforhumans();
            return $time;
        }


        public function getProfileAttribute()
        {
            if ($this->person_one == request()->user()->id) {
                $item = User::where("id", $this->person_two)->first();
                return new UserLoginResource($item);
            } else {
                $item = User::where("id", $this->person_one)->first();
                return new UserLoginResource($item);
            }
        }


        public function getServUserNameOneAttribute()
        {
            $attribute = "";
            if ($this->person_one_rel)
                $attribute = $this->person_one_rel->name;
            return $attribute;
        }

        public function getServUserNameTwoAttribute()
        {
            $attribute = "";
            if ($this->person_two_rel)
                $attribute = $this->person_two_rel->name;
            return $attribute;
        }

        public function person_one_rel()
        {
            return $this->belongsTo(User::class, 'person_one');
        }

        public function person_two_rel()
        {
            return $this->belongsTo(User::class, 'person_two');
        }
    }
