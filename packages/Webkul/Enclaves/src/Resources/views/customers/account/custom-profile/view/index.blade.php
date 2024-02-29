<v-customer-view></v-customer-view>

@pushOnce('scripts')

<script type="text/x-template" id="v-customer-view-template">
    <section class="inset-1 rounded-[1.25rem] md:px-6 border border-[rgba(237,_239,_245)] p-8 lg:px-[3.375rem] lg:py-[3.75rem]">
        <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7"> 
            Personal Details 
        </h3>

        <article class="py-8 md:py-[3.125rem]">
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-semibold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.full-name')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->name }} 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.dob') 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->date_of_birth ?? '-' }}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.email')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->email ?? '-'}}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.phone')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->phone ?? '-'}}
                        </dd>
                    </div>

                    <!-- Static Content -->
                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Lot / Unit number: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> Lot A </dd>
                    </div>

                    <!-- Static Content -->
                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Civil Status: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Single
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.gender')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            {{ $customer->gender ?? '-'}}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="min-w-full whitespace-nowrap tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.addresses.address-1')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            {{ $customer->default_address->address1 ?? '-'}}
                        </dd>
                    </div>
                </dl>
            </table>
        </article>

        <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7">
            Employment Information 
        </h3>

        <article class="py-8 md:py-[3.125rem]">
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-semibold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.full-name')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->name }} 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.dob')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            {{ $customer->date_of_birth ?? '-' }}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 pb-8 sm:px-0 md:pb-[3.125rem]">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.email')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->email ?? '-'}} 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('shop::app.customers.account.profile.phone')
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->phone ?? '-'}}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Lot / Unit number: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Lot A 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Work Industry: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Information Technology 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Gross Income: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            20,000 
                        </dd>
                    </div>

                    <div
                        class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 pb-8 sm:px-0 md:pb-[3.125rem]">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Nationality: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Filipino
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employment Type: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Information Technology 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employment Status: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Regular 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Current Position: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            UI/UX Designer
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employer Name: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Raemulan Lands Inc. 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employer Contact Number:
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            09467786754
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employer Address: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            162 San Juan, Agoo, La Union, Philippines 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Tax Identification Number: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            998232314
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            PAG-IBIG Number: 
                        </dt>
                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                             1324244
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            SSS/GSIS Number: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            13423e3k
                        </dd>
                    </div>
                </dl>
            </table>
        </article>

        <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7">
            Borrower's Data (Spouse, Attorney in fact, Co-Borrower)
        </h3>

        <article class="py-8 md:py-[3.125rem]">
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 pb-4 sm:px-0">
                        <dt class="min-w-full tracking-tighter whitespace-nowrap sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-semibold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Secondary Home Address: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Maria Teresa Asprec 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Civil Status: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Single 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Gender: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Male 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Date of Birth: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                             June 24, 1995
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Primary Email Address:
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            charles@email.com 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Primary Phone Number: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            09456554343
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Work Industry 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Information Technology 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 pb-8 sm:px-0 md:pb-[3.125rem]">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Gross Income: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            P100,000 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Nationality: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Filipino 
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employment Type:
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Type
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employment Status:: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Employed
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Current Position: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Senior Developer
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employer Name: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Company ABCD
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employer Contact Number: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            09232323454
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Employer Address: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            Sample Address
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            Tax Identification Number:
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            123233
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            PAG-IBIG Number: 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            3424423
                        </dd>
                    </div>

                    <div class="flex flex-col gap-y-1.5 lg:flex-row lg:columns-2 gap-x-6 sm:px-0">
                        <dt class="w-full tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            SSS/GSIS Number:
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