<?php

namespace App\Http\Controllers\Site\Item;

use App\Items;
use App\Slider;
use App\Slider2;
use App\Sub_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index($id)
    {
        $items = Items::where("sub_sub_category_id", $id)->get();
        $sliders = Slider::inRandomOrder()->take(5)->get();
        return view("site.items.index", compact("items", "sliders"));
    }
    public function details($id){
        $item = Items::find($id);
        return view("site.items.details", compact("item"));
    }
}
