<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Validator;
use App\Quotation;


class checkLogin
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
            return redirect()->route('login');
        }

    }
}
