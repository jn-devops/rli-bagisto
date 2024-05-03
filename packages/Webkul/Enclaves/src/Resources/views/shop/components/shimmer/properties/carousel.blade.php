<div class="container max-lg:px-[30px] max-sm:mt-[30px]">
    <div class="item-center mt-[130px] flex justify-center">
        <h3 class="shimmer h-[60px] w-[50%]"></h3>
    </div>
    

    <div class="scrollbar-hide mt-[80px] flex gap-14 overflow-auto max-sm:mt-[20px]">
        <x-shop::shimmer.properties.cards.grid
            class="min-w-[350px]"
            :count="3"
        >
        </x-shop::shimmer.properties.cards.grid>
    </div>
</div>
