<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Contact_us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $items = Contact_us::orderBy('id','desc')->paginate(10);
        return view('admin.contacts.index',compact('items'));
    }
    public function destroy($id)
    {
        $item = Contact_us::findOrFail($id)->delete();
        return redirect(url('/admin/contacts'));
    }
}
