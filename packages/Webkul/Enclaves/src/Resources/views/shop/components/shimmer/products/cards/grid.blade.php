@props(['count' => 0])
<div class="grid grid-cols-3 max-lg:grid-cols-2 gap-6 mt-10">
    @for ($i = 0;  $i < $count; $i++)
        <div class="grid gap-4 relative w-full max-sm:grid-cols-1 {{ $attributes["class"] }}">
            <div class="relative rounded-sm">
                <div class="shimmer rounded-[20px] bg-[#F5F5F5] w-full h-[290px]"></div>
            </div>

            <div class="flex flex-wrap gap-3 content-start">
                <p class="shimmer w-[75%] h-[24px]"></p>
                <p class="shimmer w-[55%] h-[24px]"></p>

                <!-- Needs to implement that in future -->
                <div class="hidden flex gap-4 mt-[12px]">
                    <span class="shimmer w-[30px] h-[30px] block rounded-full"></span>
                    <span class="shimmer w-[30px] h-[30px] block rounded-full"></span>
                </div>
            </div>
        </div>
    @endfor
</div>