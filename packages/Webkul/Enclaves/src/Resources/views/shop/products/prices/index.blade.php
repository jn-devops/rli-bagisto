@if ($prices['final']['price'] < $prices['regular']['price'])
    <p class="font-roboto text-[20px] font-normal leading-[25px] text-white max-sm:text-[18px]">
        {{ $prices['regular']['formatted_price'] }}
    </p>

    <p class="font-roboto text-[20px] font-normal leading-[25px] text-white max-sm:text-[18px]">
        {{ $prices['final']['formatted_price'] }}
    </p>
@else
    <p class="font-roboto text-[20px] font-normal leading-[25px] text-white max-sm:text-[18px]">
        {{ $prices['regular']['formatted_price'] }}
    </p>
@endif