<v-blogs-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}" 
>

<div class="container mt-[120px] max-lg:px-[30px] max-sm:mt-[30px]">
    <div class="shimmer mt-[50px] h-[40px] w-[50%]"></div>

    <x-blog::shimmer.blogs.item count="4" />
</div>

</v-blogs-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blogs-carousel-template">
        <!-- Section new place made just for you -->
        <div 
            class="container mt-32 bg-[url('../images/blog-bg.svg')] bg-right bg-no-repeat [background-size:40%] max-lg:px-[30px] max-sm:mt-[30px]"
            v-if="blogs.length > 0"
            >
            <div class="rli-title max-sm:text-6 mb-10 mt-6 max-w-[1024px]">
                <p class="text-[40px] font-bold max-lg:text-[20px]">
                    @lang('News & Updates')
                </p>
            </div>

            <div>
                <div 
                    class="relative top-[130px] z-10 -m-8 flex justify-between max-md:top-[80px]" 
                    v-if="blogs.length"
                    >
                    <span 
                        class="icon-arrow-left inline-block cursor-pointer border-2 border-[#E9E9E9] bg-white p-[15px] text-[20px] text-[#111111] max-sm:p-[8px]"
                        @click="swipeLeft"
                    >
                    </span>

                    <span 
                        class="icon-arrow-right inline-block cursor-pointer border-2 border-[#E9E9E9] bg-white p-[15px] text-[20px] text-[#111111] max-sm:p-[8px]"
                        @click="swipeRight"
                        >
                    </span>
                </div>

                <div
                    ref="swiperContainer"
                    class="scrollbar-hide flex gap-4 overflow-auto scroll-smooth"
                >
                    <x-blog::blogs.items.carousel-item v-for="blog in blogs" />
                </div>
            </div>
        </div>

        <!-- Product Card Listing -->
        <template v-if="isLoading">
            <div class="container mt-[150px] max-lg:px-[30px] max-sm:mt-[30px]">                
                <div class="shimmer mt-[50px] h-[40px] w-[50%]"></div>

                <x-blog::shimmer.blogs.item count="4" />
            </div>
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