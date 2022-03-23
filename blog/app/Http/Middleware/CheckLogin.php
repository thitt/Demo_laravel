<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        if (isset($user->active) && $user->active == 1) {
            return $next($request);
        }

        return redirect()->route('login');

//        return Auth::onceBasic() ?: $next($request);

    }
}
