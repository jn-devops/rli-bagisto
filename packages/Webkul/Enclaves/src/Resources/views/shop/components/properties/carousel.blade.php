<v-properties-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.properties.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.properties.carousel>
</v-properties-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-properties-carousel-template">
        <!-- Section new place made just for you -->
        <div>
            <div class="relative h-full w-full max-sm:hidden">
                <div class="absolute inset-0 h-[500px] bg-[url('../images/community-bg-left.svg')] bg-left bg-no-repeat"></div>
                
                <div class="absolute inset-0 h-[500px] bg-[url('../images/community-right.svg')] bg-right bg-no-repeat"></div>
            </div>

            <div class="container mb-[50px] max-lg:px-[30px] max-sm:mt-[30px]">
                <div class="flex justify-center gap-[20px] max-sm:items-center">
                    <h3 class="rli-title max-w-[1024px] max-sm:text-[25px] md:mt-[140px] lg:mt-[140px]" v-text="title"></h3>
                </div>

                <div 
                    class="relative z-10 flex justify-between max-lg:top-[100px] lg:top-[200px]" 
                    v-if="categories.length"
                >
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
                    class="scrollbar-hide mt-[22px] flex gap-5 overflow-auto max-sm:mt-[20px]"
                    >

                    <div class="max-w-[350px] max-lg:min-w-[120px] lg:min-w-[350px]" v-for="category in categories">
                        <x-shop::media.images.lazy
                            class="h-[310px] w-full rounded-3xl transition-all duration-300 group-hover:scale-105 max-lg:h-[128px]"
                            ::src="category.images.community_banner_path ?? category.images.banner_url"
                        ></x-shop::media.images.lazy>

                        <div class="grid content-start gap-2.5">
                            <p
                                class="font-popins text-[20px] font-bold max-sm:text-[14px]" 
                                v-text="category.name"
                            ></p>

                            <button
                                @click="redirectCategory(category)"
                                class="text-nowrap rounded-[20px] border-[2px] border-[#CC035C] bg-white p-[10px] font-semibold text-[#CC035C]"
                                :style="{color: category.btn_color, borderColor: category.btn_border_color, background: category.btn_background_color, width:'fit-content'}"
                            >
                                <span v-if="category.btn_text" v-text="category.btn_text"></span>

                                <span v-else>@lang('enclaves::app.shop.customers.browse-properties')</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Card Listing -->
        <template v-if="isLoading">
            <x-shop::shimmer.properties.carousel
                :navigation-link="$navigationLink ?? false"
            >
            </x-shop::shimmer.properties.carousel>
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