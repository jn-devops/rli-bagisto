<section class="inset-1 rounded-[1.25rem] border border-[rgba(237,_239,_245)] p-8 md:px-6 lg:px-[3.375rem] lg:py-[3.75rem]">
    <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7"> 
        @lang('enclaves::app.shop.customers.account.customer_profile.view.title') 
    </h3>
  
    <article class="py-8 md:py-[3.125rem]">
        @if(! empty($customer->attributes['personal_details'])) 
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    @foreach ($customer?->attributes['personal_details'] as $personal_details)
                        <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                            <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                                @lang('enclaves::app.shop.customers.account.customer_profile.view.personal_details.' . $personal_details->name)
                            </dt>

                            <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                                {{ $personal_details->value }}
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </table>
        @else
            <div class="grid justify-center">
                <img src="{{ bagisto_asset('images/icon-add-product.svg') }}" alt="no-details" />
            </div>

            <div class="flex flex-col items-center gap-1.5">
                <p class="text-base font-semibold text-gray-400">
                    @lang('enclaves::app.shop.customers.account.customer_profile.view.no_record')
                </p>
                
                <p class="text-gray-400">
                    @lang('enclaves::app.shop.customers.account.customer_profile.view.add_record')
                </p>
            </div>
        @endif
    </article>

    <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7">
        @lang('enclaves::app.shop.customers.account.customer_profile.view.employment_type.title')
    </h3>

    <article class="py-8 md:py-[3.125rem]">
        @if(! empty($customer->attributes['employment_type'])) 
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    @foreach ($customer->attributes['employment_type'] as $employment_type)
                        <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                            <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                                @lang('enclaves::app.shop.customers.account.customer_profile.view.employment_type.' . $employment_type->name)
                            </dt>

                            <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                                {{ $employment_type->value }} 
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </table>
        @else
            <div class="grid justify-center">
                <img src="{{ bagisto_asset('images/icon-add-product.svg') }}" alt="no-details" />
            </div>

            <div class="flex flex-col items-center gap-1.5">
                <p class="text-base font-semibold text-gray-400">
                    @lang('enclaves::app.shop.customers.account.customer_profile.view.no_record')
                </p>
                
                <p class="text-gray-400">
                    @lang('enclaves::app.shop.customers.account.customer_profile.view.add_record')
                </p>
            </div>
        @endif
    </article>

    <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7">
        @lang('enclaves::app.shop.customers.account.customer_profile.view.borrower_data.title')
    </h3>

    <article class="py-8 md:py-[3.125rem]">
        @if(! empty($customer->attributes['borrower_data']))
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    @foreach ($customer->attributes['borrower_data'] as $borrower_data)
                        <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                            <dt class="min-w-full whitespace-nowrap text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                                @lang('enclaves::app.shop.customers.account.customer_profile.view.borrower_data.' . $borrower_data->name)
                            </dt>

                            <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                                {{ $borrower_data->value }} 
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </table>
        @else
            <div class="grid justify-center">
                <img src="{{ bagisto_asset('images/icon-add-product.svg') }}" alt="no-details" />
            </div>

            <div class="flex flex-col items-center gap-1.5">
                <p class="text-base font-semibold text-gray-400">
                    @lang('enclaves::app.shop.customers.account.customer_profile.view.no_record')
                </p>
                
                <p class="text-gray-400">
                    @lang('enclaves::app.shop.customers.account.customer_profile.view.add_record')
                </p>
            </div>
        @endif
    </article>
</section>