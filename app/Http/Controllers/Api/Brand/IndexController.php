<?php

namespace App\Http\Controllers\Api\Brand;

use App\Brand;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'category_id' => 'required|string',
        ]);
        $items = Brand::where('category_id',$request->category_id)->orderBy('id','desc')->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
