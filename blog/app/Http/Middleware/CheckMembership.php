<?php

namespace App\Http\Middleware;

use Closure;

class CheckMembership
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
        return $next($request);
//        if ($request->membership != 1) {
//            return redirect()->route('home');
//        } else {
//            return redirect()->route('listUser');
//        }
    }

    public function terminate($request, $response) {
        //
        dd(1);
    }
}
