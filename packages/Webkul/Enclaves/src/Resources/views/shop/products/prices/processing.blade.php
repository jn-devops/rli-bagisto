@if ($product->processing_fee)
    <div class="mt-[40px] grid gap-[6px]">
        <p class="text-nowrap text-[25px] font-bold max-lg:text-[22px]">@lang('enclaves::app.shop.product.reservation-fee')</p>

        <p class="processing_fee text-[40px] font-bold text-[#CC035C] max-lg:text-[40px]">{{ core()->formatPrice($product->processing_fee) }}</p>
    </div>
@else
    <p class="processing_fee_text text-nowrap text-[25px] font-bold max-lg:text-[22px]" style="display:none;">@lang('enclaves::app.shop.product.reservation-fee')</p>

    <p class="processing_fee text-[40px] font-bold text-[#CC035C] max-lg:text-[40px]"></p>
@endif
