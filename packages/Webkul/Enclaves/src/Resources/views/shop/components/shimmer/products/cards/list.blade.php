@props(['count' => 0])

@for ($i = 0; $i < $count; $i++)
<div class="grid gap-2.5 grid-cols-2 relative max-sm:grid-cols-1 mt-[20px]">
    <div class="shimmer h-[290px] relative overflow-hidden group max-w-[350px] max-h-[360px] rounded-[20px]"> 
        <img class="rounded-sm bg-[#F5F5F5]">
    </div>

    <div class="grid gap-2.5 content-start relative">
        <p class="shimmer w-[75%] h-[24px]"></p>

        <p class="shimmer w-[55%] h-[24px]"></p>

        {{-- Needs to implement that in future --}}
        <div class="hidden flex gap-4"> 
            <span class="shimmer w-[30px] h-[30px] block rounded-full"></span> 

            <span class="shimmer w-[30px] h-[30px] block rounded-full"></span> 
        </div>

        <p class="shimmer w-[100%] h-[24px]"></p>

        <p class="shimmer w-[100%] h-[24px]"></p>

        <div class="shimmer w-[152px] h-[46px] rounded-[12px]"></div>
    </div>
</div>
@endfor
