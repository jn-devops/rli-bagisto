@if ($product->processing_fee)
        <p class="processing_fee_text font-roboto text-[20px] font-normal leading-[25px] text-[#8B8B8B] max-sm:text-[18px]">
            @lang('enclaves::app.shop.product.processing')
        </p>

        <p class="processing_fee text-[35px] font-bold text-[#C38400] max-sm:text-2xl">
            {{ core()->formatPrice($product->processing_fee) }}
        </p>
@else
    <p class="processing_fee_text font-roboto text-[20px] font-normal leading-[25px] text-[#8B8B8B] max-sm:text-[18px]" style="display:none;">
        @lang('enclaves::app.shop.product.processing')
    </p>

    <p class="processing_fee text-[35px] font-bold text-[#C38400] max-sm:text-2xl"></p>
@endif