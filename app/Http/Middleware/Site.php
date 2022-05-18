<?php

    namespace App\Http\Middleware;

    use App\ModulesConst\UserTyps;
    use Closure;

    class Site
    {
        public function handle($request, Closure $next, $guard = null)
        {
            if (auth()->check()) // site Auth
            {
                if(auth()->user()->user_type_id == UserTyps::user){
                    return $next($request);
                }
                return redirect('/login_site');
            }
            session()->flash('alert', trans('لابد من تسجيل الدخول كي تتمكن من تصفح الموقع .'));
            return redirect('/login_site');
        }
    }
