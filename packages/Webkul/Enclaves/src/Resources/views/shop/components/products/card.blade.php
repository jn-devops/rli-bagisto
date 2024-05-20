<v-product-card
    {{ $attributes }}
    :product="product"
>
</v-product-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-card-template">

        <div class="relative max-w-[280px] cursor-pointer max-lg:min-w-[120px] lg:min-w-[280px]"
            v-if="mode != 'list'"
            @click="productConfirmModal(product)"
        >
            <div class="group flex max-h-[289px] max-w-[350px] overflow-hidden rounded-[20px] max-lg:min-w-[120px]">
                <x-shop::media.images.lazy
                    class="h-[260px] w-full rounded-3xl shadow-inner transition-all duration-300 group-hover:scale-105 max-lg:h-[128px]"
                    ::src="product.base_image.medium_image_url"
                ></x-shop::media.images.lazy>
            </div>

            <div class="mt-[10px] grid content-start gap-3">
                <p
                    class="font-popins overflow-hidden text-ellipsis whitespace-nowrap text-[20px] font-bold text-white max-sm:text-[14px]" 
                    v-text="product.name"
                ></p>
                
                <div class="">
                    <div class="relative items-center justify-between">
                        <div 
                            class="font-popins overflow-hidden text-ellipsis whitespace-nowrap text-wrap text-[21px] font-medium text-white max-sm:text-[14px]" 
                            v-html="product.price_html"
                        ></div>
                    </div>
                    
                    <p class="font-popins text-[15px] font-medium text-white max-sm:text-[14px]">
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