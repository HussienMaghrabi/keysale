<?php

namespace App;

use App\ModulesConst\UserOnlineStatus;
use App\ModulesConst\UserPaidTyps;
use App\ModulesConst\UserTyps;
use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'fire_base_token',
       'api_token',
       'mobile_code',
        'name',
        'user_name',
        'email',
        'mobile',
        'address',
        'image',
        'email_verified_at',
        'password',
        'activeCode',
        'passCode',
        'user_type_id',
        'userVerify',
        'social_id',
        'country_id'
    ];

    public function getServIsFollowAttribute()
    {

        if (Auth::user()) {
            $checkFav = Follow::where('person_one', Auth::user()->id)
                ->where('person_two', $this->id)->first();

            if ($checkFav) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

    public function scopeUserType($query)
    {
        return $query->where('user_type_id', '==', UserTyps::user);
    }

    public function scopeAdminType($query)
    {
        return $query->where('user_type_id', '==', UserTyps::admin);
    }

    public function getServImageAttribute()
    {
        if ($this->image)
            return $attribute = $this->image;
        else
            return asset('assets/admin/images/logo.png');
    }

    public function getDashImageAttribute()
    {
        if ($this->image)
            return $attribute = $this->image;
        else
            return asset('assets/admin/images/logo.png');
    }


    public function getServNameAttribute()
    {
        $attribute = "";
        if ($this->name)
            $attribute = $this->name;
        return $attribute;
    }

    public function getServCountryNameAttribute()
    {
        $attribute = "";
        if ($this->country)
            $attribute = $this->country->serv_name;
        return $attribute;
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function getServEmailAttribute()
    {
        $attribute = "";
        if ($this->email)
            $attribute = $this->email;
        return $attribute;
    }

    public function getServAddressAttribute()
    {
        $attribute = "";
        if ($this->address)
            $attribute = $this->address;
        return $attribute;
    }

    public function getCreatedAttribute()
    {
        $attribute = "";
        if ($this->created_at)
            $attribute = $this->created_at->format('Y-m-d');
        return $attribute;
    }

    public function getServJoinAtAttribute()
    {
        $attribute = "";
        if ($this->created_at)
            $attribute = $this->created_at->format('Y M d');
        return $attribute;
    }



    public function lastpasswords()
    {
        return $this->hasMany('App\User_lastpasswords', 'user_id');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
