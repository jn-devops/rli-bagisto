
<x-shop::layouts>

@php
    $channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta name="title" content="{{ $enableBlogSeoMetaTitle ?? ( $channel->home_seo['meta_title'] ?? '' ) }}" />

    <meta name="description" content="{{ $enableBlogSeoMetaKeywords ?? ( $channel->home_seo['meta_description'] ?? '' ) }}" />

    <meta name="keywords" content="{{ $enableBlogSeoMetaDescription ?? ( $channel->home_seo['meta_keywords'] ?? '' ) }}" />
@endPush

<!-- Page Title -->
<x-slot:title>
    @lang('enclaves::app.shop.ask-to-joy.braedcurmb')
</x-slot>

<v-ask-to-joy-list></v-ask-to-joy-list>

@pushOnce('scripts')
    <script type="text/x-template" id="v-ask-to-joy-list-template">
        <!-- Section new place made just for you -->
        <div class="container px-[60px] max-lg:px-[30px]">
            <template v-if="isLoading">
                <!-- Shimmer Load -->
                <div class="shimmer rounded-1xl mt-[30px] h-[24px] w-[22%]"></div>
                <div class="shimmer rounded-1xl mt-9 h-[36px] w-[20%]"></div>

                <x-shop::shimmer.ask-to-joy.index count="8"/>
            </template>

            <template v-else>
                <!-- Breadcrumbs -->
                <x-shop::breadcrumbs name="ask-to-joy"></x-shop::breadcrumbs>

                <h2 class="text-3xl font-bold text-dark mt-9"> @lang('enclaves::app.shop.ask-to-joy.braedcurmb') </h2>

                <div class="mt-11 grid grid-cols-4 gap-16 max-xl:gap-8 max-lg:grid-cols-2 max-md:grid-cols-1">
                    <div
                        v-if="products"
                        v-for="product in Products"
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

                <div class="mt-3 text-center"
                    v-if="limit < products.length"
                    >
                    <button
                        class="rounded-[20px] bg-[#CC035C] px-[25px] py-[10px] text-white"
                        @click="getMoreBlogs()"
                        v-text="loadMoreTxt"
                    >
                    </button>
                </div>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-ask-to-joy-list', {
            template: '#v-ask-to-joy-list-template',

            data() {
                return {
                    isLoading: true,
                    products: {},
                    limit: 10,
                    loadMoreTxt: `{{ trans('enclaves::app.shop.ask-to-joy.load-more') }}`,
                };
            },

            mounted() {
                this.getProducts();
            },

            methods: {
                getMoreBlogs() {
                    this.limit += 10;

                    this.getProducts();
                },

                getProducts() {
                    let params = {
                            limit: 10,
                        }

                    let askToJoy = JSON.parse(localStorage.getItem('askToJoyWeb'));

                    if (askToJoy) {
                        params = { ...askToJoy, ...params };
                    }

                    console.log('params', params);


                    this.$axios.get("{{ route('enclaves.api.product.ask_to_joy') }}", {
                        params: params
                    })
                    .then(response => {
                        this.Products = response.data.data;
                        this.isLoading = false;

                    }).catch(error => {
                        console.log(error);
                    });
                },

                redirectToProduct(product) {
                    window.location.href = `{{ route('shop.product_or_category.index', '') }}/` + product.url_key;
                },
            },
        });
    </script>
@endPushOnce

</x-shop::layouts>
