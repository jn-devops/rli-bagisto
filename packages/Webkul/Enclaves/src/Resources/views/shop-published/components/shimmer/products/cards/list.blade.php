@props(['count' => 0])

@for ($i = 0; $i < $count; $i++)
<div class="flex gap-4 grid-cols-2 max-w-max relative max-lg:flex-wrap rounded overflow-hidden">
    <div class="relative rounded-[20px] overflow-hidden"> 
        <div class="shimmer h-[290px] w-[500px] max-w-[500px] min-w-[280px] max-h-[360px] rounded-sm bg-[#F5F5F5]"></div>
    </div>

    <div class="grid gap-2.5 w-full content-start relative">
        <p class="shimmer w-[100%] h-[30px]"></p>

        <p class="shimmer w-[55%] h-[30px]"></p>

        {{-- Needs to implement that in future --}}
        <div class="hidden flex gap-4"> 
            <span class="shimmer w-[30px] h-[30px] block rounded-full"></span> 

            <span class="shimmer w-[30px] h-[30px] block rounded-full"></span> 
        </div>

        <p class="shimmer w-[100%] h-[30px]"></p>

        <p class="shimmer w-[100%] h-[30px]"></p>

        <div class="shimmer w-[152px] h-[46px] rounded-[12px]"></div>
    </div>
</div>
@endfor
