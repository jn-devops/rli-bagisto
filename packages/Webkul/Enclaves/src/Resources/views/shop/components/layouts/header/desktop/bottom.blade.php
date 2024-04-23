<div class="flex min-h-[78px] w-full justify-between border border-b-[1px] border-l-0 border-r-0 border-t-0 px-[60px] max-1180:px-[30px]">
    <!--
        This section will provide categories for the first, second, and third levels. If
        additional levels are required, users can customize them according to their needs.
    -->
    <!-- Left Nagivation Section -->
    <div class="flex items-center gap-x-[40px] pt-[28px] max-[1180px]:gap-x-[20px]">
        <a
            href="{{ route('shop.home.index') }}"
            class="rli-logo rli-main-sprite -mt-[21px] inline-block max-h-[62px] max-w-[276px] place-self-start bg-[position:-5px_-3px] max-1366:-mt-[14px]"
            aria-label="Bagisto "
        >
            <img
                src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                width="131"
                height="29"
                alt="Bagisto"
            >
        </a>

        <v-desktop-category>
            <div class="flex items-center gap-[20px] pb-[21px]">
                <span class="shimmer h-[24px] w-[80px] rounded-[4px]"></span>
                <span class="shimmer h-[24px] w-[80px] rounded-[4px]"></span>
                <span class="shimmer h-[24px] w-[80px] rounded-[4px]"></span>
            </div>
        </v-desktop-category>
    </div>

    <!-- Right Nagivation Section -->
    <div class="flex items-center gap-x-[35px] max-[1100px]:gap-x-[25px] max-lg:gap-x-[30px]">
        <!-- Search Bar Container -->
        <form
            action="{{ route('shop.search.index') }}"
            class="flex max-w-[445px] items-center"
        >
            <label
                for="organic-search"
                class="sr-only"
            >
                @lang('shop::app.components.layouts.header.search')
            </label>

            <div class="relative w-full">
                <div class="icon-search pointer-events-none absolute top-[10px] flex items-center text-[22px] ltr:left-[12px] rtl:right-[12px]"></div>

                <input
                    type="text"
                    name="query"
                    value="{{ request('query') }}"
                    class="block w-full rounded-[100px] bg-[#EDEFF5] px-11 py-3.5 text-xs font-medium text-gray-900"
                    placeholder="@lang('shop::app.components.layouts.header.search-text')"
                    required
                >

                @if (core()->getConfigData('general.content.shop.image_search'))
                    @include('shop::search.images.index')
                @endif
            </div>
        </form>

        <!-- Right Navigation Links -->
        <div class="mt-[5px] flex gap-x-[35px] max-[1100px]:gap-x-[25px] max-lg:gap-x-[30px]">
            <!-- Compare -->
            @if (core()->getConfigData('general.content.shop.compare_option'))
                <a
                    href="{{ route('shop.compare.index') }}"
                    aria-label="Compare"
                >
                    <span class="icon-compare inline-block cursor-pointer text-[24px]"></span>
                </a>
            @endif

            <!-- Mini cart -->
            @include('shop::checkout.cart.mini-cart')

            <!-- user profile -->
            <x-shop::dropdown position="bottom-{{ core()->getCurrentLocale()->direction === 'ltr' ? 'right' : 'left' }}">
                <x-slot:toggle>
                    <span class="icon-users inline-block cursor-pointer text-[24px]"></span>
                </x-slot:toggle>

                <!-- Guest Dropdown -->
                @guest('customer')
                    <x-slot:content>
                        <div class="grid gap-[10px]">
                            <p class="text-[24px] font-bold">
                                @lang('shop::app.components.layouts.header.welcome-guest')
                            </p>

                            <p class="text-[16px]">
                                @lang('enclaves::app.shop.components.layouts.header.manage-property')
                            </p>
                        </div>

                        <p class="py-2px mt-[12px] w-full border border-[#E9E9E9]"></p>

                        <div class="flex justify-items-end gap-[16px]">
                            <a
                                href="{{ route('shop.customer.session.create') }}"
                                class="mx-auto ml-[0px] mt-[30px] block w-full rounded-[18px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[43px] py-[16px] text-center text-[16px] font-medium text-white"
                            >
                                @lang('enclaves::app.shop.components.layouts.header.login')
                            </a>
                        </div>
                    </x-slot:content>
                @endguest

                <!-- Customers Dropdown -->
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

                            @if (core()->getConfigData('general.content.shop.wishlist_option'))
                                <a
                                    class="cursor-pointer px-5 py-2 text-[16px] hover:bg-gray-100"
                                    href="{{ route('shop.customers.account.wishlist.index') }}"
                                >
                                    @lang('shop::app.components.layouts.header.wishlist')
                                </a>
                            @endif

                            <!--Customers logout-->
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

@pushOnce('scripts')
    <script type="text/x-template" id="v-desktop-category-template">
        <div
            class="flex items-center gap-[20px] pb-[21px]"
            v-if="isLoading"
        >
            <span class="shimmer h-[24px] w-[80px] rounded-[4px]"></span>
            <span class="shimmer h-[24px] w-[80px] rounded-[4px]"></span>
            <span class="shimmer h-[24px] w-[80px] rounded-[4px]"></span>
        </div>

        <div
            class="flex items-center"
            v-else
        >
            <div
                class="group relative border-b-[4px] border-transparent hover:border-b-[4px] hover:border-navyBlue"
                v-for="category in categories"
            >
                <span>
                    <a
                        :href="category.url"
                        class="inline-block px-[20px] pb-[21px] uppercase"
                        v-text="category.name"
                    >
                    </a>
                </span>

                <div
                    class="pointer-events-none absolute top-[49px] z-[1] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto overflow-x-auto border border-b-0 border-l-0 border-r-0 border-t-[1px] border-[#F3F3F3] bg-white p-[35px] opacity-0 shadow-[0_6px_6px_1px_rgba(0,0,0,.3)] transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-[35px] rtl:-right-[35px]"
                    v-if="category.children.length"
                >
                    <div class="aigns flex justify-between gap-x-[70px]">
                        <div
                            class="grid w-full min-w-max max-w-[150px] flex-auto grid-cols-[1fr] content-start gap-[20px]"
                            v-for="pairCategoryChildren in pairCategoryChildren(category)"
                        >
                            <template v-for="secondLevelCategory in pairCategoryChildren">
                                <p class="font-medium text-navyBlue">
                                    <a
                                        :href="secondLevelCategory.url"
                                        v-text="secondLevelCategory.name"
                                    >
                                    </a>
                                </p>

                                <ul
                                    class="grid grid-cols-[1fr] gap-[12px]"
                                    v-if="secondLevelCategory.children.length"
                                >
                                    <li
                                        class="text-[14px] font-medium text-[#6E6E6E]"
                                        v-for="thirdLevelCategory in secondLevelCategory.children"
                                    >
                                        <a
                                            :href="thirdLevelCategory.url"
                                            v-text="thirdLevelCategory.name"
                                        >
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-desktop-category', {
            template: '#v-desktop-category-template',

            data() {
                return  {
                    isLoading: true,

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
                            this.isLoading = false;

                            this.categories = response.data.data;
                        }).catch(error => {
                            console.log(error);
                        });
                },

                pairCategoryChildren(category) {
                    return category.children.reduce((result, value, index, array) => {
                        if (index % 2 === 0) {
                            result.push(array.slice(index, index + 2));
                        }

                        return result;
                    }, []);
                }
            },
        });
    </script>
@endPushOnce
