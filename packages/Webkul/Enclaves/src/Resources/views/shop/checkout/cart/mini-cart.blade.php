<v-mini-cart>
    <span class="icon-cart cursor-pointer text-[24px]"></span>
</v-mini-cart>

@pushOnce('scripts')
    <script type="text/x-template" id="v-mini-cart-template">
        <x-shop::drawer>
            <x-slot:toggle>
                <span class="relative">
                    <span class="icon-cart cursor-pointer text-[24px]"></span>

                    <span
                        class="absolute left-[18px] top-[-15px] rounded-[44px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[7px] py-[5px] text-[10px] font-semibold leading-[9px] text-white"
                        v-if="cart?.items_qty"
                    >
                        @{{ cart.items_qty }}
                    </span>
                </span>
            </x-slot:toggle>

            <x-slot:header>
                <div class="flex items-center justify-between">
                    <p class="text-[26px] font-medium">
                        @lang('shop::app.checkout.cart.mini-cart.shopping-cart')
                    </p>
                </div>
            </x-slot:header>

            <x-slot:content>
                <div 
                    class="mt-[35px] grid gap-[50px]" 
                    v-if="cart?.items?.length"
                >
                    <div 
                        class="flex gap-x-[20px]" 
                        v-for="item in cart?.items"
                    >

                        <div class="">
                            <img
                                :src="item.base_image.small_image_url"
                                class="max-h-[110px] max-w-[110px] rounded-[12px]"
                            />
                        </div>

                        <div class="grid flex-1 place-content-start justify-stretch gap-y-[10px]">
                            <div class="flex flex-wrap justify-between">
                                
                                <p
                                    class="max-w-[80%] text-[16px] font-medium"
                                    v-text="item.name"
                                >
                                </p>

                                <p
                                    class="text-[18px]"
                                    v-text="item.formatted_price"
                                >
                                </p>

                                <p class="text-[18px]">
                                    <span class="font-bold">@lang('enclaves::app.shop.product.reservation-fee')</span>
                                    <span class="font-bold text-red-600" v-text="cart?.processing_fee"></span>
                                </p>

                            </div>

                            <div
                                class="grid select-none gap-x-[10px] gap-y-[6px]"
                                v-if="item.options.length"
                            >
                                <div class="">
                                    <p
                                        class="flex cursor-pointer items-center gap-x-[15px] text-[16px]"
                                        @click="item.option_show = ! item.option_show"
                                    >
                                        @lang('shop::app.checkout.cart.mini-cart.see-details')

                                        <span
                                            class="text-[24px]"
                                            :class="{'icon-arrow-up': item.option_show, 'icon-arrow-down': ! item.option_show}"
                                        ></span>
                                    </p>
                                </div>

                                <div class="grid gap-[8px]" v-show="item.option_show">
                                    <div class="" v-for="option in item.options">
                                        <p class="text-[14px]">
                                            <span class="font-medium">
                                                @{{ option.attribute_name + ': ' }} 
                                            </span>
                                            <span>
                                                @{{ option.option_label }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center gap-[20px]">
                                <button
                                    type="button"
                                    class="text-[#0A49A7]"
                                    @click="removeItem(item.id)"
                                >
                                    @lang('shop::app.checkout.cart.mini-cart.remove')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="pb-[30px]"
                    v-else
                >
                    <div class="b-0 grid place-items-center gap-y-[20px]">
                        <img src="{{ bagisto_asset('images/thank-you.png') }}">

                        <p class="text-[20px]">
                            @lang('shop::app.checkout.cart.mini-cart.empty-cart')
                        </p>
                    </div>
                </div>
            </x-slot:content>

            <x-slot:footer>
                <div v-if="cart?.items?.length">
                    <div class="mb-[30px] mt-[60px] flex items-center justify-between border-b-[1px] border-[#E9E9E9] px-[25px] pb-[8px]">
                        <p class="text-[14px] font-medium text-[#6E6E6E]">
                            @lang('shop::app.checkout.cart.mini-cart.subtotal')
                        </p>

                        <p
                            class="text-[30px] font-semibold"
                            v-text="cart?.processing_fee"
                        >
                        </p>
                    </div>

                    <div class="px-[25px]">
                        <button
                            @click="handleKycVerificationRedirect"
                            class="m-0 mx-auto ml-[0px] block w-full cursor-pointer rounded-[18px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[43px] py-[15px] text-center text-base font-medium text-white max-lg:px-[20px]"
                            >
                            @lang('enclaves::app.shop.product.reserve-now')
                        </button>
                    </div>
                </div>
            </x-slot:footer>
        </x-shop::drawer>
    </script>

    <script type="module">
        app.component("v-mini-cart", {
            template: '#v-mini-cart-template',

            data() {
                return  {
                    cart: null,

                    verificationUrl: null,
                }
            },

           mounted() {
                this.getCart();

                /**
                 * To Do: Implement this.
                 *
                 * Action.
                 */
                this.$emitter.on('update-mini-cart', (cart) => {
                    this.cart = cart;
                });
           },

           methods: {
                getCart() {
                    this.$axios.get('{{ route("shop.api.checkout.cart.index") }}')
                        .then(response => {
                            this.cart = response.data.data;

                            this.getRedirectURL();
                        })
                        .catch(error => {});
                },

                removeItem(itemId) {
                    this.$axios.post('{{ route("shop.api.checkout.cart.destroy") }}', {
                            '_method': 'DELETE',
                            'cart_item_id': itemId,
                        })
                        .then(response => {
                            this.cart = response.data.data;

                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                        })
                        .catch(error => {});
                },


                getRedirectURL() {
                    this.$axios.get("{{ route('enclaves.api.property.verfiy-url.index') }}")
                        .then(response => {
                            this.verificationUrl = response.data.data.ekyc_redirect;
                        })
                        .catch(error => {});
                },

                handleKycVerificationRedirect() {
                   window.open(this.verificationUrl, "_self");
                }
            }
        });
    </script>
@endpushOnce