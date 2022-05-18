<?php

namespace App\Http\Controllers\Api\Passport;

use App\Advertisement;
use App\Passport;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassportController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $item = Passport::first();
        return $this->apiResponse($request,trans('language.message') ,$item,true);
    }
}
