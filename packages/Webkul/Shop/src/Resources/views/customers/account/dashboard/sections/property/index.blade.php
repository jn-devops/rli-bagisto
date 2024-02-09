<div class="flex items-center">
    <div class="grid justify-items-start">
        <!-- Product Image -->
        <img
            src="{{ bagisto_asset('images/large-product-placeholder.webp') }}"
            class="w-[200px] h-[150px] rounded-lg border-slate-950"
            alt="Product Image"
        >
    </div>

    <div class="grid justify-items-start">
        <!-- Product Details -->
        <h3 class="text-[25px] font-semibold my-[10px]">@lang('Zoya Studio Condominium Standard Inner Unit')</h3>

        <p class="text-[20px] font-mediums">@lang('Monthly Amortization:')</p>

        <p class="font-mediums text-[20px] text-[#ED3EAE]">@lang('₱22,5000.00')</p>

        <p class="flex justify-between px-[30px] py-[5px] my-[20px] bg-[#ddf5c4] rounded-3xl">
            <span class="text-[#2aa81d]">@lang('Reserved')</span>
        </p>
    </div>

    <!-- Price -->
    <div class="grid justify-items-end rounded-lg p-[30px] bg-[#6593f7]">
        <p class="text-[25px] text-white font-semibold">@lang('₱22,5000.00')</p>
        <p class="text-white">@lang('Total Contract Price')</p>
    </div>
</div>

<!-- Bordered -->
<div class="border border-gray-300"></div>