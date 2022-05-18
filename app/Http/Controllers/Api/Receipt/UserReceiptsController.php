<?php

namespace App\Http\Controllers\Api\Receipt;

use App\Receipt;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserReceiptsController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $userid = $request->user()->id;
        if (!$userid)
            abort(404);
        $items = Receipt::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
        return $this->apiResponse($request,trans('language.message') ,$items,true);
    }
}
