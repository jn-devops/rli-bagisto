@if ($product->processing_fee)
    <div class="mt-[40px] grid gap-[6px]">
        <p class="text-nowrap text-[25px] font-bold max-sm:text-[22px]">@lang('enclaves::app.shop.product.reservation-fee')</p>

        <P class="processing_fee text-[40px] font-bold text-[#CC035C] max-sm:text-[40px]">{{ core()->formatPrice($product->processing_fee) }} </P>
    </div>
@endif
