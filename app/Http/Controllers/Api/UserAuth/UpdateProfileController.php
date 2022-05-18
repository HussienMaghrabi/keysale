<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\Http\Resources\UserAuth\UserRegisterResource;
use App\Traits\apiResponse;
use App\Traits\storeImage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateProfileController extends Controller
{
    use apiResponse , storeImage;
    public function index(Request $request)
    {
        $data = $request->validate([
            'name' => '',
            'email' => '',
            'image' => '',
            'mobile' => '',
        ]);
        $user = $request->user();
        if (!$user)
            abort(404);

        // check if this email existed ..
        $EmailCheck = User::where('email', $request->email)->where('id','!=',$user->id)->get();
        if ($EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.Existemail'), null, false);
        }

        $EmailCheck = User::where('mobile', $request->mobile)->where('id','!=',$user->id)->get();
        if ($EmailCheck->count() > 0) {
            return $this->apiResponse($request, trans('language.Existmobile'), null, false);
        }

        if($request->image)
        {
            $data['image'] = $this->storeImage($request->image);
        }
        $user->update($data);
        $item= new UserRegisterResource($user);
        return $this->apiResponse($request, trans('language.message'), $item, true);
    }


}
