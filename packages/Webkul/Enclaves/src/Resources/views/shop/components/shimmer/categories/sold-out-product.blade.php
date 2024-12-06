@props(['count' => 0])

<div class="grid grid-cols-4 gap-16 max-lg:grid-cols-2">
    @for ($i = 0;  $i < $count; $i++)
        <div class=" max-xl:gap-8 max-lg:grid-cols-2 max-md:grid-cols-1 mt-11">
            <div class="relative rounded-sm">
                <div class="shimmer h-[370px] rounded-3xl max-lg:h-[128px]"></div>
            </div>

            <div class="grid content-start gap-2.5">
                <p class="mt-2 shimmer h-[24px] w-[45%]"></p>
                <p class="mt-1 shimmer h-[24px] w-[45%]"></p>
                <p class="mt-1 shimmer h-[20px] w-[50%]"></p>
                <p class="mt-1 shimmer h-[24px] w-[55%]"></p>
            </div>

            <span
                class="mt-5 block w-full rounded-full px-5 py-5 max-lg:px-3 max-lg:py-3 cursor-pointer shimmer min-h-[70px]"
                >
            </span>
        </div>
    @endfor
</div>
