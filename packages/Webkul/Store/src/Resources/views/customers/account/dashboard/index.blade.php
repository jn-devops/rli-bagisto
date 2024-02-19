<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.dashboard.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="dashboard"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between items-center">
        <h2 class="text-[26px] font-medium">
            @lang('shop::app.customers.account.dashboard.title')
        </h2>
    </div>

    <!-- Dashboard Information -->
    <div class="grid grid-cols-1 gap-y-[25px] mt-[30px]">
        {!! view_render_event('bagisto.shop.customers.account.dashboard.before') !!}
            <div class="justify-between px-[25px] py-[20px] border-[#E9E9E9] rounded-xl cursor-pointer bg-gray-100">
                <!-- Property section -->
                @include('shop::customers.account.dashboard.header.index')

                <!-- payment scheduler, Amortization Details, Reservation fee -->
             
                <div class="flex justify-between my-[20px] gap-3">
                    <!-- left side -->
                    @include('shop::customers.account.dashboard.body.schedule')  

                    <!-- right side -->
                    @include('shop::customers.account.dashboard.body.details')
                </div>
            </div>
        {!! view_render_event('bagisto.shop.customers.account.dashboard.after') !!}
    </div>
</x-shop::layouts.account>
