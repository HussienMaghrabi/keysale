<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use App\Slider;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'main_category_id' => 'required'
        ]);
        $items = Category::where('main_category_id',$request->main_category_id)->orderBy('id','desc')->get();
        $sliders = Slider::inRandomOrder()->take(5)->get();
        $data['sliders'] = $sliders;
        $data['items'] = $items;
        return $this->apiResponse($request,trans('language.message') ,$data,true);
    }
}
