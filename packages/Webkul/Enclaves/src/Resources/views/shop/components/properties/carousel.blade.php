<v-properties-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.products.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.products.carousel>
</v-properties-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-properties-carousel-template">
        <!-- Section new place made just for you -->
        <div class="container mt-[80px] max-lg:px-[30px] max-sm:mt-[30px]">
           
            <div class="flex justify-between relative top-[215px] z-10" v-if="categories.length">
                <span 
                    class="icon-arrow-left-stylish text-[24px] text-[#d30a5a] inline-block cursor-pointer border-2 border-[#E9E9E9] p-[25px] max-sm:p-[8px] bg-white"
                    @click="swipeLeft"
                >
                </span>

                <span 
                    class="icon-arrow-right-stylish text-[24px] text-[#d30a5a] inline-block cursor-pointer border-2 border-[#E9E9E9] p-[25px] max-sm:p-[8px] bg-white"
                    @click="swipeRight"
                    >
                </span>
            </div>

            <div class="grid grid-cols-3 gap-8 mt-[30px]" v-if="isLoading">
                @for ($i = 0;  $i < 3; $i++)
                    <div class="grid gap-8 relative w-full max-sm:grid-cols-1">
                        <div class="relative rounded-sm">
                            <div class="shimmer rounded-[20px] bg-[#F5F5F5] w-full h-[290px]"></div>
                        </div>

                        <div class="grid gap-2.5 content-start">
                            <p class="shimmer w-[75%] h-[24px]"></p>
                            <p class="shimmer w-[55%] h-[50px]"></p>
                        </div>
                    </div>
                @endfor
            </div>

            <div
                ref="swiperContainer"
                class="flex gap-14 mt-[22px] overflow-auto scrollbar-hide max-sm:mt-[20px]"
            >
                <div class="grid gap-2.5 relative min-w-[350px] max-w-[350px]" v-for="category in categories">
                    <div class="relative overflow-hidden  group max-w-[350px] max-h-[289px] rounded-[20px]">
                
                        <x-shop::media.images.lazy
                            class="rounded bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300 w-full h-[290px]"
                            ::src="category.images.banner_url"
                        ></x-shop::media.images.lazy>
                    </div>

                    <div class="grid gap-2.5 content-start">
                        <p 
                            class="text-[20px] font-bold font-popins" 
                            v-text="category.name"
                        ></p>

                        <div class="grid grid-cols-2 items-center justify-between max-425:grid">
                            <button
                                @click="redirectCategory(category)"
                                class="p-3 rounded-[20px] text-[#CC035C] font-semibold border-[#CC035C] border-[3px] text-nowrap"
                            >
                                @lang('enclaves::app.shop.customers.browse-properties')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Card Listing -->
        <template v-if="isLoading">
            <x-shop::shimmer.products.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.products.carousel>
        </template>
    </script>

    <script type="module">
        app.component('v-properties-carousel', {
            template: '#v-properties-carousel-template',

            props: [
                'src',
                'title',
                'navigationLink',
            ],

            data() {
                return {
                    isLoading: true,

                    categories: [],

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

                            this.categories = response.data.data;
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

                redirectCategory(category) {
                    window.location.href = `{{ route('shop.product_or_category.index', '') }}/` + category.url_path;
                }
            },
        });
    </script>
@endPushOnce