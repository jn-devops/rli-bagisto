<v-products-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.products.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.products.carousel>
</v-products-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-products-carousel-template">
        <!-- Section new place made just for you -->
        <div class="container bg-[#CC035C] py-[60px] max-lg:px-[32px]">
            <h1 class="mb-[30px] text-[40px] font-bold text-white max-lg:text-[20px]">
                @lang('enclaves::app.shop.components.products.our')

                    <span class="text-[#F39C12]">@lang('enclaves::app.shop.components.products.hopeful-place')</span>

                @lang('enclaves::app.shop.components.products.made-just')
            </h1>
            
            <div class="relative z-10 -m-8 flex justify-between max-lg:top-[80px] lg:top-[160px]" v-if="products.length">
                <span 
                    class="icon-arrow-left-stylish inline-block cursor-pointer border-2 border-[#E9E9E9] bg-white p-[15px] text-[20px] text-[#d30a5a] max-sm:p-[8px]"
                    @click="swipeLeft"
                >
                </span>

                <span 
                    class="icon-arrow-right-stylish inline-block cursor-pointer border-2 border-[#E9E9E9] bg-white p-[15px] text-[20px] text-[#d30a5a] max-sm:p-[8px]"
                    @click="swipeRight"
                    >
                </span>
            </div>

            <div
                ref="swiperContainer"
                class="scrollbar-hide mt-[22px] flex overflow-auto max-lg:gap-4 max-sm:mt-[20px] lg:gap-4"
            >
                <x-shop::products.card v-for="product in products"/>
            </div>

            <div class="mt-[30px] flex justify-end">
                <a href="" class="font-bold text-white underline">
                    @lang('enclaves::app.shop.components.products.view-all')
                </a>
            </div>
        </div>

        <!-- Product Card Listing -->
        <template v-if="isLoading">
            <x-shop::shimmer.products.carousel 
                :navigation-link="$navigationLink ?? false"
            >
            </x-shop::shimmer.products.carousel>
        </template>
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