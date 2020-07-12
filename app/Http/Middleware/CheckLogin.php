<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('auth')) {
            // user value cannot be found in session
            return redirect('login')->withErrors(['mes'=>"Bạn chưa đăng nhập."]);
        }
        return $next($request);
    }
}
