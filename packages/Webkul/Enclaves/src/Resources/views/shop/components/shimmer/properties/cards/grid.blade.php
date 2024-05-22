@props(['count' => 0])
<div class="flex flex-wrap gap-4 lg:gap-4">
    @for ($i = 0; $i < $count; $i++)
        <div>
            <div class="shimmer w-full rounded-3xl shadow-inner max-lg:h-32 md:h-60 lg:h-64"></div>

            <div class="mt-2.5 grid grid-cols-1 gap-2">
                <div class="shimmer h-[40px] w-full max-lg:h-[20px]"></div>

                <div class="shimmer h-[40px] w-[50%] rounded-[20px] max-lg:h-[20px]"></div>
            </div>
        </div>
    @endfor
</div>