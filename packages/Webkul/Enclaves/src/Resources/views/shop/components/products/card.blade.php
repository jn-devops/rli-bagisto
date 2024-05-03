<v-product-card
    {{ $attributes }}
    :product="product"
>
</v-product-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-card-template">

        <div class="relative grid gap-2.5 lg:min-w-[350px] lg:max-w-[350px]"
            v-if="mode != 'list'"
            @click="productConfirmModal(product)"
        >
            <div class="group flex max-h-[289px] max-w-[350px] overflow-hidden rounded-[20px] max-lg:min-w-[120px]">
                <x-shop::media.images.lazy
                    class="w-full rounded bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                    ::src="product.base_image.medium_image_url"
                ></x-shop::media.images.lazy>

                <div class="action-items bg-black"> 
                    <p
                        class="absolute left-[20px] top-[20px] inline-block rounded-[44px] bg-[#E51A1A] px-[10px] text-[14px] text-white"
                        v-if="product.on_sale"
                    >
                        @lang('shop::app.components.products.card.sale')
                    </p>

                    <p
                        class="absolute left-[20px] top-[20px] inline-block rounded-[44px] bg-navyBlue px-[10px] text-[14px] text-white"
                        v-else-if="product.is_new"
                    >
                        @lang('shop::app.components.products.card.new')
                    </p>
                </div>
            </div>

            <div class="grid content-start gap-2.5">
                <p 
                    class="font-popins overflow-hidden text-ellipsis whitespace-nowrap text-[20px] font-bold max-sm:text-[14px]" 
                    v-text="product.name"
                ></p>
                
                <div class="grid gap-[12px]">
                    <p class="font-popins text-[16px] font-medium text-[#A0A0A0] max-sm:text-[14px]">
                        @lang('enclaves::app.shop.customers.total-contract-price')
                    </p>
                </div>

                <div class="relative grid grid-cols-2 items-center justify-between max-lg:grid-cols-1 max-425:grid">
                    <div class="font-popins overflow-hidden text-ellipsis whitespace-nowrap text-wrap text-[20px] font-medium max-sm:text-[14px]" v-html="product.price_html"></div>

                    <button
                        @click="productConfirmModal(product)"
                        class="text-nowrap rounded-[20px] border-[2px] border-[#CC035C] bg-white p-[5px] font-semibold text-[#CC035C] max-sm:text-[14px]"
                    >
                        @lang('enclaves::app.shop.customers.choose-unit')
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
                    isCustomer: '{{ auth()->guard("customer")->check() }}',
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