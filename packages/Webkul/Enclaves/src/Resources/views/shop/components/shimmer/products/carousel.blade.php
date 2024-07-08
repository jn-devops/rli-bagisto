<div class="bg-[#CC035C] max-668:bg-[unset]">
    <div class="container py-[60px] max-lg:px-[32px]">
        <div class="shimmer mb-[50px] h-[50px] w-[70%]"></div>
        
        <div class="scrollbar-hide mt-[25px] flex gap-4 overflow-auto max-lg:mt-[20px] max-lg:gap-4 lg:gap-4">
            <x-shop::shimmer.products.cards.home-grid
                class="min-w-[280px]"
                :count="4"
                >
            </x-shop::shimmer.products.cards.home-grid>
        </div>

        <div class="mt-[30px] flex justify-end max-668:absolute max-668:-top-[15px] max-668:right-[10px]">
            <div class="shimmer h-[30px] w-[20%]"></div>
        </div>
    </div>
</div>
