<v-mini-cart>
    <span class="icon-cart text-[24px] cursor-pointer"></span>
</v-mini-cart>

@pushOnce('scripts')
    <script type="text/x-template" id="v-mini-cart-template">
        <x-shop::drawer>
            <x-slot:toggle>
                <span class="relative">
                    <span class="icon-cart text-[24px] cursor-pointer"></span>

                    <span
                        class="absolute px-[7px] top-[-15px] left-[18px] py-[5px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[44px] text-white text-[10px] font-semibold leading-[9px]"
                        v-if="cart?.items_qty"
                    >
                        @{{ cart.items_qty }}
                    </span>
                </span>
            </x-slot:toggle>

            <x-slot:header>
                <div class="flex justify-between items-center">
                    <p class="text-[26px] font-medium">
                        @lang('shop::app.checkout.cart.mini-cart.shopping-cart')
                    </p>
                </div>
            </x-slot:header>

            <x-slot:content>
                <div 
                    class="grid gap-[50px] mt-[35px]" 
                    v-if="cart?.items?.length"
                >
                    <div 
                        class="flex gap-x-[20px]" 
                        v-for="item in cart?.items"
                    >

                        <div class="">
                            <img
                                :src="item.base_image.small_image_url"
                                class="max-w-[110px] max-h-[110px] rounded-[12px]"
                            />
                        </div>

                        <div class="grid flex-1 gap-y-[10px] place-content-start justify-stretch">
                            <div class="flex flex-wrap justify-between">
                                
                                <p
                                    class="text-[16px] font-medium max-w-[80%]"
                                    v-text="item.name"
                                >
                                </p>

                                <p
                                    class="text-[18px]"
                                    v-text="item.formatted_price"
                                >
                                </p>

                                <p class="text-[18px]">
                                    <span class="font-bold">@lang('enclaves::app.product.reservation-fee')</span>
                                    <span v-text="cart?.processing_fee"></span>
                                </p>

                            </div>

                            <div
                                class="grid gap-x-[10px] gap-y-[6px] select-none"
                                v-if="item.options.length"
                            >
                                <div class="">
                                    <p
                                        class="flex gap-x-[15px] items-center text-[16px] cursor-pointer"
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

                            <div class="flex gap-[20px] items-center flex-wrap">
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
                    <div class="grid gap-y-[20px] b-0 place-items-center">
                        <img src="{{ bagisto_asset('images/thank-you.png') }}">

                        <p class="text-[20px]">
                            @lang('shop::app.checkout.cart.mini-cart.empty-cart')
                        </p>
                    </div>
                </div>
            </x-slot:content>

            <x-slot:footer>
                <div v-if="cart?.items?.length">
                    <div class="flex justify-between items-center mt-[60px] mb-[30px] px-[25px] pb-[8px] border-b-[1px] border-[#E9E9E9]">
                        <p class="text-[14px] font-medium text-[#6E6E6E]">
                            @lang('shop::app.checkout.cart.mini-cart.subtotal')
                        </p>

                        <p
                            class="text-[30px] font-semibold"
                            v-text="cart.formatted_grand_total"
                        >
                        </p>
                    </div>

                    <div class="px-[25px]">
                        <button
                            @click="handleKycVerificationRedirect"
                            class="block w-full mx-auto m-0 ml-[0px] py-[15px] px-[43px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[18px] text-white text-base font-medium text-center cursor-pointer max-sm:px-[20px]"
                            >
                            @lang('enclaves::app.product.reserve_now')
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

                            this.getReqirectURL();
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


                getReqirectURL() {
                    this.$axios.get("{{ route('ekyc.property.verfiy-url') }}")
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
