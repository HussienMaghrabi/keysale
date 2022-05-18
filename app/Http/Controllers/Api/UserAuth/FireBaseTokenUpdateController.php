<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FireBaseTokenUpdateController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'fire_base_token' => 'required',
        ]);
        $user = $request->user();
        if (!$user)
            abort(404);
        $user->fire_base_token = $request->fire_base_token;
        $user->save();
        return $this->apiResponse($request, trans('language.message'), null, true);
    }
}
