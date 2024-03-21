<!-- Password -->
<x-admin::form.control-group class="mb-[10px]">
    <x-admin::form.control-group.label>
        @lang('admin::app.account.edit.password')
    </x-admin::form.control-group.label>

    <x-admin::form.control-group.control
        type="password"
        name="password"
        rules="min:6"
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
    <x-admin::form.control-group.label>
        @lang('admin::app.account.edit.confirm-password')
    </x-admin::form.control-group.label>

    <x-admin::form.control-group.control
        type="password"
        name="password_confirmation"
        rules="confirmed:@password"
        :label="trans('admin::app.account.edit.confirm-password')"
        :placeholder="trans('admin::app.account.edit.confirm-password')"
    >
    </x-admin::form.control-group.control>

    <x-admin::form.control-group.error 
        control-name="password_confirmation"
    >
    </x-admin::form.control-group.error>
</x-admin::form.control-group>