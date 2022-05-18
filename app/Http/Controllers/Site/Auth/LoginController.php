<?php

    namespace App\Http\Controllers\Site\Auth;

    use Auth;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class LoginController extends Controller
    {
        public function index(Request $request)
        {
            if (Auth::check()) {
                return redirect("/");
            }
            return view("auth.login");
        }

        public function loginAction(Request $request)
        {
            $request->validate([
                'mobile' => ['required'],
                'password' => ['required', 'string', 'min:6'],
            ]);

            if (Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
                // The user is active, not suspended, and exists.
                $user = Auth::user();
                Auth::login($user);
                session()->flash('success', trans('تم تسجيل الدخول بنجاح '));
                return back();

            } else {
                session()->flash('alert', trans('حدث خطاء اثناء تسجيل الدخول الرجاء التاكد من صحه البيانات المدخله.'));
                return back();
            }
        }

        public function siteLogout(Request $request)
        {
            Auth::logout();
            $request->session()->regenerate();
            return redirect('/');
        }


    }
