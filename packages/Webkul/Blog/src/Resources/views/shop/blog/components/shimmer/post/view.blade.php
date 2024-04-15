@props(['count' => 20])

<div class="mt-[10px] w-[40%]">
    <div class="shimmer rounded-1xl h-[60px] w-full"></div>
</div>

<div class="mt-6 flex justify-between gap-[20px]">
    <div class="w-[60%]">
        <div class="shimmer h-[500px] w-full rounded-3xl"></div>
    </div>

    <div class="w-[40%] gap-1">
        <h3 class="shimmer h-[50px]"></h3>

        <p class="shimmer mt-2 h-[35px]"></p>

        <p class="shimmer mt-2 h-[35px]"></p>
    </div>
</div>

<div class="shimmer mb-[10px] mt-10 h-[20px] rounded-3xl"></div>

@for ($i = 0;  $i < $count; $i++)
    @if(in_array($i, [5,10,15,20]))
        <div class="shimmer mb-[10px] h-[20px] w-[60%] rounded-3xl"></div>
    @else
        <div class="shimmer mb-[10px] h-[20px] rounded-3xl"></div>
    @endif
@endfor

<div class="shimmer rounded-1xl mb-[20px] mt-[40px] h-[40px] w-[60%]"></div>

<x-blog::shimmer.blogs.item count="3"/>