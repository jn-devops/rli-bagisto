{!! view_render_event('bagisto.shop.layout.features.before') !!}

<!-- Features -->
<div class="container mt-20 max-lg:px-[30px] max-lg:mt-[30px]">
    <div class="flex gap-[25px] justify-center max-lg:flex-wrap">
        <div class="flex items-center gap-[20px]">
            <span class="icon-truck flex items-center justify-center w-[60px] h-[60px] bg-white border border-black rounded-full text-[42px] text-navyBlue p-[10px]"></span>

            <div class="">
                <p class="text-[16px] font-medium font-dmserif">
                    @lang('enclaves::app.shop.components.layouts.header.features.free-shipping')
                </p>

                <p class="text-[14px] font-medium mt-[10px] text-[#6E6E6E] max-w-[217px]">
                    @lang('enclaves::app.shop.components.layouts.header.features.free-shipping-desc')
                </p>
            </div>
        </div>

        <div class="flex items-center gap-[20px]">
            <span class="icon-support flex items-center w-[60px] h-[60px] bg-white p-[10px] justify-center border border-black rounded-full text-[42px] text-navyBlue"></span>

            <div class="">
                <p class="text-[16px] font-medium font-dmserif">
                    @lang('enclaves::app.shop.components.layouts.header.features.product-replace')
                </p>

                <p class="text-[14px] font-medium mt-[10px] text-[#6E6E6E] max-w-[217px]">
                    @lang('enclaves::app.shop.components.layouts.header.features.product-replace-desc')
                </p>
            </div>
        </div>

        <div class="flex items-center gap-[20px]">
            <span class="icon-dollar-sign flex items-center rounded-full w-[60px] h-[60px] p-[10px] justify-center border border-black bg-white text-[42px] text-navyBlue"></span>

            <div class="">
                <p class="text-[16px] font-medium font-dmserif">
                    @lang('enclaves::app.shop.components.layouts.header.features.emi-available')
                </p>

                <p class="text-[14px] font-medium mt-[10px] text-[#6E6E6E] max-w-[217px]">
                    @lang('enclaves::app.shop.components.layouts.header.features.emi-available-desc')
                </p>
            </div>
        </div>

        <div class="flex items-center gap-[20px]">
            <span class="icon-product flex items-center w-[60px] h-[60px] bg-white p-[10px] justify-center border border-black rounded-full text-[42px] text-navyBlue"></span>

            <div class="">
                <p class="text-[16px] font-medium font-dmserif">
                    @lang('enclaves::app.shop.components.layouts.header.features.support')
                </p>

                <p class="mt-[10px] text-[14px] text-[#6E6E6E] font-medium max-w-[217px]">
                    @lang('enclaves::app.shop.components.layouts.header.features.support-desc')
                </p>
            </div>
        </div>
    </div>
</div>

{!! view_render_event('bagisto.shop.layout.features.after') !!}
