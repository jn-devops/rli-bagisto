<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.documents.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="documents"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between">
        <h2 class="text-[29px] font-semibold max-md:text-[20px]">
            @lang('shop::app.customers.account.documents.title')
        </h2>
    </div>

    <!-- documents Information -->
    <div class="grid grid-cols-[1fr_414px] gap-[32px] flex-wrap mt-[125px] max-1280:grid-cols-1 max-sm:mt-[60px]">
        {!! view_render_event('bagisto.shop.customers.account.document.before') !!}
                <div class="px-[54px] py-[36px] bg-[#F7F8FA] rounded-[20px] flex-1 max-sm:px-[28px] max-sm:py-[20px]">
                    <p class="text-[25px] font-semibold max-sm:text-[20px]">These are the lists of documents you need to accomplish:</p>
                    <ol class="list-decimal pl-[25px] mt-[50px] max-sm:mt-[25px]">
                        <li class="text-[22px] max-sm:text-[16px]">Reservation Agreement (RA)</li>
                        <li class="text-[22px] max-sm:text-[16px]" >Government ID 1</li>
                        <li class="text-[22px] max-sm:text-[16px]">Meralco Application Form</li>
                        <li class="text-[22px] max-sm:text-[16px]">Certificate of Employment with Compensation</li>
                        <li class="text-[22px] max-sm:text-[16px]">Government ID 1</li>
                        <li class="text-[22px] max-sm:text-[16px]">Certificate of Employment </li>
                        <li class="text-[22px] max-sm:text-[16px]">CENOMAR</li>
                        <li class="text-[22px] max-sm:text-[16px]">Government ID 1</li>
                        <li class="text-[22px] max-sm:text-[16px]">TIN</li>
                        <li class="text-[22px] max-sm:text-[16px]">Government ID 1</li>
                    </ol>
                </div>

                <div class="grid items-center text-center gap-[16px] flex-wrap max-w-[410px] place-self-start">
                    <img class="w-[307px]" src="{{ bagisto_asset('images/document-files.svg') }}" />

                    <a class="ml-[0px] block mx-auto w-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] text-white text-[16px] font-medium py-[16px] px-[43px] rounded-[18px] text-center max-sm:w-max max-sm:mx-auto" href=""> 
                        Go to my Documents 
                    </a>
                    
                    <p class="text-[20px] font-bold max-sm:text-[16px]">Press the button above and enter your</p>
                    
                    <div class="flex gap-[8px] rounded-[10px] bg-[#F3F4F6] p-[8px] w-max mx-auto">
                        <p class="flex flex-wrap gap-[5px] ">
                            <span class="text-[20px] text-[#0066EE] font-bold max-sm:text-[16px]">
                                Reference Code:
                            </span>

                            <span class="text-[20px] text-[#0066EE] font-bold max-sm:text-[16px]">
                                JN-0921-001
                            </span>
                        </p>

                        <span class=""></span>
                    </div>

                    <p class="text-[20px] font-medium max-sm:text-[16px]">
                        to confirm and manage your documents.
                    </p>
                </div>
            </div>

        {!! view_render_event('bagisto.shop.customers.account.document.after') !!}
    </div>
</x-shop::layouts.account>