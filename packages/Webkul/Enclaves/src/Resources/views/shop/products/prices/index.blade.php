@if ($prices['final']['price'] < $prices['regular']['price'])
    <p class="font-roboto text-[25px] font-normal leading-[25px] text-[#8B8B8B] max-sm:text-[18px]">
        {{ $prices['regular']['formatted_price'] }}
    </p>

    <p class="font-roboto text-[25px] font-normal leading-[25px] text-[#8B8B8B] max-sm:text-[18px]">
        {{ $prices['final']['formatted_price'] }}
    </p>
@else
    <p class="font-roboto text-[25px] font-normal leading-[25px] text-[#8B8B8B] max-sm:text-[18px]">
        {{ $prices['regular']['formatted_price'] }}
    </p>
@endif