<?php

namespace Webkul\Store\Http\Middleware;

use Closure;

class AuthenticateCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'customer')
    {
        if (! auth()->guard($guard)->check()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => '',
                ], 401);
            }

            return redirect()->route('shop.customer.session.index');
        } else {
            if (! auth()->guard($guard)->user()->status) {
                auth()->guard($guard)->logout();

                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => trans('store::app.customers.login-form.not-activated'),
                    ], 401);
                }

                session()->flash('warning', trans('store::app.customers.login-form.not-activated'));

                return redirect()->route('shop.customer.session.index');
            }
        }

        return $next($request);
    }
}
