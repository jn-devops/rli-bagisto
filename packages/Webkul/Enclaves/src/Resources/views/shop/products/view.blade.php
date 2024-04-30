@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $avgRatings = round($reviewHelper->getAverageRating($product));

    $percentageRatings = $reviewHelper->getPercentageRating($product);

    $customAttributeValues = $productViewHelper->getAdditionalData($product);
@endphp

<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $product->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {{ app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) }}
        </script>
    @endif

    <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="{{ $product->name }}" />

    <meta name="twitter:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="{{ $product->name }}" />

    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta property="og:url" content="{{ route('shop.product_or_category.index', $product->url_key) }}" />
@endPush

@pushOnce('scripts')
    <script>
		document.addEventListener("DOMContentLoaded", () => {
			let img = document.querySelectorAll('.et-slider img')
			let active = 1;
			let prev = 0;
			let next = 2;
			let changeimage = () => {
				img.forEach((ele, i) => {
					if (i === prev) {
						ele.className = 'prev'
					}
					else if (i === active) {
						ele.className = 'active'
					} else if (i === next) {
						ele.className = 'next'
					} else {
						ele.className = 'd-none'
					}
				})
			}
			changeimage();

			let sliderinterval = setInterval(() => {
				prev = active;
				active = next;
				if (active + 1 == img.length) {
					next = 0;
				} else {
					next = active + 1;
				}
				changeimage()
			}, 5000);
		});
	</script>
@endPushOnce

