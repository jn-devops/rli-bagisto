<?php

namespace Webkul\BulkUpload\Traits;

/**
 * Cart coupons. In this trait, you will get all sorted collections of
 * methods which can be use for coupon in cart.
 *
 * Note: This trait will only work with the Cart facade. Unless and until,
 * you have all the required repositories in the parent class.
 */
trait CartProcessingFee
{
    /**
     * Set coupon code to the cart.
     *
     * @param  string  $code
     * @return \Webkul\Checkout\Contracts\Cart
     */
    public function setProcessingFee($fee)
    {
        dd($fee);
        // $cart = $this->getCart();

        // $cart->coupon_code = $fee;

        // $cart->save();

        return $this;
    }
}