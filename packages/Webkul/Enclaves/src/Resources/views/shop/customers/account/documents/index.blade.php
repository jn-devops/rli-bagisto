<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('enclaves::app.shop.customers.account.documents.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="documents"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between">
        <h2 class="text-[29px] font-semibold max-md:text-[20px]">
            @lang('enclaves::app.shop.customers.account.documents.title')
        </h2>
    </div>

    <!-- documents Information -->
    <div class="mt-[125px] grid grid-cols-[1fr_414px] flex-wrap gap-[32px] max-1280:grid-cols-1 max-lg:mt-[60px]">
        {!! view_render_event('bagisto.shop.customers.account.document.before') !!}
                <div class="flex-1 rounded-[20px] bg-[#F7F8FA] px-[54px] py-[36px] max-lg:px-[28px] max-lg:py-[20px]">
                    <p class="text-[25px] font-semibold max-lg:text-[20px]">These are the lists of documents you need to accomplish:</p>
                    <ol class="mt-[50px] list-decimal pl-[25px] max-lg:mt-[25px]">
                        <li class="text-[22px] max-lg:text-[16px]">Reservation Agreement (RA)</li>
                        <li class="text-[22px] max-lg:text-[16px]" >Government ID 1</li>
                        <li class="text-[22px] max-lg:text-[16px]">Meralco Application Form</li>
                        <li class="text-[22px] max-lg:text-[16px]">Certificate of Employment with Compensation</li>
                        <li class="text-[22px] max-lg:text-[16px]">Government ID 1</li>
                        <li class="text-[22px] max-lg:text-[16px]">Certificate of Employment </li>
                        <li class="text-[22px] max-lg:text-[16px]">CENOMAR</li>
                        <li class="text-[22px] max-lg:text-[16px]">Government ID 1</li>
                        <li class="text-[22px] max-lg:text-[16px]">TIN</li>
                        <li class="text-[22px] max-lg:text-[16px]">Government ID 1</li>
                    </ol>
                </div>

                <div class="grid max-w-[410px] flex-wrap items-center gap-[16px] place-self-start text-center">
                    <img class="w-[307px]" src="{{ bagisto_asset('images/document-files.svg') }}" />

                    <a class="mx-auto ml-[0px] block w-full rounded-[18px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[43px] py-[16px] text-center text-[16px] font-medium text-white max-lg:mx-auto max-lg:w-max" href=""> 
                        @lang('enclaves::app.shop.customers.account.documents.go-to-documents')
                    </a>
                    
                    <p class="text-[20px] font-bold max-lg:text-[16px]">
                        @lang('enclaves::app.shop.customers.account.documents.press-button')
                    </p>
                    
                    <div class="mx-auto flex w-max gap-[8px] rounded-[10px] bg-[#F3F4F6] p-[8px]">
                        <p class="flex flex-wrap gap-[5px]">
                            <span class="text-[20px] font-bold text-[#0066EE] max-lg:text-[16px]">
                                @lang('enclaves::app.shop.customers.account.documents.reference-code')
                            </span>

                            <span class="text-[20px] font-bold text-[#0066EE] max-lg:text-[16px]">
                                JN-0921-001
                            </span>
                        </p>

                        <span class=""></span>
                    </div>

                    <p class="text-[20px] font-medium max-lg:text-[16px]">
                        @lang('enclaves::app.shop.customers.account.documents.reference-info')
                    </p>
                </div>
            </div>

        {!! view_render_event('bagisto.shop.customers.account.document.after') !!}
    </div>
</x-shop::layouts.account>