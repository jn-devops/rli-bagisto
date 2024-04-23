{{--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
--}}
@php
    $showCompare = (bool) core()->getConfigData('general.content.shop.compare_option');

    $showWishlist = (bool) core()->getConfigData('general.content.shop.wishlist_option');
@endphp

<div class="hidden flex-wrap gap-[15px] px-[15px] pt-[25px] max-lg:mb-[15px] max-lg:flex">
    <div class="flex w-full items-center justify-between">
        {{-- Left Navigation --}}
        <div class="flex items-center gap-x-[5px]">
            <x-shop::drawer
                position="left"
                width="80%"
            >
                <x-slot:toggle>
                    <span class="icon-hamburger cursor-pointer text-[24px]"></span>
                </x-slot:toggle>

                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('shop.home.index') }}">
                            <img
                                src="{{ bagisto_asset('images/logo.svg') }}"
                                alt="Bagisto"
                                width="131"
                                height="29"
                            >
                        </a>
                    </div>
                </x-slot:header>

                <x-slot:content>
                    {{-- Account Profile Hero Section --}}
                    <div class="mb-[15px] grid grid-cols-[auto_1fr] items-center gap-[15px] rounded-[12px] border border-[#E9E9E9] p-[10px]">
                        <div class="">
                            <img
                                src="{{ auth()->user()?->image_url ??  bagisto_asset('images/user-placeholder.png') }}"
                                class="h-[60px] w-[60px] rounded-full"
                            >
                        </div>

                        @guest('customer')
                            <a
                                href="{{ route('shop.customer.session.create') }}"
                                class="flex text-[16px] font-medium"
                            >
                                @lang('Sign up or Login')

                                <i class="icon-double-arrow ml-[10px] text-[24px]"></i>
                            </a>
                        @endguest

                        @auth('customer')
                            <div class="flex flex-col justify-between gap-[10px]">
                                <p class="font-mediums text-[25px]">Hello! {{ auth()->user()?->first_name }}</p>

                                <p class="text-[#6E6E6E]">{{ auth()->user()?->email }}</p>
                            </div>
                        @endauth
                    </div>

                    {{-- Mobile category view --}}
                    <v-mobile-category></v-mobile-category>

                </x-slot:content>

                <x-slot:footer></x-slot:footer>
            </x-shop::drawer>

            <a
                href="{{ route('shop.home.index') }}"
                class="max-h-[30px]"
                aria-label="Bagisto"
            >
                <img
                    src="{{ bagisto_asset('images/logo.svg') }}"
                    alt="Bagisto"
                    width="131"
                    height="29"
                >
            </a>
        </div>

        {{-- Right Navigation --}}
        <div>
            <div class="flex items-center gap-x-[20px]">
                @if ($showCompare)
                    <a
                        href="{{ route('shop.compare.index') }}"
                        aria-label="Compare "
                    >
                        <span class="icon-compare cursor-pointer text-[24px]"></span>
                    </a>
                @endif

                <!-- @include('shop::checkout.cart.mini-cart') -->

                <x-shop::dropdown position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left' }}">
                    <x-slot:toggle>
                        <span class="icon-users cursor-pointer text-[24px]"></span>
                    </x-slot:toggle>

                    {{-- Guest Dropdown --}}
                    @guest('customer')
                        <x-slot:content>
                            <div class="grid gap-[10px]">
                                <p class="font-dmserif text-[20px]">
                                    @lang('shop::app.components.layouts.header.welcome-guest')
                                </p>

                                <p class="text-[14px]">
                                    @lang('shop::app.components.layouts.header.dropdown-text')
                                </p>
                            </div>

                            <p class="py-2px mt-[12px] w-full border border-[#E9E9E9]"></p>

                            <div class="mt-[25px] flex gap-[16px]">
                                <a
                                    href="{{ route('shop.customer.session.create') }}"
                                    class="m-0 mx-auto ml-[0px] block w-max cursor-pointer rounded-[18px] bg-navyBlue px-[29px] py-[15px] text-center text-base font-medium text-white"
                                >
                                    @lang('shop::app.components.layouts.header.sign-in')
                                </a>
                            </div>
                        </x-slot:content>
                    @endguest

                    {{-- Customers Dropdown --}}
                    @auth('customer')
                        <x-slot:content class="!p-[0px]">
                            <div class="grid gap-[10px] p-[20px] pb-0">
                                <p class="font-dmserif text-[20px]">
                                    @lang('shop::app.components.layouts.header.welcome')’
                                    {{ auth()->guard('customer')->user()->first_name }}
                                </p>

                                <p class="text-[14px]">
                                    @lang('shop::app.components.layouts.header.dropdown-text')
                                </p>
                            </div>

                            <p class="py-2px mt-[12px] w-full border border-[#E9E9E9]"></p>

                            <div class="mt-[10px] grid gap-[4px] pb-[10px]">
                                <a
                                    class="cursor-pointer px-5 py-2 text-[16px] hover:bg-gray-100"
                                    href="{{ route('shop.customers.account.profile.index') }}"
                                >
                                    @lang('shop::app.components.layouts.header.profile')
                                </a>

                                <a
                                    class="cursor-pointer px-5 py-2 text-[16px] hover:bg-gray-100"
                                    href="{{ route('shop.customers.account.transactions.index') }}"
                                >
                                    @lang('enclaves::app.shop.layouts.transactions')
                                </a>

                                @if ($showWishlist)
                                    <a
                                        class="cursor-pointer px-5 py-2 text-[16px] hover:bg-gray-100"
                                        href="{{ route('shop.customers.account.wishlist.index') }}"
                                    >
                                        @lang('shop::app.components.layouts.header.wishlist')
                                    </a>
                                @endif

                                {{--Customers logout--}}
                                @auth('customer')
                                    <x-shop::form
                                        method="DELETE"
                                        action="{{ route('shop.customer.session.destroy') }}"
                                        id="customerLogout"
                                    >
                                    </x-shop::form>

                                    <a
                                        class="cursor-pointer px-5 py-2 text-[16px] hover:bg-gray-100"
                                        href="{{ route('shop.customer.session.destroy') }}"
                                        onclick="event.preventDefault(); document.getElementById('customerLogout').submit();"
                                    >
                                        @lang('shop::app.components.layouts.header.logout')
                                    </a>
                                @endauth
                            </div>
                        </x-slot:content>
                    @endauth
                </x-shop::dropdown>
            </div>
        </div>
    </div>

    {{-- Serach Catalog Form --}}
    <form action="{{ route('shop.search.index') }}" class="flex w-full items-center">
        <label for="organic-search" class="sr-only">Search</label>

        <div class="relative w-full">
            <div
                class="icon-search pointer-events-none absolute left-[12px] top-[12px] flex items-center text-[25px]">
            </div>

            <input
                type="text"
                class="block w-full rounded-xl border border-['#E3E3E3'] px-11 py-3.5 text-xs font-medium text-gray-900"
                name="query"
                value="{{ request('query') }}"
                placeholder="@lang('shop::app.components.layouts.header.search-text')"
                required
            >

            <button
                type="button"
                class="icon-camera absolute right-[12px] top-[12px] flex items-center pr-3 text-[22px]"
                aria-label="Search"
            >
            </button>
        </div>
    </form>
