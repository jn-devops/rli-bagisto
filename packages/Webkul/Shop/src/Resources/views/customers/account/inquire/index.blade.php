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
                @lang('shop::app.customers.account.inquiries.title')
            </h2>
        </div>
    </div>


    <div class="p-3 pt-10 justify-between items-center">
        <div class="mb-14">
            <h1 class="font-bold text-[25px]">@lang('How can we help you?')</h1>
        </div>

        <div class="flex justify-between gap-4">
            <div 
                class="p-4 flex justify-between items-center border shadow-xl rounded-lg gap-2"
                @click="$refs.addGroupModal.open()"
            >
                <div class="rounded-full border p-5">
                    <img src="{{ bagisto_asset('images/ticket-active.svg') }}" alt="ticket" class="h-[50px] w-[125px]"/>
                </div>
                <div> 
                    <p class="text-[20px] font-bold mb-2">Sumit Ticket</p>
                    <p class="text-[17px]">Click here to report your concern and we will respons as soon as we can.</p>
                </div>
                <div>
                    <img src="{{ bagisto_asset('images/arrow-right.svg') }}" alt="arrow-right"  class="h-[50px] w-[100px]"/>
                </div>
            </div>

            <div class="p-4 flex justify-between items-center border shadow-xl rounded-lg gap-2">
                <div class="rounded-full border p-5">
                    <img src="{{ bagisto_asset('images/ticket-deactive.svg') }}" alt="ticket" class="h-[50px] w-[125px]"/>
                </div>
                <div> 
                    <p class="text-[20px] font-bold mb-2">Your Tickets</p>
                    <p class="text-[17px]">You can follow-up and get updates on your active tickets here.</p>
                </div>
                <div>
                    <img src="{{ bagisto_asset('images/arrow-right.svg') }}" alt="arrow-right" class="h-[50px] w-[100px]"/>
                </div>
            </div>
        </div>

        <div class="mb-10 mt-10">
            <h1 class="font-bold text-[25px]">@lang('Frequently Asked Questions')</h1>
        </div>

        <x-shop::accordion.custom-accordion :is-active=false>
            <x-slot:header>
                <div>Is it safe to buy or rent property online?</div>
            </x-slot:header>
            <x-slot:content>
                {{ "Safety in property ecommerce depends on several factors, including the reputation of the platform, verification processes for listings and users, and adherence to legal regulations. Reputable platforms implement security measures to protect users' personal and financial information and often provide escrow services to secure transactions. However, it's essential for buyers and renters to exercise due diligence, verify property details, and be cautious of potential scams." }}
            </x-slot:content>
        </x-shop::accordion.custom-accordion>

        <x-shop::accordion.custom-accordion :is-active=false>
            <x-slot:header>
                <div>Is it safe to buy or rent property online?</div>
            </x-slot:header>
            <x-slot:content>
                {{ "Safety in property ecommerce depends on several factors, including the reputation of the platform, verification processes for listings and users, and adherence to legal regulations. Reputable platforms implement security measures to protect users' personal and financial information and often provide escrow services to secure transactions. However, it's essential for buyers and renters to exercise due diligence, verify property details, and be cautious of potential scams." }}
            </x-slot:content>
        </x-shop::accordion.custom-accordion>


        <!-- Profile Delete modal -->
        <x-shop::modal ref="addGroupModal">
            <x-slot:header>
                <h2 class="text-[20px] font-medium max-sm:text-[22px]">
                    @lang('Submit A Ticket')
                </h2>
            </x-slot:header>

            <x-slot:content>
                <x-shop::form
                    action="{{ route('shop.customers.account.profile.destroy') }}"
                >
                    <x-shop::form.control-group>
                        <div class="px-[30px] py-[20px] bg-white">
                                <x-shop::form.control-group.control
                                    type="select"
                                    name="reason"
                                    class="py-[20px] px-[25px]"
                                    rules="required"
                                    placeholder="@lang('Enter your password')"
                                >
                                    <option value="Reservation Fee">Reservation Fee</option>
                                
                                </x-admin::form.control-group.control>
                                
                                <x-shop::form.control-group.error
                                    class=" text-left"
                                    control-name="password"
                                >
                                </x-shop::form.control-group.error>
                        </div>
                    </x-shop::form.control-group>

                    <x-shop::form.control-group>
                        <div class="px-[30px] bg-white">
                            <x-shop::form.control-group.control
                                type="textarea"
                                name="text"
                                class="py-[20px] px-[25px] h-[150px]"
                                rules="required"
                                placeholder="Enter your password"
                            />

                            <x-shop::form.control-group.error
                                class=" text-left"
                                control-name="password"
                            >
                            </x-shop::form.control-group.error>
                        </div>
                    </x-shop::form.control-group>

                    <div class="flex px-[30px] bg-white mt-[20px]">
                        <button
                            type="submit"
                            class="primary-button flex py-[11px] px-[30px] rounded-[18px] max-sm:text-[14px] max-sm:px-[25px] !bg-[#F8EBEB] text-[#CC035C] border-[#F8EBEB]"
                        >
                            <img src="{{ bagisto_asset('images/upload-file.png') }}" alt="upload-file" />

                            @lang('Upload Files')
                        </button>
                    </div>
                </x-shop::form>
            </x-slot:content>
        </x-shop::modal>
    </div>
</x-shop::layouts.account>