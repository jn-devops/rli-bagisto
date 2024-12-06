@props(['count' => 0])

<div class="mt-14 grid grid-cols-3 gap-4 max-lg:grid-cols-2">
    @for ($i = 0;  $i < $count; $i++)
        <div class="rounded-[30px] bg-white px-5 py-6 shadow-[20px_4px_54px] shadow-black/10">
            <div class="h-48 w-full overflow-hidden max-md:h-60 shimmer"></div>
            <h3 class="mt-7 h-[28px] w-[190px] shimmer"></h3>
            <p class="mt-7 h-[28px] w-[90%] shimmer"></p>
            <p class="mt-7 h-[28px] w-[60%] shimmer"></p>
            <p class="mt-7 h-[28px] w-[80%] shimmer"></p>
            <p class="mt-7 h-[28px] w-[70%] shimmer"></p>

            <div class="mt-7 flex items-center justify-between gap-[2px]">
                <a href="#" class="block w-2/5 rounded-full px-2 py-[18px] max-sm:py-3 max-sm:text-base shimmer h-[74px]"></a>
                <a href="#" class="block w-3/5 rounded-full px-2 py-5 max-sm:py-3 max-sm:text-base shimmer h-[74px]"></a>
            </div>
        </div>
    @endfor
</div>
