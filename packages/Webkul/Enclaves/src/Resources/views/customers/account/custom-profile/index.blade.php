<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

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
    </div>

    <!-- Profile Information -->
    <div class="grid grid-cols-1">
        <!-- Header -->
        @include('shop::customers.account.custom-profile.header.index')

        <div class="relative text-right top-[90px]">
            <a
                href="{{ route('shop.customers.account.profile.edit') }}"
                class="secondary-button py-[12px] px-[20px] border-[#E9E9E9] font-normal relative text-right -top-[53px]"
            >
                @lang('shop::app.customers.account.profile.edit')
            </a>
        </div>

        <x-shop::tabs.tab>
            <x-shop::tabs.item
                title="Details"
                isSelected="true"
            >
                <!-- Profile Detail -->
                @include('shop::customers.account.custom-profile.details.index')
            </x-shop::tabs.item>

            <x-shop::tabs.item
                title="Co-borrower Details"
            >
                <!-- co-borrower -->
                @include('shop::customers.account.custom-profile.co-borrower.index')
            </x-shop::tabs.item>
        </x-shop::tabs.tab>
    </div>
</x-shop::layouts.account>
