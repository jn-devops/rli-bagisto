@props(['count' => 0])
<div class="flex flex-wrap gap-4 lg:gap-4">
    @for ($i = 0; $i < $count; $i++)
        <div>
            <div class="shimmer h-[260px] min-w-[120px] rounded-[20px] max-lg:h-[120px] lg:min-w-[280px]"></div>

            <div class="mt-2.5 grid grid-cols-1 gap-2">
                <div class="shimmer h-[40px] w-full max-lg:h-[20px]"></div>

                <div class="shimmer h-[40px] w-[50%] rounded-[20px] max-lg:h-[20px]"></div>
            </div>
        </div>
    @endfor
</div>