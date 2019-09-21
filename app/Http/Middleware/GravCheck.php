<?php

namespace App\Http\Middleware;

use Closure;

class GravCheck
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
        if ($request->user()->admin == 'N') {
            return redirect('404');
        }

       return $next($request);
    }
}
