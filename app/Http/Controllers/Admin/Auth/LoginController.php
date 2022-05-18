<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check())
            return redirect('/admin/dash');
        else
            return view('admin.auth.login');
    }

    public function adminlogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // The user is active, not suspended, and exists.
            $user = Auth::user();
            Auth::login($user);
            return redirect('/admin/dash');
        } else {
            session()->flash('danger', trans('language.loginError'));
            return back();
        }
    }
    public function adminlogout(Request $request){
        Auth::logout();
        // regenrate session :
        $request->session()->regenerate();
        // then redirect to home page  :
        return redirect('/');
    }
}
