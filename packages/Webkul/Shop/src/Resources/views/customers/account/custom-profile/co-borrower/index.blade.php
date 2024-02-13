<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.profile.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="profile"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between items-center">
        <h2 class="text-[26px] font-medium">
            @lang('shop::app.customers.account.profile.title')
        </h2>

        <a
            href="{{ route('shop.customers.account.profile.edit') }}"
            class="secondary-button py-[12px] px-[20px] border-[#E9E9E9] font-normal"
        >
            @lang('shop::app.customers.account.profile.edit')
        </a>
    </div>

    <!-- Profile Information -->
    <div class="grid grid-cols-1 gap-y-[25px] mt-[30px]">
        <!-- Profile Header -->
        <div class="flex justify-between px-[20px] py-[20px] border-[#E9E9E9] rounded-xl cursor-pointer bg-gray-100">
            <div class="flex gap-5">
                <!-- customer Image -->
                <div class="grid w-[150px] justify-items-start">
                    <img
                        src="{{ $customer->image_url ??  bagisto_asset('images/user-placeholder.png') }}"
                        class="w-[150px] h-[150px] rounded-full"
                        alt="Profile Image"
                    >
                </div>

                <!-- customer Details -->
                <div class="justify-items-start">
                    <h3 class="text-[20px] font-semibold">{{ $customer->first_name }}</h3>

                    <p class="font-mediums text-[15px] text-[#587bed]">@lang('Complete your profile 50/50%')</p>
                </div>
            </div>

            <!-- Action -->
            <div class="grid justify-items-end rounded-lg p-[10px] w-[240px] bg-[#9db2d1]">
                <p class="text-[20px] text-white font-semibold">@lang('Steps to get your dream house')</p>

                <button type="button" class="w-[100px] bg-white rounded-full text-[#5f6e85]">@lang('Read Now')</button>
            </div>
        </div>






        {!! view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]) !!}

        <!-- Profile Edit Form -->
        <x-shop::form
            :action="route('shop.customers.account.profile.store')"
            class="rounded mt-[30px]"
            enctype="multipart/form-data"
        >
            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}
            <div class="grid grid-cols-[2fr_3fr] w-full px-[30px] py-[12px] border-b-[1px] border-[#E9E9E9]">
                <div class="grid grid-cols-[2fr_3fr]">
                    <x-shop::form.control-group class="mb-4">
                        <x-shop::form.control-group.label class="required">
                            @lang('shop::app.customers.account.profile.first-name')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="text"
                            name="first_name"
                            :value="old('first_name') ?? $customer->first_name"
                            rules="required"
                            :label="trans('shop::app.customers.account.profile.first-name')"
                            :placeholder="trans('shop::app.customers.account.profile.first-name')"
                        >
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error
                            control-name="first_name"
                        >
                        </x-shop::form.control-group.error>
                    </x-shop::form.control-group>

                    {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.first_name.after') !!}
                </div>

                <div class="grid grid-cols-[2fr_3fr]">
                    <x-shop::form.control-group class="mb-4">
                        <x-shop::form.control-group.label class="required">
                            @lang('shop::app.customers.account.profile.last-name')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="text"
                            name="last_name"
                            :value="old('last_name') ?? $customer->last_name"
                            rules="required"
                            :label="trans('shop::app.customers.account.profile.last-name')"
                            :placeholder="trans('shop::app.customers.account.profile.last-name')"
                        >
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error
                            control-name="last_name"
                        >
                        </x-shop::form.control-group.error>
                    </x-shop::form.control-group>

                    {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.last_name.after') !!}
                </div>
            </div>

            <button
                type="submit"
                class="primary-button block m-0 w-max py-[11px] px-[43px] rounded-[18px] text-base text-right"
            >
                @lang('shop::app.customers.account.profile.save')
            </button>
            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]) !!}

        </x-shop::form>

        {!! view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]) !!}

    </div>

</x-shop::layouts.account>