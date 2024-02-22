{!! view_render_event('bagisto.shop.layout.footer.before') !!}
<!--
    The category repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
-->
@inject('themeCustomizationRepository', 'Webkul\Shop\Repositories\ThemeCustomizationRepository')

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

<footer class="pt-[95px] relative before:contents='' before:bg-[url('../images/footer-bg.png')] before:bottom-[93px] before:bg-[0%_100%] before:block before:h-[270px] before:[background-size:60%] before:absolute before:w-full before:bg-no-repeat before:left-[0]">
    <div class="px-[30px] pb-[34px] flex gap-[80px] max-1024:flex-wrap justify-center">

        <div class="border-r-[1px] border-[#308BB6] max-w-[720px] pr-[21px] min-w-[270px] max-1024:border-r-0">
            <img 
                class="max-h-[292px]"
                src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}" 
                alt="footer-logo"
            />

            <div class="grid grid-cols-2 mt-5 gap-x-7 gap-y-4 max-2xl:grid-cols-1">

                <div class="">
                    <span class=""></span>

                    <p class="text-[18px] font-medium text-black">17 ADB Ave, Ortigas Center, Pasig, Metro Manila</p>
                </div>

                <div class="">
                    <span class=""></span>

                    <a class="text-[18px] font-medium text-black" href="mailto:sample@email.com">sample@email.com</a>
                </div>

                <div class="">
                    <span class=""></span>

                    <a class="text-[18px] font-medium text-black" href="phone:+63 9456677654">+63 9456677654</a>
                </div>
            </div>
        </div>

        <div class="flex gap-[80px] max-768:gap-[40px] max-668:flex-wrap">
            <div class="pr-[79px] border-r-[1px] border-[#308BB6] flex flex-col justify-start max-668:border-r-0">
                <p class="text-[35px] font-bold">@lang('Quicklinks')</p>

                <div class="grid gap-[20px] mt-[21px]">
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

            <div class="flex flex-col justify-start max-w-[618px]">
                <div class="flex gap-4 justify-between flex-wrap">
                    <h1 class="text-[30px] flex font-bold">@lang('Follow Us')</h1>
                    <div class="flex gap-[20px]">
                        <div class="p-[10px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 rounded-full h-fit">
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

                        <div class="p-[10px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 rounded-full h-fit">
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

                        <div class="p-[10px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 rounded-full h-fit">
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

                        <div class="p-[10px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 rounded-full h-fit">
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
                    <div class="grid gap-[10px] mt-[34px]">

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
                                    class="text-[20px] font-medium text-black w-full mb-3 py-2 px-3 shadow border rounded transition-all hover:border-gray-400 focus:border-gray-400 block h-[50px] max-w-full pr-[110px] bg-[#F4F4F4] max-1060:w-full"
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
                                    class="absolute flex right-0 items-center h-[50px] !w-[110px] top-[0px] w-max px-[38px] py-[13px] bg-white text-[12px] text-white font-medium rtl:left-[0px] ltr:right-[0px] !bg-gradient-to-r from-[#e0165d] to-yellow-500"
                                >
                                    @lang('shop::app.components.layouts.footer.send')
                                </button>
                            </div>

                        </x-shop::form>

                        <p class="text-[17px] mt-[50px]"> @lang('shop::app.components.layouts.footer.subscribe-stay-touch')
                        </p>
                    </div>
                @endif
            </div>
        </div>

    </div>
    <div class="py-[33px] px-[86px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] max-sm:px-[26px] max-sm:py-[16px]">
        <p class="text-[18px] font-medium text-white z-[999] max-sm:text-[14px]">
            @lang('shop::app.components.layouts.footer.footer-text')
        </p>
    </div>
</footer>