@props(['count' => 0])
@for ($i = 0; $i < $count; $i++)
    <div class="rounded-[30px] bg-white px-5 py-6 shadow-[20px_4px_54px] shadow-black/10">
        <div class="h-40 w-full overflow-hidden rounded-[30px] shimmer"> </div>

        <div class="mx-auto mt-7 w-[302px] max-sm:w-[280px]">
            <p class="h-6 w-1/3 shimmer"></p>
            <div class="mt-2 flex gap-3">
                <div class="h-8 w-8 rounded-full shimmer"></div>
                <p class="h-5 w-52 shimmer"></p>
            </div>
            <div class="mt-7 flex gap-4">
                <div class="h-8 w-8 rounded-full shimmer"></div>

                <ul class="list-inside list-none">
                    <li class="h-5 w-52 shimmer"></li>
                    <li class="mt-2 h-5 w-52 shimmer"></li>
                </ul>
            </div>
        </div>
        <hr class="mt-7 h-[2px] border-0 bg-[#EFEFEF]">
        <button class="mt-7 block w-full rounded-full px-6 py-[18px] shimmer"></button>
    </div>
@endfor
