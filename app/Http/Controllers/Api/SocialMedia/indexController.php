<?php

namespace App\Http\Controllers\Api\SocialMedia;

use App\SocialMedia;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $termeApp = SocialMedia::get();
        return $this->apiResponse($request, trans('language.message'), $termeApp, true);

    }

}
