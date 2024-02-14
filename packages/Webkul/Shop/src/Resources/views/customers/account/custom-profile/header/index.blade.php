<!-- Profile Header -->
<div class="flex justify-between mt-[30px] px-[20px] py-[20px] border-[#E9E9E9] rounded-xl cursor-pointer bg-gray-100">
    <div class="flex gap-5">
        <!-- customer Image -->
        <div class="grid w-[150px] justify-items-start">
            <img
                src="{{ $customer->image_url ??  bagisto_asset('images/user-placeholder.png') }}"
                class="w-[150px] h-[150px] rounded-full"
                alt="Profile Image"
            >
        </div>

        <!-- customer Details -->
        <div class="justify-items-start">
            <h3 class="text-[20px] font-semibold">{{ $customer->first_name }}</h3>

            <p class="font-mediums text-[15px] text-[#587bed]">@lang('Complete your profile 50/50%')</p>
        </div>
    </div>

    <!-- Action -->
    <div class="grid justify-items-end rounded-lg p-[10px] w-[240px] bg-[#9db2d1]">
        <p class="text-[20px] text-white font-semibold">@lang('Steps to get your dream house')</p>

        <button type="button" class="w-[100px] bg-white rounded-full text-[#5f6e85]">@lang('Read Now')</button>
    </div>
</div>