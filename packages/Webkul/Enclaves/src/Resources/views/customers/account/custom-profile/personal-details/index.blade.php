<section class="inset-1 rounded-[1.25rem] border border-[rgba(237,_239,_245)] p-8 lg:px-[3.375rem] lg:py-[3.75rem]">
    <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7"> 
        Personal Details 
    </h3>

    <article class="pt-6 pb-8 md:pt-[4.375rem] md:pb-[3.625rem]">
        <table class="table-auto">
            <dl class="flex flex-col gap-4">
                <div class="flex flex-col gap-y-1.5 md:flex-row md:columns-2 gap-x-6 sm:px-0">
                    <dt class="tracking-tighter sm:tracking-normal w-[10rem] min-w-[10rem] sm:w-[13rem] sm:min-w-[13rem] whitespace-nowrap text-base font-semibold leading-5 text-gray-900 md:w-[16rem] md:min-w-[16rem] md:text-xl">
                        @lang('shop::app.customers.account.profile.full-name') 
                    </dt>

                    <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                        {{ $customer->name }}
                    </dd>
                </div>

                <div class="flex flex-col gap-y-1.5 md:flex-row md:columns-2 gap-x-6 sm:px-0">
                    <dt class="tracking-tighter sm:tracking-normal w-[10rem] min-w-[10rem] sm:w-[13rem] sm:min-w-[13rem] whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[16rem] md:min-w-[16rem] md:text-xl">
                        @lang('shop::app.customers.account.profile.dob')
                    </dt>

                    <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                        {{ $customer->date_of_birth ?? '-' }}
                    </dd>
                </div>

                <div class="flex flex-col gap-y-1.5 md:flex-row md:columns-2 gap-x-6 sm:px-0">
                    <dt class="tracking-tighter sm:tracking-normal w-[10rem] min-w-[10rem] sm:w-[13rem] sm:min-w-[13rem] whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[16rem] md:min-w-[16rem] md:text-xl">
                        @lang('shop::app.customers.account.profile.email') 
                    </dt>

                    <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                        {{ $customer->email ?? '-'}}
                    </dd>
                </div>

                <div class="flex flex-col gap-y-1.5 md:flex-row md:columns-2 gap-x-6 sm:px-0">
                    <dt class="tracking-tighter sm:tracking-normal w-[10rem] min-w-[10rem] sm:w-[13rem] sm:min-w-[13rem] whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[16rem] md:min-w-[16rem] md:text-xl">
                        @lang('shop::app.customers.account.profile.phone')
                    </dt>

                    <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                        {{ $customer->phone ?? '-'}}
                    </dd>
                </div>

                <div class="flex flex-col gap-y-1.5 md:flex-row md:columns-2 gap-x-6 sm:px-0">
                    <dt class="tracking-tighter sm:tracking-normal w-[10rem] min-w-[10rem] sm:w-[13rem] sm:min-w-[13rem] whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[16rem] md:min-w-[16rem] md:text-xl">
                        Lot / Unit number: 
                    </dt>

                    <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Lot A 
                    </dd>
                </div>
            </dl>
        </table>
    </article>

    <article>
        <div class="grid gap-7 lg:gap-9 lg:grid-cols-2">
            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="civil-status"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]">
                    Civil Status
                </label>

                <select 
                    id="civil-status"
                    name="civil-status"
                    autocomplete="civil-status"
                    class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                >
                    <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                    <option>Option1</option>
                    <option>Option2</option>
                    <option>Option3</option>
                </select>
            </div>

            <div class="flex flex-col min-w-full gap-2">
                <p class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]">
                    @lang('shop::app.customers.account.profile.gender') 
                </p>

                <div class="flex flex-wrap items-center pt-1 gap-x-5 gap-y-5 lg:pt-8">
                    <div class="flex items-center gap-x-5 gap-y-5">
                        <input 
                            type="radio"
                            id="male"
                            name="gender"
                            class="size-7 appearance-none rounded-full border-2 border-white shadow-[0px_4px_4px] shadow-neutral-300 outline-none ring-0 checked:bg-blue-400 [&:not(checked)]:bg-[rgba(245,_245,_245)]" 
                            
                            @if ($customer->gender == 'Male')
                                clicked
                            @endif
                        />

                        <label 
                            for="male"
                            class="block text-[1.313rem] font-medium leading-[1.313rem] text-black"
                        >
                            Male
                        </label>
                    </div>

                    <div class="flex items-center gap-x-5 gap-y-5">
                        <input 
                            type="radio"
                            id="female"
                            name="gender"
                            class="size-7 appearance-none rounded-full border-2 border-white shadow-[0px_4px_4px] shadow-neutral-300 outline-none ring-0 checked:bg-blue-400 [&:not(checked)]:bg-[rgba(245,_245,_245)]" 
                        />
                        <label 
                            for="female"
                            class="block text-[1.313rem] font-medium leading-[1.313rem] text-black"
                            
                            @if ($customer->gender == 'Male')
                                clicked
                            @endif
                        >
                            Female
                        </label>
                    </div>

                    <div class="flex items-center gap-x-5 gap-y-5">
                        <input 
                            type="radio"
                            id="male"
                            name="gender"
                            class="size-7 appearance-none rounded-full border-2 border-white shadow-[0px_4px_4px] shadow-neutral-300 outline-none ring-0 checked:bg-blue-400 [&:not(checked)]:bg-[rgba(245,_245,_245)]" 
                            
                            @if ($customer->gender == 'Other')
                                clicked
                            @endif
                        />

                        <label 
                            for="male"
                            class="block text-[1.313rem] font-medium leading-[1.313rem] text-black"
                        >
                            Other
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="address"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                >
                    @lang('shop::app.customers.account.addresses.address-1')
                </label>

                <input 
                    type="text"
                    id="address"
                    name="address"
                    value="{{ $customer->default_address->address1 ?? '-'}}"
                    placeholder="Enter Address"
                    autocomplete="address"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>
        </div>
    </article>
</section>