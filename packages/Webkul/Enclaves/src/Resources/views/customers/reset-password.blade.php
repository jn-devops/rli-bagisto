<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('shop::app.customers.reset-password.title')"/>

    <meta name="keywords" content="@lang('shop::app.customers.reset-password.title')"/>
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.reset-password.title')
    </x-slot>

    <div class="container mt-20 max-1180:px-[20px]">
        <!-- Company Logo -->
        <a
            href="{{ route('shop.home.index') }}"
            class="m-[0_auto_20px_auto]"
            aria-label="Bagisto "
        >
            <img
                src="{{ bagisto_asset('images/logo.svg') }}"
                alt="Bagisto"
                class="w-[322px] h-[145px] mx-auto mb-[58px]"
            >
        </a>

        <!-- Form Container -->
        <div
            class="w-full max-w-[870px] m-auto [box-shadow:0px_4px_40px_0px_rgba(0,_0,_0,_0.1)] px-[90px] py-[60px] rounded-[12px] max-md:px-[30px] max-md:py-[30px]"
        >
            <h1 class="text-[40px] font-bold text-center max-sm:text-[25px]">
                @lang('shop::app.customers.reset-password.title')
            </h1>

            {!! view_render_event('bagisto.shop.customers.reset_password.before') !!}

            <div class="mt-[60px] rounded max-sm:mt-[30px]">
                <x-shop::form :action="route('shop.customers.reset_password.store')"  class="rounded mt-[60px] max-sm:mt-[30px]">
                    <x-shop::form.control-group.control
                        type="hidden"
                        name="token"
                        :value="$token"
                    >
                    </x-shop::form.control-group.control>

                    {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.before') !!}

                    <x-shop::form.control-group class="mb-4">
                        <x-shop::form.control-group.label class="required">
                            @lang('shop::app.customers.reset-password.email')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="email"
                            name="email"
                            class="text-[20px] shadow appearance-none border rounded-[16px] w-full py-2 px-3 focus:outline-none focus:shadow-outline"
                            :value="old('email')"
                            id="email"
                            rules="required|email"
                            :label="trans('shop::app.customers.reset-password.email')"
                            placeholder="email@example.com"
                        >
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error
                            control-name="email"
                        >
                        </x-shop::form.control-group.error>
                    </x-shop::form.control-group>

                    <x-shop::form.control-group class="mb-6">
                        <x-shop::form.control-group.label class="required">
                            @lang('shop::app.customers.reset-password.password')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="password"
                            name="password"
                            class="text-[20px] shadow appearance-none border rounded-[16px] w-full py-2 px-3 focus:outline-none focus:shadow-outline"
                            value=""
                            ref="password"
                            rules="required|min:6"
                            :label="trans('shop::app.customers.reset-password.password')"
                            :placeholder="trans('shop::app.customers.reset-password.password')"
                        >
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error
                            control-name="password"
                        >
                        </x-shop::form.control-group.error>
                    </x-shop::form.control-group>

                    <x-shop::form.control-group class="mb-6">
                        <x-shop::form.control-group.label>
                            @lang('shop::app.customers.reset-password.confirm-password')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="password"
                            name="password_confirmation"
                            class="text-[20px] shadow appearance-none border rounded-[16px] w-full py-2 px-3 focus:outline-none focus:shadow-outline"
                            value=""
                            rules="confirmed:@password"
                            :label="trans('shop::app.customers.reset-password.confirm-password')"
                            :placeholder="trans('shop::app.customers.reset-password.confirm-password')"
                        >
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error
                            control-name="password"
                        >
                        </x-shop::form.control-group.error>
                    </x-shop::form.control-group>

                    {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.after') !!}

                    <button
                        class="mt-[60px] ml-[0px] block mx-auto w-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)]  text-white text-[16px] font-medium py-[16px] px-[43px] rounded-[18px] text-center"
                        type="submit"
                    >
                        @lang('shop::app.customers.reset-password.submit-btn-title')
                    </button>
                </x-shop::form>
            </div>

            {!! view_render_event('bagisto.shop.customers.reset_password.after') !!}

        </div>

        <p class="mt-[30px] mb-[15px] text-center text-[#6E6E6E] text-xs">
            @lang('shop::app.customers.reset_password.footer', ['current_year'=> date('Y') ])
        </p>
    </div>
</x-shop::layouts>
