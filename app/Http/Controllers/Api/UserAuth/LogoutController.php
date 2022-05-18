<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\ModulesConst\UserOnlineStatus;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user)
        {
            $user->fire_base_token = null;
            $user->save();
        }
        return $this->apiResponse($request, trans('language.message'), null, true);
    }
}
