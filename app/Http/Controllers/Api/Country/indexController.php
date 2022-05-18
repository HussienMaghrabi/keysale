<?php

namespace App\Http\Controllers\Api\Country;

use App\Country;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    use apiResponse;

    public function index(Request $request)
    {
        $items = Country::get();
        return $this->apiResponse($request, trans('language.message'), $items, true);
    }
}
