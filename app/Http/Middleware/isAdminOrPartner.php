<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdminOrPartner
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
        if(!Auth::user()->isAdmin() && !Auth::user()->isPartner())
            return redirect('/notAdmin');
        return $next($request);
    }
}
