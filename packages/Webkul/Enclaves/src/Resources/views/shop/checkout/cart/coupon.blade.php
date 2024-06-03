{{-- Coupon Vue Component --}}
<v-coupon 
    :is-coupon-applied="cart.coupon_code"
    :sub-total="cart.base_grand_total"
>
</v-coupon>

@pushOnce('scripts')
    <script type="text/x-template" id="v-coupon-template">
        <div class="flex justify-between text-right">
            <p class="text-[16px] max-lg:text-[14px] max-lg:font-normal">
                @{{ isCouponApplied ? "@lang('shop::app.checkout.cart.coupon.applied')" : "@lang('shop::app.checkout.cart.coupon.discount')" }}
            </p>

            <p class="text-[16px] font-medium max-lg:text-[14px]">
                <!-- Apply coupon modal -->
                <x-shop::modal ref="couponModel">
                    <!-- Modal Toggler -->
                    <x-slot:toggle>
                        <span 
                            class="cursor-pointer text-[#0A49A7]" 
                            v-if="! isCouponApplied"
                        >
                            @lang('shop::app.checkout.cart.coupon.apply')
                        </span>
                    </x-slot:toggle>

                    <!-- Modal Header -->
                    <x-slot:header>
                        <h2 class="text-[25px] font-medium max-lg:text-[22px]">
                            @lang('shop::app.checkout.cart.coupon.apply')
                        </h2>
                    </x-slot:header>

                    <!-- Modal Contend -->
                    <x-slot:content>
                        <!-- Apply Coupon Form -->
                        <x-shop::form
                            v-slot="{ meta, errors, handleSubmit }"
                            as="div"
                        >
                            <!-- Apply coupon form -->
                            <form @submit="handleSubmit($event, applyCoupon)">
                                <x-shop::form.control-group>
                                    <div class="bg-white p-[30px]">
                                        <x-shop::form.control-group.control
                                            type="text"
                                            name="code"
                                            class="px-[25px] py-[20px]"
                                            rules="required"
                                            :placeholder="trans('shop::app.checkout.cart.coupon.enter-your-code')"
                                            v-model="code"
                                        >
                                        </x-shop::form.control-group.control>

                                        <x-shop::form.control-group.error
                                            class="flex"
                                            control-name="code"
                                        >
                                        </x-shop::form.control-group.error>
                                    </div>
                                </x-shop::form.control-group>

                                <!-- Coupon Form Action Container -->
                                <div class="mt-[20px] bg-white p-[30px]">
                                    <div class="flex flex-wrap items-center justify-between gap-[15px]">
                                        <p class="text-[14px] font-medium text-[#6E6E6E]">
                                            @lang('shop::app.checkout.cart.coupon.subtotal')
                                        </p>

                                        <div class="flex flex-auto flex-wrap items-center gap-[30px]">
                                            <p 
                                                class="text-[30px] font-semibold max-lg:text-[22px]"
                                                v-text="subTotal"
                                            >
                                            </p>

                                            <button
                                                class="block w-max flex-auto cursor-pointer rounded-[18px] bg-navyBlue px-[43px] py-[11px] text-center text-base font-medium text-white max-lg:px-[25px] max-lg:text-[14px]"
                                                type="submit"
                                            >
                                               @lang('shop::app.checkout.cart.coupon.button-title')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </x-shop::form>
                    </x-slot:content>
                </x-shop::modal>

                <!-- Applied Coupon Information Container -->
                <div 
                    class="font-small flex items-center justify-between text-[12px]"
                    v-if="isCouponApplied"
                >
                    <p 
                        class="cursor-pointer text-[16px] font-medium text-navyBlue"
                        title="@lang('shop::app.checkout.cart.coupon.applied')"
                    >
                        "@{{ isCouponApplied }}"
                    </p>

                    <span 
                        class="icon-cancel cursor-pointer text-[30px]"
                        title="@lang('shop::app.checkout.cart.coupon.remove')"
                        @click="destroyCoupon"
                    >
                    </span>
                </div>
            </p>
        </div>
    </script>

    <script type="module">
        app.component('v-coupon', {
            template: '#v-coupon-template',
            
            props: ['isCouponApplied', 'subTotal'],

            data() {
                return {
                    coupons: [],

                    code: '',
                }
            },

            methods: {
                applyCoupon(params, { resetForm}) {
                    this.$axios.post("{{ route('shop.api.checkout.cart.coupon.apply') }}", params)
                        .then((response) => {
                            this.$parent.$parent.$refs.vCart.get();
                  
                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                            this.$refs.couponModel.toggle();

                            resetForm();
                        })
                        .catch((error) => {
                            if ([400, 422].includes(error.response.request.status)) {
                                this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });

                                this.$refs.couponModel.toggle();

                                return;
                            }

                            this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });

                            this.$refs.couponModel.toggle();
                        });
                },

                destroyCoupon() {
                    this.$axios.delete("{{ route('shop.api.checkout.cart.coupon.remove') }}", {
                            '_token': "{{ csrf_token() }}"
                        })
                        .then((response) => {
                            this.$parent.$parent.$refs.vCart.get();

                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                        })
                        .catch(error => console.log(error));
                },
            }
        })
    </script>
@endPushOnce