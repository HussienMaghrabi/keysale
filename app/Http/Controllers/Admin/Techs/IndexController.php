<?php

namespace App\Http\Controllers\Admin\Techs;

use App\Technical_support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $items = Technical_support::orderBy('id','desc')->paginate(10);
        return view('admin.techs.index',compact('items'));
    }
    public function destroy($id)
    {
        $item = Technical_support::findOrFail($id)->delete();
        return redirect(url('/admin/techs'));
    }
}
