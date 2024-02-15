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

<footer class="mt-[36px] max-sm:mt-[30px] border-t-4 border-[#d5cfcf]">
    @if ($customization)
        <div class="flex gap-20 p-10">
            <div class="w-[370px]">
                <a
                    href="{{ route('shop.home.index') }}"
                    class="place-self-start -mt-[4px]"
                    aria-label="Bagisto "
                >
                    <img
                        src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                        width="400"
                        height="200"
                        alt="Bagisto"
                    >
                </a>
                <div class="flex flex-wrap gap-4 mt-[50px]">
                    <div class="flex gap-3 icon-address text-wrap w-[300px] !font-['Poppins']">
                        <a href="javascript:void(0)">
                            @lang('7 ADB Ave, Ortigas Center, pasig, Metro Manila')
                        </a>
                    </div>

                    <div class="flex gap-3 icon-email-footer !font-['Poppins']">
                        <a href="mailto:@lang('sample@gmail.com')">
                            @lang('sample@gmail.com')
                        </a>
                    </div>

                    <div class="flex gap-3 icon-phone !font-['Poppins']">
                        <a href="tel:@lang('+63 9456677654')">
                            @lang('+63 9456677654')
                        </a>
                    </div>
                </div>
            </div>

            <div class="pl-20 py-0 border-l-2 border-[#c9e1ed]">

                <p class="text-[30px] flex font-bold">
                    @lang('Quicklinks')
                </p>

                @if ($customization->options)
                    @foreach ($customization->options as $footerLinkSection)
                        <ul class="grid gap-[15px] text-[14px] mt-3">
                            @php
                                usort($footerLinkSection, function ($a, $b) {
                                    return $a['sort_order'] - $b['sort_order'];
                                });
                            @endphp


                            @foreach ($footerLinkSection as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">
                                        {{ $link['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>    
                    @endforeach
                @endif
            </div>

            <div class="pl-20 border-l-2 border-[#c9e1ed]">
                <div class="flex gap-4">
                    <h1 class="text-[30px] flex font-bold">
                        @lang('Follow Us')
                    </h1>
                    
                    <!-- Facebook -->
                    <div class="p-[10px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 rounded-full">
                        <a href="#" alt="facebook">
                            <img src="{{ bagisto_asset('images/facebook.svg') }}" alt="facebook">   
                        </a>
                    </div>

                    <!-- Instagram -->
                    <div class="p-[10px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 rounded-full">
                        <a href="#" alt="instagram">
                            <img src="{{ bagisto_asset('images/instagram.png') }}" alt="instagram">   
                        </a>
                    </div>

                    <!-- Youtube -->
                    <div class="p-[10px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 rounded-full">
                        <a href="#" alt="youtube">
                            <img src="{{ bagisto_asset('images/youtube.png') }}" alt="youtube" class="my-[4px]">   
                        </a>
                    </div>

                    <!-- tiktok -->
                    <div class="p-[10px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 rounded-full">
                        <a href="#" alt="tiktok">
                            <img src="{{ bagisto_asset('images/tiktok.png') }}" alt="tiktok">   
                        </a>
                    </div>
                </div>

                <!-- News Letter subscription -->
                @if (core()->getConfigData('customer.settings.newsletter.subscription'))
                    <div class="grid gap-[10px]">
                        <p class="max-w-[288px] leading-[45px] text-[20px]">
                            @lang('shop::app.components.layouts.footer.newsletter-text')
                        </p>

                        <x-shop::form
                            :action="route('shop.subscription.store')"
                            class="mt-[10px] rounded max-sm:mt-[30px]"
                        >
                            <label for="organic-search" class="sr-only">Search</label>

                            <div class="relative w-full">

                            <x-shop::form.control-group.control
                                type="email"
                                name="email"
                                class="block w-[420px] h-[50px] max-w-full px-[20px] py-[20px] pr-[110px] bg-[#e5e5e5] text-xs font-medium max-1060:w-full"
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
                                    class="absolute flex items-center h-[50px] !w-[110px] top-[0px] w-max px-[38px] py-[13px] bg-white text-[12px] text-white font-medium rtl:left-[0px] ltr:right-[0px] !bg-gradient-to-r from-[#e0165d] to-yellow-500"
                                >
                                    @lang('shop::app.components.layouts.footer.send')
                                </button>
                            </div>
                        </x-shop::form>

                        <p class="text-[14px] mt-[50px]">
                            @lang('shop::app.components.layouts.footer.subscribe-stay-touch')
                        </p>
                    </div>
                @endif
                
            </div>
        </div>
    @endif

    <div class="flex justify-between px-[60px] py-[20px] !bg-gradient-to-r from-[#e0165d] to-yellow-500">
        <p class="text-[14px] text-[#FFF]">
            @lang('shop::app.components.layouts.footer.footer-text')
        </p>
    </div>
</footer>

{!! view_render_event('bagisto.shop.layout.footer.after') !!}