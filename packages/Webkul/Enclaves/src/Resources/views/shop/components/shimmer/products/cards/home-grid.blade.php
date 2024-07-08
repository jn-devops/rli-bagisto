@props(['count' => 0])

<div class="scrollbar-hide flex gap-4 overflow-auto scroll-smooth">
    @for ($i = 0; $i < $count; $i++)
        <div class="max-w-[280px] cursor-pointer shadow-inner max-lg:min-w-[122px] md:min-w-64 lg:min-w-[300px]">
            <div class="shimmer w-full rounded-3xl max-lg:h-32 md:h-60 lg:h-64"></div>
            
            <div class="shimmer mt-2.5 h-[30px] w-full max-lg:h-[14px]"></div>

            <div class="mt-2.5 grid grid-cols-2 gap-2 max-lg:grid-cols-1">
                <div class="shimmer h-[40px] w-full max-lg:h-[20px]"></div>
            </div>
        </div>
    @endfor
</div>