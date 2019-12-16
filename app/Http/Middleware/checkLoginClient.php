<?php

namespace App\Http\Middleware;

use Closure;

class checkLoginClient
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
        if ($request->session()->has('mat_khau') && $request->session()->has('email'))
        return $next($request);
        else
        {
            return redirect()->route('ClientLogin');
        }

    }
}
