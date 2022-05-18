<?php

namespace App\Http\Controllers\Api\MainCategory;

use App\Category;
use App\MainCategory;
use App\Sub_category;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $items = MainCategory::orderBy('id','desc')->where("id","!=","2")->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
