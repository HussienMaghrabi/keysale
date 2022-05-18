<?php

namespace App\Http\Controllers\Admin\About;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request){

        $item = About::first();
        return view('admin.about.index',compact('item'));
    }
    public function update(Request $request, $id)
    {
        $about = About::find($id);
        $about->name_ar = $request->name_ar;
        $about->name_en = $request->name_en;
        $about->save();
        session()->flash('success', trans('admin.done'));
        return back();
    }

}
