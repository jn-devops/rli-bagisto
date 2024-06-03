<div class="container max-lg:px-[30px] max-lg:mt-[30px]">
    <div class="item-center mt-[30px] flex justify-center">
        <h3 class="shimmer h-[40px] w-full"></h3>
    </div>

    <div class="scrollbar-hide mt-[30px] flex gap-14 overflow-auto max-lg:mt-[20px]">
        <x-shop::shimmer.properties.cards.grid
            class="min-w-[260px]"
            :count="4"
        >
        </x-shop::shimmer.properties.cards.grid>
    </div>
</div>
