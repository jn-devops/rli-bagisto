<?php

namespace Webkul\Blog\Http\Middleware;

use Closure;

class Blog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(! core()->getConfigData('blog.settings.general.status'), 404);

        return $next($request);
    }
}
