@props(['count' => 0])

@for ($i = 0; $i < $count; $i++)
    <div>
        <div class="shimmer h-[260px] min-w-[120px] rounded-[20px] max-lg:h-[120px] md:h-[170px] md:min-w-[160px] lg:min-w-[300px]"></div>
        
        <div class="shimmer mt-2.5 h-[30px] w-full max-lg:h-[14px]"></div>

        <div class="shimmer mt-2.5 h-[30px] w-[60%] max-lg:h-[14px]"></div>
        
        <div class="mt-2.5 grid grid-cols-2 gap-2 max-lg:grid-cols-1">
            <div class="shimmer h-[40px] w-full max-lg:h-[20px]"></div>
        </div>
    </div>
@endfor