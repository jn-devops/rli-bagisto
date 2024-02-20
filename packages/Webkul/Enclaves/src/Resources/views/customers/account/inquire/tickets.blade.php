<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.inquiries.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="inquiries"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between items-center">
        <div class="">
            <h2 class="text-[29px] font-medium">
                @lang('enclaves::app.customers.inquiries.list.title')
            </h2>
        </div>
    </div>

    <div class="p-3 pt-10 justify-between items-center">
        <x-shop::accordion.custom-accordion :is-active=false class="border">
            <x-slot:header>
                <div class="w-full flex justify-between items-center">
                    <div>
                        @lang('Is it safe to buy or rent property online?')
                    </div>
                    <div class="flex items-center p-4 m-2 border h-[30px] text-[16px] rounded-full bg-[#fac04f42] text-[#C3890F]">
                        @lang('Pending')
                    </div>
                </div>

            </x-slot:header>
            <x-slot:content>
                {{ "Safety in property ecommerce depends on several factors, including the reputation of the platform, verification processes for listings and users, and adherence to legal regulations. Reputable platforms implement security measures to protect users' personal and financial information and often provide escrow services to secure transactions. However, it's essential for buyers and renters to exercise due diligence, verify property details, and be cautious of potential scams." }}
            </x-slot:content>
        </x-shop::accordion.custom-accordion>

        <x-shop::accordion.custom-accordion :is-active=false class="border">
            <x-slot:header>
                <div class="w-full flex justify-between items-center">
                    <div>
                        @lang('Is it safe to buy or rent property online?')
                    </div>
                    <div class="flex items-center p-4 m-2 border h-[30px] text-[16px] rounded-full bg-[#fac04f42] text-[#C3890F]">
                        @lang('Pending')
                    </div>
                </div>

            </x-slot:header>
            <x-slot:content>
                {{ "Safety in property ecommerce depends on several factors, including the reputation of the platform, verification processes for listings and users, and adherence to legal regulations. Reputable platforms implement security measures to protect users' personal and financial information and often provide escrow services to secure transactions. However, it's essential for buyers and renters to exercise due diligence, verify property details, and be cautious of potential scams." }}
            </x-slot:content>
        </x-shop::accordion.custom-accordion>
    </div>
</x-shop::layouts.account>