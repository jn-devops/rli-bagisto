<!-- Password -->
<x-admin::form.control-group class="relative w-full">
    <x-admin::form.control-group.label>
        @lang('admin::app.account.edit.password')
    </x-admin::form.control-group.label>

    <x-admin::form.control-group.control
        type="password"
        name="password"
        rules="min:6"
        id="password"
        ref="password"
        :placeholder="trans('admin::app.account.edit.password')"
    >
    </x-admin::form.control-group.control>

    <span 
        class="icon-view absolute top-[42px] -translate-y-2/4 cursor-pointer text-2xl ltr:right-2 rtl:left-2"
        onclick="switchVisibility('password')"
        id="visibilityIcon_password"
        role="presentation"
        tabindex="0"
    >
    </span>

    <x-admin::form.control-group.error
        control-name="password"
    >
    </x-admin::form.control-group.error>
</x-admin::form.control-group>

<!-- Confirm Password -->
<x-admin::form.control-group class="relative w-full">
    <x-admin::form.control-group.label>
        @lang('admin::app.account.edit.confirm-password')
    </x-admin::form.control-group.label>

    <x-admin::form.control-group.control
        type="password"
        name="password_confirmation"
        id="password_confirm"
        rules="confirmed:@password"
        :label="trans('admin::app.account.edit.confirm-password')"
        :placeholder="trans('admin::app.account.edit.confirm-password')"
    >
    </x-admin::form.control-group.control>

    <span 
        class="icon-view absolute top-[42px] -translate-y-2/4 cursor-pointer text-2xl ltr:right-2 rtl:left-2"
        onclick="switchVisibility('password_confirm')"
        id="visibilityIcon_password_confirm"
        role="presentation"
        tabindex="0"
    >
    </span>

    <x-admin::form.control-group.error 
        control-name="password_confirmation"
    >
    </x-admin::form.control-group.error>
</x-admin::form.control-group>

@push('scripts')
    <script>
        function switchVisibility(type) {
            let passwordField = document.getElementById(type);
            let visibilityIcon = document.getElementById("visibilityIcon_" + type);

            passwordField.type = passwordField.type === "password" ? "text" : "password";
            visibilityIcon.classList.toggle("icon-view-close");
        }
    </script>
@endpush