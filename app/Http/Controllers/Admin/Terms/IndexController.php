<?php

namespace App\Http\Controllers\Admin\Terms;

use App\Termes;
use App\Terms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request){

        $item = Terms::first();
        return view('admin.terms.index',compact('item'));
    }
    public function update(Request $request, $id)
    {
        $about = Terms::find($id);
        $about->name_ar = $request->name_ar;
        $about->name_en = $request->name_en;
        $about->save();
        session()->flash('success', trans('admin.done'));
        return back();
    }
}
