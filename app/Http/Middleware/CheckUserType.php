<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $user_type)
    {
        // If the 'type' property of the user did not match the Middleware, we
        // redirect back the user.
        if (! auth()->user()->isType($user_type)) {
            return redirect()->back();
        }

        return $next($request);
    }
}
