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

<footer class="before:contents='' relative pt-[95px] before:absolute before:bottom-[93px] before:left-[0] before:block before:h-[270px] before:w-full before:bg-[url('../images/footer-bg.png')] before:bg-[0%_100%] before:bg-no-repeat before:[background-size:60%]">
    <div class="flex justify-center gap-[80px] px-[30px] pb-[34px] max-1024:flex-wrap">

        <div class="min-w-[270px] max-w-[720px] border-r-[1px] border-[#308BB6] pr-[21px] max-1024:border-r-0">
            <img 
                class="max-h-[292px]"
                src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}" 
                alt="footer-logo"
            />

            <div class="mt-5 grid grid-cols-2 gap-x-7 gap-y-4 max-2xl:grid-cols-1">

                <div>
                    <span></span>

                    <p class="text-[18px] font-medium text-black">
                        @lang('17 ADB Ave, Ortigas Center, Pasig, Metro Manila')
                    </p>
                </div>

                <div>
                    <span></span>

                    <a class="text-[18px] font-medium text-black" href="@lang('mailto:sample@email.com')">
                        @lang('sample@email.com')
                    </a>
                </div>

                <div>
                    <span></span>

                    <a class="text-[18px] font-medium text-black" href="@lang('phone:+63 9456677654')">
                        @lang('+63 9456677654')
                    </a>
                </div>
            </div>
        </div>

        <div class="flex gap-[80px] max-768:gap-[40px] max-668:flex-wrap">
            <div class="relative flex flex-col justify-start border-r-[1px] border-[#308BB6] pr-[79px] max-668:border-r-0">
                <p class="text-[35px] font-bold">@lang('Quicklinks')</p>

                <div class="mt-[21px] grid gap-[20px]">
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
                                    class="text-[20px] font-medium leading-[20px]"
                                >
                                    {{ $link['title'] }}
                                </a>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="flex max-w-[618px] flex-col justify-start">
                <div class="flex flex-wrap justify-between gap-4">
                    <h1 class="flex text-[30px] font-bold">@lang('Follow Us')</h1>
                    <div class="flex gap-[20px]">
                        <div class="h-fit rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                            <a 
                                href="#"
                                alt="facebook"
                            >
                                <img
                                    src="{{ bagisto_asset('images/facebook.svg') }}"
                                    alt="facebook" 
                                />
                            </a>
                        </div>

                        <div class="h-fit rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                            <a 
                                href="#"
                                alt="instagram"
                            >
                                <img
                                    src="{{ bagisto_asset('images/instagram.png') }}"
                                    alt="instagram"
                                />
                            </a>
                        </div>

                        <div class="h-fit rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                            <a 
                                href="#"
                                alt="youtube"
                            >
                                <img
                                    src="{{ bagisto_asset('images/youtube.png') }}"
                                    alt="youtube" class="my-[4px]"
                                />
                            </a>
                        </div>

                        <div class="h-fit rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px]">
                            <a 
                                href="#"
                                alt="tiktok"
                            >
                                <img
                                    src="{{ bagisto_asset('images/tiktok.png') }}"
                                    alt="tiktok"
                                />
                            </a>
                        </div>
                    </div>
                </div>

                <!-- News Letter subscription -->
                @if (core()->getConfigData('customer.settings.newsletter.subscription'))
                    <div class="mt-[34px] grid gap-[10px]">

                        <p class="max-w-[288px] text-[20px]"> 
                            @lang('shop::app.components.layouts.footer.newsletter-text')
                        </p>

                        <x-shop::form 
                            novalidate="" 
                            method="POST" 
                            action="http://192.168.15.214/rli-bagisto/public/subscription"
                            class="mt-[10px] rounded max-sm:mt-[30px]"
                        >
                            <input 
                                type="hidden" 
                                name="_token" 
                                autocomplete="off"
                                value="vWctccGC1j64MDe8GQKSMgv0uVXceBXhROSZeUxh"
                            />

                            <label 
                                for="organic-search"
                                class="sr-only"
                            >
                                Search
                            </label>

                            <div class="relative w-full">
                                <x-shop::form.control-group.control 
                                    type="email" 
                                    name="email"
                                    class="max-1060:w-full mb-3 block h-[50px] w-full max-w-full rounded border bg-[#F4F4F4] px-3 py-2 pr-[110px] text-[20px] font-medium text-black shadow transition-all hover:border-gray-400 focus:border-gray-400"
                                    rules="required|email"
                                    label="Email"
                                    placeholder="Email Address"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="email"
                                >
                                </x-shop::form.control-group.error>

                                <button 
                                    type="submit"
                                    class="absolute justify-center right-0 top-[0px] flex h-[50px] !w-[110px] items-center bg-white !bg-gradient-to-r from-[#e0165d] to-yellow-500 text-[12px] font-medium text-white ltr:right-[0px] rtl:left-[0px]"
                                >
                                    @lang('shop::app.components.layouts.footer.subscribe')
                                </button>
                            </div>

                        </x-shop::form>

                        <p class="mt-[50px] text-[17px]"> @lang('shop::app.components.layouts.footer.subscribe-stay-touch')
                        </p>
                    </div>
                @endif
            </div>
        </div>

    </div>
    <div class="bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[86px] py-[33px] max-sm:px-[26px] max-sm:py-[16px]">
        <p class="z-[999] text-[18px] font-medium text-white max-sm:text-[14px]">
            @lang('shop::app.components.layouts.footer.footer-text')
        </p>
    </div>
</footer>