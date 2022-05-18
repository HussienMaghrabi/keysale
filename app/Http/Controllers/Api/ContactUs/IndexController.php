<?php

namespace App\Http\Controllers\Api\ContactUs;

use App\Contact_us;
use App\Traits\apiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use apiResponse;
    public function index(Request $request)
    {
        $data = $request->validate([
            'email' => '',
            'number' => '',
            'name' => '',
            'message' => 'required',
        ]);
        Contact_us::create($data);
        return $this->apiResponse($request, trans('language.message'), null, true);

    }
}
