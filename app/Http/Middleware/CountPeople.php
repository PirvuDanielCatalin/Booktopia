<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Stat;

class CountPeople
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
        $ip = $_SERVER['REMOTE_ADDR']; // Ip vizitator curent
        $visitor = Stat::where('value',$ip)->first(); // Cautam in BD daca exista vizitatorul
        if($visitor == null){ // Daca nu se gaseste, salvam vizitatorul
            $stat = new Stat();
            $stat->name = 'Visitor';
            $stat->value = $ip;
            $stat->save();
        }

        $visits = Stat::where('name','visits')->first(); // Extragem nr de accesari
        $visits->value = $visits->value + 1;
        $visits->save(); // Incrementam nr de accesari si actualizam BD

        return $next($request);
    }
}
