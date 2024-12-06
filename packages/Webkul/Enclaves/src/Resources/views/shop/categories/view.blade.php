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

@push ('styles')
    <style>
        .product-price p {
            color: black !important;
        }
    </style>
@endpush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ trim($category->meta_title) != "" ? $category->meta_title : $category->name }}
    </x-slot>

    @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
        <v-category></v-category>
    @endif

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-category-template"
            >

            {!!view_render_event('bagisto.shop.categories.view.before') !!}

            <div class="container px-[60px] max-lg:px-[30px]">
                <section class="pt-11">
                    <div class="flex justify-start">
                        <div class="flex items-center gap-x-[10px]">
                            <p class="flex items-center gap-x-[10px] text-lg font-normal text-dark">Home <span
                                    class="icon-arrow-right text-[10px] font-extrabold"></span></p>
                            <p class="flex items-center gap-x-[10px] text-lg font-normal text-dark">Our Brands <span
                                    class="icon-arrow-right text-[10px] font-extrabold"></span></p>
                            <p class="text-lg font-normal text-text-gray">{{$category->name}}</p>
                        </div>
                    </div>
                </section>

                <section class="py-11">
                    <div class="flex items-center justify-between rounded-[20px] border border-[#D9D9D9] px-6 py-5 max-sm:px-3 max-sm:py-3">
                        <div class="h-[70px] w-[230px] overflow-hidden max-md:h-[60px] max-md:w-[160px] max-sm:w-1/3">
                            <img
                                class="w-full h-full object-contain object-left"
                                src="{{ asset('storage/' . $category->logo_path) }}"
                                alt="">
                        </div>
                        <button
                            class="block px-6 py-5 text-lg font-normal text-primary underline max-sm:px-2"
                            @click="storeDeails()"
                            >
                            Store Details
                        </button>
                    </div>
                </section>

                <div class="mt-[40px] flex items-start gap-[40px] max-lg:gap-[20px]">
                    <!-- Product Listing Container -->
                    <div class="flex-1">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('shop::categories.toolbar')
                        </div>

                        <template v-if="products.length || isLoading">
                            <!-- Product Grid Card Container -->
                            <div>
                                <template v-if="! isLoading">
                                    <div class="grid grid-cols-2 gap-24 max-lg:gap-12 max-md:grid-cols-1">
                                        <div class="">
                                            <h2 class="text-lg font-bold text-dark">Middle Housing</h2>
                                            <div class="mt-11 grid grid-cols-2 gap-x-8 gap-y-11 max-sm:grid-cols-1">
                                                <div
                                                    v-for="product in priceGroupProducts.low"
                                                    class="">
                                                    <x-shop::media.images.lazy
                                                        @click="redirectToProduct(product)"
                                                        class="w-full cursor-pointer bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105 rounded-lg"
                                                        ::key="imageComponentRerander"
                                                        ::src="product.base_image.medium_image_url"
                                                    ></x-shop::media.images.lazy>
                                                    <h2
                                                        class="mt-5 text-xl font-bold text-dark"
                                                        v-text="product.name"
                                                        ></h2>
                                                    <p class="mt-1 text-lg font-normal text-primary">@{{ product.attributes.find(attr => attr.code === 'location').value }}</p>
                                                    <p class="mt-2 text-sm font-normal text-[#8B8B8B]">Price starts at</p>
                                                    <p
                                                        class="mt-1 text-xl font-bold text-dark"
                                                        v-text="product.min_price"
                                                        >
                                                    </p>
                                                    <span
                                                        class="mt-5 block w-full rounded-full border border-primary px-5 py-5 text-center text-lg font-normal text-primary max-lg:px-3 max-lg:py-3 cursor-pointer"
                                                        @click="redirectToProduct(product)"
                                                        >
                                                        View Property
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <h2 class="text-lg font-bold text-dark">Middle Condominium</h2>
                                            <div class="mt-11 grid grid-cols-2 gap-x-8 gap-y-11 max-sm:grid-cols-1">
                                                <div
                                                    v-for="product in priceGroupProducts.medium"
                                                    class="">
                                                    <x-shop::media.images.lazy
                                                        @click="redirectToProduct(product)"
                                                        class="w-full cursor-pointer rounded-lg bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                                                        ::key="imageComponentRerander"
                                                        ::src="product.base_image.medium_image_url"
                                                    ></x-shop::media.images.lazy>
                                                    <h2
                                                        class="mt-5 text-xl font-bold text-dark"
                                                        v-text="product.name"
                                                        ></h2>
                                                    <p class="mt-1 text-lg font-normal text-primary">@{{ product.attributes.find(attr => attr.code === 'location').value }}</p>
                                                    <p class="mt-2 text-sm font-normal text-[#8B8B8B]">Price starts at</p>
                                                    <p
                                                        class="mt-1 text-xl font-bold text-dark"
                                                        v-text="product.min_price"
                                                        >
                                                    </p>
                                                    <span
                                                        class="mt-5 block w-full rounded-full border border-primary px-5 py-5 text-center text-lg font-normal text-primary max-lg:px-3 max-lg:py-3 cursor-pointer"
                                                        @click="redirectToProduct(product)"
                                                        >
                                                        View Property
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <template v-else>
                                    <x-shop::shimmer.categories.view count="4"></x-shop::shimmer.categories.view>
                                </template>
                            </div>
                        </template>

                        <!-- Empty Products Container -->
                        <template v-else>
                            <div class="m-auto grid h-[476px] w-[100%] place-content-center items-center justify-items-center text-center">
                                <img
                                    src="{{ bagisto_asset('images/thank-you.png') }}"
                                    alt="placeholder"
                                />

                                <p class="text-[20px]">
                                    @lang('shop::app.categories.view.empty')
                                </p>
                            </div>
                        </template>

                        <!-- Load More Button -->
                        <template v-if="isMoreLoading">
                            <x-shop::shimmer.products.cards.grid count="6"></x-shop::shimmer.products.cards.grid>
                        </template>

                        <div
                            class="row mt-12 text-center"
                            v-if="links.next"
                            >
                            <button
                                class="rounded-[20px] bg-[#CC035C] px-[25px] py-[10px] text-white"
                                @click="loadMoreProducts"
                            >
                            @lang('shop::app.categories.view.load-more')
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-[60px]">
                    <template v-if="!isLoading">
                        <div v-if="soldOutProducts.length">
                            <h2 class="text-lg font-bold text-dark">Sold out Projects</h2>
                            <div class="flex items-start gap-[40px] max-lg:gap-[20px]">
                                <div class="mt-11 grid grid-cols-4 gap-x-20 gap-y-11 max-sm:grid-cols-1">
                                    <div
                                        v-for="product in soldOutProducts"
                                        class="">
                                        <x-shop::media.images.lazy
                                            @click="redirectToProduct(product)"
                                            class="w-full cursor-pointer rounded-lg bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                                            ::key="imageComponentRerander"
                                            ::src="product.base_image.medium_image_url"
                                        ></x-shop::media.images.lazy>
                                        <h2
                                            class="mt-5 text-xl font-bold text-dark"
                                            v-text="product.name"
                                            ></h2>
                                        <p class="mt-1 text-lg font-normal text-primary">@{{ product.attributes.find(attr => attr.code === 'location').value }}</p>
                                        <p class="mt-2 text-sm font-normal text-[#8B8B8B]">Price starts at</p>
                                        <p
                                            class="mt-1 text-xl font-bold text-dark"
                                            v-text="product.min_price"
                                            >
                                        </p>
                                        <span
                                            class="mt-5 block w-full rounded-full border border-primary px-5 py-5 text-center text-lg font-normal text-primary max-lg:px-3 max-lg:py-3 cursor-pointer"
                                            @click="redirectToProduct(product)"
                                            >
                                            View Property
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <h2 class="h-[28px] w-[30%] shimmer"></h2>

                        <x-shop::shimmer.categories.sold-out-product count="4"></x-shop::shimmer.categories.sold-out-product>
                    </template>
                </div>

                <x-enclaves-shop::modal.story-details ref="storyDetailsGuideModal">
                    <!-- Modal Header -->
                    <x-slot:header>
                        <div class="flex w-full">
                            <h2 class="text-[25px] font-bold max-md:text-[10px]">
                                @lang('Store Details')
                            </h2>
                        </div>
                    </x-slot:header>

                    <!-- Modal Content Id -->
                    <x-slot:content>
                        <div class="flex flex-col gap-2 max-md:px-[10px] md:gap-5">
                            <div class="flex h-[366px]">
                                <div class="h-full w-[323px] overflow-hidden rounded-[20px] flex justify-center items-center">
                                    <div>
                                        <x-shop::media.images.lazy
                                            class="w-10/12 max-h-full rounded-[20px]"
                                            src="{{ asset('storage/' . $category->logo_path) }}"
                                        ></x-shop::media.images.lazy>
                                    </div>
                                </div>

                                <div class="h-full w-[531px] pl-[50px] overflow-auto">
                                    {!! $category->description !!}
                                </div>
                            </div>
                        </div>
                    </x-slot:content>
                </x-enclaves-shop::modal.story-details>
            </div>

            {!!view_render_event('bagisto.shop.categories.view.after') !!}
        </script>

        <script type="module">
            app.component('v-category', {
                template: '#v-category-template',

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

                        priceGroupProducts: [],

                        soldOutProducts: [],

                        links: {},

                        isCustomer: '{{ auth()->guard("customer")->check() }}',

                        imageComponentRerander: 1,
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

                mounted() {
                    this.getSoldOutProducts();
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

                        this.isLoading = true;

                        this.$axios.get("{{ route('enclaves.api.product.index', ['category_id' => $category->id]) }}", {
                            params: this.queryParams
                        })
                        .then(response => {
                            ++this.imageComponentRerander;

                            this.isLoading = false;

                            this.products = response.data.data;

                            this.groupProducts(this.products);

                            this.links = response.data.links;
                        }).catch(error => {
                            console.log(error);
                        });
                    },

                    getSoldOutProducts() {
                        this.isDrawerActive = {
                            toolbar: false,

                            filter: false,
                        };


                        this.$axios.get("{{ route('enclaves.api.product.soldout.index', ['category_id' => $category->id]) }}")
                        .then(response => {
                            this.soldOutProducts = response.data.data;

                            console.log(this.soldOutProducts);

                        }).catch(error => {
                            console.log(error);
                        });
                    },

                    loadMoreProducts() {
                        this.isMoreLoading = true;

                        if (this.links.next) {
                            this.$axios.get(this.links.next).then(response => {
                                this.products = [...this.products, ...response.data.data];

                                this.priceGroupProducts(this.products);

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

                    groupProducts(products){
                        let comparePrice = 2000000;

                        this.priceGroupProducts = {
                            low: products.filter(product => product.prices.regular.price <= comparePrice),
                            medium: products.filter(product => product.prices.regular.price > comparePrice)
                        };
                    },

                    storeDeails(){
                        this.$refs.storyDetailsGuideModal.toggle();
                    }
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
