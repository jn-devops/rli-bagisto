{!! view_render_event('bagisto.shop.layout.footer.before') !!}
<!--
    The category repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
-->
@inject('themeCustomizationRepository', 'Webkul\Theme\Repositories\ThemeCustomizationRepository')

<!--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
-->
@php
    $customization = $themeCustomizationRepository->findOneWhere([
        'type'       => 'footer_links',
        'status'     => 1,
        'channel_id' => core()->getCurrentChannel()->id,
    ]);
@endphp

<footer class="before:contents='' relative pt-[95px] before:absolute before:bottom-[60px] before:left-[0] before:block before:h-[270px] before:w-full before:bg-[url('../images/footer-bg.png')] before:bg-[0%_100%] before:bg-no-repeat before:[background-size:100%] lg:before:[background-size:60%]">
    <div class="flex flex-wrap justify-center px-[60px] pb-6 max-lg:px-[15px]">

        <div class="relative border-r-[1px] border-[#308BB6] px-[30px] max-1024:border-r-0 max-lg:px-[15px]">
            <img 
                class="max-h-[165px]"
                src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}" 
                alt="footer-logo"
            />

            <div class="mt-[50px] flex flex-wrap gap-3">
                <div class="flex gap-3 lg:max-w-[150px]">
                    <span class="icon-location text-[24px] max-sm:text-[14px]"></span>

                    <p class="text-[18px] max-sm:text-[14px]">
                        @lang('enclaves::app.shop.components.layouts.footer.address')
                    </p>
                </div>

                <div>
                    <div class="mb-[10px] flex gap-3">
                        <span class="icon-mail-us text-[24px] max-sm:text-[14px]"></span>

                        <a class="text-[18px] max-sm:text-[14px]" 
                            href="mailto:@lang('enclaves::app.shop.components.layouts.footer.email')"
                        >
                            @lang('enclaves::app.shop.components.layouts.footer.email')
                        </a>
                    </div>
                    
                    <div class="flex gap-3">
                        <span class="icon-contact-us text-[24px] max-sm:text-[14px]"></span>

                        <a class="text-[18px] max-sm:text-[14px]" 
                            href="phone:@lang('enclaves::app.shop.components.layouts.footer.mobile-number')"
                        >
                            @lang('enclaves::app.shop.components.layouts.footer.mobile-number')
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap max-lg:mt-[25px]">
            <div class="relative mb-[10px] flex flex-col justify-start border-r-[1px] border-[#308BB6] px-[40px] max-lg:px-[15px] max-668:border-r-0">
                
                <p class="text-[35px] font-bold max-sm:text-[20px]">
                    @lang('enclaves::app.shop.components.layouts.footer.quick-links')
                </p>

                <div class="mt-[21px] grid gap-[10px] lg:gap-3">
                    @if ($customization->options)
                        @foreach ($customization->options as $footerLinkSection)

                            @php
                                usort($footerLinkSection, function ($a, $b) {
                                    return $a['sort_order'] - $b['sort_order'];
                                });
                            @endphp

                            @foreach ($footerLinkSection as $link)
                                <a 
                                    href="{{ $link['url'] }}" 
                                    class="text-[20px] font-medium leading-[20px] max-sm:text-[14px]"
                                >
                                    {{ $link['title'] }}
                                </a>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
            
            <div class="relative flex flex-col justify-start px-[40px] max-lg:px-[15px]">
                <div class="flex flex-wrap justify-between gap-4">
                    <h1 class="flex text-[30px] font-bold max-sm:text-[20px]">
                        @lang('enclaves::app.shop.components.layouts.footer.follow-us')
                    </h1>
                    
                    @if (! empty($customization->options))
                        <div class="flex gap-[20px]">
                            @foreach ($customization->options['column_3'] as $socialLinkSection)

                                <div class="flex h-auto items-center rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                                    <a 
                                        href="{{ $socialLinkSection['url'] }}"
                                        alt="{{ $socialLinkSection['title'] }}"
                                    >
                                        @switch(strtolower($socialLinkSection['title']))
                                            @case('facebook')
                                                    <img
                                                        src="{{ bagisto_asset('images/facebook.svg') }}"
                                                        alt="facebook"
                                                    />
                                                @break

                                            @case('instagram')
                                                <img
                                                    src="{{ bagisto_asset('images/instagram.png') }}"
                                                    alt="instagram"
                                                />
                                                @break

                                            @case('youtube')
                                                <img
                                                    src="{{ bagisto_asset('images/youtube.png') }}"
                                                    alt="youtube"
                                                />
                                                @break

                                            @case('tiktok')
                                                <img
                                                    src="{{ bagisto_asset('images/tiktok.png') }}"
                                                    alt="tiktok"
                                                />
                                                @break
                                            @default
                                        @endswitch
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- News Letter subscription -->
                @if (core()->getConfigData('customer.settings.newsletter.subscription'))
                    <div class="mt-[34px] grid gap-[10px]">
                        <p class="max-w-[288px] text-[20px] max-sm:text-[14px]"> 
                            @lang('shop::app.components.layouts.footer.newsletter-text')
                        </p>

                        <x-shop::form 
                            method="POST" 
                            action="{{ route('shop.subscription.store') }}"
                            class="mt-[10px] rounded max-sm:mt-[30px]"
                            >
                            @csrf

                            <label 
                                for="organic-search"
                                class="sr-only"
                            >
                                @lang('enclaves::app.shop.components.layouts.footer.search')
                            </label>

                            <div class="relative w-full">
                                <x-shop::form.control-group.control 
                                    type="email" 
                                    name="email"
                                    class="max-1060:w-full mb-3 block h-[50px] w-full max-w-full rounded border bg-[#F4F4F4] px-3 py-2 pr-[110px] text-[20px] font-medium text-black shadow transition-all hover:border-gray-400 focus:border-gray-400 max-sm:text-[14px]"
                                    rules="required|email"
                                    label="Email"
                                    placeholder="{{ trans('enclaves::app.shop.components.layouts.footer.email-address') }}"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="email"
                                >
                                </x-shop::form.control-group.error>

                                <button 
                                    type="submit"
                                    class="absolute right-0 top-[0px] flex h-[50px] !w-[110px] items-center justify-center bg-white !bg-gradient-to-r from-[#e0165d] to-yellow-500 text-[12px] font-medium text-white ltr:right-[0px] rtl:left-[0px]"
                                >
                                    @lang('enclaves::app.shop.components.layouts.footer.subscribe')
                                </button>
                            </div>
                        </x-shop::form>

                        <p class="mt-[50px] text-[17px] max-lg:mb-[25px] max-lg:mt-[25px] max-sm:text-[14px]">
                            @lang('enclaves::app.shop.components.layouts.footer.subscribe-stay-touch')
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="flex h-[60px] items-center bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[60px]">
        <p class="z-[999] text-[18px] font-medium text-white max-sm:text-[14px]">
            @lang('enclaves::app.shop.components.layouts.footer.copyright', ['current_year'=> date('Y')])
        </p>
    </div>
</footer>