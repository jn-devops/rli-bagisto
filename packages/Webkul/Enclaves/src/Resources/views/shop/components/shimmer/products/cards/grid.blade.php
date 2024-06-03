@props(['count' => 0])
<div class="mt-10 grid grid-cols-3 gap-6 max-lg:grid-cols-2">
    @for ($i = 0;  $i < $count; $i++)
        <div class="grid gap-4 relative w-full max-lg:grid-cols-1 {{ $attributes['class'] }}">
            <div class="relative rounded-sm">
                <div class="shimmer h-[290px] w-full rounded-[20px] max-lg:hidden"></div>

                <div class="shimmer hidden h-[125px] w-full rounded-[20px] max-lg:block"></div>
            </div>

            <div class="flex flex-wrap content-start gap-3">
                <p class="shimmer h-[24px] w-[75%]"></p>
                <p class="shimmer h-[24px] w-[55%]"></p>

                <!-- Needs to implement that in future -->
                <div class="mt-[12px] flex hidden gap-4">
                    <span class="shimmer block h-[30px] w-[30px] rounded-full"></span>
                    <span class="shimmer block h-[30px] w-[30px] rounded-full"></span>
                </div>
            </div>
        </div>
    @endfor
</div>