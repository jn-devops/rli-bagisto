<v-product-card
    {{ $attributes }}
    :product="product"
>
</v-product-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-card-template">
        <!-- Grid Card -->
        <div
            class='grid gap-2.5 content-start w-full relative'
            v-if="mode != 'list'"
            @click="productConfirmModal(product)"
            >
            <div class="relative overflow-hidden group max-w-[291px] max-h-[300px] rounded-[4px]">
                <x-shop::media.images.lazy
                    class="relative after:content-[' '] after:block after:pb-[calc(100%+9px)] bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300"
                    ::src="product.base_image.medium_image_url"
                    ::key="product.id"
                    ::index="product.id"
                    width="291"
                    height="300"
                    ::alt="product.name"
                ></x-shop::media.images.lazy>
                
                <div class="action-items bg-black">
                    <p
                        class="inline-block absolute top-[20px] left-[20px] px-[10px]  bg-[#E51A1A] rounded-[44px] text-white text-[14px]"
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

            <div class="grid gap-2.5 content-start max-w-[291px]">
                <p class="text-base" v-text="product.name"></p>

                <div
                    class="flex gap-2.5 font-semibold text-lg"
                    v-html="product.price_html"
                >
                </div>

                <!-- Needs to implement that in future -->
                <div class="hidden flex gap-4 mt-[8px]">
                    <span class="block w-[30px] h-[30px] bg-[#B5DCB4] rounded-full cursor-pointer"></span>

                    <span class="block w-[30px] h-[30px] bg-[#5C5C5C] rounded-full cursor-pointer"></span>
                </div>
            </div>
        </div>

        <!-- List Card -->
        <div
            class="flex gap-[15px] grid-cols-2 max-w-max relative max-sm:flex-wrap rounded-[4px] overflow-hidden"
            v-else
            @click="productConfirmModal(product)"
            >
            <div class="relative max-w-[250px] max-h-[258px] overflow-hidden group"> 
                <x-shop::media.images.lazy
                    class="min-w-[250px] relative after:content-[' '] after:block after:pb-[calc(100%+9px)] bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300"
                    ::src="product.base_image.medium_image_url"
                    width="291"
                    height="300"
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

            <div class="grid gap-[15px] content-start"> 
                <p 
                    class="text-base" 
                    v-text="product.name"
                >
                </p> 

                <div 
                    class="flex gap-2.5 text-lg font-semibold"
                    v-html="product.price_html"
                >   
                </div> 

                <!-- Needs to implement that in future -->
                <div class="hidden flex gap-4"> 
                    <span class="block w-[30px] h-[30px] rounded-full bg-[#B5DCB4]">
                    </span> 

                    <span class="block w-[30px] h-[30px] rounded-full bg-[#5C5C5C]">
                    </span> 
                </div> 
                
                <p class="text-[14px] text-[#6E6E6E]" v-if="! product.avg_ratings">
                    @lang('shop::app.components.products.card.review-description')
                </p>
            
                <p v-else class="text-[14px] text-[#6E6E6E]">
                    <x-shop::products.star-rating 
                        ::value="product && product.avg_ratings ? product.avg_ratings : 0"
                        :is-editable=false
                    >
                    </x-shop::products.star-rating>
                </p>
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
