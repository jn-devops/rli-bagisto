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
        <div class="mt-[20px]">
            <div class="relative h-full w-full max-sm:hidden">
                <div class="absolute inset-0 h-[750px] bg-[url('../images/community-bg.png')] bg-left bg-no-repeat [background-size:85%]"></div>
            </div>

            <div class="container relative max-lg:px-[32px] lg:pt-[190px]">
                <div class="flex justify-center gap-[20px] pb-[25px] max-sm:items-center">
                    <h3 class="text-[40px] font-bold max-lg:text-[25px]" v-text="title"></h3>
                </div>

                <div 
                    class="relative z-10 -m-8 flex justify-between max-lg:top-[120px] lg:top-[130px]" 
                    v-if="categories.length"
                    >
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
                    class="scrollbar-hide flex gap-4 overflow-auto"
                    >

                    <div 
                        class="max-w-[280px] cursor-pointer max-lg:min-w-[122px] md:min-w-64 lg:min-w-[300px]" 
                        v-for="category in categories"
                    >
                        <x-shop::media.images.lazy
                            class="w-full rounded-3xl shadow-inner transition-all duration-300 group-hover:scale-105 max-lg:h-32 md:h-60 lg:h-64"
                            ::src="category.images.community_banner_path ?? category.images.banner_url"
                        ></x-shop::media.images.lazy>

                        <div class="grid content-start gap-2.5">
                            <p
                                class="font-popins overflow-hidden text-ellipsis whitespace-nowrap text-[20px] font-bold max-sm:text-[14px]" 
                                v-text="category.name"
                            ></p>

                            <button
                                @click="redirectCategory(category)"
                                class="rounded-[20px] border-[2px] border-[#CC035C] bg-white p-[5px] font-semibold text-[#CC035C] max-sm:text-[14px] lg:text-nowrap"
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