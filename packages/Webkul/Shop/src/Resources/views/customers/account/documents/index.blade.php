<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.documents.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="documents"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between items-center">
        <h2 class="text-[26px] font-medium">
            @lang('shop::app.customers.account.documents.title')
        </h2>
    </div>

    <!-- documents Information -->
    <div class="grid grid-cols-1 gap-y-[25px] mt-[30px]">
        {!! view_render_event('bagisto.shop.customers.account.document.before') !!}
            <div class="flex">
                <div class="justify-between px-[30px] py-[20px] border-[#E9E9E9] rounded-xl cursor-pointer bg-gray-100 w-[400px] h-fit">
                    <h2 class="text-[20px] font-medium">@lang('There are the lists of documents you need to accomplish:')</h2>

                    <ul class="mt-7">
                        <li>@lang('1. Document Name X')</li>
                        <li>@lang('2. Document Name X')</li>
                        <li>@lang('3. Document Name X')</li>
                        <li>@lang('4. Document Name X')</li>
                        <li>@lang('5. Document Name X')</li>
                        <li>@lang('6. Document Name X')</li>
                        <li>@lang('7. Document Name X')</li>
                        <li>@lang('8. Document Name X')</li>
                        <li>@lang('9. Document Name X')</li>
                        <li>@lang('10. Document Name X')</li>
                    </ul>
                </div>

                <div class="row text-center p-10 map">
                    <img 
                        src="{{ bagisto_asset('images/document-files.svg') }}" 
                        alt="attach image"
                     />
                    
                    <div class="mb-7">
                        <button
                            type="submit"
                            class="primary-button min-w-[185px] !bg-gradient-to-r from-yellow-500 to-[#e0165d] border-0"
                        >
                            @lang('shop::app.customers.account.documents.btn-documents')
                        </button>
                    </div>

                    <p class="text-[20px] font-bold mb-7">@lang('shop::app.customers.account.documents.text-document')</p>
                    
                    <div class="flex justify-around items-center mb-7">
                        <p class="flex justify-around items-center rounded-xl cursor-pointer bg-gray-100 w-[300px] h-[35px]">
                            <span class="text-[#1965dd] text-[14px] font-bold"> @lang('shop::app.customers.account.documents.reference-code') JN-0921-001 </span>

                            <span class="text-[#999999c4] text-[14px]">@lang('copy')</span>
                        </p>
                    </div>
                    
                    <p class="text-[14px]">
                        @lang('shop::app.customers.account.documents.confirm-documents')
                    </p>
                </div>
            </div>

        {!! view_render_event('bagisto.shop.customers.account.document.after') !!}
    </div>
</x-shop::layouts.account>