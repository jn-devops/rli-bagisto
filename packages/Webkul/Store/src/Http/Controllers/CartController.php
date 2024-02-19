<?php

namespace Webkul\Store\Http\Controllers;

class CartController extends Controller
{
    /**
     * Cart page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // client want disable cart index page.
        return abort(401, 'Cart Page disabled by admin');

        return view('store::checkout.cart.index');
    }
}
