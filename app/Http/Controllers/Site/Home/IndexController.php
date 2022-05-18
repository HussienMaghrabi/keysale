<?php

    namespace App\Http\Controllers\Site\Home;

    use App\Item_images;
    use App\Items;
    use App\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        public function index()
        {
            return view("site.home.index");
        }

        public function addProduct()
        {
            return view("site.home.addProduct");
        }

        public function ProductDetails($id){
            $item = Items::find($id);
            $user = User::find($item->user_id);
            $images = Item_images::where("item_id",$item->id)->get();
            return view("site.user.productDetails",compact('item','user','images'));
        }
    }
