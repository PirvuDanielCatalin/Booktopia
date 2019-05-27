<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isPartner
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
        if(!Auth::user()->isPartner())
            return redirect('/notAdmin');
        return $next($request);
    }
}
