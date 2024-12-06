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
'type' => 'footer_links',
'status' => 1,
'channel_id' => core()->getCurrentChannel()->id,
]);
@endphp

<footer class="before:contents='' relative z-10 before:absolute before:inset-0 before:z-[-1] before:bg-[url('./../images/footer-bg.png')] before:bg-cover before:bg-no-repeat">
    <div class="container">
        <div class="flex justify-between gap-2 pt-28 max-sm:flex-col max-sm:gap-5">
            <div class="">
                <p class="text-3xl font-bold text-dark">
                    @lang('enclaves::app.shop.components.layouts.footer.contact-us')
                </p>
                <div class="mt-7 flex items-center gap-4">
                    <span class="icon-email text-2xl text-primary"></span>
                    <a
                        class="text-[20px] font-normal text-dark"
                        href="mailto:@lang('enclaves::app.shop.components.layouts.footer.email')"
                        >
                        @lang('enclaves::app.shop.components.layouts.footer.email')
                    </a>
                </div>
                <div class="mt-7 flex items-center gap-4">
                    <span class="icon-contact text-2xl text-primary"></span>
                    <a
                        class="text-[20px] font-normal text-dark"
                        href="phone:@lang('enclaves::app.shop.components.layouts.footer.mobile-number')"
                        >
                        @lang('enclaves::app.shop.components.layouts.footer.mobile-number')
                    </a>
                </div>
            </div>
            <div class="">
                @if (! empty($customization->options)
                && isset($customization->options['column_3']))

                <p class="text-2xl font-normal text-dark">
                    @lang('enclaves::app.shop.components.layouts.footer.follow-us')
                </p>

                <div class="mt-9 flex gap-10 max-md:gap-4">
                    @foreach ($customization->options['column_3'] as $socialLinkSection)
                    <a
                        href="{{ $socialLinkSection['url'] }}"
                        alt="{{ $socialLinkSection['title'] }}"
                        class="flex h-20 w-20 items-center justify-center rounded-full !bg-gradient-to-r from-[#e0165d] to-yellow-500 p-[10px] max-lg:h-16 max-lg:w-16 max-md:h-12 max-md:w-12">

                        @switch(strtolower($socialLinkSection['title']))
                        @case('facebook')
                        <img
                            src="{{ bagisto_asset('images/facebook.svg') }}"
                            alt="facebook" />
                        @break

                        @case('instagram')
                        <img
                            src="{{ bagisto_asset('images/instagram.png') }}"
                            alt="instagram" />
                        @break

                        @case('youtube')
                        <img
                            src="{{ bagisto_asset('images/youtube.png') }}"
                            alt="youtube" />
                        @break

                        @case('tiktok')
                        <img
                            src="{{ bagisto_asset('images/tiktok.png') }}"
                            alt="tiktok" />
                        @break
                        @default
                        @endswitch
                    </a>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
    </div>
    <div
        class="mt-14 bg-[linear-gradient(91deg,_#CC035C_7.47%,_#FCB115_98.92%)] py-5">
        <div class="container">
            <p class="text-lg font-bold text-white"> @lang('enclaves::app.shop.components.layouts.footer.copyright', ['current_year'=> date('Y')])</p>
        </div>
    </div>
</footer>
