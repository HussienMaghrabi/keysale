<?php

    namespace App\Http\Controllers\Api\TabBar;

    use App\Category;
    use App\Slider;
    use App\Items;
    use App\MainCategory;
    use App\Traits\apiResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        use apiResponse;

        public function engine(Request $request)
        {
            $items = Category::where('main_category_id', "1")->orderBy('id', 'desc')->get();
            $sliders = Slider::inRandomOrder()->take(5)->get();
            $data['sliders'] = $sliders;
            $data['items'] = $items;
            return $this->apiResponse($request,trans('language.message') ,$data,true);
            return $this->apiResponse($request, trans('language.message'), $items, true);
        }

        public function mazad(Request $request)
        {
            $request->validate([
                "country_id" => 'required'
            ]);
            $items = Items::where('main_category_id', "2")->where("country_id", $request->country_id)->orderBy('id', 'desc')->get();
            return $this->apiResponse($request, trans('language.message'), $items, true);
        }


        public function cycles(Request $request)
        {
            $items = Items::where('main_category_id', "3")->orderBy('id', 'desc')->get();
            return $this->apiResponse($request, trans('language.message'), $items, true);
        }
    }
