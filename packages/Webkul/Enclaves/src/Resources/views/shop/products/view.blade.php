@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')
@inject('productConditionRepository', 'Webkul\Enclaves\Repositories\ProductConditionRepository')

@php
    $avgRatings = round($reviewHelper->getAverageRating($product));

    $percentageRatings = $reviewHelper->getPercentageRating($product);

    $customAttributeValues = $productViewHelper->getAdditionalData($product);

    $attributeData = collect($customAttributeValues)->filter(fn ($item) => ! empty($item['value']));
@endphp

@push ('styles')
    <style>
        ul, ol {
            padding-left: 40px;
            list-style: disc;
        }
        ol {
            list-style: decimal;
        }
        ol li, ul li {
            margin-bottom: 10px;
        }
    </style>
@endpush

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

@push ('styles')
    <style>
        ul {
            padding-left: 40px;
            list-style: disc;
        }
    </style>
@endpush
@pushOnce('scripts')
    <script>
		document.addEventListener("DOMContentLoaded", () => {
			let img = document.querySelectorAll('.et-slider img');
            
			let active = 1;

			let prev = 0;

			let next = 2;

			let changeImage = () => {
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
			changeImage();

			let sliderInterval = setInterval(() => {
				prev = active;
				active = next;
				if (active + 1 == img.length) {
					next = 0;
				} else {
					next = active + 1;
				}

				changeImage()
			}, 5000);
		});
	</script>
@endPushOnce

<!-- Page Layout -->
<x-shop::layouts>
    <div class="container px-[60px] max-lg:px-[15px]">
        <!-- Page Title -->
        <x-slot:title>
            {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
        </x-slot>

        {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

        <!-- Breadcrumbs -->
        <x-shop::breadcrumbs name="product" :entity="$product"></x-shop::breadcrumbs>

        <!-- Product Information Vue Component -->
        <v-product ref="details" :product-id="{{ $product->id }}">
            <x-shop::shimmer.products.view/>
        </v-product>

        {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

        @pushOnce('scripts')
            <script type="text/x-template" id="v-product-template">
                <div>
                    <!-- Quick Guide Modal Popup -->
                    <div>
                        <!-- Add Options Model Form -->
                        <x-shop::modal
                            ref="quickGuideCreateModal"
                            class="rounded-[20px]"
                        >
                            <!-- Modal Header !-->
                            <x-slot:header>
                                <p class="mx-auto items-center text-[35px] font-bold text-gray-800 dark:text-white">
                                    @lang('enclaves::app.shop.product.quick-guide')
                                </p>
                            </x-slot>

                            <!-- Modal Content !-->
                            <x-slot:content>
                                <div class="grid gap-2 px-[10px] py-[10px] sm:grid-cols-1 lg:grid-cols-2">
                                    <div class="flex gap-2">
                                        <img src="{{ bagisto_asset('images/quick-view-image1.png') }}" alt="Step 1" class="h-20 w-20 rounded-[40px]">

                                        <div class="">
                                            <div class="flex gap-2">
                                            <span class="flex bg-[#C38400] text-white p-[10px] rounded-[50%] h-[40px]">1</span>
                                                <h3 class="text-[25px] font-bold">User Authentication</h3>
                                            </div>
                                            
                                            <p class="text-[20px]">To complete the user authentication using e-KYC technology, we will simply scan your ID and take a selfie.</p>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <img src="{{ bagisto_asset('images/quick-view-image2.png') }}" alt="Step 2" class="h-20 w-20 rounded-[40px]">

                                        <div class="">
                                            <div class="flex gap-2">
                                            <span class="flex bg-[#C38400] text-white p-[10px] rounded-[50%] h-[40px]">2</span>
                                                <h3 class="text-[25px] font-bold">Additional Data Form</h3>
                                            </div>
                                            
                                            <p class="text-[20px]">Fill out the client information form for your application to complete your application.</p>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <img src="{{ bagisto_asset('images/quick-view-image3.png') }}"  alt="Step 1" class="h-20 w-20 rounded-[40px]">

                                        <div class="">
                                            <div class="flex gap-2">
                                            <span class="flex bg-[#C38400] text-white p-[10px] rounded-[50%] h-[40px]">3</span>
                                                <h3 class="text-[25px] font-bold">Payment</h3>
                                            </div>
                                            
                                            <p class="text-[20px]">Finish the application by paying through Gcash or credit card.</p>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <img src="{{ bagisto_asset('images/quick-view-image4.png') }}"   alt="Step 1" class="h-20 w-20 rounded-[40px]">
                                        
                                        <div class="">
                                            <div class="flex gap-2">
                                            <span class="flex bg-[#C38400] text-white p-[10px] rounded-[50%] h-[40px]">4</span>
                                            <h3 class="text-[25px] font-bold">Pag-IBIG online sync</h3>
                                            </div>
                                            
                                            <p class="text-[20px]">Link your Pag-IBIG online account for additional loan application.</p>
                                        </div>
                                    </div>
                                </div>
                            </x-slot:content>
                        </x-shop::modal>
                    </div>
                    
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

                            <div class="mt-12 flex gap-[7px] max-lg:mt-0 max-lg:gap-y-6 max-md:flex-wrap lg:gap-[54px]">
                                <div class="w-[60%] max-md:w-full">
                                    <!-- Gallery Blade Inclusion -->
                                    @include('shop::products.view.gallery')

                                    <!-- Product Name -->
                                    {!! view_render_event('bagisto.shop.products.name.before', ['product' => $product]) !!}
                                    
                                    <h1 class="mt-[26px] text-[40px] font-bold leading-[48px] max-lg:text-[30px] max-md:leading-6">
                                        {{ $product->name }}
                                    </h1>

                                    {!! view_render_event('bagisto.shop.products.description.before', ['product' => $product]) !!}
                                        <p class="mt-[26px] text-[20px] max-lg:text-[12px] max-md:leading-6" v-html="product.description"></p>
                                    {!! view_render_event('bagisto.shop.products.description.after', ['product' => $product]) !!}
 
                                </div>

                                <div class="w-[40%] rounded-[20px] p-[50px] shadow-[0px_4px_40px_0px_rgba(220,_228,_240,_1)] max-lg:p-[25px] max-md:w-full">
                                    
                                    <!-- Price -->
                                    <div class="grid gap-[10px]">
                                        <p class="text-[20px] font-semibold max-lg:text-[15px]">
                                            @lang('enclaves::app.shop.product.contract-price')
                                        </p>
                                        
                                        <p class="text-[22px] max-lg:text-[15px]">
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

                                    @if (count($attributeData))
                                        <div class="mt-[10px] flex flex-col gap-[20px] border-b-[1px] border-[#D9D9D9] pb-[42px]">
                                            @foreach ($customAttributeValues as $customAttributeValue)
                                                @if (! empty($customAttributeValue['value']))
                                                    <div class="flex flex-wrap gap-[6px]">
                                                        <p class="text-[20px] font-bold max-lg:text-[15px]">{!! $customAttributeValue['label'] !!}: </p>

                                                        @if ($customAttributeValue['type'] == 'file')
                                                            <a 
                                                                href="{{ Storage::url($product[$customAttributeValue['code']]) }}" 
                                                                download="{{ $customAttributeValue['label'] }}"
                                                                class="text-[20px] max-lg:text-[15px]"
                                                            >
                                                                <span class="icon-download text-2xl"></span>
                                                            </a>
                                                        @elseif ($customAttributeValue['type'] == 'image')
                                                            <a 
                                                                href="{{ Storage::url($product[$customAttributeValue['code']]) }}" 
                                                                download="{{ $customAttributeValue['label'] }}"
                                                            >
                                                                <img 
                                                                    class="h-5 min-h-5 w-5 min-w-5" 
                                                                    src="{{ Storage::url($customAttributeValue['value']) }}" 
                                                                />
                                                            </a>
                                                        @else
                                                            <p class="text-[20px] max-lg:text-[15px]">
                                                                {!! $customAttributeValue['value'] !!}
                                                            </p>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    <div v-if="product.short_description" class="flex max-w-[400px] flex-col gap-[20px] border-b-[1px] border-[#D9D9D9] pb-[42px]">
                                        {!! view_render_event('bagisto.shop.products.short_description.before', ['product' => $product]) !!}

                                        <p class="mt-[25px] text-[18px] text-[#6E6E6E] max-lg:mt-[15px] max-lg:text-[12px]" v-html="product.short_description"></p>

                                        {!! view_render_event('bagisto.shop.products.short_description.after', ['product' => $product]) !!}
                                    </div>

                                    <div class="flex flex-col">
                                        @include('shop::products.view.types.configurable')
                                    </div>

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

                                    <!-- product Conditions -->
                                    <div class="mt-[20px] grid gap-[10px] rounded-lg bg-gray-100 p-4">
                                        <p 
                                            class="ml-5 text-[20px] font-bold italic leading-5 text-[#CC035C]"
                                        >
                                            @lang('enclaves::app.shop.product.checklist')
                                        </p>
                                        
                                        <div v-for="(condition, index) in productConditions"
                                            class="grid"
                                        >
                                            <div class="flex gap-2">
                                                <input 
                                                    type="checkbox"
                                                    class="peer sr-only hidden"
                                                    :id="`condition-${condition.id}`" 
                                                    v-model="checkedConditions[condition.id]"
                                                >

                                                <label
                                                    class="icon-cart peer-checked:icon-users cursor-pointer"
                                                    :for="`condition-${condition.id}`"
                                                >
                                                </label>

                                                <div
                                                    class="text-[20px] font-bold" 
                                                    v-text="`${index+1}. ${condition.heading}`">
                                                </div>
                                            </div>
                                            <div
                                                class="mt-1 ml-6 text-[16px]" 
                                                v-html="condition.description">
                                            </div>
                                        </div>
                                    </div>

                                    <span v-if="errorMessage"
                                        class="mt-1 text-xs italic text-red-500" 
                                        v-text="errorMessage">
                                    </span>
                                    <!-- product Conditions -->

                                    {!! view_render_event('bagisto.shop.products.view.add_to_cart.after', ['product' => $product]) !!}
                                    
                                    <!-- Buy Now Button -->
                                    {!! $product->button_text != '0' && $product->button_text ? $product->button_information : '' !!}

                                    {!! view_render_event('bagisto.shop.products.view.buy_now.before', ['product' => $product]) !!}
                                    <div class="flex gap-2 mt-5">
 
                                        <div
                                            class="h-[90px] leading-5 text-[20px] flex items-center rounded-[100px] bg-gray-200 px-[10px] text-[#CC035C] w-[45%]"
                                            @click="$refs.quickGuideCreateModal.toggle()"
                                        >
                                            <img
                                                class=""
                                                src="{{ bagisto_asset('images/info.png') }}" 
                                                width="30"
                                                height="30" 
                                            />

                                            @lang('enclaves::app.shop.product.quick-guide')
                                        </div>
                                        
                                        <button
                                            v-if="isAdding"
                                            class="h-[90px] leading-5 text-[20px] w-[55%] rounded-[100px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] text-center text-white"
                                            style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                        >
                                            @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.avail-now')
                                        </button>
                                        
                                        <button
                                            v-else
                                            class="h-[90px] leading-5 text-[20px] rounded-[100px] w-[55%] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] text-center text-white"
                                            @click="is_buy_now=1; is_kyc_process=1;"
                                            style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                            {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                        >
                                            @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.avail-now')
                                        </button>

                                    </div>
                                    {!! view_render_event('bagisto.shop.products.view.buy_now.after', ['product' => $product]) !!}
                                </div>
                            </div>
                        </form>
                    </x-shop::form>
                </div>
            </script>

            <script type="module">
                app.component('v-product', {
                    template: '#v-product-template',

                    props: ['productId'],

                    data() {
                        return {
                            isWishlist: Boolean("{{ (boolean) auth()->guard()->user()?->wishlist_items->where('channel_id', core()->getCurrentChannel()->id)->where('product_id', $product->id)->count() }}"),

                            isCustomer: "{{ auth()->guard('customer')->check() }}",

                            is_buy_now: 0,

                            is_kyc_process: 0,
                            
                            qty: 1,

                            product: @json($product),

                            isAdding: 0,

                            errorMessage: '',

                            productConditions: @json($productConditionRepository->findWhere(['product_id' => $product->id])),

                            checkedConditions: {},

                            errorMessage: '',
                        }
                    },

                    created() {
                        if ( this.productConditions && Array.isArray(this.productConditions)) {
                            this.productConditions.forEach(condition => {
                                this.checkedConditions[condition.id] = false;
                            });
                        }
                    },

                    computed: {
                        allConditionsChecked() {
                            return Object.values(this.checkedConditions).every(checked => checked);
                        },
                    },

                    methods: {
                            addToCart(params) {
                                debugger
                                if (! this.allConditionsChecked) {
                                    this.errorMessage = 'Please check all conditions before proceeding';

                                    return;
                                }

                                this.isAdding = 1;
                                
                                let formData = new FormData(this.$refs.formData);

                                this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', formData, {
                                        headers: {
                                            'Content-Type': 'multipart/form-data'
                                        }
                                    })
                                    .then(response => {
                                        this.isAdding = 0;

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
                                this.$axios.post("{{ route('shop.api.customers.account.wishlist.store') }}", {
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