@php
    $currentLocale = core()->getRequestedLocale();
@endphp

<x-admin::accordion>
    <x-slot:header>
        <div class="flex items-center justify-between">
            <p class="p-2.5 text-base font-semibold text-gray-800 dark:text-white">
                @lang('enclaves::app.admin.cms.title')
            </p>
        </div>
    </x-slot>
    <x-slot:content>
        <x-admin::form.control-group>
            <x-admin::form.control-group.label class="required">
                @lang('enclaves::app.admin.cms.btn-title')
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="text"
                id="btn_title"
                name="btn_title"
                rules="required"
                :value="old($currentLocale->code)['btn_title'] ?? ($page->translate($currentLocale->code)['btn_title'] ?? '')"
                :label="trans('enclaves::app.admin.cms.btn-title')"
                :placeholder="trans('enclaves::app.admin.cms.btn-title')"
            />

            <x-admin::form.control-group.error control-name="btn_title" />
        </x-admin::form.control-group>
    </x-slot:content>
</x-admin::accordion>