<v-product-card
    {{ $attributes }}
    :product="product"
>
</v-product-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-card-template">

        <div class="max-w-[280px] cursor-pointer max-lg:min-w-[120px] max-lg:!max-w-[120px] md:min-w-64 lg:min-w-[300px]"
            v-if="mode != 'list'"
            @click="productConfirmModal(product)"
        >
            <div class="group flex overflow-hidden rounded-[20px]">
                <x-shop::media.images.lazy
                    class="w-full rounded-3xl shadow-inner transition-all duration-300 group-hover:scale-105 max-lg:h-32 md:h-60 lg:h-64"
                    ::src="product.base_image.medium_image_url"
                ></x-shop::media.images.lazy>
            </div>

            <div class="mt-[10px] grid content-start gap-3 text-white max-668:text-black">
                <p
                    class="font-popins text-5 max-lg:text-3.5 overflow-hidden text-ellipsis whitespace-nowrap font-bold" 
                    v-text="product.name"
                ></p>
                
                <div class="">
                    <div class="relative items-center justify-between">
                        <div 
                            class="font-popins overflow-hidden text-ellipsis whitespace-nowrap text-wrap text-base font-medium max-lg:text-base" 
                            v-html="product.price_html"
                        ></div>
                    </div>
                    
                    <p class="font-popins text-[15px] font-medium max-lg:text-[14px]">
                        @lang('enclaves::app.shop.customers.total-contract-price')
                    </p>
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