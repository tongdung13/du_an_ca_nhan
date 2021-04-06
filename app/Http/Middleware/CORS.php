<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Illuminate\Support\Facades\Session::has('login')) {
            if (Auth::user()->role == "0") {
                abort('403', 'bạn không có quyền truy cập');
            }
        }
        return $next($request);
    }
}
