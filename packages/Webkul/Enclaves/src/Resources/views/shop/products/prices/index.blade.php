@if ($prices['final']['price'] < $prices['regular']['price'])
    <p class="font-roboto max-668:text-red text-[20px] font-normal leading-[25px] text-black max-sm:text-[15px] lg:text-white">
        {{ $prices['regular']['formatted_price'] }}
    </p>

    <p class="font-roboto text-[20px] font-normal leading-[25px] text-black max-sm:text-[15px] lg:text-white">
        {{ $prices['final']['formatted_price'] }}
    </p>
@else
    <p class="font-roboto text-[20px] font-normal leading-[25px] max-sm:text-[15px]">
        {{ $prices['regular']['formatted_price'] }}
    </p>
@endif