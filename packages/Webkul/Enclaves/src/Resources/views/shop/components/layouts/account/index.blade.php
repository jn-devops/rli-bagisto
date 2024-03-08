<x-shop::layouts>
    {{-- Page Title --}}
    <x-slot:title>
        {{ $title ?? '' }}
    </x-slot>

    {{-- Page Content --}}
    <div class="container md:px-[60px] max-lg:px-[30px]">
        <x-shop::layouts.account.breadcrumb />

        <div class="flex gap-[4.375rem] mx-auto mt-[30px] items-start max-lg:gap-y-[20px] max-md:grid">
            <x-shop::layouts.account.navigation />

            <div class="flex-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-shop::layouts>
