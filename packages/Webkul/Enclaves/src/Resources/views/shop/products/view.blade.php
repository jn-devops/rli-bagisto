@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $avgRatings = round($reviewHelper->getAverageRating($product));

    $percentageRatings = $reviewHelper->getPercentageRating($product);

    $customAttributeValues = $productViewHelper->getAdditionalData($product);

    $attributeData = collect($customAttributeValues)->filter(fn ($item) => ! empty($item['value']));

    $attributeDatakeyValue = collect($attributeData)->mapWithKeys(function ($item) {
                                return [$item['code'] => $item['value']];
                            })->all();
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
            <x-shop::shimmer.products.view />
        </v-product>

        {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

        @pushOnce('scripts')
            <script type="text/x-template" id="v-product-template">
                <div>
                    <section class="py-3.5 max-sm:pt-3">
                        <div class="flex items-center justify-between gap-8 rounded-[20px] px-6 py-5 shadow-[20px_4px_54px] shadow-black/5 max-md:gap-2 max-md:border max-md:border-[#D9D9D9] max-md:px-2 max-md:py-2 max-md:shadow-none">
                            <div class="h-[70px] w-[230px] overflow-hidden max-md:h-[60px] max-md:w-[160px] max-sm:w-1/3">
                                <img
                                    class="w-full h-full object-contain object-left"
                                    src="{{asset('storage/' . $product->categories->first()->logo_path)}}"
                                    alt=""
                                    >
                            </div>
                            <div class="mr-auto h-[70px] w-[230px] overflow-hidden max-md:h-[60px] max-md:w-[160px] max-sm:w-1/3">
                                {{-- <img src="./../images/agapeya-product.png" alt="" class="h-full w-full object-contain object-left"> --}}
                            </div>
                            <a href="#" class="block px-6 py-5 text-lg font-normal text-primary underline max-md:px-2 max-sm:p-0 max-sm:text-[12px]">
            					@lang('enclaves::app.shop.product.store-details')
                            </a>
                        </div>
                    </section>
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

                            <div class="flex gap-12 max-lg:gap-6 max-md:flex-wrap">
                                <div class="sticky top-24 w-[540px] max-lg:w-1/2 max-md:static max-md:w-full">
                                    <!-- Gallery Blade Inclusion -->
                                    @include('shop::products.view.gallery')

                                </div>

                                <div class="max-md:w-full max-sm:grid">
                                    <h1 class="text-3xl font-medium text-dark max-sm:mt-6 max-sm:text-xl">{{$product->name}}</h1>
                                    @if (isset($attributeDatakeyValue['location']))
                                        <p class="mt-2 text-lg font-normal text-primary max-sm:text-sm max-sm:font-semibold">{{ $attributeDatakeyValue['location'] }}</p>
                                    @endif
                                    <div class="mt-8 flex gap-5 max-sm:-order-1 max-sm:mt-0">
                                        <div class="">
                                            <p class="text-sm font-normal text-[#8B8B8B] max-sm:text-[12px]">
					                            @lang('enclaves::app.shop.product.price-start-at')
                                            </p>
                                            <p class="homefull-text-gradient mt-1 text-xl font-bold leading-7 max-sm:mt-[2px]">
                                            {!! $product->getTypeInstance()->getPriceHtml() !!}
                                            </p>
                                        </div>
                                        <div class="w-[127px]">
                                            <p class="text-sm font-normal text-[#8B8B8B] max-sm:text-[12px]">
                            					@lang('enclaves::app.shop.product.total-unit-sold')
                                            </p>
                                            <p class="mt-1 text-xl font-normal leading-7 text-black max-sm:mt-[2px] max-sm:font-bold">200+</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        @include('shop::products.view.types.configurable')
                                    </div>

                                    <div class="flex items-center justify-center gap-7 bg-white max-[880px]:flex-wrap max-md:fixed max-md:inset-x-0 max-md:bottom-0 max-md:z-50 max-md:flex-nowrap max-md:px-6 max-md:py-4 max-md:shadow-[0px_-3px_11px] max-md:shadow-black/10 max-sm:gap-5 max-[390px]:gap-3 max-[390px]:px-4 md:mt-6 md:justify-start">
                                        <span
                                            class="flex flex-col items-center gap-1 text-sm font-normal text-primary underline max-md:text-[#8B8B8B] max-md:no-underline max-sm:text-[12px] {{ ! $product->schedule_visit_redirect_url ? 'opacity-[0.4]' : 'cursor-pointer' }}"
                                            @click="{{ $product->schedule_visit_redirect_url ? 'toggleScheduleVisit()' : '' }}"
                                            >
                                            <span>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.75 1V3.25M15.25 1V3.25M1 16.75V5.5C1 4.90326 1.23705 4.33097 1.65901 3.90901C2.08097 3.48705 2.65326 3.25 3.25 3.25H16.75C17.3467 3.25 17.919 3.48705 18.341 3.90901C18.7629 4.33097 19 4.90326 19 5.5V16.75M1 16.75C1 17.3467 1.23705 17.919 1.65901 18.341C2.08097 18.7629 2.65326 19 3.25 19H16.75C17.3467 19 17.919 18.7629 18.341 18.341C18.7629 17.919 19 17.3467 19 16.75M1 16.75V9.25C1 8.65326 1.23705 8.08097 1.65901 7.65901C2.08097 7.23705 2.65326 7 3.25 7H16.75C17.3467 7 17.919 7.23705 18.341 7.65901C18.7629 8.08097 19 8.65326 19 9.25V16.75" stroke="url(#paint0_linear_4447_6623)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <defs>
                                                    <linearGradient id="paint0_linear_4447_6623" x1="10" y1="1" x2="10" y2="19" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#D21755"/>
                                                    <stop offset="1" stop-color="#FAAA19"/>
                                                    </linearGradient>
                                                    </defs>
                                                    </svg>
                                            </span>
                                            	@lang('enclaves::app.shop.product.schedule-visit')
                                        </span>

                                        @if ($product->isSaleable(1))
                                            <button
                                                {{-- type="submit" --}}
                                                @click="toggleAvailNowVisit()"
                                                class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-9 py-[14px] text-base font-medium text-white max-sm:gap-1.5 max-sm:px-5 max-sm:py-2 max-[390px]:gap-0.5 max-[390px]:px-3 max-[390px]:text-[12px] disabled:opacity-[0.4]"
                                                {{ ! $product->avail_now_redirect_url ? 'disabled' : '' }}
                                                >
                                                <span class="font-bold">
                                                    @lang('enclaves::app.shop.product.reserve-now')
                                                </span>
                                                <span class="avail_now_price">
                                                    {!! $product->getTypeInstance()->getPriceHtml() !!}
                                                </span>
                                                <span class="max-[390px]:-ml-1 max-[390px]:origin-right max-[390px]:scale-75">
                                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M27.2509 12.6739L26.2715 12.0866C25.8541 11.8359 25.5731 11.4236 25.4452 10.9557C25.4435 10.9473 25.4418 10.9372 25.4385 10.9288C25.3072 10.4559 25.3459 9.95276 25.5849 9.52363L26.1386 8.52403C26.7057 7.50422 25.9804 6.24714 24.8125 6.22694L23.6597 6.20843C23.1717 6.19834 22.719 5.98293 22.3757 5.63795C22.3723 5.63458 22.3673 5.63122 22.3639 5.62785C22.0189 5.28287 21.8018 4.83018 21.7951 4.34216L21.7749 3.18941C21.7547 2.01983 20.4976 1.29453 19.4761 1.86165L18.4782 2.41698C18.0491 2.65427 17.5459 2.69297 17.0713 2.56339C17.0629 2.56171 17.0545 2.55834 17.0461 2.55498C16.5782 2.42708 16.1643 2.14605 15.9152 1.7287L15.3279 0.750969C14.7271 -0.250323 13.2765 -0.250323 12.6757 0.750969L12.0901 1.72534C11.8393 2.14605 11.422 2.42876 10.9508 2.55834C10.9457 2.55834 10.9407 2.56171 10.9356 2.56171C10.4594 2.69297 9.95115 2.65427 9.51866 2.4153L8.52409 1.86165C7.5026 1.29453 6.2455 2.01983 6.22531 3.18773L6.2068 4.34048C6.19838 4.8285 5.98129 5.28119 5.63631 5.62449C5.63294 5.62785 5.62958 5.6329 5.62621 5.63627C5.28123 5.98125 4.82854 6.19834 4.34051 6.20507L3.18943 6.22526C2.01985 6.24545 1.29454 7.50254 1.86166 8.52403L2.417 9.52195C2.65429 9.95108 2.69299 10.4542 2.56341 10.9288C2.56173 10.9372 2.55836 10.9456 2.555 10.9541C2.4271 11.4219 2.14606 11.8359 1.72871 12.0849L0.750975 12.6722C-0.250325 13.273 -0.250325 14.7253 0.750975 15.3244L1.72871 15.9134C2.14606 16.1625 2.42878 16.5748 2.555 17.0443C2.55836 17.0527 2.56005 17.0611 2.56341 17.0695C2.69299 17.5441 2.65429 18.0456 2.417 18.4764L1.86166 19.476C1.29622 20.4975 2.02153 21.7545 3.18943 21.7747L4.34051 21.7933C4.82854 21.8017 5.28123 22.0188 5.62621 22.3637C5.62958 22.3671 5.63294 22.3705 5.63631 22.3738C5.98298 22.7188 6.19838 23.1715 6.2068 23.6595L6.22531 24.8106C6.2455 25.9768 7.5026 26.7038 8.52409 26.1367L9.52202 25.583C9.95115 25.3441 10.4543 25.3053 10.9289 25.4366C10.9373 25.4383 10.9457 25.44 10.9541 25.4433C11.422 25.5712 11.836 25.8523 12.085 26.2696L12.6723 27.249C13.2731 28.2503 14.7237 28.2503 15.3245 27.249L15.9118 26.2696C16.1609 25.8523 16.5749 25.5712 17.0427 25.4433C17.0511 25.4417 17.0595 25.4383 17.068 25.4366C17.5408 25.3053 18.0457 25.3441 18.4748 25.583L19.4728 26.1367C20.4942 26.7038 21.7513 25.9768 21.7715 24.8106L21.79 23.6595C21.7985 23.1715 22.0156 22.7188 22.3605 22.3738C22.3639 22.3705 22.3673 22.3671 22.3706 22.3637C22.7156 22.0171 23.1683 21.8017 23.6563 21.7933L24.8074 21.7747C25.9753 21.7545 26.7023 20.4975 26.1352 19.476L25.5798 18.478C25.3426 18.0489 25.3039 17.5458 25.4334 17.0712C25.4368 17.0628 25.4385 17.0544 25.4418 17.0459C25.5697 16.5781 25.8508 16.1641 26.2681 15.9151L27.2459 15.3261C28.2505 14.7253 28.2505 13.2747 27.2509 12.6739ZM20.1459 11.5296L13.0813 18.5958C12.8793 18.7978 12.605 18.9105 12.3206 18.9105C12.0345 18.9105 11.7602 18.7978 11.5583 18.5958L7.83917 14.8768C7.41845 14.4561 7.41845 13.7745 7.83917 13.3538C8.25988 12.9331 8.94144 12.9331 9.36215 13.3538L12.3206 16.3105L18.6246 10.0083C19.0453 9.5859 19.7252 9.5859 20.1459 10.0083C20.5683 10.429 20.5683 11.1089 20.1459 11.5296Z" fill="white"/>
                                                    </svg>
                                                </span>
                                            </button>
                                        @endif
                                    </div>

                                    @if (count($attributeData))
                                        @include('shop::products.view.features')
                                    @endif

                                    @include('shop::products.view.project_details')
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
                                        type="button"
                                        @click="productQuickGuideRedirect()"
                                        class="mx-auto flex w-full items-center justify-center gap-2 divide-x rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] p-[15px] text-center text-[15px] font-normal text-white max-md:p-[10px]"
                                    >
                                        @lang('enclaves::app.shop.product.reserve-now')
                                    </button>
                                </x-slot:footer>
                            </x-enclaves-shop::modal.product-pricing>

                            <!-- Product Loan Model -->
                            <x-enclaves-shop::modal.enclave-form ref="scheduleVisitModal">
                                <!-- Modal Header -->
                                <x-slot:header>
                                    <div class="flex w-full">
                                        <h2 class="text-2xl text-[25px] font-bold max-md:text-base">
                                            @lang('Schedule a Visit')
                                        </h2>
                                    </div>
                                </x-slot:header>

                                <!-- Modal Content Id -->
                                <x-slot:content>
                                    <div class="flex h-full max-h-[60vh] flex-col gap-2 overflow-auto max-md:px-[10px]">
                                        <div class="mx-auto w-[360px] max-sm:w-full">
                                            <form action="">
                                                <div class="">
                                                    <label for="f-name" class="block text-sm font-medium text-[#374151]">
                                                        Nature of concern
                                                        <span class="text-[#B4173A]">*</span>
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="nature-of-concern"
                                                        class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10"
                                                        value="Schedule a Visit"
                                                        disabled
                                                        >
                                                </div>
                                                <div class="">
                                                    <label for="project" class="block text-sm font-medium text-[#374151]">Project <span class="text-[#B4173A]">*</span></label>
                                                    <div class="relative mt-1.5 overflow-hidden">
                                                        <select name="project" id="project" class="block w-full appearance-none rounded-lg border border-[#D1D5DB] bg-transparent px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                                            <option value="select"></option>
                                                            <option value="b" selected>Agapeya Towns</option>
                                                            <option value="c">c</option>
                                                        </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center px-2 text-primary opacity-40">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.57739 6.91009C3.90283 6.58466 4.43047 6.58466 4.7559 6.91009L9.99998 12.1542L15.2441 6.91009C15.5695 6.58466 16.0971 6.58466 16.4226 6.91009C16.748 7.23553 16.748 7.76317 16.4226 8.0886L10.5892 13.9219C10.2638 14.2474 9.73616 14.2474 9.41072 13.9219L3.57739 8.0886C3.25195 7.76317 3.25195 7.23553 3.57739 6.91009Z" fill="#6B7280"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <label for="location" class="block text-sm font-medium text-[#374151]">Locaion <span class="text-[#B4173A]">*</span></label>
                                                    <div class="relative mt-1.5 overflow-hidden">
                                                        <select name="location" id="location" class="block w-full appearance-none rounded-lg border border-[#D1D5DB] bg-transparent px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                                            <option value="select"></option>
                                                            <option value="b" selected>Agapeya Towns</option>
                                                            <option value="c">c</option>
                                                        </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center px-2 text-primary opacity-40">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.57739 6.91009C3.90283 6.58466 4.43047 6.58466 4.7559 6.91009L9.99998 12.1542L15.2441 6.91009C15.5695 6.58466 16.0971 6.58466 16.4226 6.91009C16.748 7.23553 16.748 7.76317 16.4226 8.0886L10.5892 13.9219C10.2638 14.2474 9.73616 14.2474 9.41072 13.9219L3.57739 8.0886C3.25195 7.76317 3.25195 7.23553 3.57739 6.91009Z" fill="#6B7280"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <label for="name" class="block text-sm font-medium text-[#374151]">
                                                        Name
                                                        <span class="text-[#B4173A]">*</span>
                                                    </label>
                                                    <input type="text" name="name" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                                </div>
                                                <div class="mt-5">
                                                    <label for="email" class="block text-sm font-medium text-[#374151]">Email Address <span class="text-[#B4173A]">*</span></label>
                                                    <input type="email" name="email" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                                </div>
                                                <div class="mt-5">
                                                    <label for="phone" class="block text-sm font-medium text-[#374151]">Mobile Number <span class="text-[#B4173A]">*</span></label>
                                                    <div class="flex items-center gap-2">
                                                        <p class="mt-1.5 text-sm font-normal text-[#9CA3AF]">+93</p>
                                                        <input type="text" name="phone" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <label for="Date and time" class="block text-sm font-medium text-[#374151]">Date and time <span class="text-[#B4173A]">*</span></label>
                                                    <div class="relative mt-1.5 overflow-hidden">

                                                        <input type="date" name="" id="" placeholder="Date" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">

						                                <input type="time" name="" id="" placeholder="Time" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">

                                                    </div>
                                                </div>
                                                <div class="mt-8 flex items-start gap-3">
                                                    <input id="link-checkbox" type="checkbox" value="" class="checbox-primary">
                                                    <label for="link-checkbox" class="text-[14px] font-normal text-[#000000E0]">By clicking Submit, you agree to Homeful.ph's <a href="#" class="text-[14px] font-bold text-[#000000E0]">Privacy Policy</a> and <a href="#" class="text-[14px] font-bold text-[#000000E0]">Terms of Use.</a></label>
                                                </div>
                                                <button type="submit" class="mt-5 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-sm font-medium text-white disabled:opacity-[0.4]" disabled>Submit</button>
                                            </form>
                                        </div>

                                        <hr class="mb-2 mt-1 h-px w-full border-t border-[#d9d9d9]" />
                                    </div>
                                </x-slot:content>

                            </x-enclaves-shop::modal.enclave-form>
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

                            detailAccordians:[1,0,0,0]
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

                        toggleScheduleVisit() {
                            window.location.href = '{{$product->schedule_visit_redirect_url}}';
                            {{-- this.$refs.scheduleVisitModal.toggle(); --}}
                        },

                        toggleAvailNowVisit(){
                            window.location.href = '{{$product->avail_now_redirect_url}}';
                            {{-- this.$refs.productQuickGuideModal.toggle(); --}}
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
