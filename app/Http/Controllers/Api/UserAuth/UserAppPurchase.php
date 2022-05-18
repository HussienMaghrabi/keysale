<?php

namespace App\Http\Controllers\Api\UserAuth;

use App\App_purchase;
use App\ModulesConst\UserPaidTyps;
use App\Product;
use App\Traits\apiResponse;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAppPurchase extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'product_id' => 'required',
        ]);
        $user = $request->user();
        if (!$user)
            abort(404);

        $checkProduct = Product::find($request->product_id);
        if(!$checkProduct)
        {
            return $this->apiResponse($request, trans('language.not_Exist'), null, false);
        }
        $data['token'] = $request->token;
        $data['product_id'] = $request->product_id;
        $data['user_id'] = $user->id;
        App_purchase::create($data);
        // make user to be paid
        $user->paid_version = UserPaidTyps::paid;
        return $this->apiResponse($request, trans('language.message'), null, true);
    }
}
