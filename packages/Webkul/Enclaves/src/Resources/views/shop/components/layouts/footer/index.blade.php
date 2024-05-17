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

<footer class="before:contents='' relative pt-[20px] before:absolute before:bottom-[60px] before:left-[0] before:block before:h-[270px] before:w-full before:bg-[url('../images/footer-right.png')] before:bg-[100%_100%] before:bg-no-repeat before:[background-size:100%] lg:before:[background-size:40%]">

    <div class="before:contents='' relative pt-[20px] before:absolute before:bottom-[60px] before:left-[0] before:block before:h-[270px] before:w-full before:bg-[url('../images/footer-left.png')] before:bg-[35%_100%] before:bg-no-repeat before:[background-size:80%] max-lg:before:bg-[35%_0%] lg:before:[background-size:25%]">

        <div class="relative mb-[15px] flex lg:container max-lg:justify-center">
            <img 
                class="max-h-[165px] max-lg:w-[120px]"
                src="{{ core()->getCurrentChannel()->footer_logo_url ?? bagisto_asset('images/logo.svg') }}" 
                alt="footer-logo"
            />
        </div>

        <div class="relative flex flex-wrap justify-between gap-[10px] lg:container">
            <div class="flex flex-wrap items-center justify-between gap-[10px] pr-[30px] max-lg:gap-[5px] max-lg:p-[30px]">
                <div class="flex max-w-[300px] gap-3">
                    <span class="icon-location text-[24px] max-sm:text-[12px]"></span>

                    <p class="text-[18px] max-sm:text-[12px]">
                        @lang('enclaves::app.shop.components.layouts.footer.address')
                    </p>
                </div>

                <div class="flex gap-3">
                    <span class="icon-mail-us text-[24px] max-sm:text-[12px]"></span>

                    <a class="text-[18px] max-sm:text-[12px]" 
                        href="mailto:@lang('enclaves::app.shop.components.layouts.footer.email')"
                    >
                        @lang('enclaves::app.shop.components.layouts.footer.email')
                    </a>
                </div>

                <div class="flex gap-3">
                    <span class="icon-contact-us text-[24px] max-sm:text-[12px]"></span>

                    <a class="text-[18px] max-sm:text-[12px]" 
                        href="phone:@lang('enclaves::app.shop.components.layouts.footer.mobile-number')"
                    >
                        @lang('enclaves::app.shop.components.layouts.footer.mobile-number')
                    </a>
                </div>
            </div>
            
            <div class="mb-[25px] flex px-[30px]">
                <div class="relative gap-3">
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
            </div>
        </div>

        <div class="flex h-[60px] items-center bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[60px]">
            <p class="z-[999] text-[18px] font-medium text-white max-sm:text-[12px]">
                @lang('enclaves::app.shop.components.layouts.footer.copyright', ['current_year'=> date('Y')])
            </p>
        </div>
    </div>
</footer>