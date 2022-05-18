<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\Http\Resources\UserAuth\ProfileResource;
use App\Http\Resources\UserAuth\UserLoginResource;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user)
            abort(404);
        $item = new UserLoginResource($user);
        return $this->apiResponse($request,trans('language.message') ,$item,true);

    }
}
