@if ($product->processing_fee)
    <div class="grid mt-[40px] gap-[6px]">
        <p class="text-[25px] font-bold max-sm:text-[22px] text-nowrap">Reservation Fee:</p>
        <P class="text-[60px] text-[#CC035C] font-bold max-sm:text-[40px]">₱{{ $product->processing_fee }} </P>
    </div>
@endif
