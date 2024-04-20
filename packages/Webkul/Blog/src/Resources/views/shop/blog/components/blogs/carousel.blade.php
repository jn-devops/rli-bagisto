<v-blogs-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.products.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.products.carousel>
</v-blogs-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blogs-carousel-template">
        <!-- Section new place made just for you -->
        <div 
            class="container mt-[150px] bg-[url('../images/blog-bg.svg')] bg-right bg-no-repeat [background-size:51%] max-lg:px-[30px] max-sm:mt-[30px]"
            v-if="blogs.length > 0"
            >
        
            <div class="rli-title max-w-[1024px] p-[61px] max-sm:text-[25px]">
                <p class="text-[#CC035C]">@lang('Raemulan Lands Inc')</p>
                <p class="mt-[40px]">@lang('News & Updates')</p>
            </div>
            
            <div class="relative top-[215px] z-10 flex justify-between" v-if="blogs.length">
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
                class="scrollbar-hide mt-[22px] flex gap-14 overflow-auto max-sm:mt-[20px]"
            >
                <x-blog::blogs.carousel-item v-for="blog in blogs" />
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
        app.component('v-blogs-carousel', {
            template: '#v-blogs-carousel-template',

            props: [
                'src',
                'title',
                'navigationLink',
            ],

            data() {
                return {
                    isLoading: true,

                    blogs: [],

                    offset: 323,
                };
            },

            mounted() {
                this.getblogs();
            },

            methods: {
                getblogs() {
                    this.$axios.get(this.src)
                        .then(response => {
                            this.isLoading = false;

                            this.blogs = response.data.data;
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