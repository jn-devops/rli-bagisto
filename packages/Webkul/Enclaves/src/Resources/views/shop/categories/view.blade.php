<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="{{ trim($category->meta_description) != "" ? $category->meta_description : \Illuminate\Support\Str::limit(strip_tags($category->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $category->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.categories.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getCategoryJsonLd($category) !!}
        </script>
    @endif
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ trim($category->meta_title) != "" ? $category->meta_title : $category->name }}
    </x-slot>

    @if (in_array($category->display_mode, [null, 'description_only', 'products_and_description']))
        @if ($category->description)

            <div class="container px-[60px] max-lg:px-[30px]">
                <div class="flex flex-wrap gap-[40px] mt-[40px] items-start max-lg:gap-[20px]">
                    @if ($category->banner_path)
                        <img
                            class="max-w-[344px] w-full max-h-[172px]"
                            src="{{ $category->banner_url }}"
                            alt="{{ $category->name }}"
                            width="344"
                            height="172"
                        >
                    @endif
                    <div class="flex-1">
                        <x-shop::layouts.read-more-smooth
                            text="{!! $category->description !!}"
                            limit="700"
                        >
                        </x-shop::layouts.read-more-smooth>
                    </div>
                </div>

                </p>
            </div>
        @endif
    @endif

    @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
        <!-- Category Vue Component -->
        <v-category>
            <!-- Category Shimmer Effect -->
            <x-shop::shimmer.categories.view/>
        </v-category>
    @endif

    @pushOnce('scripts')
        <script 
            type="text/x-template" 
            id="v-category-template"
            >
            <div class="container px-[60px] max-lg:px-[30px]">
                <div class="flex gap-[40px] mt-[40px] items-start max-lg:gap-[20px]">
                    <!-- Product Listing Filters -->
                    @include('shop::categories.filters')

                    <!-- Product Listing Container -->
                    <div class="flex-1">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('shop::categories.toolbar')
                        </div>

                        <!-- Product List Card Container -->
                        <div v-if="filters.toolbar.mode === 'list'">
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.list count="12"></x-shop::shimmer.products.cards.list>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div
                                        v-for="product in products"
                                        class="grid gap-2.5 grid-cols-2 relative max-sm:grid-cols-1 mt-[20px]"
                                        >

                                        <div class="relative overflow-hidden group max-w-[350px] max-h-[289px] rounded-[20px]">
                                            <x-shop::media.images.lazy
                                                @click="redirectToProduct(product)"
                                                class="rounded-sm bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300 cursor-pointer"
                                                ::src="product.base_image.medium_image_url"
                                            ></x-shop::media.images.lazy>

                                            <div class="action-items bg-black"> 
                                                <p
                                                    class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-[#E51A1A] rounded-[44px] text-white text-[14px]"
                                                    v-if="product.on_sale"
                                                >
                                                    @lang('shop::app.components.products.card.sale')
                                                </p>

                                                <p
                                                    class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-navyBlue rounded-[44px] text-white text-[14px]"
                                                    v-else-if="product.is_new"
                                                >
                                                    @lang('shop::app.components.products.card.new')
                                                </p>
                                            </div>
                                        </div>

                                        <div class="grid gap-2.5 content-start relative">
                                            <div class="flex gap-[16px]">
                                                <p 
                                                    class="text-[16px] font-bold font-popins pr-[30px] cursor-pointer" 
                                                    v-text="product.name"
                                                    @click="redirectToProduct(product)"
                                                >
                                                </p>

                                                <span 
                                                    class="cursor-pointer text-2xl absolute right-[10px]"
                                                    :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'"
                                                    role="button"
                                                    tabindex="0"
                                                    aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                                                    @click="addToWishlist(product.id)"
                                                >
                                                </span>
                                            </div>

                                            <div class="grid items-center gap-5 flex-wrap justify-between max-425:grid">
                                                <div class="grid gap-[12px]">

                                                    <p class="text-[20px] font-medium font-popins" v-html="product.price_html"></p>

                                                    <p class="text-[16px] font-medium font-popins text-[#A0A0A0]">
                                                        @lang('enclaves::app.customers.total-contract-price')
                                                    </p>
                                                </div>

                                                <p class="text-[14px] text-[#6E6E6E]" v-if="! product.avg_ratings">
                                                    @lang('shop::app.components.products.card.review-description')
                                                </p>
                                            
                                                <p v-else class="text-[14px] text-[#6E6E6E]">
                                                    <x-shop::products.star-rating 
                                                        ::value="product && product.avg_ratings ? product.avg_ratings : 0"
                                                        :is-editable=false
                                                    >
                                                    </x-shop::products.star-rating>
                                                </p>

                                                <button
                                                    @click="redirectToProduct(product)"
                                                    class="text-white px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]"
                                                >
                                                    @lang('enclaves::app.customers.choose-unit')
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="grid items-center justify-items-center place-content-center w-[100%] m-auto h-[476px] text-center">
                                        <img 
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="placeholder"
                                        />
                                
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
                                    <div class="grid grid-cols-3 gap-8 mt-[30px] max-sm:mt-[20px] max-1060:grid-cols-2 max-sm:justify-items-center max-sm:grid-cols-1">
                                        <div
                                            v-for="product in products"
                                            class="grid gap-2.5 relative max-w-[350px] max-sm:grid-cols-1"
                                            >
                                            <div class="relative overflow-hidden  group max-w-[350px] max-h-[289px] rounded-[20px]">
                                                <x-shop::media.images.lazy
                                                    @click="redirectToProduct(product)"
                                                    class="rounded-sm bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300 cursor-pointer"
                                                    ::src="product.base_image.medium_image_url"
                                                ></x-shop::media.images.lazy>

                                                <div class="action-items bg-black"> 
                                                    <p
                                                        class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-[#E51A1A] rounded-[44px] text-white text-[14px]"
                                                        v-if="product.on_sale"
                                                    >
                                                        @lang('shop::app.components.products.card.sale')
                                                    </p>

                                                    <p
                                                        class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-navyBlue rounded-[44px] text-white text-[14px]"
                                                        v-else-if="product.is_new"
                                                    >
                                                        @lang('shop::app.components.products.card.new')
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="grid gap-4 content-start relative">
                                                <div class="flex gap-[16px]">
                                                    <p 
                                                        class="text-[16px] font-bold font-popins pr-[30px] cursor-pointer" 
                                                        v-text="product.name"
                                                        @click="redirectToProduct(product)"
                                                    ></p>
                                                
                                                    <span 
                                                        class="cursor-pointer text-2xl absolute right-[10px]"
                                                        :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'"
                                                        role="button"
                                                        tabindex="0"
                                                        aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                                                        @click="addToWishlist(product.id)"
                                                    >
                                                    </span>
                                                </div>

                                                
                                                <div class="grid gap-[12px]">
                                                    <p class="text-[16px] font-medium font-popins text-[#A0A0A0]">
                                                        @lang('enclaves::app.customers.total-contract-price')
                                                    </p>
                                                </div>

                                                <div class="grid grid-cols-2 items-center justify-between max-425:grid">
                                                    <div class="text-[20px] font-medium font-popins text-wrap" v-html="product.price_html"></div>

                                                    <button
                                                        @click="redirectToProduct(product)"
                                                        class="text-white px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]"
                                                    >
                                                        @lang('enclaves::app.customers.choose-unit')
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="grid items-center justify-items-center place-content-center w-[100%] m-auto h-[476px] text-center">
                                        <img 
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="placeholder"
                                        />
                                        
                                        <p class="text-[20px]">
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Load More Button -->
                        <div 
                            class="row text-center mt-12" 
                            v-if="links.next"
                        >
                            <button
                                class="text-white px-[25px] py-[10px] bg-[#CC035C] rounded-[20px]"
                                @click="loadMoreProducts"
                            >
                            @lang('shop::app.categories.view.load-more')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-category', {
                template: '#v-category-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

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

                        isCustomer: '{{ auth()->guard("customer")->check() }}',
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

                        this.$axios.get("{{ route('shop.api.products.index', ['category_id' => $category->id]) }}", {
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
                        if (this.links.next) {
                            this.$axios.get(this.links.next).then(response => {
                                this.products = [...this.products, ...response.data.data];

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
                    },

                    redirectToProduct(product) {
                        window.location.href = `{{ route('shop.product_or_category.index', '') }}/` + product.url_key;
                    },

                    addToWishlist(product_id) {
                        if (this.isCustomer) {
                            this.$axios.post(`{{ route('shop.api.customers.account.wishlist.store') }}`, {
                                    product_id: product_id
                                })
                                .then(response => {
                                    location.reload();
                                })
                                .catch(error => {});
                            } else {
                                window.location.href = "{{ route('shop.customer.session.index')}}";
                            }
                    },
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>