<?php

namespace App\Http\Middleware;

use Closure;

class ArchiveMiddleware
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
      $day = $request->year . "-" . $request->month . "-" . $request->days;
      $request->merge(['day'=> $day]);
      return $next($request);
    }
}