<!-- Page Layout -->
<x-shop::layouts>
    <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
        <!-- Page Title -->
        <x-slot:title>
            {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
        </x-slot>

        {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

        <!-- Breadcrumbs -->
        <x-shop::breadcrumbs name="product" :entity="$product"></x-shop::breadcrumbs>
        
        <!-- Product Information Vue Component -->
        <v-product :product-id="{{ $product->id }}">
            <x-shop::shimmer.products.view/>
        </v-product>

        <!-- Featured Products -->
        <x-shop::products.carousel
            :title="trans('shop::app.products.view.related-product-title')"
            :src="route('shop.api.products.related.index', ['id' => $product->id])"
        >
        </x-shop::products.carousel>

        <!-- Upsell Products -->
        <x-shop::products.carousel
            :title="trans('shop::app.products.view.up-sell-title')"
            :src="route('shop.api.products.up-sell.index', ['id' => $product->id])">
        </x-shop::products.carousel>

        {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

        @pushOnce('scripts')
            <script type="text/x-template" id="v-product-template">
                <x-shop::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                    >
                    <form
                        ref="formData"
                        @submit="handleSubmit($event, addToCart)"
                        >
                        <input 
                            type="hidden" 
                            name="product_id" 
                            value="{{ $product->id }}"
                        >

                        <input
                            type="hidden"
                            name="is_buy_now"
                            v-model="is_buy_now"
                        >
                        
                        <input 
                            type="hidden" 
                            name="quantity" 
                            :value="qty"
                        >

                        <div class="mt-12 flex gap-[54px] max-1180:flex-wrap max-lg:mt-0 max-sm:gap-y-6">
                            <div class="w-full">
                                <!-- Gallery Blade Inclusion -->
                                @include('shop::products.view.gallery')

                                <!-- unit -->
                                <div class="mt-[40px] flex flex-wrap gap-[60px] max-sm:gap-[30px]">
                                    <div class="flex gap-[10px]">
                                        <span class="icon h-[24px] w-[24px] bg-red-700"></span>

                                        <div class="grid gap-[12px]">
                                            <p class="text-[15px] leading-4 text-[#989898]">@lang('enclaves::app.shop.product.first-floor')</p>
                                            
                                            <p class="text-[18px] leading-4">{{ $product->floor_area }}</p>
                                        </div>
                                    </div>

                                    <div class="flex gap-[10px]">
                                        <span class="icon h-[24px] w-[24px] bg-red-700"></span>

                                        <div class="grid gap-[12px]">
                                            <p class="text-[15px] leading-4 text-[#989898]">@lang('enclaves::app.shop.product.unit')</p>

                                            <p class="text-[18px] leading-4">{{ $product->end_unit }}</p>
                                        </div>
                                    </div>

                                    <div class="flex gap-[10px]">
                                        <span class="icon h-[24px] w-[24px] bg-red-700"></span>

                                        <div class="grid gap-[12px]">
                                            <p class="text-[15px] leading-4 text-[#989898]">@lang('enclaves::app.shop.product.floor-area')</p>

                                            <p class="text-[18px] leading-4">{{ $product->floor_area }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Name -->
                                {!! view_render_event('bagisto.shop.products.name.before', ['product' => $product]) !!}
                                <h1 class="mt-[26px] text-[40px] font-bold leading-[48px] max-sm:text-[26px] max-sm:leading-[36px]">
                                    {{ $product->name }}
                                </h1>

                                {!! view_render_event('bagisto.shop.products.description.before', ['product' => $product]) !!}
                                    <x-shop::layouts.read-more-smooth
                                        text="{!! $product->description !!}"
                                        limit="300"
                                        class="mt-[50px] text-[20px] max-sm:mt-[25px] max-sm:text-[16px]"
                                    >
                                    </x-shop::layouts.read-more-smooth>
                                {!! view_render_event('bagisto.shop.products.description.after', ['product' => $product]) !!}
                            </div>

                            <div class="mix-w-[438px] max-w-[400px] rounded-[20px] p-[50px] shadow-[0px_4px_40px_0px_rgba(220,_228,_240,_1)] max-sm:p-[25px] md:min-w-[400px]">
                                <!-- Price -->
                                <div class="grid gap-[10px]">
                                    <p class="text-[20px] font-semibold max-sm:text-[18px]">@lang('enclaves::app.shop.product.contract-price')</p>
                                    
                                    <p class="text-[22px] max-sm:text-[20px]">
                                        {!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}
                                            {!! $product->getTypeInstance()->getPriceHtml() !!}

                                            <span class="text-[18px] text-[#6E6E6E]">
                                                @if (
                                                    (bool) core()->getConfigData('taxes.catalogue.pricing.tax_inclusive') 
                                                    && $product->getTypeInstance()->getTaxCategory()
                                                )
                                                    @lang('shop::app.products.view.tax-inclusive')
                                                @endif
                                            </span>
                                        {!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}
                                    </p>
                                </div>
                                
                                <div class="mt-[10px] flex flex-col gap-[20px] border-b-[1px] border-[#D9D9D9] pb-[42px]">
                                    <!-- location-->
                                    <div class="flex flex-wrap gap-[6px]">
                                        <p class="text-[20px] font-bold max-sm:text-[18px]">@lang('enclaves::app.shop.product.location')</p>
                                        <p class="text-[20px] max-sm:text-[18px]">{{ $product->location }}</p>
                                    </div>
                                    <!-- Bedroom -->
                                    <div class="flex flex-wrap gap-[6px]">
                                        <p class="text-[20px] font-bold max-sm:text-[18px]">@lang('enclaves::app.shop.product.bedrooms')</p>
                                        <p class="text-[20px] max-sm:text-[18px]">{{ $product->bedrooms }}</p>
                                    </div>
                                    <!-- toilet bath -->
                                    <div class="flex flex-wrap gap-[6px]">
                                        <p class="text-[20px] font-bold max-sm:text-[18px]">@lang('enclaves::app.shop.product.t_and_b')</p>
                                        <p class="text-[20px] max-sm:text-[18px]">{{ $product->t_and_b }}</p>
                                    </div>
                                </div>

                                <div class="flex max-w-[400px] flex-col gap-[20px] border-b-[1px] border-[#D9D9D9] pb-[42px]">
                                    {!! view_render_event('bagisto.shop.products.short_description.before', ['product' => $product]) !!}

                                    <p class="mt-[25px] text-[18px] text-[#6E6E6E] max-sm:mt-[15px] max-sm:text-[14px]">
                                        {!! $product->short_description !!}
                                    </p>

                                    {!! view_render_event('bagisto.shop.products.short_description.after', ['product' => $product]) !!}
                                </div>

                                <div class="flex flex-col">
                                    @include('shop::products.view.types.configurable')
                                </div>

                                <!-- Seller detail -->
                                <!-- <div class="mt-[28px] flex flex-col gap-[20px]">
                                    
                                    <div class="flex">
                                        <p class="text-[20px] font-bold max-sm:text-[18px]"> Seller Details:</p>
                                    </div>
                                    <div class="flex flex-wrap gap-[6px]">
                                        <p class="text-[20px] font-bold max-sm:text-[18px]">Name:</p>
                                        <p class="text-[20px] max-sm:text-[18px]">Charles Ley Baldmor</p>
                                    </div>
                                    <div class="flex flex-wrap gap-[6px]">
                                        <p class="text-[20px] font-bold max-sm:text-[18px]">Email:</p>
                                        <p class="text-[20px] max-sm:text-[18px]">cbbaldemor@joy-nostalg.com</p>
                                    </div>
                                </div> -->

                                <!-- Add To Cart Button -->
                                {!! view_render_event('bagisto.shop.products.view.add_to_cart.before', ['product' => $product]) !!}
                                
                                @if ($product->getTypeInstance()->showQuantityBox())
                                    <button
                                        type="submit"
                                        class="mx-auto ml-[0px] mt-[30px] block w-full rounded-[18px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[43px] py-[16px] text-center text-[16px] font-medium text-white"
                                        {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                    >
                                        @lang('shop::app.products.view.add-to-cart')
                                    </button>
                                @endif
                                
                                {!! view_render_event('bagisto.shop.products.view.add_to_cart.after', ['product' => $product]) !!}
                                
                                <!-- Buy Now Button -->
                                {!! $product->button_text != '0' && $product->button_text ? $product->button_information : '' !!}

                                {!! view_render_event('bagisto.shop.products.view.buy_now.before', ['product' => $product]) !!}
                                    <button 
                                        class="mx-auto ml-[0px] mt-[30px] block w-full rounded-[18px] border-[3px] border-[#CC035C] px-[43px] py-[16px] text-center font-medium text-[#CC035C]"
                                        @click="is_buy_now=1; is_kyc_process=1;"
                                        style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                        {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                    >
                                        @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.reserve-now')
                                    </button>
                                {!! view_render_event('bagisto.shop.products.view.buy_now.after', ['product' => $product]) !!}

                            </div>
                        </div>
                    </form>
                </x-shop::form>
            </script>

            <script type="module">
                app.component('v-product', {
                    template: '#v-product-template',

                    props: ['productId'],

                    data() {
                        return {
                            isWishlist: Boolean("{{ (boolean) auth()->guard()->user()?->wishlist_items->where('channel_id', core()->getCurrentChannel()->id)->where('product_id', $product->id)->count() }}"),

                            isCustomer: '{{ auth()->guard('customer')->check() }}',

                            is_buy_now: 0,

                            is_kyc_process: 0,
                        }
                    },

                    methods: {
                        addToCart(params) {
                                let formData = new FormData(this.$refs.formData);

                                this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', formData, {
                                        headers: {
                                            'Content-Type': 'multipart/form-data'
                                        }
                                    })
                                    .then(response => {
                                        if (response.data.message) {
                                            this.$emitter.emit('update-mini-cart', response.data.data);

                                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                            
                                            if (response.data.redirect && ! this.is_kyc_process) {
                                                window.location.href = response.data.redirect;
                                            } else {
                                                window.location.href = response.data.ekyc_redirect;
                                            }
                                        } else {
                                            this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
                                        }
                                    })
                                    .catch(error => {});
                        },

                        addToWishlist() {
                            if (this.isCustomer) {
                                this.$axios.post('{{ route('shop.api.customers.account.wishlist.store') }}', {
                                        product_id: "{{ $product->id }}"
                                    })
                                    .then(response => {
                                        this.isWishlist = ! this.isWishlist;

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                    })
                                    .catch(error => {});
                            } else {
                                window.location.href = "{{ route('shop.customer.session.index')}}";
                            }
                        },

                        addToCompare(productId) {
                            /**
                            * This will handle for customers.
                            */
                            if (this.isCustomer) {
                                this.$axios.post('{{ route("shop.api.compare.store") }}', {
                                        'product_id': productId
                                    })
                                    .then(response => {
                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                    })
                                    .catch(error => {
                                        if ([400, 422].includes(error.response.status)) {
                                            this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.data.message });

                                            return;
                                        }

                                        this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message});
                                    });

                                return;
                            }

                            /**
                            * This will handle for guests.
                            */
                            let existingItems = this.getStorageValue(this.getCompareItemsStorageKey()) ?? [];

                            if (existingItems.length) {
                                if (! existingItems.includes(productId)) {
                                    existingItems.push(productId);

                                    this.setStorageValue(this.getCompareItemsStorageKey(), existingItems);

                                    this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.products.view.add-to-compare')" });
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: "@lang('shop::app.products.view.already-in-compare')" });
                                }
                            } else {
                                this.setStorageValue(this.getCompareItemsStorageKey(), [productId]);

                                this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.products.view.add-to-compare')" });
                            }
                        },

                        getCompareItemsStorageKey() {
                            return 'compare_items';
                        },

                        setStorageValue(key, value) {
                            localStorage.setItem(key, JSON.stringify(value));
                        },

                        getStorageValue(key) {
                            let value = localStorage.getItem(key);

                            if (value) {
                                value = JSON.parse(value);
                            }

                            return value;
                        },
                    },
                });
            </script>
        @endPushOnce
    </div>
</x-shop::layouts>