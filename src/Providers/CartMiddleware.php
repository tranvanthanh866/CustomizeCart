<?php

namespace Packages\ShoppingCart\Providers;

use Assets;
use Closure;

class CartMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     *
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
