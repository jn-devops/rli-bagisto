<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('enclaves::app.shop.layouts.transactions')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="transactions"></x-shop::breadcrumbs>
    @endSection

    <div class="flex items-center justify-between">
        <div class="">
            <h2 class="text-[26px] font-medium">
                @lang('enclaves::app.shop.layouts.transactions')
            </h2>
        </div>
    </div>

    {!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!}

    <x-shop::datagrid :src="route('shop.customers.account.transactions.index')"></x-shop::datagrid>
    
    {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!}
</x-shop::layouts.account>
