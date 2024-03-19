@props(['count' => 0])
<div class="grid grid-cols-3 gap-14">
    @for ($i = 0;  $i < $count; $i++)
        <div class="grid gap-2.5 relative w-full max-sm:grid-cols-1 {{ $attributes["class"] }}">
            <div class="relative rounded-sm">
                <div class="shimmer rounded-[20px] bg-[#F5F5F5] w-full h-[290px]"></div>
            </div>

            <div class="grid gap-2.5 content-start">
                <p class="shimmer w-[75%] h-[24px]"></p>
                <p class="shimmer w-[55%] h-[24px]"></p>

                {{-- Needs to implement that in future --}}
                <div class="hidden flex gap-4 mt-[12px]">
                    <span class="shimmer w-[30px] h-[30px] block rounded-full"></span>
                    <span class="shimmer w-[30px] h-[30px] block rounded-full"></span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-[90px] content-start">
                <p class="shimmer w-full h-[40px]"></p>

                <p class="shimmer w-full h-[40px]"></p>
            </div>
        </div>
    @endfor
</div>