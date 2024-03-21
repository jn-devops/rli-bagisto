<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('enclaves::app.shop.customers.account.help-seminar.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="documents"></x-shop::breadcrumbs>
    @endsection

    <div class="flex justify-between">
        <h2 class="font-poppins text-[1.813rem] font-semibold leading-[1.975rem] text-black">
            @lang('enclaves::app.shop.customers.account.help-seminar.title')
        </h2>
    </div>

    <v-seminar></v-seminar>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-seminar-template">
            <!-- documents Information -->
            <div class="gap-[32px] flex-wrap mt-[50px] max-1280:grid-cols-1 max-sm:mt-[60px]">
                {!! view_render_event('bagisto.shop.customers.account.document.before') !!}

                <x-shop::tabs.tab>
                    <x-shop::tabs.item
                        title="Notifications"
                        isSelected="true"
                        class="font-poppins font-regular text-2xl text-black lg:text-[1.815rem] lg:leading-9 max-sm:text-[20px]"
                        >
                        <section class="grid w-full font-montserrat gap-y-[0.813rem] max-md:mt-[30px]">
                            <section aria-label="notification list section" class="flex flex-col max-w-6xl gap-y-7 py-9">
                                <article aria-label="notification data"
                                    class="rounded-[0.625rem] p-6 md:px-8 md:py-10 shadow-[0px_7px_11px] shadow-black/10">
                                    <hgroup class="flex flex-col gap-y-2.5">
                                        <h4 class="text-xl font-bold leading-5 "> Headline </h4>

                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                            June 24, 2024
                                        </time>

                                        <x-shop::layouts.read-more-smooth 
                                            text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                            limit="400"
                                            class="pt-5 text-base font-normal leading-5 text-black"
                                        >
                                        </x-shop::layouts.read-more-smooth>
                                    </hgroup>
                                </article>

                                <article aria-label="notification data"
                                    class="rounded-[0.625rem] p-6 md:px-8 md:py-10 shadow-[0px_7px_11px] shadow-black/10">
                                    <hgroup class="flex flex-col gap-y-2.5">
                                        <h4 class="text-xl font-bold leading-5 "> Headline </h4>
                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                            June 24,  2024
                                        </time>

                                        <x-shop::layouts.read-more-smooth 
                                            text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                            limit="400"
                                            class="pt-5 text-base font-normal leading-5 text-black"
                                        >
                                        </x-shop::layouts.read-more-smooth>
                                    </hgroup>
                                </article>

                                <article aria-label="notification data"
                                    class="rounded-[0.625rem] p-6 md:px-8 md:py-10 shadow-[0px_7px_11px] shadow-black/10">
                                    <hgroup class="flex flex-col gap-y-2.5">
                                        <h4 class="text-xl font-bold leading-5 "> Headline </h4>

                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                            June 24, 2024
                                        </time>

                                        <x-shop::layouts.read-more-smooth 
                                                text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                                limit="400"
                                                class="pt-5 text-base font-normal leading-5 text-black"
                                            >
                                        </x-shop::layouts.read-more-smooth>
                                    </hgroup>
                                </article>
                            </section>
                        </section>
                    </x-shop::tabs.item>

                    <x-shop::tabs.item
                        title="Promotions"
                        class="font-poppins text-2xl font-semibold text-black lg:text-[1.815rem] lg:leading-9 max-sm:text-[20px]"
                        >
                        <div aria-label="new and article" class="divide-y divide-[rgba(218,_218,_218)]">
                            <section aria-label="news and update section" class="flex flex-col max-w-6xl py-4 gap-y-7 md:py-9">
                                <h3 class="pb-3 text-xl font-bold font-montserrat lg:pb-7 md:text-3xl">Top News & Updates </h3>

                                <article aria-label="Jubilation Enclave North article" class="pb-10">
                                    <figure 
                                        aria-label="Jubilation Enclave North details"
                                        class="gap-[1.875rem] grid lg:flex"
                                    >
                                        <img 
                                            alt="Jubilation Enclave North" 
                                            src="{{ bagisto_asset('images/hero-6.png') }}"
                                            class="min-h-[26rem] h-full max-w-full md:max-w-md xl:max-w-xl rounded-[0.625rem] group-hover:scale-95 object-cover duration-300 aspect-video w-full" 
                                        />

                                        <figcaption class="grid content-between min-h-full font-poppins">

                                            <hgroup class="flex flex-col h-full gap-y-3 lg:gap-y-7">
                                                <h4 class="text-xl font-semibold leading-5 "> 
                                                    Jubilation Enclave North
                                                </h4>

                                                <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                                    July 14, 2023
                                                </time>

                                                <x-shop::layouts.read-more-smooth 
                                                        text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                                        limit="400"
                                                        class="line-clamp-[9] text-lg font-normal leading-6 text-black"
                                                    >
                                                </x-shop::layouts.read-more-smooth>
                                            </hgroup>
                                        </figcaption>
                                    </figure>
                                </article>

                                <article 
                                    aria-label="Penthouse article" 
                                    class="pb-10"
                                    >
                                    <figure 
                                        aria-label="Penthouse details" 
                                        class="gap-[1.875rem] grid lg:flex"
                                    >
                                        <img 
                                            alt="Penthouse image" 
                                            src="{{ bagisto_asset('images/hero-6.png') }}"
                                            class="min-h-[26rem] h-full max-w-full md:max-w-md xl:max-w-xl rounded-[0.625rem] group-hover:scale-95 object-cover duration-300 aspect-video w-full" 
                                        />

                                        <figcaption class="grid content-between min-h-full font-poppins">

                                            <hgroup class="flex flex-col h-full gap-y-3 lg:gap-y-7">

                                                <h4 class="text-xl font-semibold leading-5 ">
                                                    Penthouse 
                                                </h4>

                                                <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                                    July 14, 2023
                                                </time>

                                                <x-shop::layouts.read-more-smooth 
                                                        text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                                        limit="400"
                                                        class="line-clamp-[9] text-lg font-normal leading-6 text-black"
                                                    >
                                                </x-shop::layouts.read-more-smooth>
                                            </hgroup>
                                        </figcaption>
                                    </figure>
                                </article>
                            </section>

                            <section aria-label="facebook article section" class="flex flex-col max-w-6xl gap-y-7 py-7">
                                <article class="flex flex-col md:flex-row md:items-start md:justify-between">
                                    <hgroup class="flex flex-col gap-2 pb-7">
                                        <h3 class="text-xl font-bold font-montserrat md:text-3xl">
                                            Check our latests news in Facebook
                                        </h3>

                                        <h5 class="text-base font-normal leading-4 text-[rgba(160,_160,_160)] font-poppins">
                                            15 posts
                                        </h5>
                                    </hgroup>

                                    <button 
                                        aria-label="follow button"
                                        class="font-montserrat font-medium text-xl text-white border-0 bg-[#039BE5] py-2.5 px-5 rounded-[0.625rem]">
                                        Follow us
                                    </button>
                                </article>

                                <article aria-label="ElanvitalPH article" class="pb-10">
                                    <figure aria-label="" class="gap-[1.875rem] grid lg:flex">

                                        <img 
                                            src="{{ bagisto_asset('images/hero-7.png') }}" 
                                            alt="ElanvitalPH image"
                                            class="min-h-[26rem] h-full max-w-full md:max-w-md xl:max-w-xl rounded-[0.625rem] group-hover:scale-95 object-cover duration-300 aspect-video w-full" 
                                        />

                                        <figcaption class="grid content-between min-h-full font-poppins">
                                            <hgroup class="flex flex-col h-full gap-y-3 lg:gap-y-7">
                                                <div class="flex items-start justify-between gap-4">
                                                    <div class="flex flex-col h-full gap-y-3 lg:gap-y-7">
                                                        <h4 class="text-xl font-semibold leading-5 "> ElanvitalPH </h4>

                                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                                            July 14, 2023
                                                        </time>
                                                    </div>

                                                    <div class="flex items-end justify-center rounded-full min-w-[40px] min-h-[40px] group bg-[#039BE5]">
                                                        <img 
                                                            alt="facebook"
                                                            src="{{ bagisto_asset('images/fb.png') }}"
                                                            class="rounded-[0.625rem] group-hover:scale-125 object-cover duration-300"
                                                        />
                                                    </div>
                                                </div>

                                                <x-shop::layouts.read-more-smooth 
                                                        text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                                        limit="400"
                                                        class="line-clamp-[9] text-lg font-normal leading-6 text-black"
                                                    >
                                                </x-shop::layouts.read-more-smooth>
                                            </hgroup>
                                        </figcaption>
                                    </figure>
                                </article>

                                <article aria-label="ElanvitalPH article" class="pb-10">
                                    <figure aria-label="" class="gap-[1.875rem] grid lg:flex">

                                        <img 
                                            src="{{ bagisto_asset('images/hero-8.png') }}" 
                                            alt="ElanvitalPH image"
                                            class="min-h-[26rem] h-full max-w-full md:max-w-md xl:max-w-xl rounded-[0.625rem] group-hover:scale-95 object-cover duration-300 aspect-video w-full" 
                                        />

                                        <figcaption class="grid content-between min-h-full font-poppins">
                                            <hgroup class="flex flex-col h-full gap-y-3 lg:gap-y-7">
                                                <div class="flex items-start justify-between gap-4">
                                                    <div class="flex flex-col h-full gap-y-3 lg:gap-y-7">
                                                        <h4 class="text-xl font-semibold leading-5 "> ElanvitalPH </h4>

                                                        <time class="text-base font-normal leading-5 text-[rgba(184,_184,_184)]">
                                                            July 14, 2023
                                                        </time>
                                                    </div>

                                                    <div class="flex items-end justify-center rounded-full min-w-[40px] min-h-[40px] group bg-[#039BE5]">
                                                        <img 
                                                            alt="facebook"
                                                            src="{{ bagisto_asset('images/fb.png') }}"
                                                            class="rounded-[0.625rem] group-hover:scale-125 object-cover duration-300"
                                                        />
                                                    </div>
                                                </div>

                                                <x-shop::layouts.read-more-smooth 
                                                        text="#Biñan #Laguna #ElanvitalPH Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                                        limit="400"
                                                        class="line-clamp-[9] text-lg font-normal leading-6 text-black"
                                                    >
                                                </x-shop::layouts.read-more-smooth>
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
            app.component('v-seminar', {
                template: '#v-seminar-template',

                data() {
                    return {
                    }
                },

                methods: {
                    
                }
            })
        </script>

    @endPushOnce
    
</x-shop::layouts.account>