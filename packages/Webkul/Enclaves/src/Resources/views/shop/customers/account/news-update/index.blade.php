<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('enclaves::app.shop.customers.account.help-seminar.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="news-updates"></x-shop::breadcrumbs>
    @endsection

    <div class="flex justify-between">
        <h2 class="font-poppins text-[1.813rem] font-semibold leading-[1.975rem] text-black">
            @lang('enclaves::app.shop.customers.account.news-updates.index.title')
        </h2>
    </div>

    <v-news-update></v-news-update>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-news-update-template">
            <!-- documents Information -->
            <div class="mt-[50px] flex-wrap gap-[32px] max-1280:grid-cols-1 max-sm:mt-[60px]">
                {!! view_render_event('bagisto.shop.customers.account.document.before') !!}

                <x-shop::tabs.tab>
                    <x-shop::tabs.item
                        title="Notifications"
                        class="font-regular font-poppins text-2xl text-black max-sm:text-[20px] lg:text-[1.815rem] lg:leading-9"
                        >
                        <section class="font-montserrat grid w-full gap-y-[0.813rem] max-md:mt-[30px]">
                            <section aria-label="notification list section" class="flex max-w-6xl flex-col gap-y-7 py-9">
                                <article aria-label="notification data"
                                    class="rounded-[0.625rem] p-6 shadow-[0px_7px_11px] shadow-black/10 md:px-8 md:py-10">
                                    <hgroup class="flex flex-col gap-y-2.5">
                                        <h4 class="text-xl font-bold leading-5"> Headline </h4>

                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                            June 24, 2024
                                        </time>

                                        <p class="pt-5 text-base font-normal leading-6">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </hgroup>
                                </article>

                                <article aria-label="notification data"
                                    class="rounded-[0.625rem] p-6 shadow-[0px_7px_11px] shadow-black/10 md:px-8 md:py-10">
                                    <hgroup class="flex flex-col gap-y-2.5">
                                        <h4 class="text-xl font-bold leading-5"> Headline </h4>
                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                            June 24,  2024
                                        </time>

                                        <p class="pt-5 text-base font-normal leading-6">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </hgroup>
                                </article>

                                <article aria-label="notification data"
                                    class="rounded-[0.625rem] p-6 shadow-[0px_7px_11px] shadow-black/10 md:px-8 md:py-10">
                                    <hgroup class="flex flex-col gap-y-2.5">
                                        <h4 class="text-xl font-bold leading-5"> Headline </h4>

                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                            June 24, 2024
                                        </time>

                                        <p class="pt-5 text-base font-normal leading-6">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </hgroup>
                                </article>
                            </section>
                        </section>
                    </x-shop::tabs.item>

                    <x-shop::tabs.item
                        title="Promotions"
                        isSelected="true"
                        class="font-poppins text-2xl font-semibold text-black max-sm:text-[20px] lg:text-[1.815rem] lg:leading-9"
                        >
                        <div
                            aria-label="new and article" 
                            class="divide-y divide-[rgba(218,_218,_218)]"
                            >

                            <section 
                                aria-label="news and update section" 
                                class="flex max-w-6xl flex-col gap-y-7 py-4 md:py-9"
                                >

                                <h3 class="font-montserrat pb-3 text-xl font-bold md:text-3xl lg:pb-7">
                                    @lang('enclaves::app.shop.customers.account.news-updates.index.promotions.top')
                                </h3>


                                <div class="" v-text="blogs"></div>
                                <article 
                                    aria-label="Jubilation Enclave North article" 
                                    class="pb-10"
                                    >
                                    <figure 
                                        aria-label="Jubilation Enclave North details"
                                        class="grid grid-cols-2 gap-4"
                                        >

                                        <img 
                                            alt="@lang('enclaves::app.shop.customers.account.news-updates.index.promotions.top')" 
                                            src="{{ bagisto_asset('images/hero-6.png') }}"
                                            class="aspect-video h-full min-h-[20rem] w-full max-w-full rounded-[0.625rem] object-cover duration-300 group-hover:scale-95 md:max-w-md xl:max-w-xl"
                                        />

                                        <figcaption class="grid content-between font-poppins">
                                            <hgroup class="flex flex-col gap-4">
                                                <h4 class="text-xl font-semibold leading-5"> 
                                                    Jubilation Enclave North
                                                </h4>

                                                <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                                    July 14, 2023
                                                </time>

                                                <p class="pt-5 text-base font-normal leading-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </p>
                                            </hgroup>
                                        </figcaption>
                                    </figure>
                                </article>
                            </section>

                            <section aria-label="facebook article section" class="flex max-w-6xl flex-col gap-y-7 py-7">
                                <article class="flex flex-col md:flex-row md:items-start md:justify-between">
                                    <hgroup class="flex flex-col gap-2 pb-7">
                                        <h3 class="font-montserrat text-xl font-bold md:text-3xl">
                                            Check our latests news in Facebook
                                        </h3>

                                        <h5 class="font-poppins text-base font-normal leading-4 text-[rgba(160,_160,_160)]">
                                            15 posts
                                        </h5>
                                    </hgroup>

                                    <button 
                                        aria-label="follow button"
                                        class="font-montserrat rounded-[0.625rem] border-0 bg-[#039BE5] px-5 py-2.5 text-xl font-medium text-white">
                                        Follow us
                                    </button>
                                </article>

                                <article aria-label="ElanvitalPH article" class="pb-10">
                                    <figure aria-label="" class="grid grid-cols-2 gap-4">

                                        <img 
                                            src="{{ bagisto_asset('images/hero-7.png') }}" 
                                            alt="ElanvitalPH image"
                                            class="aspect-video h-full min-h-[20rem] w-full max-w-full rounded-[0.625rem] object-cover duration-300 group-hover:scale-95 md:max-w-md xl:max-w-xl" 
                                        />

                                        <figcaption class="grid min-h-full content-between font-poppins">
                                            <hgroup class="flex h-full flex-col gap-y-3 lg:gap-y-7">
                                                <div class="flex items-start justify-between gap-4">
                                                    <div class="flex h-full flex-col gap-y-3 lg:gap-y-7">
                                                        <h4 class="text-xl font-semibold leading-5"> ElanvitalPH </h4>

                                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                                            July 14, 2023
                                                        </time>
                                                    </div>

                                                    <div class="group flex min-h-[40px] min-w-[40px] items-end justify-center rounded-full bg-[#039BE5]">
                                                        <img 
                                                            alt="facebook"
                                                            src="{{ bagisto_asset('images/fb.png') }}"
                                                            class="rounded-[0.625rem] object-cover duration-300 group-hover:scale-125"
                                                        />
                                                    </div>
                                                </div>

                                                <p class="pt-5 text-base font-normal leading-6">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </p>
                                            </hgroup>
                                        </figcaption>
                                    </figure>
                                </article>
                            </section>
                        </div>
                    </x-shop::tabs.item>
                </x-shop::tabs.tab>

                {!! view_render_event('bagisto.shop.customers.account.document.after') !!}
            </div>
        </script>

        <script type="module">
            app.component('v-news-update', {
                template: '#v-news-update-template',

                data() {
                    return {
                        isLoading: true,
                        count: 0,
                        blogs: {},
                    }
                },

                mounted () {
                    this.get();
                },

                methods: {
                    get() {
                        this.$axios.get("{{ route('enclaves.customers.account.news-updates.index') }}")
                            .then(response => {
                                this.blogs = response;
                                this.isLoading = false;
                            })
                            .catch(error => {});
                    }
                }
            })
        </script>

    @endPushOnce
    
</x-shop::layouts.account>