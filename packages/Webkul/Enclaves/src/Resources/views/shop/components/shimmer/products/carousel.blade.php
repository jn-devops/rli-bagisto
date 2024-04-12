<div class="container max-lg:px-[30px] max-sm:mt-[30px]">
    <div class="flex justify-between relative top-[215px] z-10">
        <div class="inline-flex gap-7">
            <span  class="shimmer inline-block w-[79px] h-[78px]"></span>

            <span class="shimmer inline-block w-[79px] h-[78px]"></span>
        </div>
    </div>

    <div class="flex gap-14 mt-[40px] overflow-auto scrollbar-hide max-sm:mt-[20px]">
        <x-shop::shimmer.products.cards.home-grid
            class="min-w-[350px]"
            :count="3"
        >
        </x-shop::shimmer.products.cards.home-grid>
    </div>
</div>
