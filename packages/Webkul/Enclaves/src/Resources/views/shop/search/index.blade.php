<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('shop::app.search.title', ['query' => request()->query('query')])"/>

    <meta name="keywords" content="@lang('shop::app.search.title', ['query' => request()->query('query')])"/>
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.search.title', ['query' => request()->query('query')])
    </x-slot>

    <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
        @if (request()->has('image-search'))
            @include('shop::search.images.results')
        @endif

        <div class="mt-[30px] flex items-center justify-between">
            <h2 class="text-[26px] font-medium">
                @lang('shop::app.search.title', ['query' => request()->query('query')])
            </h2>
        </div>
    </div>
        
    <!-- Product Listing -->
    <v-search>
        <x-shop::shimmer.categories.view/>
    </v-search>

    @pushOnce('scripts')
        <script 
            type="text/x-template" 
            id="v-search-template"
        >
            <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
                <div class="flex items-start gap-[40px] max-lg:gap-[20px] md:mt-[40px]">
                    <!-- Product Listing Filters -->
                    @include('shop::categories.filters')

                    <!-- Product Listing Container -->
                    <div class="flex-1">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('shop::categories.toolbar')
                        </div>

                        <!-- Product List Card Container -->
                        <div
                            class="mt-[30px] grid grid-cols-1 gap-[25px]"
                            v-if="filters.toolbar.mode === 'list'"
                            >
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.list count="12"></x-shop::shimmer.products.cards.list>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <x-shop::products.card
                                        ::mode="'list'"
                                        v-for="product in products"
                                    >
                                    </x-shop::products.card>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid h-[476px] w-[100%] place-content-center items-center justify-items-center text-center">
                                        <img src="{{ bagisto_asset('images/thank-you.png') }}"/>
                                  
                                        <p class="text-[20px]">
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Product Grid Card Container -->
                        <div v-else>
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.grid count="12"></x-shop::shimmer.products.cards.grid>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div class="mt-10 grid grid-cols-3 gap-6 max-lg:grid-cols-2">
                                        <div
                                            v-for="product in products"
                                            class="relative grid max-w-[350px] gap-2.5 max-sm:grid-cols-1"
                                            >
                                            <div class="group relative flex max-h-[289px] max-w-[350px] overflow-hidden rounded-[20px]">
                                                <x-shop::media.images.lazy
                                                    @click="redirectToProduct(product)"
                                                    class="w-full cursor-pointer rounded-sm bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                                                    ::src="product.base_image.medium_image_url"
                                                ></x-shop::media.images.lazy>

                                                <div class="action-items bg-black"> 
                                                    <p
                                                        class="absolute left-[20px] top-[20px] inline-block rounded-[44px] bg-[#E51A1A] px-[10px] text-[14px] text-white"
                                                        v-if="product.on_sale"
                                                    >
                                                        @lang('shop::app.components.products.card.sale')
                                                    </p>

                                                    <p
                                                        class="absolute left-[20px] top-[20px] inline-block rounded-[44px] bg-navyBlue px-[10px] text-[14px] text-white"
                                                        v-else-if="product.is_new"
                                                    >
                                                        @lang('shop::app.components.products.card.new')
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 gap-5 max-sm:grid-cols-1">
                                                <div class="flex gap-[16px]">
                                                    <p 
                                                        class="font-popins cursor-pointer pr-[30px] text-[16px] font-bold" 
                                                        v-text="product.name"
                                                        @click="redirectToProduct(product)"
                                                    ></p>
                                                
                                                    <span 
                                                        class="absolute right-[10px] cursor-pointer text-2xl"
                                                        :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'"
                                                        role="button"
                                                        tabindex="0"
                                                        aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                                                        @click="addToWishlist(product.id)"
                                                    >
                                                    </span>
                                                </div>

                                                <div class="flex flex-wrap justify-between">
                                                    <div class="max-sm:mb-4">
                                                        <div 
                                                            class="font-popins text-wrap text-[15px] font-medium" 
                                                            v-html="product.price_html">
                                                        </div>

                                                        <p class="font-popins text-[11px] font-medium text-[#A0A0A0]">
                                                            @lang('enclaves::app.shop.customers.total-contract-price')
                                                        </p>
                                                    </div>

                                                    <button
                                                        @click="redirectToProduct(product)"
                                                        class="h-[45px] text-nowrap rounded-[20px] border-[2px] border-[#CC035C] bg-white font-semibold text-[#CC035C] max-sm:h-[30px] max-sm:w-full lg:p-[5px]"
                                                    >
                                                        @lang('enclaves::app.shop.customers.choose-unit')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid h-[476px] w-[100%] place-content-center items-center justify-items-center text-center">
                                        <img src="{{ bagisto_asset('images/thank-you.png') }}"/>
                                        
                                        <p class="text-[20px]">
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <template v-if="isMoreLoading">
                            <x-shop::shimmer.products.cards.grid count="12"></x-shop::shimmer.products.cards.grid>
                        </template>
                        
                        <!-- Load More Button -->
                        <div class="row mt-12 text-center">
                            <button
                                class="rounded-[20px] bg-[#CC035C] px-[25px] py-[10px] text-white"
                                @click="loadMoreProducts"
                                v-if="links.next"
                            >
                                @lang('shop::app.categories.view.load-more')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </script>

        <script type="module">
            app.component('v-search', {
                template: '#v-search-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

                        isMoreLoading: false,

                        isDrawerActive: {
                            toolbar: false,
                            
                            filter: false,
                        },

                        filters: {
                            toolbar: {},
                            
                            filter: {},
                        },

                        products: [],

                        links: {},
                    }
                },

                computed: {
                    queryParams() {
                        let queryParams = Object.assign({}, this.filters.filter, this.filters.toolbar);

                        return this.removeJsonEmptyValues(queryParams);
                    },

                    queryString() {
                        return this.jsonToQueryString(this.queryParams);
                    },
                },

                watch: {
                    queryParams() {
                        this.getProducts();
                    },

                    queryString() {
                        window.history.pushState({}, '', '?' + this.queryString);
                    },
                },

                methods: {
                    setFilters(type, filters) {
                        this.filters[type] = filters;
                    },

                    clearFilters(type, filters) {
                        this.filters[type] = {};
                    },

                    getProducts() {
                        this.isDrawerActive = {
                            toolbar: false,
                            
                            filter: false,
                        };

                        this.$axios.get(("{{ route('shop.api.products.index', ['name' => request('query')]) }}"), { 
                            params: this.queryParams 
                        })
                            .then(response => {
                                this.isLoading = false;

                                this.products = response.data.data;

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                    },

                    loadMoreProducts() {
                        this.isMoreLoading = true;

                        if (this.links.next) {
                            this.$axios.get(this.links.next).then(response => {
                                this.products = [...this.products, ...response.data.data];

                                this.isMoreLoading = false;

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                        }
                    },

                    removeJsonEmptyValues(params) {
                        Object.keys(params).forEach(function (key) {
                            if ((! params[key] && params[key] !== undefined)) {
                                delete params[key];
                            }

                            if (Array.isArray(params[key])) {
                                params[key] = params[key].join(',');
                            }
                        });

                        return params;
                    },

                    jsonToQueryString(params) {
                        let parameters = new URLSearchParams();

                        for (const key in params) {
                            parameters.append(key, params[key]);
                        }

                        return parameters.toString();
                    }
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
