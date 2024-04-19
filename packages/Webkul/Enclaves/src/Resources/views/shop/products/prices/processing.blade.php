@if ($product->processing_fee)
    <div class="mt-[40px] grid gap-[6px]">
        <p class="text-nowrap text-[25px] font-bold max-sm:text-[22px]">Reservation Fee:</p>
        <P class="text-[40px] font-bold text-[#CC035C] max-sm:text-[40px]">{{ core()->formatPrice($product->processing_fee) }} </P>
    </div>
@endif
