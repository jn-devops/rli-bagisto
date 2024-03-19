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
        <div class="container max-lg:px-[30px] max-sm:mt-[30px]">
            <div class="flex justify-end items-center gap-8 mt-[16px]" v-if="products.length">
                <div class="inline-flex gap-7">
                    <span 
                        class="icon-arrow-left-stylish text-[24px] text-[#d30a5a] inline-block cursor-pointer border-2 border-[#E9E9E9] p-[25px] max-sm:p-[8px]"
                        @click="swipeLeft"
                    >
                    </span>

                    <span 
                        class="icon-arrow-right-stylish text-[24px] text-[#d30a5a] inline-block cursor-pointer border-2 border-[#E9E9E9] p-[25px] max-sm:p-[8px]"
                        @click="swipeRight"
                        >
                    </span>
                </div>
            </div>

            <div
                ref="swiperContainer"
                class="flex gap-14 mt-[22px] overflow-auto scrollbar-hide max-sm:mt-[20px]"
            >
                <x-shop::products.card v-for="product in products"/>
            </div>
        </div>

        <!-- Product Card Listing -->
        <template v-if="isLoading">
            <x-shop::shimmer.products.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.products.carousel>
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