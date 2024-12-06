<div class="px-0 max-lg:px-[30px] max-lg:px-[15px]">
    <div class="flex gap-[40px] items-start max-lg:gap-[20px]">
        <!-- Desktop Filter Shimmer Effect -->

        <div class="flex-1">
            <!-- Desktop Toolbar Shimmer Effect -->
            <div class="grid grid-cols-2 gap-24 max-lg:gap-12 max-md:grid-cols-1">
                <div v-for="col in ['one', 'two']">
                    <p class="shimmer h-[24px] w-[150px]"></p>
                    <div class="mt-11 grid grid-cols-2 gap-x-8 gap-y-11 max-sm:grid-cols-1">
                        <!-- Product Card Shimmer Effect -->
                        @for ($i = 0;  $i < $count; $i++)
                            <div class="grid gap-4 relative w-full max-lg:grid-cols-1 {{ $attributes['class'] }}">
                                <div class="relative rounded-sm">
                                    <div class="shimmer h-[370px] rounded-3xl max-lg:h-[128px]"></div>
                                </div>

                                <div class="grid content-start gap-2.5">
                                    <p class="mt-2 shimmer h-[24px] w-[45%]"></p>
                                    <p class="mt-1 shimmer h-[24px] w-[45%]"></p>
                                    <p class="mt-1 shimmer h-[20px] w-[50%]"></p>
                                    <p class="mt-1 shimmer h-[24px] w-[55%]"></p>
                                </div>

                                <span
                                    class="mt-5 block w-full rounded-full px-5 py-5 max-lg:px-3 max-lg:py-3 cursor-pointer shimmer min-h-[70px]"
                                    >
                                </span>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <button class="shimmer block w-[171.516px] h-[48px] mt-[60px] mx-auto py-[11px] rounded-[18px]"></button>
        </div>
    </div>
</div>
