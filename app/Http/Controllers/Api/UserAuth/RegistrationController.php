<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\Http\Resources\UserAuth\UserRegisterResource;
use App\ModulesConst\UserOnlineStatus;
use App\ModulesConst\UserTyps;
use App\Traits\apiResponse;
use App\Traits\storeImage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
//sms
use Twilio\Rest\Client;
use Validator;
class RegistrationController extends Controller
{
    use apiResponse , storeImage;
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => '',
            'image' => '',
        ]);

        $MobileCheck = User::where('mobile', $request->mobile)->get();
        if ($MobileCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.Existmobile'), null, false);
        }

        $EmailCheck = User::where('email', $request->email)->get();
        if ($EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.ExistEmail'), null, false);
        }

        $data = $request->all();
        $data['api_token'] = rand(99999999, 999999999) . time();
        $data["password"] = Hash::make($request->password);
        $data["user_type_id"] = UserTyps::user;
        $data["fire_base_token"] = $request->fire_base_token;
        if($request->image)
        {
           $data['image'] = $this->storeImage($request->image);
        }
        // todo send sms to mobile to verfiy account .
//        $data["mobile_code"] = rand(1111, 9999);
        $data["mobile_code"] = 1234;
        $user = User::create($data);
        auth()->login($user);
        $item= new UserRegisterResource($user);
        return $this->apiResponse($request, trans('language.message'), $item, true);
    }
}
