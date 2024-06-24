{!! view_render_event('bagisto.shop.checkout.cart.summary.before') !!}

<v-cart-summary
    ref="vCartSummary"
    :cart="cart"
    :is-cart-loading="isCartLoading"
>
</v-cart-summary>

{!! view_render_event('bagisto.shop.checkout.cart.summary.after') !!}

@pushOnce('scripts')
    <script type="text/x-template" id="v-cart-summary-template">
        <template v-if="isCartLoading">
            <!-- onepage Summary Shimmer Effect -->
            <x-shop::shimmer.checkout.onepage.cart-summary/>
        </template>

        <template v-else>
            <div class="sticky top-[30px] h-max w-[442px] max-w-full pl-[30px] max-lg:w-auto max-lg:max-w-[442px] max-lg:pl-0">
                <h2 class="text-[26px] font-medium max-lg:text-[20px]">
                    @lang('shop::app.checkout.onepage.summary.cart-summary')
                </h2>
                
                <div class="mt-[40px] grid border-b-[1px] border-[#E9E9E9] max-lg:mt-[20px]">
                    <div 
                        class="flex gap-x-[15px] pb-[20px]"
                        v-for="item in cart.items"
                    >
                        <img
                            class="h-[90px] max-h-[90px] w-[90px] max-w-[90px] rounded-md"
                            :src="item.base_image.small_image_url"
                            :alt="item.name"
                            width="110"
                            height="110"
                        />

                        <div>
                            <p 
                                class="text-[16px] text-navyBlue max-lg:text-[14px] max-lg:font-medium" 
                                v-text="item.name"
                            >
                            </p>

                            <p class="mt-[10px] text-[18px] font-medium max-lg:text-[14px] max-lg:font-normal">
                                @{{ item.formatted_price }}
                            </p>
                            
                            <p 
                                class="text-[15px]"
                            >
                                <span class="font-medium max-lg:text-[14px] max-lg:font-normal" v-text="'Property code: '">
                                </span> <span v-text="cart.property_code"></span>
                            </p> 
                        </div>
                    </div>
                    

                </div>

                <div class="mb-[30px] mt-[25px] grid gap-[15px]">
                    <div class="flex justify-between text-right">
                        <p class="text-[16px] max-lg:text-[14px] max-lg:font-normal">
                            @lang('shop::app.checkout.onepage.summary.sub-total')
                        </p>

                        <p 
                            class="text-[16px] font-medium max-lg:text-[14px]"
                            v-text="cart.base_sub_total"
                        >
                        </p>
                    </div>

                    <div 
                        class="flex justify-between text-right"
                        v-for="(amount, index) in cart.base_tax_amounts"
                        v-if="parseFloat(cart.base_tax_total)"
                    >
                        <p class="text-[16px] max-lg:text-[14px] max-lg:font-normal">
                            @lang('shop::app.checkout.onepage.summary.tax') (@{{ index }})%
                        </p>

                        <p 
                            class="text-[16px] font-medium max-lg:text-[14px]"
                            v-text="amount"
                        >
                        </p>
                    </div>

                    <div 
                        class="flex justify-between text-right"
                        v-if="! cart.selected_shipping_rate"
                    >
                        <p class="text-[16px]">
                            @lang('shop::app.checkout.onepage.summary.delivery-charges')
                        </p>

                        <p 
                            class="text-[16px] font-medium"
                            v-text="cart.selected_shipping_rate"
                        >
                        </p>
                    </div>

                    <div 
                        class="flex justify-between text-right"
                        v-if="cart.base_discount_amount && parseFloat(cart.base_discount_amount) > 0"
                    >
                        <p class="text-[16px]">
                            @lang('shop::app.checkout.onepage.summary.discount-amount')
                        </p>

                        <p 
                            class="text-[16px] font-medium"
                            v-text="cart.formatted_base_discount_amount"
                        >
                        </p>
                    </div>

                    @include('shop::checkout.onepage.coupon')

                    @include('enclaves::checkout.onepage.properties.fee.index')

                    <div class="flex justify-between text-right">
                        <p class="text-[18px] font-semibold">
                            @lang('shop::app.checkout.onepage.summary.grand-total')
                        </p>

                        <p 
                            class="text-[18px] font-semibold"
                            v-text="cart.base_grand_total"
                        >
                        </p>
                    </div>
                </div>

                <template v-if="canPlaceOrder">
                    <div v-if="selectedPaymentMethod?.method == 'paypal_smart_button'">
                        <v-paypal-smart-button></v-paypal-smart-button>
                    </div>

                    <div
                        class="flex justify-end"
                        v-else
                    >
                        <button
                            v-if="! isLoading"
                            class="block w-max cursor-pointer rounded-[18px] bg-navyBlue px-[43px] py-[11px] text-center text-base font-medium text-white max-lg:mb-[40px] max-lg:px-[25px] max-lg:text-[14px]"
                            @click="placeOrder"
                        >
                            @lang('shop::app.checkout.onepage.summary.place-order')    
                        </button>

                        <button
                            v-else
                            class="flex w-max items-center gap-[10px] rounded-[18px] bg-navyBlue px-[32px] py-[11px] text-center text-base font-medium text-white max-lg:mb-[40px] max-lg:px-[25px] max-lg:text-[14px]"
                        >
                            <!-- Spinner -->
                            <svg class="h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                >
                                </circle>

                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                >
                                </path>
                            </svg>

                            @lang('shop::app.checkout.onepage.summary.processing')
                        </button>
                    </div>
                </template>
            </div>
        </template>
    </script>

    <script type="module">
        app.component('v-cart-summary', {
            template: '#v-cart-summary-template',
            
            props: ['cart', 'isCartLoading'],

            data() {
                return {
                    canPlaceOrder: false,

                    selectedPaymentMethod: null,

                    isLoading: false,
                }
            },

            methods: {
                placeOrder() {
                    this.isLoading = true;

                    this.$axios.post('{{ route('shop.checkout.onepage.orders.store') }}')
                        .then(response => {
                            if (response.data.data.redirect) {
                                window.location.href = response.data.data.redirect_url;
                            } else {
                                window.location.href = '{{ route('shop.checkout.onepage.success') }}';
                            }
                        })
                        .catch(error => console.log(error));
                },
            },
        });
    </script>
@endPushOnce
