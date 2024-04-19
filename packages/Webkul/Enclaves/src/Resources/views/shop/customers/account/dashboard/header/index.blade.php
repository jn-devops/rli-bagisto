<div class="flex flex-wrap justify-between gap-[18px]">
    <div class="flex flex-wrap gap-[25px]">
        <!-- Product Image -->
        <img
            src="{{ bagisto_asset('images/large-product-placeholder.webp') }}"
            class="max-h-[179px] max-w-[156px] rounded-[20px]"
            alt="product-image"
        >
    </div>

    <div class="grid gap-[12px]">
        <!-- Product Details -->
        <p class="text-[26px] font-bold">
            <!-- Dynamic content -->
            @lang('Zoya Studio Condominium Standard Inner Unit')
        </p>

        <div class="mt-[12px] grid">
            <p class="text-[24px] font-medium">
                @lang('enclaves::app.shop.customers.account.dashboard.header.monthly-amortization')
            </p>
            <p class="text-[24px] font-medium text-[#CC035C]">₱22,500.00</p>
        </div>

        <p class="label-processing">
            @lang('enclaves::app.shop.customers.account.dashboard.header.reserved')
        </p>
    </div>

    <!-- Price -->
    <div class="grid gap-[15px] rounded-[20px] bg-[#5890FE] p-[30px]">
        <p class="break-all text-[30px] font-bold text-white">@lang('₱22,5000.00')</p>
        <p class="text-base text-white">
            @lang('enclaves::app.shop.customers.account.dashboard.header.total-contract-price')
        </p>
    </div>
</div>

<!-- Divider Line -->
<div class="my-[46px] h-[1px] w-full border-[0.5px] border-[#B9B9B9]"></div>