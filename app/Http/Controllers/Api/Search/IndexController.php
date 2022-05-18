<?php

namespace App\Http\Controllers\Api\Search;

use App\Category;
use App\Items;
use App\Sub_category;
use App\Sub_sub_category;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function home_search(Request $request)
    {
        $request->validate([
            'keyword' => 'required'
        ]);
        $items = Items::where('name','LIKE',"%$request->keyword%")->paginate(10)->getCollection();
        return $this->apiResponse($request,trans('language.message') ,$items,true);

    }

    public function categories_search(Request $request)
    {
        $request->validate([
            'keyword' => 'required'
        ]);
        if($request->lang == "en"){
            $items = Category::where('name_en', 'LIKE', "%$request->keyword%")->paginate(10)->getCollection();
        }else{
            $items = Category::where('name_ar', 'LIKE', "%$request->keyword%")->paginate(10)->getCollection();
        }
        return $this->apiResponse($request, trans('language.message'), $items, true);

    }

    public function sub_categories_search(Request $request)
    {
        $request->validate([
            'keyword' => 'required'
        ]);
        if ($request->lang == "en") {
            $items = Sub_category::where('name_en', 'LIKE', "%$request->keyword%")->paginate(10)->getCollection();
        } else {
            $items = Sub_category::where('name_ar', 'LIKE', "%$request->keyword%")->paginate(10)->getCollection();
        }
        return $this->apiResponse($request, trans('language.message'), $items, true);

    }

    public function sub_sub_categories_search(Request $request)
    {
        $request->validate([
            'keyword' => 'required'
        ]);
        if ($request->lang == "en") {
            $items = Sub_sub_category::where('name_en', 'LIKE', "%$request->keyword%")->paginate(10)->getCollection();
        } else {
            $items = Sub_sub_category::where('name_ar', 'LIKE', "%$request->keyword%")->paginate(10)->getCollection();
        }
        return $this->apiResponse($request, trans('language.message'), $items, true);

    }


    public function items_search(Request $request)
    {

        $request->validate([
            'keyword' => 'required'
        ]);
        $items = Items::where('name','LIKE',"%$request->keyword%")->paginate(10)->getCollection();
        return $this->apiResponse($request,trans('language.message') ,$items,true);

    }

    public function myItems_search(Request $request)
    {

        $request->validate([
            'keyword' => 'required'
        ]);
        $items = Items::where('user_id',$request->user()->id)->where('name','LIKE',"%$request->keyword%")->paginate(10)->getCollection();
        return $this->apiResponse($request,trans('language.message') ,$items,true);

    }
}
