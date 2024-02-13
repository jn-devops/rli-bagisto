<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.profile.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="profile"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between items-center">
        <h2 class="text-[26px] font-medium">
            @lang('shop::app.customers.account.profile.title')
        </h2>

        <a
            href="{{ route('shop.customers.account.profile.edit') }}"
            class="secondary-button py-[12px] px-[20px] border-[#E9E9E9] font-normal"
        >
            @lang('shop::app.customers.account.profile.edit')
        </a>
    </div>

    <!-- Profile Information -->
    <div class="grid grid-cols-1 gap-y-[25px] mt-[30px]">
        <!-- Profile Header -->
        <div class="flex justify-between px-[20px] py-[20px] border-[#E9E9E9] rounded-xl cursor-pointer bg-gray-100">
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

        <x-shop::tabs.tab>
            <x-shop::tabs.item
                title="Details"
                >
                <div class="grid grid-cols-[2fr_3fr] w-full px-[30px] py-[12px] border-b-[1px] border-[#E9E9E9]">
                    <div class="grid grid-cols-[2fr_3fr]">
                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.full-name')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->name }}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.first-name')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->first_name }}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.middle-name')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->middle_name ?? '-' }}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.last-name')
                        </p>

                        <p class="text-[14px] font-medium text-[#6E6E6E]">
                            {{ $customer->last_name ?? '-' }}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.suffix')
                        </p>

                        <p class="text-[14px] font-medium text-[#6E6E6E]">
                            {{  $customer->suffix ?? '-' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-[2fr_3fr]">
                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.dob')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->date_of_birth ?? '-' }}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.gender')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->gender ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.marital-status')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->marital_status ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.country-code')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->country_code ?? '-'}}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-[2fr_3fr] w-full px-[30px] py-[12px] border-b-[1px] border-[#E9E9E9]">
                    <div class="grid grid-cols-[2fr_3fr]">
                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.email')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->email ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.type')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->email_type ?? '-'}}
                        </p>
                    </div>

                    <div class="grid grid-cols-[2fr_3fr]">
                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.phone')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->phone ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.profile.type')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->phone_type ?? '-'}}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-[2fr_3fr] w-full px-[30px] py-[12px] border-b-[1px]">
                    <div class="grid grid-cols-[2fr_3fr]">
                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.addresses.type')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->default_address->address_type ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.addresses.title')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->address ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.addresses.address-1')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->default_address->address1 ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.addresses.address-2')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->default_address->address2 ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.addresses.city')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->default_address->city ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.addresses.region')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->default_address->state ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.addresses.country')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->default_address->country ?? '-'}}
                        </p>

                        <p class="text-[14px] font-medium">
                            @lang('shop::app.customers.account.addresses.zip')
                        </p>

                        <p class="text-[14px] text-[#6E6E6E] font-medium">
                            {{ $customer->default_address->postcode ?? '-'}}
                        </p>
                    </div>
                </div>
            </x-shop::tabs.item>

            <x-shop::tabs.item
                title="Co-borrower Details"
                isSelected="true"
            >
                <div class="grid justify-center my-10">
                    <h1 class="text-[20px] font-bold">@lang('shop::app.customers.account.addresses.input-co-borrower')</h1>
                    <div class="grid justify-center">
                        <a href="{{ route('shop.customers.account.co-borrower.index') }}" type="button" class="p-4 my-4 bg-gradient-to-r from-yellow-500 to-[#e0165d] rounded-lg text-white">
                            @lang('shop::app.customers.account.addresses.add-co-borrower')
                        </a>
                    </div>
                </div>
            </x-shop::tabs.item>
        </x-shop::tabs.tab>
    </div>
</x-shop::layouts.account>
