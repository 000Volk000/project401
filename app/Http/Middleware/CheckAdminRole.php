<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
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
        if (Auth::check() && Auth::user()->rol === 'admin') {
            return $next($request);
        }

        // Redirect to login or forbidden page if not admin
        return redirect('/login')->withErrors(['message' => 'You do not have access to this page.']);
    }
}
