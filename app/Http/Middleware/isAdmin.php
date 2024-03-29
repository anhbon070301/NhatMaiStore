<?php

namespace App\Http\Middleware;

use App\Constants\Common;
use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard(Common::GUARD_ADMIN)->check() && !empty(auth()->guard(Common::GUARD_ADMIN)->user())) {
            return $next($request);
        }

        return redirect()->route('admin.login');
    }
}
