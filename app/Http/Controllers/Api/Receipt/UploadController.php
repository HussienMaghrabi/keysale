<?php

namespace App\Http\Controllers\Api\Receipt;

use App\Receipt;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|string',
            'email' => 'required|string',
            'description' => 'required|string',
        ]);
        $data['user_id'] = $request->user()->id;
        $item = Receipt::create($data);
        return $this->apiResponse($request,trans('language.message') ,$item,true);
    }
}
