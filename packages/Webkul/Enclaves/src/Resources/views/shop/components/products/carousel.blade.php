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
        <div class="container mt-[80px] max-lg:px-[30px] max-sm:mt-[30px]">
            <div class="relative top-[215px] z-10 flex justify-between" v-if="products.length">
                <span 
                    class="icon-arrow-left-stylish inline-block cursor-pointer border-2 border-[#E9E9E9] bg-white p-[25px] text-[24px] text-[#d30a5a] max-sm:p-[8px]"
                    @click="swipeLeft"
                >
                </span>

                <span 
                    class="icon-arrow-right-stylish inline-block cursor-pointer border-2 border-[#E9E9E9] bg-white p-[25px] text-[24px] text-[#d30a5a] max-sm:p-[8px]"
                    @click="swipeRight"
                    >
                </span>
            </div>

            <div
                ref="swiperContainer"
                class="scrollbar-hide mt-[22px] flex gap-10 overflow-auto max-sm:mt-[20px]"
            >
                <x-shop::products.card v-for="product in products"/>
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