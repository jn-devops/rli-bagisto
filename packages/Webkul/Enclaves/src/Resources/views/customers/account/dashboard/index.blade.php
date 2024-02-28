<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.dashboard.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="dashboard"></x-shop::breadcrumbs>
    @endSection

    <h2 class="text-[29px] font-semibold max-md:text-[20px]">
        @lang('shop::app.customers.account.dashboard.title')
    </h2>

    <!-- Dashboard Information -->
    <div class="p-[36px] bg-[#F7F8FA] rounded-[20px] mt-[18px]">
        {!! view_render_event('bagisto.shop.customers.account.dashboard.before') !!}
           
            <!-- Property section -->
            @include('shop::customers.account.dashboard.header.index')

            <!-- payment scheduler, Amortization Details, Reservation fee -->
            
            <div class="flex gap-[25px] flex-wrap">
                <!-- left side -->
                @include('shop::customers.account.dashboard.body.schedule')  

                <!-- right side -->
                @include('shop::customers.account.dashboard.body.details')
            </div>
        {!! view_render_event('bagisto.shop.customers.account.dashboard.after') !!}
    </div>
</x-shop::layouts.account>
