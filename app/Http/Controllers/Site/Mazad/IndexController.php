<?php

namespace App\Http\Controllers\Site\Mazad;

use App\Advertisement;
use App\Items;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $items = Items::where('main_category_id', "2")->orderBy('id', 'desc')->get();
        $sliders = Advertisement::inRandomOrder()->take(5)->get();
        return view("site.mazad.index", compact("items", "sliders"));

    }
}