</div>

@pushOnce('scripts')
    <script type="text/x-template" id="v-mobile-category-template">
        <div>
            <template v-for="(category) in categories">
                <div class="flex items-center justify-between border border-b-[1px] border-l-0 border-r-0 border-t-0 border-[#f3f3f5]">
                    <a
                        :href="category.url"
                        class="mt-[20px] flex items-center justify-between pb-[20px]"
                        v-text="category.name"
                    >
                    </a>

                    <span
                        class="cursor-pointer text-[24px]"
                        :class="{'icon-arrow-down': category.isOpen, 'icon-arrow-right': ! category.isOpen}"
                        @click="toggle(category)"
                    >
                    </span>
                </div>

                <div
                    class="grid gap-[8px]"
                    v-if="category.isOpen"
                >
                    <ul v-if="category.children.length">
                        <li v-for="secondLevelCategory in category.children">
                            <div class="ml-3 flex items-center justify-between border border-b-[1px] border-l-0 border-r-0 border-t-0 border-[#f3f3f5]">
                                <a
                                    :href="secondLevelCategory.url"
                                    class="mt-[20px] flex items-center justify-between pb-[20px]"
                                    v-text="secondLevelCategory.name"
                                >
                                </a>

                                <span
                                    class="cursor-pointer text-[24px]"
                                    :class="{
                                        'icon-arrow-down': secondLevelCategory.category_show,
                                        'icon-arrow-right': ! secondLevelCategory.category_show
                                    }"
                                    @click="secondLevelCategory.category_show = ! secondLevelCategory.category_show"
                                >
                                </span>
                            </div>

                            <div v-if="secondLevelCategory.category_show">
                                <ul v-if="secondLevelCategory.children.length">
                                    <li v-for="thirdLevelCategory in secondLevelCategory.children">
                                        <div class="ml-3 flex items-center justify-between border border-b-[1px] border-l-0 border-r-0 border-t-0 border-[#f3f3f5]">
                                            <a
                                                :href="thirdLevelCategory.url"
                                                class="ml-3 mt-[20px] flex items-center justify-between pb-[20px]"
                                                v-text="thirdLevelCategory.name"
                                            >
                                            </a>
                                        </div>
                                    </li>
                                </ul>

                                <span
                                    class="ml-2"
                                    v-else
                                >
                                    @lang('No category found.')
                                </span>
                            </div>
                        </li>
                    </ul>

                    <span
                        class="ml-2"
                        v-else
                    >
                        @lang('No category found.')
                    </span>
                </div>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-mobile-category', {
            template: '#v-mobile-category-template',

            data() {
                return  {
                    categories: [],
                }
            },

            mounted() {
                this.get();
            },

            methods: {
                get() {
                    this.$axios.get("{{ route('shop.api.categories.tree') }}")
                        .then(response => {
                            this.categories = response.data.data;
                        }).catch(error => {
                            console.log(error);
                        });
                },

                toggle(selectedCategory) {
                    this.categories = this.categories.map((category) => ({
                        ...category,
                        isOpen: category.id === selectedCategory.id ? ! category.isOpen : false,
                    }));
                },
            },
        });
    </script>
@endPushOnce
