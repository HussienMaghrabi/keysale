<?php

namespace App\Http\Resources\UserAuth;

use Illuminate\Http\Resources\Json\JsonResource;

class UserRegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mobile' => $this->mobile,
//            'address' => $this->serv_address,
            'image' => $this->serv_image,
            'email' => $this->email,
            'api_token' => $this->api_token,
            'fire_base_token' => $this->fire_base_token,
            'mobile_code' => $this->mobile_code,
            'is_follow' => $this->serv_is_follow,
            'country_name' => $this->serv_country_name,
        ];
    }
}
