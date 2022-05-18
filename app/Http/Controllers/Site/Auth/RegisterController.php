<?php

    namespace App\Http\Controllers\Site\Auth;

    use App\Alm_users;
    use App\User;
    use Auth;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class RegisterController extends Controller
    {
        public function index(Request $request)
        {
            return view("auth.register");
        }

        public function register(Request $request)
        {

            $data = $request->all();
            $data["password"] = \Hash::make($request->password);
            $data["user_type_id"] = 2;
            $user = User::create($data);
            Auth::login($user);
            return redirect("/");
        }
    }
