<?php

namespace App\Http\Controllers\Api\Advertisement;

use App\Advertisement;
use App\Slider;
use App\Slider2;
use App\Slider3;
use App\Slider4;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $items = Advertisement::inRandomOrder()->take(5)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }

    public function main_cat_advertisement(Request $request)
    {
        $items = Slider::inRandomOrder()->take(5)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }


    public function cat_advertisement(Request $request)
    {
        $items = Slider2::inRandomOrder()->take(5)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }

    public function sub_advertisement(Request $request)
    {
        $items = Slider3::inRandomOrder()->take(5)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
    public function sub_sub_advertisement(Request $request)
    {
        $items = Slider4::inRandomOrder()->take(5)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }

}
