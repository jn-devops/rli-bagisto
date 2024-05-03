<?php

namespace Webkul\BulkUpload\Http\Middleware;

use Closure;

class BulkUpload
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(! core()->getConfigData('bulkUpload.settings.general.status'), 404);

        return $next($request);
    }
}
