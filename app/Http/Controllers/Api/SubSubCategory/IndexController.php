<?php

namespace App\Http\Controllers\Api\SubSubCategory;

use App\Sub_category;
use App\Sub_sub_category;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $request->validate([
            'sub_category_id' => 'required'
        ]);
        $items = Sub_sub_category::where('sub_category_id',$request->sub_category_id)->orderBy('id','desc')->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
