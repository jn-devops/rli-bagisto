@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $avgRatings = round($reviewHelper->getAverageRating($product));

    $percentageRatings = $reviewHelper->getPercentageRating($product);

    $customAttributeValues = $productViewHelper->getAdditionalData($product);

    $attributeData = collect($customAttributeValues)->filter(fn ($item) => ! empty($item['value']));
@endphp

<!-- SEO Meta Content -->
@push('meta')
    <meta 
        name="description" 
        content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"
    />

    <meta 
        name="keywords" 
        content="{{ $product->meta_keywords }}"
    />

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {{ app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) }}
        </script>
    @endif

    <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

    <meta 
        name="twitter:card" 
        content="summary_large_image"
    />

    <meta 
        name="twitter:title" 
        content="{{ $product->name }}" 
    />

    <meta 
        name="twitter:description" 
        content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}"
    />

    <meta 
        name="twitter:image:alt" 
        content="" 
    />

    <meta 
        name="twitter:image" 
        content="{{ $productBaseImage['medium_image_url'] }}"
    />

    <meta 
        property="og:type" 
        content="og:product" 
    />

    <meta 
        property="og:title" 
        content="{{ $product->name }}"
    />

    <meta 
        property="og:image" 
        content="{{ $productBaseImage['medium_image_url'] }}" 
    />

    <meta 
        property="og:description" 
        content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" 
    />

    <meta 
        property="og:url" 
        content="{{ route('shop.product_or_category.index', $product->url_key) }}" 
    />
@endPush

