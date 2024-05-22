{!!view_render_event('bagisto.shop.categories.view.filters.before') !!}

<!-- Desktop Filters Navigation -->
<div v-if="! isMobile">
    <!-- Filters Vue Component -->
    <v-filters
        @filter-applied="setFilters('filter', $event)"
        @filter-clear="clearFilters('filter', $event)"
    >
        <!-- Category Filter Shimmer Effect -->
        <x-shop::shimmer.categories.filters/>
    </v-filters>
</div>

<!-- Mobile Filters Navigation -->
<div
    class="fixed bottom-0 left-0 z-50 grid w-full max-w-full grid-cols-[1fr_auto_1fr] items-center justify-items-center border-t-[1px] border-[#E9E9E9] bg-white px-[20px]"
    v-if="isMobile"
    >
    <!-- Filter Drawer -->
    <x-shop::drawer
        position="left"
        width="100%"
        ::is-active="isDrawerActive.filter"
    >
        <!-- Drawer Toggler -->
        <x-slot:toggle>
            <div
                class="flex cursor-pointer items-center gap-x-[10px] px-[10px] py-[14px] text-[16px] font-medium uppercase"
                @click="isDrawerActive.filter = true"
            >
                <span class="icon-filter-1 text-[24px]"></span>

                @lang('shop::app.categories.filters.filter')
            </div>
        </x-slot:toggle>

        <!-- Drawer Header -->
        <x-slot:header>
            <div class="flex items-center justify-between border-b-[1px] border-[#E9E9E9] pb-[20px]">
                <p class="text-[18px] font-semibold">
                    @lang('shop::app.categories.filters.filters')
                </p>

                <p
                    class="mr-[50px] cursor-pointer text-[12px] font-medium"
                    @click="clearFilters('filter', '')"
                >
                    @lang('shop::app.categories.filters.clear-all')
                </p>
            </div>
        </x-slot:header>

        <!-- Drawer Content -->
        <x-slot:content>
            <!-- Filters Vue Component -->
            <v-filters
                @filter-applied="setFilters('filter', $event)"
                @filter-clear="clearFilters('filter', $event)"
            >
                <!-- Category Filter Shimmer Effect -->
                <x-shop::shimmer.categories.filters/>
            </v-filters>
        </x-slot:content>
    </x-shop::drawer>

    <!-- Separator -->
    <span class="h-[20px] w-[2px] bg-[#E9E9E9]"></span>

    <!-- Sort Drawer -->
    <x-shop::drawer
        position="bottom"
        width="100%"
        ::is-active="isDrawerActive.toolbar"
        >
        <!-- Drawer Toggler -->
        <x-slot:toggle>
            <div
                class="flex cursor-pointer items-center gap-x-[10px] px-[10px] py-[14px] text-[16px] font-medium uppercase"
                @click="isDrawerActive.toolbar = true"
            >
                <span class="icon-sort-1 text-[24px]"></span>

                @lang('shop::app.categories.filters.sort')
            </div>
        </x-slot:toggle>

        <!-- Drawer Header -->
        <x-slot:header>
            <div class="flex items-center justify-between border-b-[1px] border-[#E9E9E9] pb-[20px]">
                <p class="text-[18px] font-semibold">
                    @lang('shop::app.categories.filters.sort')
                </p>
            </div>
        </x-slot:header>

        <!-- Drawer Content -->
        <x-slot:content>
            @include('enclaves::products-list.toolbar')
        </x-slot:content>
    </x-shop::drawer>
</div>

{!!view_render_event('bagisto.shop.categories.view.filters.after') !!}

