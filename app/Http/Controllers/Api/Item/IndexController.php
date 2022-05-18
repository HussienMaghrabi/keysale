<?php

namespace App\Http\Controllers\Api\Item;

use App\Items;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function main_categories_item(Request $request)
    {
        $request->validate([
            'main_category_id' => 'required',
            'country_id' => 'required'
        ]);
        $items = Items::where('main_category_id',$request->main_category_id)->where("country_id",$request->country_id)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }

    public function categories_item(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'country_id' => 'required'
        ]);
        $items = Items::where('category_id', $request->category_id)->where("country_id",$request->country_id)->get();
        return $this->apiResponse($request, trans('language.message'), $items, true);
    }

    public function sub_categories_item(Request $request)
    {
        $request->validate([
            'sub_category_id' => 'required',
            'country_id' => 'required'
        ]);
        $items = Items::where('sub_category_id',$request->sub_category_id)->where("country_id",$request->country_id)->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }

    public function sub_sub_category_items(Request $request)
    {
        $request->validate([
            'sub_sub_category_id' => 'required',
            'country_id' => 'required'
        ]);
        $items = Items::where('sub_sub_category_id', $request->sub_sub_category_id)->where("country_id",$request->country_id)->get();
        return $this->apiResponse($request, trans('language.message'), $items, true);
    }
}
