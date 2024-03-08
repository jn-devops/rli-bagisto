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
        @foreach ($tickets as $ticket)
            <x-shop::accordion.custom-accordion :is-active=false class="border">
                <x-slot:header>
                    <div class="w-full flex justify-between items-center">
                        <div>
                            {{ $ticket->reasons->name }}
                        </div>
                        <div class="flex items-center p-4 m-2 border h-[30px] text-[16px] rounded-full bg-[#fac04f42] text-[#C3890F]">
                            {{ $ticket->status->name }}
                        </div>
                    </div>
                </x-slot:header>
                <x-slot:content>
                    {{ $ticket->comment }}

                    <div>
                        @foreach ($ticket->files as $file)
                        <img src="{{ env('STORAGE_URL') }}/app/public/{{ $file->path. '/'. $file->name }}" alt="{{ $file->name }}" class="h-[100px] w-[100px]">
                        
                        @endforeach
                    </div>
                </x-slot:content>
            </x-shop::accordion.custom-accordion>
        @endforeach
    </div>
</x-shop::layouts.account>