@pushOnce('scripts')
    <!-- Filters Vue template -->
    <script type="text/x-template" id="v-filters-template">
        <!-- Filter Shimmer Effect -->
        <template v-if="isLoading">
            <x-shop::shimmer.categories.filters/>
        </template>

        <!-- Filters Container -->
        <template v-else>
            <div class="panel-side journal-scroll grid max-h-[1320px] min-w-[342px] max-w-[400px] grid-cols-[1fr] gap-[20px] overflow-y-auto overflow-x-hidden pr-[26px] max-xl:min-w-[270px] max-md:hidden">
                <!-- Filters Header Container -->
                <div class="flex h-[50px] items-center justify-between border-b-[1px] border-[#E9E9E9] pb-[10px] max-md:hidden">
                    <p class="text-[18px] font-semibold">
                        @lang('shop::app.categories.filters.filters')
                    </p>

                    <p class="cursor-pointer text-[12px] font-medium" @click='clear()'>
                        @lang('shop::app.categories.filters.clear-all')
                    </p>
                </div>

                <!-- Filters Items Vue Component -->
                <v-filter-item
                    ref="filterItemComponent"
                    :key="filterIndex"
                    :filter="filter"
                    v-for='(filter, filterIndex) in filters.available'
                    @values-applied="applyFilter(filter, $event)"
                >
                </v-filter-item>
            </div>
        </template>
    </script>

    <!-- Filter Item Vue template -->
    <script type="text/x-template" id="v-filter-item-template">
        <template v-if="filter.type === 'price' || filter.options.length">
            <x-shop::accordion>
                <!-- Filter Item Header -->
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <p
                            class="text-[18px] font-semibold"
                            v-text="filter.name"
                        >
                        </p>
                    </div>
                </x-slot:header>

                <!-- Filter Item Content -->
                <x-slot:content>
                    <!-- Price Range Filter -->
                    <ul v-if="filter.type === 'price'">
                        <li>
                            <v-price-filter
                                :key="refreshKey"
                                :default-price-range="appliedValues"
                                @set-price-range="applyValue($event)"
                            >
                            </v-price-filter>
                        </li>
                    </ul>

                    <!-- Checkbox Filter Options -->
                    <ul class="pb-3 text-sm text-gray-700" v-else>
                        <li
                            :key="option.id"
                            v-for="(option, optionIndex) in filter.options"
                        >
                            <div class="flex select-none items-center gap-x-[15px] rounded pl-2 hover:bg-gray-100">
                                <input
                                    type="checkbox"
                                    :id="'option_' + option.id"
                                    class="peer hidden"
                                    :value="option.id"
                                    v-model="appliedValues"
                                    @change="applyValue"
                                />

                                <label
                                    class="icon-uncheck peer-checked:icon-check-box cursor-pointer text-[24px] text-navyBlue peer-checked:text-navyBlue"
                                    :for="'option_' + option.id"
                                >
                                </label>

                                <label
                                    :for="'option_' + option.id"
                                    class="w-full cursor-pointer p-2 pl-0 text-[16px] text-gray-900"
                                    v-text="option.name"
                                >
                                </label>
                            </div>
                        </li>
                    </ul>
                </x-slot:content>
            </x-shop::accordion>
        </template>
    </script>

    <script type="text/x-template" id="v-price-filter-template">
        <div>

            <!-- Price range filter shimmer -->
            <template v-if="isLoading">
                <x-shop::shimmer.range-slider/>
            </template>

            <template v-else>
                <x-shop::range-slider
                    ::key="refreshKey"
                    default-type="price"
                    ::default-allowed-max-range="allowedMaxPrice"
                    ::default-min-range="minRange"
                    ::default-max-range="maxRange"
                    @change-range="setPriceRange($event)"
                >
                </x-shop::range-slider>
            </template>
        </div>
    </script>

    <script type='module'>
        app.component('v-filters', {
            template: '#v-filters-template',

            data() {
                return {
                    isLoading: true,

                    filters: {
                        available: {},

                        applied: {},
                    },
                };
            },

            mounted() {
                this.getFilters();

                this.setFilters();
            },

            methods: {
                getFilters() {
                    this.$axios.get('{{ route("shop.api.categories.attributes") }}')
                        .then((response) => {
                            this.isLoading = false;

                            this.filters.available = response.data.data;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                setFilters() {
                    let queryParams = new URLSearchParams(window.location.search);
                  
                    queryParams.forEach((value, filter) => {
                        /**
                         * Removed all toolbar filters in order to prevent key duplication.
                         */
                        if (! ['sort', 'limit'].includes(filter)) {
                            this.filters.applied[filter] = value.split(',');
                        }
                    });

                    this.$emit('filter-applied', this.filters.applied);
                },

                applyFilter(filter, values) {
                    if (values.length) {
                        this.filters.applied[filter.code] = values;
                    } else {
                        delete this.filters.applied[filter.code];
                    }

                    this.$emit('filter-applied', this.filters.applied);
                },

                clear() {
                    /**
                     * Clearing parent component.
                     */
                    this.filters.applied = {};

                    /**
                     * Clearing child components. Improvisation needed here.
                     */
                    this.$refs.filterItemComponent.forEach((filterItem) => {
                        if (filterItem.filter.code === 'price') {
                            filterItem.$data.appliedValues = null;
                        } else {
                            filterItem.$data.appliedValues = [];
                        }
                    });

                    this.$emit('filter-applied', this.filters.applied);
                },
            },
        });

        app.component('v-filter-item', {
            template: '#v-filter-item-template',

            props: ['filter'],

            data() {
                return {
                    active: true,

                    appliedValues: null,

                    refreshKey: 0,
                }
            },

            watch: {
                appliedValues() {
                    if (this.filter.code === 'price' && ! this.appliedValues) {
                        ++this.refreshKey;
                    }
                },
            },

            mounted() {
                if (this.filter.code === 'price') {
                    /**
                     * Improvisation needed here for `this.$parent.$data`.
                     */
                    this.appliedValues = this.$parent.$data.filters.applied[this.filter.code]?.join(',');

                    ++this.refreshKey;

                    return;
                }

                /**
                 * Improvisation needed here for `this.$parent.$data`.
                 */
                this.appliedValues = this.$parent.$data.filters.applied[this.filter.code] ?? [];
            },

            methods: {
                applyValue($event) {
                    if (this.filter.code === 'price') {
                        this.appliedValues = $event;

                        this.$emit('values-applied', this.appliedValues);

                        return;
                    }

                    this.$emit('values-applied', this.appliedValues);
                },
            },
        });

        app.component('v-price-filter', {
            template: '#v-price-filter-template',

            props: ['defaultPriceRange'],

            data() {
                return {
                    refreshKey: 0,

                    isLoading: true,

                    allowedMaxPrice: 100,

                    priceRange: this.defaultPriceRange ?? [0, 100].join(','),
                };
            },

            computed: {
                minRange() {
                    let priceRange = this.priceRange.split(',');

                    return priceRange[0];
                },

                maxRange() {
                    let priceRange = this.priceRange.split(',');

                    return priceRange[1];
                }
            },

            mounted() {
                this.getMaxPrice();
            },

            methods: {
                getMaxPrice() {
                    this.$axios.get('{{ route("shop.api.categories.max_price") }}')
                        .then((response) => {
                            this.isLoading = false;

                            /**
                             * If data is zero, then default price will be displayed.
                             */
                            if (response.data.data.max_price) {
                                this.allowedMaxPrice = response.data.data.max_price;
                            }

                            if (! this.defaultPriceRange) {
                                this.priceRange = [0, this.allowedMaxPrice].join(',');
                            }

                            ++this.refreshKey;
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                setPriceRange($event) {
                    this.priceRange = [$event.minRange, $event.maxRange].join(',');

                    this.$emit('set-price-range', this.priceRange);
                },
            },
        });
    </script>
@endPushOnce
