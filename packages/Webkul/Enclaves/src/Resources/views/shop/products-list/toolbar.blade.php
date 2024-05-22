{!! view_render_event('bagisto.shop.categories.view.toolbar.before') !!}

<v-toolbar @filter-applied='setFilters("toolbar", $event)'></v-toolbar>

{!! view_render_event('bagisto.shop.categories.view.toolbar.after') !!}

@inject('toolbar' , 'Webkul\Product\Helpers\Toolbar')

@pushOnce('scripts')
    <script type="text/x-template" id='v-toolbar-template'>
        <div>
            <!-- Desktop Toolbar -->
            <div class="flex justify-between max-md:hidden">
                <!-- Product Sorting Filters -->
                <x-shop::dropdown position="bottom-left">
                    <x-slot:toggle>
                        <!-- Dropdown Toggler -->
                        <button class="flex w-full max-w-[200px] cursor-pointer items-center justify-between gap-[15px] rounded-lg border border-[#E9E9E9] bg-white p-[14px] text-[16px] transition-all hover:border-gray-400 focus:border-gray-400 max-md:w-[110px] max-md:border-0 max-md:pl-[10px] max-md:pr-[10px]">
                            @{{ sortLabel ?? "@lang('shop::app.products.sort-by.title')" }}

                            <span class="icon-arrow-down text-[24px]"></span>
                        </button>
                    </x-slot:toggle>
                
                    <!-- Dropdown Content -->
                    <x-slot:menu>
                        <x-shop::dropdown.menu.item
                            v-for="(sort, key) in filters.available.sort"
                            ::class="{'bg-gray-100': sort.value == filters.applied.sort}"
                            @click="apply('sort', sort.value)"
                        >
                            @{{ sort.title }}
                        </x-shop::dropdown.menu.item>
                    </x-slot:menu>
                </x-shop::dropdown>

                <!-- Product Pagination Limit -->
                <div class="flex items-center gap-[40px]">
                    <!-- Product Pagination Limit -->
                    <x-shop::dropdown position="bottom-right">
                        <x-slot:toggle>
                            <!-- Dropdown Toggler -->
                            <button class="flex w-full max-w-[200px] cursor-pointer items-center justify-between gap-[15px] rounded-lg border border-[#E9E9E9] bg-white p-[14px] text-[16px] transition-all hover:border-gray-400 focus:border-gray-400 max-md:w-[110px] max-md:border-0 max-md:pl-[10px] max-md:pr-[10px]">
                                @{{ filters.applied.limit ?? "@lang('shop::app.categories.toolbar.show')" }}

                                <span class="icon-arrow-down text-[24px]"></span>
                            </button>
                        </x-slot:toggle>
                    
                        <!-- Dropdown Content -->
                        <x-slot:menu>
                            <x-shop::dropdown.menu.item
                                v-for="(limit, key) in filters.available.limit"
                                ::class="{'bg-gray-100': limit == filters.applied.limit}"
                                @click="apply('limit', limit)"
                            >
                                @{{ limit }}
                            </x-shop::dropdown.menu.item>
                        </x-slot:menu>
                    </x-shop::dropdown>

                    <!-- Listing Mode Switcher -->
                    <div class="flex items-center gap-[20px]">
                        <span
                            class="cursor-pointer text-[24px]"
                            :class="(filters.applied.mode === 'list') ? 'icon-listing-fill' : 'icon-listing'"
                            @click="changeMode('list')"
                        >
                        </span>

                        <span
                            class="cursor-pointer text-[24px]"
                            :class="(filters.applied.mode === 'grid') ? 'icon-grid-view-fill' : 'icon-grid-view'"
                            @click="changeMode()"
                        >
                        </span>
                    </div>
                </div>
            </div>

            <!-- Mobile Toolbar -->
            <div class="md:hidden">
                <ul>
                    <li
                        class="p-[10px]"
                        :class="{'bg-gray-100': sort.value == filters.applied.sort}"
                        v-for="(sort, key) in filters.available.sort"
                        @click="apply('sort', sort.value)"
                    >
                        @{{ sort.title }}
                    </li>
                </ul>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-toolbar', {
            template: '#v-toolbar-template',

            data() {
                return {
                    filters: {
                        available: {
                            sort: 'created_at-desc',

                            limit: @json($toolbar->getAvailableLimits()),

                            mode: @json($toolbar->getAvailableModes()),
                        },

                        applied: {
                            sort:  'created_at-desc',

                            limit: '{{ $toolbar->getLimit(isset($params) ? $params : [] ) }}',

                            mode: '{{ $toolbar->getMode(isset($params) ? $params : [] ) }}',
                        }
                    }
                };
            },

            mounted() {
                this.$emit('filter-applied', this.filters.applied);
            },

            computed: {
                sortLabel() {
                    return this.filters.available.sort.find(sort => sort.value === this.filters.applied.sort).title;
                }
            },

            methods: {
                apply(type, value) {
                    this.filters.applied[type] = value;

                    this.$emit('filter-applied', this.filters.applied);
                },

                changeMode(value = 'grid') {
                    this.filters.applied['mode'] = value;

                    this.$emit('filter-applied', this.filters.applied);
                },
            },
        });
    </script>
@endPushOnce
