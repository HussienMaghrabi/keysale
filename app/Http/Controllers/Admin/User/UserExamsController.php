<?php

namespace App\Http\Controllers\Admin\User;

use App\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserExamsController extends Controller
{
    public function index($id)
    {
        $items = Exam::where('user_id',$id)->orderBy('id','desc')->paginate(10);
        return view('admin.users.exams.index', compact('items'));
    }
}
