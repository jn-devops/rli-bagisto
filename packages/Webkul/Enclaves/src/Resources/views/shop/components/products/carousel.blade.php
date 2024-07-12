<v-products-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.products.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.products.carousel>
</v-products-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-products-carousel-template">
        <template v-if="products.length">
            <div v-if="isLoading">
                <x-shop::shimmer.products.carousel 
                    :navigation-link="$navigationLink ?? false"
                >
                </x-shop::shimmer.products.carousel>
            </div>

            <!-- Section new place made just for you -->
            <div v-else class="bg-[#CC035C] max-668:bg-[unset]">
                <div class="container py-[60px] max-lg:px-[32px] max-668:relative max-668:py-[10px]">

                    <h1 class="mb-[30px] text-[40px] font-bold text-white max-lg:max-w-[70%] max-lg:text-[20px] max-668:text-black">
                        @lang('enclaves::app.shop.components.products.our')

                            <span class="text-[#F39C12]">@lang('enclaves::app.shop.components.products.hopeful-place')</span>

                        @lang('enclaves::app.shop.components.products.made-just')
                    </h1>
                    
                    <div class="relative top-[130px] z-10 -m-8 flex justify-between max-md:!top-[75px]" v-if="products.length">
                        <span 
                            class="icon-arrow-left inline-block cursor-pointer border-2 border-[#E9E9E9] bg-white p-[15px] text-[20px] text-[#111111] max-lg:p-[8px]"
                            @click="swipeLeft"
                        >
                        </span>

                        <span 
                            class="icon-arrow-right inline-block cursor-pointer border-2 border-[#E9E9E9] bg-white p-[15px] text-[20px] text-[#111111] max-lg:p-[8px]"
                            @click="swipeRight"
                            >
                        </span>
                    </div>

                    <div
                        ref="swiperContainer"
                        class="scrollbar-hide mt-[22px] flex overflow-auto scroll-smooth max-lg:mt-[20px] max-lg:gap-4 lg:gap-4"
                    >
                        <x-shop::products.card v-for="product in products"/>
                    </div>

                    <div class="mt-[30px] flex justify-end max-668:absolute max-668:-top-[15px] max-668:right-[10px]">
                        <a href="{{ route('enclaves.products.index') }}" class="text-[25px] font-bold text-white underline max-lg:text-[14px] max-668:text-[#CC035C] lg:hidden">
                            @lang('enclaves::app.shop.components.products.all-products')
                        </a>

                        <a href="{{ route('enclaves.products.index') }}" class="text-[25px] font-bold text-white underline max-lg:hidden max-lg:text-[14px] max-668:text-[#CC035C]">
                            @lang('enclaves::app.shop.components.products.view-all')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-products-carousel', {
            template: '#v-products-carousel-template',

            props: [
                'src',
                'title',
                'navigationLink',
            ],

            data() {
                return {
                    isLoading: true,

                    products: [],

                    offset: 323,
                };
            },

            mounted() {
                this.getProducts();
            },

            methods: {
                getProducts() {
                    this.$axios.get(this.src)
                        .then(response => {
                            this.isLoading = false;

                            this.products = response.data.data;
                        }).catch(error => {
                            console.log(error);
                        });
                },

                swipeLeft() {
                    const container = this.$refs.swiperContainer;

                    container.scrollLeft -= this.offset;
                },

                swipeRight() {
                    const container = this.$refs.swiperContainer;

                    container.scrollLeft += this.offset;
                },
            },
        });
    </script>
@endPushOnce