<v-blogs-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>

<div class="container mt-[120px] max-lg:px-[30px] max-sm:mt-[30px]">
    <div class="shimmer mt-[50px] h-[40px] w-[50%]"></div>

    {{-- <x-blog::shimmer.blogs.item count="4" /> --}}
</div>

</v-blogs-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blogs-carousel-template">
        <!-- Section new place made just for you -->
        <template v-if="! isLoading">
            <div
                class="container mt-20 bg-[url('../images/blog-bg.svg')] bg-right bg-no-repeat [background-size:40%] max-lg:px-[30px] max-sm:mt-[30px]"
                v-if="blogs.length > 0"
                >
                <div class="rli-title max-sm:text-6 mb-10 mt-6 flex justify-between items-center">
                    <p class="text-[40px] font-bold max-lg:text-[20px]">
                        @lang('Announcements')
                    </p>
                    <a href="{{ route('shop.article.index')}} " class="text-[14px] font-bold max-lg:text-[20px]">
                        @lang('View All')
                    </a>
                </div>

                <div>
                    <div
                        ref="swiperContainer"
                        class="scrollbar-hide flex gap-4 overflow-auto scroll-smooth justify-between"
                    >
                        <x-blog::blogs.items.carousel-item v-for="blog in blogs" />
                    </div>
                </div>
            </div>
        </template>


        <!-- Product Card Listing -->
        <template v-else>
            <div class="container mb-10 mt-20 max-lg:px-[30px] max-sm:mt-[30px]">
                <div class="shimmer h-[40px] w-[50%]"></div>

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
                    this.$axios.get(this.src, {
                        params:{
                            limit:4,
                        }
                    })
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
