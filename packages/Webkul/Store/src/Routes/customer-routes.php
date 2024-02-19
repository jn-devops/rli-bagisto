<?php

use Illuminate\Support\Facades\Route;
use Webkul\Store\Http\Controllers\Customer\Account\AddressController;
use Webkul\Store\Http\Controllers\Customer\Account\DownloadableProductController;
use Webkul\Store\Http\Controllers\Customer\Account\OrderController;
use Webkul\Store\Http\Controllers\Customer\Account\WishlistController;
use Webkul\Store\Http\Controllers\Customer\CustomerController;
use Webkul\Store\Http\Controllers\Customer\ForgotPasswordController;
use Webkul\Store\Http\Controllers\Customer\RegistrationController;
use Webkul\Store\Http\Controllers\Customer\ResetPasswordController;
use Webkul\Store\Http\Controllers\Customer\SessionController;
use Webkul\Store\Http\Controllers\DataGridController;

Route::group(['middleware' => ['locale', 'theme', 'currency']], function () {

    Route::prefix('customer')->group(function () {
        /**
         * Forgot password routes.
         */
        Route::controller(ForgotPasswordController::class)->prefix('forgot-password')->group(function () {
            Route::get('', 'create')->name('store.customers.forgot_password.create');

            Route::post('', 'store')->name('store.customers.forgot_password.store');
        });

        /**
         * Reset password routes.
         */
        Route::controller(ResetPasswordController::class)->prefix('reset-password')->group(function () {
            Route::get('{token}', 'create')->name('store.customers.reset_password.create');

            Route::post('', 'store')->name('store.customers.reset_password.store');
        });

        /**
         * Login routes.
         */
        Route::controller(SessionController::class)->prefix('login')->group(function () {
            Route::get('', 'show')->name('store.customer.session.index');

            Route::post('', 'create')->name('store.customer.session.create');
        });

        /**
         * Registration routes.
         */
        Route::controller(RegistrationController::class)->group(function () {
            Route::prefix('register')->group(function () {
                Route::get('', 'index')->name('store.customers.register.index');

                Route::post('', 'store')->name('store.customers.register.store');
            });

            /**
             * Customer verification routes.
             */
            Route::get('verify-account/{token}', 'verifyAccount')->name('store.customers.verify');

            Route::get('resend/verification/{email}', 'resendVerificationEmail')->name('store.customers.resend.verification_email');
        });

        /**
         * Customer authenticated routes. All the below routes only be accessible
         * if customer is authenticated.
         */
        Route::group(['middleware' => ['customer']], function () {
            /**
             * Datagrid routes.
             */
            Route::get('datagrid/look-up', [DataGridController::class, 'lookUp'])->name('store.customer.datagrid.look_up');

            /**
             * Logout.
             */
            Route::delete('logout', [SessionController::class, 'destroy'])->defaults('_config', [
                'redirect' => 'store.customer.session.index',
            ])->name('store.customer.session.destroy');

            /**
             * Wishlist.
             */
            Route::get('wishlist', [WishlistController::class, 'index'])->name('store.customers.account.wishlist.index');

            /**
             * Customer account. All the below routes are related to
             * customer account details.
             */
            Route::prefix('account')->group(function () {
                /**
                 * Profile.
                 */
                Route::controller(CustomerController::class)->prefix('profile')->group(function () {
                    Route::get('', 'index')->name('store.customers.account.profile.index');

                    Route::get('edit', 'edit')->name('store.customers.account.profile.edit');

                    Route::post('edit', 'update')->name('store.customers.account.profile.store');

                    Route::post('destroy', 'destroy')->name('store.customers.account.profile.destroy');

                    Route::get('reviews', 'reviews')->name('store.customers.account.reviews.index');

                    Route::get('co-borrower', 'coBorrower')->name('store.customers.account.co-borrower.index');
                });

                /**
                 * Addresses.
                 */
                Route::controller(AddressController::class)->prefix('addresses')->group(function () {
                    Route::get('', 'index')->name('store.customers.account.addresses.index');

                    Route::get('create', 'create')->name('store.customers.account.addresses.create');

                    Route::post('create', 'store')->name('store.customers.account.addresses.store');

                    Route::get('edit/{id}', 'edit')->name('store.customers.account.addresses.edit');

                    Route::put('edit/{id}', 'update')->name('store.customers.account.addresses.update');

                    Route::patch('edit/{id}', 'makeDefault')->name('store.customers.account.addresses.update.default');

                    Route::delete('delete/{id}', 'destroy')->name('store.customers.account.addresses.delete');
                });

                /**
                 * Orders.
                 */
                // Order is Transactions
                Route::controller(OrderController::class)->prefix('transactions')->group(function () {
                    Route::get('', 'index')->name('store.customers.account.transactions.index');

                    Route::get('view/{id}', 'view')->name('store.customers.account.transactions.view');

                    Route::post('cancel/{id}', 'cancel')->name('store.customers.account.transactions.cancel');

                    Route::get('print/Invoice/{id}', 'printInvoice')->name('store.customers.account.transactions.print-invoice');
                });

                /**
                 * Downloadable products.
                 */
                Route::controller(DownloadableProductController::class)->prefix('downloadable-products')->group(function () {
                    Route::get('', 'index')->name('store.customers.account.downloadable_products.index');

                    Route::get('download/{id}', 'download')->name('store.customers.account.downloadable_products.download');
                });
            });
        });
    });
});
