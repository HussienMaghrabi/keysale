<?php

namespace App\Http\Controllers\Site\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){

        return view("site.user.profile");
    }
}
