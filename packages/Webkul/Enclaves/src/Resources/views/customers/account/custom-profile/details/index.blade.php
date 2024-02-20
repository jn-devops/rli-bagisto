<div class="grid grid-cols-[2fr_3fr] w-full px-[30px] py-[12px] border-b-[1px] border-[#E9E9E9]">
    <div class="grid grid-cols-[2fr_3fr]">
        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.full-name')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->name }}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.first-name')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->first_name }}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.middle-name')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->middle_name ?? '-' }}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.last-name')
        </p>

        <p class="text-[14px] font-medium text-[#6E6E6E]">
            {{ $customer->last_name ?? '-' }}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.suffix')
        </p>

        <p class="text-[14px] font-medium text-[#6E6E6E]">
            {{  $customer->suffix ?? '-' }}
        </p>
    </div>

    <div class="grid grid-cols-[2fr_3fr]">
        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.dob')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->date_of_birth ?? '-' }}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.gender')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->gender ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.marital-status')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->marital_status ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.country-code')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->country_code ?? '-'}}
        </p>
    </div>
</div>

<div class="grid grid-cols-[2fr_3fr] w-full px-[30px] py-[12px] border-b-[1px] border-[#E9E9E9]">
    <div class="grid grid-cols-[2fr_3fr]">
        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.email')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->email ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.type')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->email_type ?? '-'}}
        </p>
    </div>

    <div class="grid grid-cols-[2fr_3fr]">
        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.phone')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->phone ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.profile.type')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->phone_type ?? '-'}}
        </p>
    </div>
</div>

<div class="grid grid-cols-[2fr_3fr] w-full px-[30px] py-[12px] border-b-[1px]">
    <div class="grid grid-cols-[2fr_3fr]">
        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.addresses.type')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->default_address->address_type ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.addresses.title')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->address ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.addresses.address-1')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->default_address->address1 ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.addresses.address-2')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->default_address->address2 ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.addresses.city')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->default_address->city ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.addresses.region')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->default_address->state ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.addresses.country')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->default_address->country ?? '-'}}
        </p>

        <p class="text-[14px] font-medium">
            @lang('shop::app.customers.account.addresses.zip')
        </p>

        <p class="text-[14px] text-[#6E6E6E] font-medium">
            {{ $customer->default_address->postcode ?? '-'}}
        </p>
    </div>
</div>
