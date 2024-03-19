<v-product-card
    {{ $attributes }}
    :product="product"
>
</v-product-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-card-template">

        <div class="grid gap-2.5 relative min-w-[350px] max-w-[350px]"
            v-if="mode != 'list'"
            @click="productConfirmModal(product)"
            >
            <div class="relative overflow-hidden  group max-w-[350px] max-h-[289px] rounded-[20px]">
                <x-shop::media.images.lazy
                    class="rounded bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300"
                    ::src="product.base_image.medium_image_url"
                ></x-shop::media.images.lazy>

                <div class="action-items bg-black"> 
                    <p
                        class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-[#E51A1A] rounded-[44px] text-white text-[14px]"
                        v-if="product.on_sale"
                    >
                        @lang('shop::app.components.products.card.sale')
                    </p>

                    <p
                        class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-navyBlue rounded-[44px] text-white text-[14px]"
                        v-else-if="product.is_new"
                    >
                        @lang('shop::app.components.products.card.new')
                    </p>
                </div>
            </div>

            <div class="grid gap-2.5 content-start">
                <p 
                    class="text-[20px] font-bold font-popins" 
                    v-text="product.name"
                ></p>
                
                <div class="grid gap-[12px]">
                    <p class="text-[16px] font-medium font-popins text-[#A0A0A0]">
                        @lang('enclaves::app.customers.total-contract-price')
                    </p>
                </div>

                <div class="grid grid-cols-2 items-center justify-between max-425:grid">
                    <div class="text-[20px] font-medium font-popins text-wrap" v-html="product.price_html"></div>

                    <button
                        @click="productConfirmModal(product)"
                        class="text-white px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]"
                    >
                        @lang('enclaves::app.customers.choose-unit')
                    </button>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-product-card', {
            template: '#v-product-card-template',

            props: ['mode', 'product'],

            data() {
                return {
                    isCustomer: '{{ auth()->guard('customer')->check() }}',
                }
            },

            methods: {
                productConfirmModal(product) {
                    window.location.href = `{{ route('shop.product_or_category.index', '') }}/` + product.url_key;
                }
            },
        });
    </script>
@endpushOnce