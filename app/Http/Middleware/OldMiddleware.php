<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 中间件：只允许age大于200的访问
 * Class OldMiddleware
 * @package App\Http\Middleware
 */
class OldMiddleware
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
        if($request->input('age') <= 200) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
