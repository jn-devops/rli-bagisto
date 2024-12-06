<v-ask-to-joy-home
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-enclaves-shop::shimmer.ask-to-joy.home />
</v-ask-to-joy-home>

@pushOnce('scripts')
    <script type="text/x-template" id="v-ask-to-joy-home-template">
        <!-- Section new place made just for you -->
         <template v-if="isLoading">
                <x-enclaves-shop::shimmer.ask-to-joy.home />
        </template>

        <!-- Ask Joy -->
        <section
            v-else
            class="bg-[url(./../images/ask-joy-bg.png)] bg-cover bg-bottom bg-no-repeat py-32 max-md:py-20">
            <div class="container">
                <div class="flex items-center justify-center gap-7 rounded-[86px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-6 max-md:py-10 max-md:text-center">
                    <div class="">
                        <h2 class="max-w-[352px] text-3xl font-bold text-white max-sm:text-2xl">@lang('enclaves::app.shop.ask-to-joy.need-help')</h2>
                        <span
                            @click="$emitter.emit('open-ask-to-joy-modal')"
                            class="mt-9 inline-block rounded-full bg-white px-14 py-5 text-lg font-normal text-primary max-lg:mt-4 max-sm:text-base cursor-pointer">
                            @lang('enclaves::app.shop.ask-to-joy.ask-joy')
                        </span>
                    </div>
                    <img src="{{ bagisto_asset('images/ask-joy-img.png') }}" alt="" class="-mb-8 -mt-8 h-[466px] w-[466px] rounded-full max-lg:h-96 max-lg:w-96 max-md:hidden">
                </div>
            </div>
        </section>
        <!-- Ask Joy end -->
    </script>

    <script type="module">
        app.component('v-ask-to-joy-home', {
            template: '#v-ask-to-joy-home-template',

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
                            limit:3,
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
