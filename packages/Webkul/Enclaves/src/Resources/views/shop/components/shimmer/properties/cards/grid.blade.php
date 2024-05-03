@props(['count' => 0])
<div class="flex flex-wrap gap-5 lg:gap-14">
    @for ($i = 0; $i < $count; $i++)
        <div>
            <div class="shimmer h-[289px] min-w-[120px] rounded-[20px] max-lg:h-[120px] lg:min-w-[350px]"></div>

            <div class="grid grid-cols-1 gap-2 mt-2.5">
                <div class="shimmer h-[40px] w-full max-lg:h-[20px]"></div>

                <div class="shimmer h-[40px] w-[50%] rounded-[20px] max-lg:h-[20px]"></div>
            </div>
        </div>
    @endfor
</div>