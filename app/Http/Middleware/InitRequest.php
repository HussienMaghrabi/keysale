<?php

namespace App\Http\Middleware;

use App\Default_image;
use App\Http\Controllers\Controller;
use Closure;

class InitRequest extends Controller
{
    public function handle($request, Closure $next)
    {
        $data = $request->all();
        if ($request->password)
            $data['password'] = bcrypt($request->password);
        $request['data'] = $data;
        return $next($request);
    }
}
