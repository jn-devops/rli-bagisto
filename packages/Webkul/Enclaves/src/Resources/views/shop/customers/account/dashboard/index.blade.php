<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('enclaves::app.shop.customers.account.dashboard.index.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="dashboard"></x-shop::breadcrumbs>
    @endSection

    <h2 class="text-[29px] font-semibold max-md:text-[20px]">
        @lang('enclaves::app.shop.customers.account.dashboard.index.title')
    </h2>

    <!-- Dashboard Information -->
    <div class="mt-[18px] rounded-[20px] bg-[#F7F8FA] p-[36px]">
        {!! view_render_event('bagisto.shop.customers.account.dashboard.before') !!}
           
            <!-- Property section -->
            @include('shop::customers.account.dashboard.header.index')

            <!-- payment scheduler, Amortization Details, Reservation fee -->
            
            <div class="flex flex-wrap gap-[25px]">
                <!-- left side -->
                @include('shop::customers.account.dashboard.body.schedule')  

                <!-- right side -->
                @include('shop::customers.account.dashboard.body.details')
            </div>
        {!! view_render_event('bagisto.shop.customers.account.dashboard.after') !!}
    </div>
</x-shop::layouts.account>
