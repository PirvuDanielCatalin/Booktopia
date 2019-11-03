<?php

namespace App\Http\Middleware;

use Closure;

class contact
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!(preg_match('/^https?:\/\/(shop\.booktopia|shop-booktopia.herokuapp.com)\/profiles\/([1-9][0-9]*)$/', session('_previous')['url']) && (session('number') == 0) && session('thanks')))
            abort(404);
        return $next($request);
    }
}
