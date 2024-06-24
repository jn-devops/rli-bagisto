@props(['count' => 0])

<div class="shimmer mb-5 h-[40px] w-[50%]"></div>

<div class="grid grid-cols-2 gap-4 max-lg:grid-cols-1">
    @for ($i = 0;  $i < $count; $i++)
        <div class="shimmer h-[320px] rounded-lg"></div>

        <div class="">
            <div class="shimmer h-[40px] w-[50%]"></div>

            <div class="shimmer mt-[10px] h-[30px] w-[40%]"></div>

            <div class="shimmer mt-[10px] h-[30px]"></div>

            <div class="shimmer mt-[10px] h-[30px]"></div>

            <div class="shimmer mt-[10px] h-[30px]"></div>

            <div class="shimmer mt-[10px] h-[30px]"></div>

            <div class="shimmer mt-[10px] h-[30px]"></div>
        </div>
    @endfor
</div>