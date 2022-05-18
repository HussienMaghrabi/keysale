<?php

    namespace App\Http\Controllers\Api\HomePage;

    use App\Advertisement;
    use App\Brand;
    use App\Category;
    use App\Items;
    use App\Slider;
    use App\Traits\apiResponse;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {
        use apiResponse;
        public function index(Request $request)
        {
            $request->validate([
                'country_id' => 'required'
            ]);
            $sliders = Advertisement::inRandomOrder()->take(5)->get();
            $items = Items::where('is_special',2)->where("country_id",$request->country_id)->inRandomOrder()->get();
            $data['sliders'] = $sliders;
            $data['items'] = $items;
            return $this->apiResponse($request,trans('language.message') ,$data,true);
        }
    }
