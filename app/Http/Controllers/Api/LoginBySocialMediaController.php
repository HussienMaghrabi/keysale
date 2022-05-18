<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\Http\Resources\UserAuth\UserLoginResource;
use App\ModulesConst\UserOnlineStatus;
use App\ModulesConst\UserTyps;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginBySocialMediaController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'social_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
        $user = User::where('social_id', $request->social_id)->first();
        if ($user) {
            return $this->apiResponse($request, trans('language.message'), $user, true);
        } else {
            $data['api_token'] = rand(99999999, 999999999) . time();
            $data["user_type_id"] = UserTyps::user;
            $data['social_id'] = $request->social_id;
            $data["fire_base_token"] = $request->fire_base_token;
            $user = User::create($data);
            $user = User::find($user->id);
            $item = new UserLoginResource($user);
            return $this->apiResponse($request, trans('language.message'), $item, false);
        }
    }
}
