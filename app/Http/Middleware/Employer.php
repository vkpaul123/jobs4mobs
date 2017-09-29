<?php

namespace App\Http\Middleware;

use Closure;

class Employer
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
        if(Auth::check() && Auth::user()->isEmployer())
            return $next($request);

        return redirect('employer.login');
    }
}
