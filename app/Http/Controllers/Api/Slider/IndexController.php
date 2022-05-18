<?php

namespace App\Http\Controllers\Api\Slider;

use App\Slider;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $items = Slider::orderBy('id','desc')->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
