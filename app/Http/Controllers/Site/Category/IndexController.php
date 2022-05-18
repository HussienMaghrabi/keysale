<?php

    namespace App\Http\Controllers\Site\Category;

    use App\Advertisement;
    use App\Category;
    use App\Slider;
    use App\Slider2;
    use App\Sub_category;
    use App\Sub_sub_category;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        public function index($id)
        {
            $items = Sub_category::where("category_id", $id)->get();
            $sliders = Slider2::inRandomOrder()->take(5)->get();
            return view("site.category.sub_cats", compact("items", "sliders"));
        }

        public function sub_sub_categories($id)
        {
            $items = Sub_sub_category::where("sub_category_id", $id)->get();
            $sliders = Advertisement::inRandomOrder()->take(5)->get();
            return view("site.category.sub_sub_cats", compact("items", "sliders"));
        }
    }
