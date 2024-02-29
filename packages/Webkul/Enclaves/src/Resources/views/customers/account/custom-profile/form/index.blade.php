<x-shop::tabs.tab>
    <x-shop::tabs.item
        title="Employment Information"
        isSelected="true"
        class="pt-5"
        >
        <section class="inset-1 grid gap-7 lg:gap-11 p-6 rounded-[1.25rem] border border-[rgba(237,_239,_245)] lg:px-[3.185rem] lg:py-[3.75rem] lg:grid-cols-2">
            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="employment-type"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                >
                    Employment  Type
                </label>

                <select 
                    id="employment-type"
                    name="employment-type"
                    autocomplete="employment-type"
                    class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                >
                    <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                    <option>Option1</option>
                    <option>Option2</option>
                    <option>Option3</option>
                </select>
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="gross-income"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                >
                    Gross Income
                </label>

                <input 
                    type="text"
                    id="gross-income"
                    name="gross-income"
                    placeholder="Enter"
                    autocomplete="gross-income"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="nationality"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                    Nationality
                </label>

                <select 
                    id="nationality"
                    name="nationality"
                    autocomplete="nationality"
                    class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                >
                    <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                    <option>Option1</option>
                    <option>Option2</option>
                    <option>Option3</option>
                </select>
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="work-industry"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                >
                    Work Industry
                </label>

                <select 
                    id="work-industry"
                    name="work-industry"
                    autocomplete="work-industry"
                    class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                >
                    <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                    <option>Option1</option>
                    <option>Option2</option>
                    <option>Option3</option>
                </select>
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="employment-status"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                    Employment Status
                </label>

                <select 
                    id="employment-status"
                    name="employment-status"
                    autocomplete="employment-status"
                    class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                >
                    <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                    <option>Option1</option>
                    <option>Option2</option>
                    <option>Option3</option>
                </select>
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="current-position"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                >
                    Current Position
                </label>

                <input 
                    type="text"
                    id="current-position"
                    name="current-position"
                    placeholder="Enter"
                    autocomplete="current-position"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="employer-name"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                >
                    Employer Name
                </label>

                <input 
                    type="text" 
                    id="employer-name" 
                    name="employer-name" 
                    placeholder="Enter"
                    autocomplete="employer-name"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="employer-contact-number"
                    class="block whitespace-nowrap text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                    Employer Contact Number
                </label>
                <input 
                    type="text"
                    id="employer-contact-number"
                    name="employer-contact-number"
                    placeholder="Enter" 
                    autocomplete="employer-contact-number"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="address"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                >
                    Employer Address
                </label>

                <input 
                    type="text" 
                    id="address" 
                    name="address" 
                    placeholder="Enter" 
                    autocomplete="address"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="tax-identification-number"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                >
                    Tax Identification Number
                </label>

                <input 
                    type="text" 
                    id="tax-identification-number" 
                    name="tax-identification-number"
                    placeholder="Enter" 
                    autocomplete="tax-identification-number"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="Pag-Ibig-number"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                    PAG-IBIG Number
                </label>

                <input 
                    type="text" 
                    id="Pag-Ibig-number" 
                    name="Pag-Ibig-number" 
                    placeholder="Enter"
                    autocomplete="Pag-Ibig-number"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>

            <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                <label 
                    for="Sss/Gsis-number"
                    class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                    SSS/GSIS Number
                </label>

                <input 
                    type="text" 
                    id="Sss/Gsis-number" 
                    name="Sss/Gsis-number" 
                    placeholder="Enter"
                    autocomplete="Sss/Gsis-number"
                    class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                />
            </div>
        </section>
    </x-shop::tabs.item>

    <x-shop::tabs.item
        title="Borrower's Data (Spouse, Attorney in fact, Co-Borrower)"
        class="pt-5"
        >
        <section class="rounded-[1.25rem] border border-[rgba(237,_239,_245)]">
            <div class="inset-1 gap-7 lg:gap-11 p-6 lg:px-[3.185rem] lg:py-[3.75rem] lg:grid-cols-2">
                <div>
                    <span class="font-semibold text-[21px]">
                        Full Name:
                    </span>
                    <span>
                        Maria Teresa Asprec
                    </span>
                </div>

                <div>
                    <span class="font-semibold text-[21px]">
                        Primary Home Address:
                    </span>
                    <span>
                        Floodway Street, Cambridge Village, Cluster One Duke
                    </span>
                </div>

                <div>
                    <span class="font-semibold text-[21px]">
                        Lot / Unit umber:
                    </span>
                    <span>
                        Lot A
                    </span>
                </div>
            </div>

            <div class="inset-1 grid gap-7 lg:gap-11 p-6 lg:px-[3.185rem] lg:grid-cols-2">
                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="employment-type"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Secondary Home Address
                    </label>

                    <input 
                        type="text"
                        id="gross-income"
                        name="secondary-home-address"
                        placeholder="Enter"
                        autocomplete="gross-income"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="gross-income"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Civil Status
                    </label>

                    <select 
                        id="employment-type"
                        name="employment-type"
                        autocomplete="employment-type"
                        class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                    >
                        <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                    </select>
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="nationality"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        Gender
                    </label>

                    <div class="flex flex-wrap items-center pt-1 gap-x-5 gap-y-5 lg:pt-8">
                        <div class="flex items-center gap-x-5 gap-y-5">
                            <input 
                                type="radio"
                                id="male"
                                name="gender"
                                class="size-7 appearance-none rounded-full border-2 border-white shadow-[0px_4px_4px] shadow-neutral-300 outline-none ring-0 checked:bg-blue-400 [&:not(checked)]:bg-[rgba(245,_245,_245)]" 
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
                        for="gross-income"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Date of Birth
                    </label>

                    <select 
                        id="employment-type"
                        name="employment-type"
                        autocomplete="employment-type"
                        class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                    >
                        <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                    </select>
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="primary-email-address"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        Primary Email Address
                    </label>

                    <input 
                        type="text"
                        id="primary-email-address"
                        name="primary-email-address"
                        placeholder="Enter"
                        autocomplete="primary-email-address"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="primary-mobile-address"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Primary Mobile Number
                    </label>

                    <input 
                        type="text"
                        id="primary-email-address"
                        name="primary-email-address"
                        placeholder="Enter"
                        autocomplete="primary-email-address"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="work-industry"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Work Industry
                    </label>

                    <input 
                        type="text"
                        id="work-industry"
                        name="work-industry"
                        placeholder="Enter"
                        autocomplete="work-industry"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="gross-income"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Gross Income
                    </label>

                    <input 
                        type="text"
                        id="gross-income"
                        name="gross-income"
                        placeholder="Enter"
                        autocomplete="gross-income"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="nationality"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Nationality
                    </label>

                    <select 
                        id="nationality"
                        name="nationality"
                        autocomplete="nationality"
                        class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                    >
                        <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                    </select>
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="employment-type"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Employment Type
                    </label>

                    <select 
                        id="employment-type"
                        name="employment-type"
                        autocomplete="off"
                        class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                    >
                        <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                    </select>
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="employment-status"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                    >
                        Employment Status
                    </label>

                    <select 
                        id="employment-status"
                        name="employment-status"
                        autocomplete="off"
                        class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                    >
                        <option class="text-[rgba(184,_184,_184)]" selected>Select</option>
                        <option>Option1</option>
                        <option>Option2</option>
                        <option>Option3</option>
                    </select>
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="current-position"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        Current Position
                    </label>

                    <input 
                        type="text" 
                        id="current-position" 
                        name="current-position" 
                        placeholder="Enter"
                        autocomplete="off"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="employer-position"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        Employer Name
                    </label>

                    <input 
                        type="text" 
                        id="employer-position" 
                        name="employer-position" 
                        placeholder="Enter"
                        autocomplete="off"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="employer-contact-number"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        Employer Contact Number
                    </label>

                    <input 
                        type="text" 
                        id="employer-contact-number" 
                        name="employer-contact-number" 
                        placeholder="Enter"
                        autocomplete="off"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="employer-address"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        Employer Address
                    </label>

                    <input 
                        type="text" 
                        id="employer-address" 
                        name="employer-address" 
                        placeholder="Enter"
                        autocomplete="off"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="tax-identification-number"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        Tax Identification Number
                    </label>

                    <input 
                        type="text" 
                        id="tax-identification-number" 
                        name="tax-identification-number" 
                        placeholder="Enter"
                        autocomplete="off"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="PAG-IBIG-number"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        PAG-IBIG Number
                    </label>

                    <input 
                        type="text" 
                        id="PAG-IBIG-number" 
                        name="PAG-IBIG-number" 
                        placeholder="Enter"
                        autocomplete="off"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>

                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                    <label 
                        for="SSS-GSIS-number"
                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                        >
                        SSS/GSIS Number
                    </label>

                    <input 
                        type="text" 
                        id="SSS-GSIS-number" 
                        name="SSS-GSIS-number" 
                        placeholder="Enter"
                        autocomplete="off"
                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                    />
                </div>
            </div>

        </section>
    </x-shop::tabs.item>
</x-shop::tabs.tab>