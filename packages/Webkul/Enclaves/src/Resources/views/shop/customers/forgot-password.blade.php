<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('shop::app.customers.forgot-password.title')"/>

    <meta name="keywords" content="@lang('shop::app.customers.forgot-password.title')"/>
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.forgot-password.title')
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
            <h1 class="text-[40px] font-bold text-center max-lg:text-[25px]">
                @lang('shop::app.customers.forgot-password.title')
            </h1>

            {!! view_render_event('bagisto.shop.customers.forget_password.before') !!}

            <div class="mt-[60px] rounded max-lg:mt-[30px]">
                <x-shop::form :action="route('shop.customers.forgot_password.store')" class="rounded mt-[60px] max-lg:mt-[30px]">
                    {!! view_render_event('bagisto.shop.customers.forget_password_form_controls.before') !!}

                    <x-shop::form.control-group class="mb-4">
                        <x-shop::form.control-group.label class="required">
                            @lang('shop::app.customers.login-form.email')
                        </x-shop::form.control-group.label>

                        <x-shop::form.control-group.control
                            type="email"
                            name="email"
                            class="text-[20px] shadow appearance-none border rounded-[16px] w-full py-2 px-3 focus:outline-none focus:shadow-outline"
                            value=""
                            rules="required|email"
                            :label="trans('shop::app.customers.login-form.email')"
                            placeholder="email@example.com"
                        >
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error
                            control-name="email"
                        >
                        </x-shop::form.control-group.error>
                    </x-shop::form.control-group>

                    {!! view_render_event('bagisto.shop.customers.forget_password_form_controls.email.after') !!}

                    <div>

                        {!! Captcha::render() !!}

                    </div>

                    <button
                    class="mt-[60px] ml-[0px] block mx-auto w-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)]  text-white text-[16px] font-medium py-[16px] px-[43px] rounded-[18px] text-center"
                        type="submit"
                    >
                        @lang('shop::app.customers.forgot-password.submit')
                    </button>

                    <p class="mt-[20px] text-[#6E6E6E] font-medium">
                        @lang('shop::app.customers.forgot-password.back')

                        <a class="text-navyBlue"
                            href="{{ route('shop.customer.session.index') }}"
                        >
                            @lang('shop::app.customers.forgot-password.sign-in-button')
                        </a>
                    </p>

                    {!! view_render_event('bagisto.shop.customers.forget_password.after') !!}

                </x-shop::form>
            </div>
        </div>

        <p class="mt-[30px] mb-[15px] text-[#6E6E6E] text-xs text-center">
            @lang('shop::app.customers.forgot-password.footer', ['current_year'=> date('Y') ])
        </p>
    </div>

    @push('scripts')

        {!! Captcha::renderJS() !!}

    @endpush
</x-shop::layouts>
