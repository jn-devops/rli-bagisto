<div class="container bg-[#CC035C] py-[60px] max-lg:px-[32px] max-668:bg-[unset]">
    <div class="shimmer mb-[50px] h-[50px] w-[70%]"></div>

    <div class="scrollbar-hide mt-[25px] flex gap-4 overflow-auto max-lg:gap-4 max-sm:mt-[20px] lg:gap-4">
        <x-shop::shimmer.products.cards.home-grid
            class="min-w-[280px]"
            :count="4"
        >
        </x-shop::shimmer.products.cards.home-grid>
    </div>
</div>