@push ('styles')
    <style>
        ul {
            padding-left: 40px;
            list-style: disc;
        }

        .product-price p {
            color: black !important;
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

                            <div class="mt-12 flex gap-2 max-lg:mt-0 max-lg:gap-y-6 max-md:flex-wrap lg:gap-[54px]">
                                <div class="min-w-[50%] max-md:w-full">
                                    <!-- Gallery Blade Inclusion -->
                                    @include('shop::products.view.gallery')

                                    <!-- Product description -->
                                    {!! view_render_event('bagisto.shop.products.description.before', ['product' => $product]) !!}
                                        <h3 class="hidden pt-[23px] text-[15px] font-normal leading-[18px] text-[#8B8B8B] sm:flex sm:text-[20px] sm:leading-[50px]">
                                            Product Description
                                        </h3>
                                        
                                        <p class="text-xl max-lg:text-[12px] max-md:leading-6" v-html="product.description"></p>
                                    {!! view_render_event('bagisto.shop.products.description.after', ['product' => $product]) !!}
                                </div>

                                <div class="top-12 h-fit max-w-[781px] flex-col rounded-[20px] px-[38px] py-[46px] shadow-[0px_4px_40px_0px_rgba(220,_228,_240,_1)] max-md:min-w-[50%] max-sm:p-[25px] md:flex">
                                    <!-- Price -->
                                    <div class="grid grid-cols-2 gap-y-5 max-md:grid-cols-1">
                                        <div class="flex w-[180px] flex-col gap-4 pt-0.5">
                                            <p class="text-[20px] font-normal leading-[25px] text-[#8B8B8B] max-sm:text-[18px]">
                                                @lang('enclaves::app.shop.product.contract-price')
                                            </p>

                                            <p class="product-price text-xl font-normal text-black max-sm:text-lg">
                                                <div class="price-in-final text-[25px]">
                                                    {!! $product->getTypeInstance()->getPriceHtml() !!}
                                                </div>
                                            </p>
                                        </div>

                                        <!-- reservation fee -->
                                        <div class="flex flex-col gap-3 break-words">
                                            {!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

                                            {!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}
                                        </div>
                                    </div>

                                    <hr class="mb-6 mt-10 h-px border-t border-[#D9D9D9]" />

                                    <!-- Short Description -->
                                    <div v-if="product.short_description">
                                        {!! view_render_event('bagisto.shop.products.short_description.before', ['product' => $product]) !!}

                                        <p 
                                            class="max-lg:text-small mt-6 text-base text-[#6E6E6E] max-lg:mt-4" 
                                            v-html="product.short_description"
                                        ></p>

                                        {!! view_render_event('bagisto.shop.products.short_description.after', ['product' => $product]) !!}
                                    </div>

                                    <hr class="mb-6 mt-10 h-px border-t border-[#D9D9D9]" />

                                    <!-- Product Option -->
                                    <div class="flex flex-col">
                                        @include('shop::products.view.types.configurable')
                                    </div>

                                    <!-- button -->
                                    <div class="flex items-center gap-4 max-md:hidden max-md:flex-wrap">
                                        <button
                                            type="button"
                                            @click="productLoan()"
                                            class="mx-auto block h-full w-full text-nowrap rounded-full bg-[#ffe39c] p-[15px] text-center text-[20px] font-normal tracking-tighter text-[#C38400] underline underline-offset-2 md:text-[15px]"
                                            >
                                            @lang('enclaves::app.shop.product.load-calculator')
                                        </button>

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
                                                @click="is_buy_now=1; is_kyc_process=1;"
                                                class="mx-auto flex items-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] text-center text-[15px] font-normal text-[#C38400]"
                                                style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                                {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                            >
                                                <span class="max-md:whitespace-wrap flex flex-col gap-1 whitespace-nowrap py-[10px] pl-[10px] text-left text-[15px] font-normal tracking-tighter text-white">
                                                    <p class="processing_fee_btn">{{ core()->formatPrice($product->processing_fee) }}</p>

                                                    <span>
                                                        @lang('enclaves::app.shop.product.processing')
                                                    </span>
                                                </span>

                                                <span class="min-md:whitespace-nowrap max-md:whitespace-wrap text-nowrap px-[10px] py-[10px] tracking-tighter text-white underline underline-offset-2">
                                                    @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.reserve-now')
                                                </span>
                                            </button>
                                        {!! view_render_event('bagisto.shop.products.view.buy_now.after', ['product' => $product]) !!}
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile button -->
                            <div 
                                id="show-div"
                                class="fixed bottom-0 z-[9999] -ml-[15px] w-full border-t-2 bg-white p-[15px] max-md:p-[10px] md:hidden"
                                >
                                <div class="flex items-center gap-2">
                                    <button
                                        type="button"
                                        @click="productLoan()"
                                        class="mx-auto block h-full w-full text-nowrap rounded-full bg-[#ffe196ad] p-[10px] text-center text-[10px] font-normal tracking-tighter text-[#ff6200] underline underline-offset-2 md:text-[15px]"
                                        >
                                        @lang('enclaves::app.shop.product.load-calculator')
                                    </button>

                                    <!-- Buy Now Button -->
                                    {!! $product->button_text != '0' && $product->button_text ? $product->button_information : '' !!}

                                    {!! view_render_event('bagisto.shop.products.view.buy_now.before', ['product' => $product]) !!}
                                        <button
                                            @click="is_buy_now=1; is_kyc_process=1;"
                                            class="mx-auto flex items-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] text-center text-[10px] font-normal text-[#C38400]"
                                            style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                            {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                        >
                                            <span class="max-md:whitespace-wrap flex flex-col gap-1 whitespace-nowrap py-[10px] pl-[10px] text-left text-[10px] font-normal tracking-tighter text-white">
                                                <p class="processing_fee_btn text-[15px]">{{ core()->formatPrice($product->processing_fee) }}</p>

                                                <span>
                                                    @lang('enclaves::app.shop.product.processing')
                                                </span>
                                            </span>

                                            <span class="min-md:whitespace-nowrap max-md:whitespace-wrap text-nowrap px-[10px] py-[10px] tracking-tighter text-white underline underline-offset-2">
                                                @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.reserve-now')
                                            </span>
                                        </button>
                                    {!! view_render_event('bagisto.shop.products.view.buy_now.after', ['product' => $product]) !!}
                                </div>
                            </div>

                            <!-- Quick Guide -->
                            <x-enclaves-shop::modal.product-pricing ref="productQuickGuideModal">
                                <!-- Modal Header -->
                                <x-slot:header>
                                    <div class="flex w-full justify-center">
                                        <h2 class="text-[25px] font-bold max-md:text-[10px]">
                                            @lang('Quick Guide')
                                        </h2>
                                    </div>
                                </x-slot:header>

                                <!-- Modal Content Id -->
                                <x-slot:content>
                                    <div class="flex h-[320px] flex-col gap-2 overflow-auto px-[50px] max-md:px-[10px] md:gap-5">
                                        <div class="flex items-start gap-5">
                                            <img 
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]" 
                                                src="{{ bagisto_asset('images/phone1.png') }}" />

                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('1')
                                                </div>
                                            <div class="flex flex-col gap-2">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Register')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Provide your email address and mobile number.')</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-5">
                                            <img 
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]" 
                                                src="{{ bagisto_asset('images/phone2.png') }}" 
                                            />
                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('2')
                                                </div>
                                            <div class="flex flex-col gap-3">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Verify your Identity')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Scan a valid Government Id and complete with a selfie')</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-5">
                                            <img 
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]" 
                                                src="{{ bagisto_asset('images/phone3.png') }}" 
                                            />
                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('3')
                                                </div>
                                            <div class="flex flex-col gap-3">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Complete Data Form')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Fill-out the Buyer Information Sheet.')</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-5">
                                            <img 
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]" 
                                                src="{{ bagisto_asset('images/phone4.png') }}" 
                                            />
                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('4')
                                                </div>
                                            <div class="flex flex-col gap-3">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Pay Online')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Select from available payment option')</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-5">
                                            <img 
                                                class="h-[90px] w-[90px] rounded-full object-cover max-md:h-[50px] max-md:w-[60px]" 
                                                src="{{ bagisto_asset('images/phone5.png') }}" 
                                            />
                                                <div class="flex h-[24px] w-[24px] min-w-[24px] items-center justify-center rounded-full bg-[#1973E8] text-[15px] font-normal text-white max-md:h-[20px] max-md:w-[20px] max-md:min-w-[20px] max-md:text-[10px]">
                                                    @lang('5')
                                                </div>
                                            <div class="flex flex-col gap-3">
                                                <p class="text-[20px] font-bold max-md:text-[15px]">@lang('Get Qualified')</p>
                                                <p class="text-[15px] font-normal max-md:text-[10px]">@lang('Wait for notification via SMS and Email')</p>
                                            </div>
                                        </div>
                                    </div>
                                </x-slot:content>

                                <!-- Modal Footer -->
                                <x-slot:footer>
                                    <button
                                        @click="productQuickGuideRedirect()"
                                        class="mx-auto flex w-full items-center justify-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] p-[15px] text-center text-[15px] font-normal text-white max-md:p-[10px]"
                                    >
                                        @lang('enclaves::app.shop.product.reserve-now')
                                    </button>
                                </x-slot:footer>
                            </x-enclaves-shop::modal.product-pricing>

                            <!-- Product Loan Model -->
                            <x-enclaves-shop::modal.product-pricing ref="productLoanModal">
                                <!-- Modal Header -->
                                <x-slot:header>
                                    <div class="flex w-full justify-center">
                                        <h2 class="text-2xl text-[25px] font-bold max-md:text-base">
                                            @lang('Loan Calculator')
                                        </h2>
                                    </div>
                                </x-slot:header>

                                <!-- Modal Content Id -->
                                <x-slot:content>
                                    <div class="flex h-[320px] flex-col gap-2 overflow-auto px-[50px] max-md:px-[10px]">
                                        <hr class="mb-2 mt-0 h-px w-full border-t border-[#d9d9d9]" />

                                        <span class="flex flex-col gap-0.5 py-2.5 md:hidden">
                                            <p class="text-[15px] font-normal text-[#8b8b8b]">
                                                @lang('Selling price')
                                            </p>

                                            <span class="text-sm font-semibold text-black"> 
                                                @lang('₱10,000')
                                            </span>

                                            <p class="text-xs font-normal text-[#8b8b8b]">
                                                @lang('Total Contract Price')
                                            </p>
                                        </span>

                                        <p class="text-[15px] font-normal text-[#8b8b8b]">
                                            @lang('Sample Computation')
                                        </p>
                                        
                                        <div class="flex w-full items-center justify-between gap-4 rounded-full border border-[#D9D9D9] bg-white px-[20px] py-[10px] max-md:px-[10px]">
                                            <p class="text-[20px] font-normal max-md:text-[14px]">
                                                @lang('Years')
                                            </p>
                                                
                                            <p class="flex items-center gap-1.5 text-[20px] font-normal text-[#CC035C] max-md:text-[14px]">
                                                @lang('30 years')
                                                
                                                <svg
                                                    width="20"
                                                    height="12"
                                                    viewBox="0 0 20 12"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                    d="M9.66732 11.3781L0.703827 2.36689C0.0751711 1.73489 0.52645 0.659683 1.41787 0.663007L18.8104 0.727855C19.6853 0.731117 20.1345 1.77702 19.5344 2.41372L11.1039 11.3586C10.7164 11.7697 10.0657 11.7786 9.66732 11.3781Z"
                                                    fill="#CC035C"
                                                    />
                                                </svg>
                                            </p>
                                        </div>

                                        <div class="mb-[15px] mt-[15px] flex items-center gap-2 rounded-[10px] bg-[#f6faff] px-6 py-6 max-md:mb-[10px] max-md:mt-[10px]">
                                            <div class="flex flex-col gap-px">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('₱840,000')</p>
                                                <p class="text-nowrap text-[15px] font-normal text-[#b8b8b8]">@lang('Total Contract Price')</p>
                                            </div>

                                            <div class="flex flex-col gap-px">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('₱80,000')</p>
                                                <p class="text-nowrap text-[15px] font-normal text-[#b8b8b8]">@lang('Processing Fee')</p>
                                            </div>

                                            <div class="hidden flex-col gap-px md:flex">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('₱60,000')</p>
                                                <p class="text-nowrap text-[15px] font-normal text-[#b8b8b8]">@lang('Monthly DP')</p>
                                            </div>
                                        </div>

                                        <div class="flex max-w-full items-center gap-8 md:hidden">
                                            <div class="flex w-full flex-col gap-2.5">
                                                <p class="text-[15px] font-normal text-[#b8b8b8] md:text-xl">Reservation Date</p>

                                                <p class="w-full rounded-full bg-[#f6faff] px-[18px] py-[19px] text-sm font-bold text-[#000] md:text-xl">May 27, 2024</p>
                                            </div>

                                            <div class="flex w-full flex-col gap-2.5">
                                                <p class="text-[15px] font-normal text-[#b8b8b8] md:text-xl">Reservation Date</p>

                                                <p class="w-full rounded-full bg-[#f6faff] px-[18px] py-[19px] text-sm font-bold text-[#000] md:text-xl">May 27, 2024</p>
                                            </div>
                                        </div>

                                        <div class="ml-[38px] hidden max-w-fit items-center gap-8 md:flex">
                                            <div class="flex flex-col gap-px">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('May 27, 2024')</p>
                                                <p class="text-[15px] font-normal text-[#b8b8b8]">@lang('Reservation Date')</p>
                                            </div>

                                            <div class="flex flex-col gap-px">
                                                <p class="text-[15px] font-bold text-[#000]">@lang('May 27, 2024')</p>
                                                <p class="text-[15px] font-normal text-[#b8b8b8]">@lang('Reservation Date')</p>
                                            </div>
                                        </div>

                                        <p class="flex items-center gap-px pt-[23px] text-[15px] font-normal tracking-tighter text-[#1973e8]">
                                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.0001 2.16675C7.02623 2.16675 2.16675 7.02623 2.16675 13.0001C2.16675 18.9739 7.02623 23.8334 13.0001 23.8334C18.9739 23.8334 23.8334 18.9739 23.8334 13.0001C23.8334 7.02623 18.9739 2.16675 13.0001 2.16675ZM13.0001 3.79175C18.0951 3.79175 22.2084 7.90503 22.2084 13.0001C22.2084 18.0951 18.0951 22.2084 13.0001 22.2084C7.90503 22.2084 3.79175 18.0951 3.79175 13.0001C3.79175 7.90503 7.90503 3.79175 13.0001 3.79175ZM13.0001 7.58341C12.402 7.58341 11.9167 8.06866 11.9167 8.66675C11.9167 9.26484 12.402 9.75008 13.0001 9.75008C13.5982 9.75008 14.0834 9.26484 14.0834 8.66675C14.0834 8.06866 13.5982 7.58341 13.0001 7.58341ZM12.9874 11.3638C12.5388 11.3708 12.1805 11.739 12.1876 12.1876V18.1459C12.1833 18.4393 12.3371 18.7116 12.591 18.8597C12.8435 19.0064 13.1567 19.0064 13.4092 18.8597C13.6631 18.7116 13.8168 18.4393 13.8126 18.1459V12.1876C13.8154 11.9675 13.7294 11.7559 13.5742 11.6008C13.419 11.4456 13.2074 11.3596 12.9874 11.3638Z"
                                                    fill="#1973E8"
                                                />
                                            </svg>

                                            @lang('Final computation is based on approve amount from Pag-IBIG')
                                        </p>

                                        <hr class="mb-2 mt-1 h-px w-full border-t border-[#d9d9d9]" />
                                    </div>
                                </x-slot:content>

                                <!-- Modal Footer -->
                                <x-slot:footer class="px-1 py-1">
                                    <div class="mb-3 flex items-center gap-2">
                                        <div class="mx-auto flex w-full flex-col items-start justify-center gap-[7px] rounded-full px-3 text-[15px] font-normal leading-3 text-white lg:mt-auto">
                                            <span class="text-xl font-semibold text-black"> 
                                                @lang('₱10,000')
                                            </span>
                                            
                                            <span class="whitespace-nowrap text-[15px] font-normal tracking-tighter text-[#8b8b8b]">
                                                @lang('Processing Fee')
                                            </span>
                                        </div>

                                        <button
                                            v-if="isAdding"
                                            style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                            class="mx-auto flex w-full cursor-not-allowed items-center justify-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#f58fbc_7.47%,_#fde4af_98.92%)] p-[10px] text-center text-[15px] font-normal text-white"
                                            disabled
                                        >
                                            @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.reserve-now')
                                        </button>

                                        <button
                                            v-else
                                            @click="is_buy_now=1; is_kyc_process=1;"
                                            style="color: {{ $product->button_color_text }}; background-color: {{ $product->button_background_color }}; border: {{ $product->button_border_color != '0' && $product->button_border_color ? '3px solid ' . $product->button_border_color: '' }}"
                                            class="mx-auto flex w-full items-center justify-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] p-[15px] text-center text-[15px] font-normal text-white"
                                            {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                        >
                                            @lang($product->button_text != '0' && $product->button_text ? $product->button_text : 'enclaves::app.shop.product.reserve-now')
                                        </button>
                                    </div>
                                </x-slot:footer>
                            </x-enclaves-shop::modal.product-pricing>
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
                        }
                    },

                    methods: {
                        productQuickGuideRedirect() {
                            if (this.product.ekyc_redirect_uri) {   
                                window.location.href = this.product.ekyc_redirect_uri;
                            } else {
                                this.$emitter.emit('add-flash', { type: 'warning', message: 'URL Not Found!' });
                            }
                        },

                        productLoan() {
                            this.$refs.productLoanModal.toggle();
                        },

                        addToCart(params) {
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
                                        
                                        this.$refs.productQuickGuideModal.toggle();

                                        /**
                                         * 
                                         * NOTE: FOR FUTURE USE. DON'T REMOVE IT.
                                            if (this.product.ekyc_redirect_uri) {
                                                window.location.href = this.product.ekyc_redirect_uri;
                                            } else {
                                                if (response.data.redirect && ! this.is_kyc_process) {
                                                    window.location.href = response.data.redirect;
                                                } else {
                                                    window.location.href = response.data.ekyc_redirect;
                                                }
                                            } 
                                        **/
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