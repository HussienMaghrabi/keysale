<?php

    namespace App\Http\Controllers\Site\Engines;

    use App\Category;
    use App\Slider;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        public function index(Request $request)
        {
            $items = Category::where('main_category_id', "1")->orderBy('id', 'desc')->get();
            $sliders = Slider::inRandomOrder()->take(5)->get();
            return view("site.engines.index",compact("items" ,"sliders"));
        }
    }
