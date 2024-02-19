<?php

namespace Webkul\Store\Http\Controllers\Customer;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Event;
use Webkul\Store\Http\Controllers\Controller;
use Webkul\Store\Http\Requests\Customer\LoginRequest;

class SessionController extends Controller
{
    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show()
    {
        return auth()->guard('customer')->check()
            ? redirect()->route('shop.home.index')
            : view('store::customers.sign-in');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(LoginRequest $loginRequest)
    {
        if (! auth()->guard('customer')->attempt($loginRequest->only(['email', 'password']))) {
            session()->flash('error', trans('store::app.customers.login-form.invalid-credentials'));

            return redirect()->back();
        }

        if (! auth()->guard('customer')->user()->status) {
            auth()->guard('customer')->logout();

            session()->flash('warning', trans('store::app.customers.login-form.not-activated'));

            return redirect()->back();
        }

        if (! auth()->guard('customer')->user()->is_verified) {
            session()->flash('info', trans('store::app.customers.login-form.verify-first'));

            Cookie::queue(Cookie::make('enable-resend', 'true', 1));

            Cookie::queue(Cookie::make('email-for-resend', $loginRequest->get('email'), 1));

            auth()->guard('customer')->logout();

            return redirect()->back();
        }

        /**
         * Event passed to prepare cart after login.
         */
        Event::dispatch('customer.after.login', $loginRequest->get('email'));

        return redirect()->route('shop.home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->guard('customer')->logout();

        Event::dispatch('customer.after.logout', $id);

        return redirect()->route('shop.home.index');
    }
}
