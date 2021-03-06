<?php

namespace App\Http\Middleware;

use Closure;

class PlanMiddleware
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
      $day = $request->year . "-" . $request->month . "-" . $request->day;
      $request->merge(['book_limit'=> $day]);
      return $next($request);
    }
}
