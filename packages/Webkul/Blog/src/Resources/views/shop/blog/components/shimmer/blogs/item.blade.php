@props(['count' => 0])

<div class="mt-5 grid grid-cols-4 gap-6 max-lg:grid-cols-2">
    @for ($i = 0;  $i < $count; $i++)
        <div class="grid gap-5 {{ $attributes['class'] }}">
            <div class="relative rounded-sm">
                <div class="shimmer h-[319px] w-full rounded-3xl max-lg:h-[128px]"></div>
            </div>

            <div class="grid content-start gap-2.5">
                <p class="shimmer h-[24px] w-[75%]"></p>
                <p class="shimmer h-[24px] w-[55%]"></p>
            </div>
        </div>
    @endfor
</div>
