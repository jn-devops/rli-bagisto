@props(['count' => 0])

<div class="grid grid-cols-3 gap-8">
    @for ($i = 0;  $i < $count; $i++)
        <div class="grid max-w-[350px] gap-8 relative w-full max-sm:grid-cols-1 {{ $attributes["class"] }}">
            <div class="relative rounded-sm">
                <div class="shimmer h-[290px] w-full rounded-[20px] bg-[#F5F5F5]"></div>
            </div>

            <div class="grid content-start gap-2.5">
                <p class="shimmer h-[24px] w-[75%]"></p>
                <p class="shimmer h-[24px] w-[55%]"></p>
            </div>
        </div>
    @endfor
</div>