<?php

namespace App\Http\Controllers\Api\SubCategory;

use App\Category;
use App\Slider;
use App\Slider2;
use App\Sub_category;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'category_id' => 'required'
        ]);
        $items = Sub_category::where('category_id',$request->category_id)->orderBy('id','desc')->get();
        $sliders = Slider2::inRandomOrder()->take(5)->get();
        $data['sliders'] = $sliders;
        $data['items'] = $items;
        return $this->apiResponse($request,trans('language.message') ,$data,true);
    }
}
