<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $level)
    {
        if (!Auth::guard('web')->check() && !Auth::guard('staf')->check())  {
            return redirect('login');
        }

        $user = Auth::guard('web')->user() ?? Auth::guard('staf')->user();

        if ($user->level == $level) {
            return $next($request);
        } 

        return abort(403, 'Unauthorized action.');
    }
}
