<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class thanks
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
        $number = Session::get('number');
        if ($number == null || $number == 0) {
            $number = config('view.number');
        } else {
            if ($number == 1) {
                Session::flash('thanks',true);
            }
        }
        $number--;
        Session::put('number', $number);
//        echo "<pre>";
//        print_r(Session::get('number'));
//        echo "<br>";
//        print_r(Session::get('thanks'));
//        echo "</pre>";

        return $next($request);
    }
}
