<!-- Password -->
<x-admin::form.control-group class="mb-[10px]">
    <x-admin::form.control-group.label class="required">
        @lang('admin::app.account.edit.password')
    </x-admin::form.control-group.label>

    <x-admin::form.control-group.control
        type="password"
        name="password"
        rules="min:6|required"
        ref="password"
        :placeholder="trans('admin::app.account.edit.password')"
    >
    </x-admin::form.control-group.control>

    <x-admin::form.control-group.error
        control-name="password"
    >
    </x-admin::form.control-group.error>
</x-admin::form.control-group>

<!-- Confirm Password -->
<x-admin::form.control-group class="mb-[10px]">
    <x-admin::form.control-group.label class="required">
        @lang('admin::app.account.edit.confirm-password')
    </x-admin::form.control-group.label>

    <x-admin::form.control-group.control
        type="password"
        name="password_confirmation"
        rules="confirmed:@password|required"
        :label="trans('admin::app.account.edit.confirm-password')"
        :placeholder="trans('admin::app.account.edit.confirm-password')"
    >
    </x-admin::form.control-group.control>

    <x-admin::form.control-group.error 
        control-name="password_confirmation"
    >
    </x-admin::form.control-group.error>
</x-admin::form.control-group>