<v-partners-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>

    <div class="container mt-[150px] max-lg:px-[30px] max-sm:mt-[30px]">
        <div class="shimmer mt-[50px] h-[40px] w-[160px] mx-auto"></div>

        <x-enclaves-shop::shimmer.partners.carousel count="4" />
    </div>

</v-partners-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-partners-carousel-template">
        <!-- Section new place made just for you -->
         <template v-if="isLoading">
            <div class="container max-lg:px-[30px] max-sm:mt-[30px]">
                <div class="shimmer mt-[50px] h-[40px] w-[290px] mx-auto"></div>

                <x-enclaves-shop::shimmer.partners.carousel count="3" />
            </div>
        </template>

        <!-- Partner with Us -->
        <section
            v-else
            class="bg-[url(./../images/partners-bg.png)] bg-contain bg-bottom bg-no-repeat py-14">
            <div class="container">
                <h2 class="text-center text-3xl font-bold text-dark max-sm:text-2xl">@lang('enclaves::app.shop.partners.title')</h2>

                <div class="mt-14 grid grid-cols-3 gap-4 max-lg:grid-cols-2 max-md:grid-cols-1">
                    <x-enclaves-shop::partners.items.carousel-item v-for="partner in partners" />
                </div>
            </div>
        </section>
    </script>

    <script type="module">
        app.component('v-partners-carousel', {
            template: '#v-partners-carousel-template',

            props: [
                'src',
                'title',
                'navigationLink',
            ],

            data() {
                return {
                    isLoading: false,

                    blogs: [],

                    partners: [1,2,3],

                    offset: 323,
                };
            },

            mounted() {
                {{-- this.getblogs(); --}}
            },

            methods: {
                getblogs() {
                    this.$axios.get(this.src, {
                        params:{
                            limit:3,
                        }
                    })
                        .then(response => {
                            this.blogs = response.data.data;
                            this.isLoading = false;
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
