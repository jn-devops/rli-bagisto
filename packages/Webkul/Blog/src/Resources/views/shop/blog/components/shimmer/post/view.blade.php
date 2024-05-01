@props(['count' => 10])

<div class="mt-[30px] w-[40%]">
    <div class="shimmer rounded-1xl h-[70px] w-full"></div>
</div>

<div class="mt-8 flex justify-between gap-[20px] max-lg:flex-wrap">
    <div class="w-[60%] max-sm:w-full">
        <div class="shimmer w-full rounded-[10px] max-lg:h-[300px] lg:h-[500px] lg:rounded-3xl"></div>
    </div>

    <div class="w-[40%] max-sm:w-full">
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

<div class="mt-5 flex justify-center">
    <div class="shimmer h-[45px] w-[135px] rounded-[20px] text-[#f8f6f6]"></div>
</div>