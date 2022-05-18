<?php

namespace App\Http\Controllers\Api\Item;

use App\Item_status;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemStatusController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $status = Item_status::all();
        return $this->apiResponse($request, trans('language.message'), $status, true);
    }
}
