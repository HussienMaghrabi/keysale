<?php

    namespace App\Http\Controllers\Site\Product;

    use App\Items;
    use Auth;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        public function index(Request $request)
        {
            $items = Items::where("user_id" , Auth::id())->orderBy("id","desc")->get();
            return view("site.user.products",compact("items"));
        }
    }
