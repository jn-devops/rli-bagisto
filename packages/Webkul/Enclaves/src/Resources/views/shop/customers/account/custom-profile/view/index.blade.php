<v-customer-view></v-customer-view>

@pushOnce('scripts')

<script type="text/x-template" id="v-customer-view-template">
    <section class="inset-1 rounded-[1.25rem] border border-[rgba(237,_239,_245)] p-8 md:px-6 lg:px-[3.375rem] lg:py-[3.75rem]">
        <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7"> 
            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.full-name') 
        </h3>

        <article class="py-8 md:py-[3.125rem]">
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.full-name')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->name }} 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.dob')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->date_of_birth ?? '-' }}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.email') 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->email ?? '-'}}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.phone')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->phone ?? '-'}}
                        </dd>
                    </div>

                    <!-- Static Content -->
                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.lot-unit-number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> Lot A </dd>
                    </div>

                    <!-- Static Content -->
                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.civil-status')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Single
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.gender')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            {{ $customer->gender ?? '-'}}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="min-w-full whitespace-nowrap font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:text-base sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.info.address-1') 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            {{ $customer->default_address->address1 ?? '-'}}
                        </dd>
                    </div>
                </dl>
            </table>
        </article>

        <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7">
            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.title')
        </h3>

        <article class="py-8 md:py-[3.125rem]">
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.full-name')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->name }} 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.dob')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            {{ $customer->date_of_birth ?? '-' }}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 pb-8 sm:px-0 md:pb-[3.125rem] lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.email')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->email ?? '-'}} 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.phone')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->phone ?? '-'}}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.lot-unit-number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Lot A 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.work-industry')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Information Technology 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.gross-income')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            20,000 
                        </dd>
                    </div>

                    <div
                        class="flex flex-col gap-x-6 gap-y-1.5 pb-8 sm:px-0 md:pb-[3.125rem] lg:columns-2 lg:flex-row">
                        <dt class="w-full font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:text-base sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.nationality')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Filipino
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.employment.type')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Information Technology 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.employment.status')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Regular 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.current-position')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            UI/UX Designer
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.employer.name')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Raemulan Lands Inc. 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.employer.number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            09467786754
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.employer.address')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            162 San Juan, Agoo, La Union, Philippines 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.tax-identification-number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            998232314
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.PAG-IBIG-number')
                        </dt>
                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                             1324244
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.information.SSS-GSIS-number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            13423e3k
                        </dd>
                    </div>
                </dl>
            </table>
        </article>

        <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7">
            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.title')
        </h3>

        <article class="py-8 md:py-[3.125rem]">
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    <div class="flex flex-col gap-x-6 gap-y-1.5 pb-4 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="min-w-full whitespace-nowrap text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.secondary-address')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Maria Teresa Asprec 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.civil-status')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Single 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.gender')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Male 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.dob')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                             June 24, 1995
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.primary-email-address')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            charles@email.com 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.primary-phone-number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            09456554343
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.work-industry')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Information Technology 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 pb-8 sm:px-0 md:pb-[3.125rem] lg:columns-2 lg:flex-row">
                        <dt class="w-full font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:text-base sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.gross-income')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            P100,000 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.nationality')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Filipino 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.employment.type')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Type
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.employment.status')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Employed
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.current-position')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Senior Developer
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.employer.name')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Company ABCD
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.employer.number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            09232323454
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.employer.address')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Sample Address
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.tax-identification-number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            123233
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.PAG-IBIG-number')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            3424423
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-bold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.view.co-borrower.SSS-GSIS-number')
                        </dt>
                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            32324242
                        </dd>
                    </div>
                </dl>
            </table>
        </article>
    </section>
</script>

<script type="module">

app.component("v-customer-view", {
        template: '#v-customer-view-template',

        data() {
            return {
            };
        },

        methods: {
        },
    });
</script>
@endpushOnce