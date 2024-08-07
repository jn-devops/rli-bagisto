<v-categories-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.categories.carousel
        :count="8"
        :navigation-link="$navigationLink ?? false"
    ></x-shop::shimmer.categories.carousel>
</v-categories-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-categories-carousel-template">
        <div class="container mt-[60px] max-lg:mt-[20px] max-lg:px-[30px]" v-if="! isLoading && categories?.length">
            <div class="relative">
                <div
                    ref="swiperContainer"
                    class="scrollbar-hide flex gap-10 overflow-auto scroll-smooth max-lg:gap-4"
                >
                    <div
                        class="grid min-w-[120px] max-w-[120px] grid-cols-1 justify-items-center gap-[15px] font-medium"
                        v-for="category in categories"
                    >
                        <a
                            :href="category.url_path"
                            class="h-[110px] w-[110px] rounded-full bg-[#F5F5F5]"
                            :aria-label="category.name"
                        >
                            <template v-if="category.images.logo_url">
                                <x-shop::media.images.lazy
                                    ::src="category.images.logo_url"
                                    width="110"
                                    height="110"
                                    class="h-[110px] w-[110px] rounded-full"
                                    ::alt="category.name"
                                ></x-shop::media.images.lazy>
                            </template>
                        </a>

                        <a
                            :href="category.url_path"
                            class=""
                        >
                            <p
                                class="text-center text-[18px] text-black max-lg:font-normal"
                                v-text="category.name"
                            >
                            </p>
                        </a>
                    </div>
                </div>

                <span
                    class="icon-arrow-left absolute -left-[41px] top-[37px] flex h-[50px] w-[50px] cursor-pointer items-center justify-center rounded-full border border-black bg-white text-[25px] transition hover:bg-black hover:text-white max-lg:-left-[29px]"
                    @click="swipeLeft"
                >
                </span>

                <span
                    class="icon-arrow-right absolute -right-[22px] top-[37px] flex h-[50px] w-[50px] cursor-pointer items-center justify-center rounded-full border border-black bg-white text-[25px] transition hover:bg-black hover:text-white max-lg:-right-[29px]"
                    @click="swipeRight"
                >
                </span>
            </div>
        </div>

        <!-- Category Carousel Shimmer -->
        <template v-if="isLoading">
            <x-shop::shimmer.categories.carousel
                :count="8"
                :navigation-link="$navigationLink ?? false"
            >
            </x-shop::shimmer.categories.carousel>
        </template>
    </script>

    <script type="module">
        app.component('v-categories-carousel', {
            template: '#v-categories-carousel-template',

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
                this.getCategories();
            },

            methods: {
                getCategories() {
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
            },
        });
    </script>
@endPushOnce
