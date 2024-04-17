<!-- Add code into category edit page -->
<x-admin::accordion>
    <x-slot:header>
        <p class="required p-[10px] text-[16px] font-semibold text-gray-600 dark:text-gray-300">
            @lang('enclaves::app.admin.catalog.category.index.button-setting')
        </p>
    </x-slot:header>
    
    <x-slot:content class="pointer-events-none">
        <x-admin::form.control-group class="mb-[10px]">
            <x-admin::form.control-group.label class="required">
                @lang('enclaves::app.admin.catalog.category.index.button.text')
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="text"
                name="btn_text"
                :value="old('btn_text')"
                ::rules="{ required: true}"
                :label="trans('enclaves::app.admin.catalog.category.index.button.text')"
                :placeholder="trans('enclaves::app.admin.catalog.category.index.button.text')"
            >
            </x-admin::form.control-group.control>

            <x-admin::form.control-group.error
                control-name="btn_text"
            >
            </x-admin::form.control-group.error>
        </x-admin::form.control-group>

        <x-admin::form.control-group class="mb-[10px]">
            <x-admin::form.control-group.label class="required">
                @lang('enclaves::app.admin.catalog.category.index.button.color')
            </x-admin::form.control-group.label>

            <p class="text-[12px] text-gray-500">
                @lang('enclaves::app.admin.catalog.category.index.button.field-info')
            </p>

            <x-admin::form.control-group.control
                type="text"
                name="btn_color"
                :value="old('btn_color')"
                ::rules="{ required: true, regex: /^#([A-Za-z0-9]+)$/ }"
                :label="trans('enclaves::app.admin.catalog.category.index.button.color')"
                :placeholder="trans('enclaves::app.admin.catalog.category.index.button.color')"
            >
            </x-admin::form.control-group.control>

            <x-admin::form.control-group.error
                control-name="btn_color"
            >
            </x-admin::form.control-group.error>
        </x-admin::form.control-group>

        <x-admin::form.control-group class="mb-[10px]">
            <x-admin::form.control-group.label class="required">
                @lang('enclaves::app.admin.catalog.category.index.button.border-color')
            </x-admin::form.control-group.label>

            <p class="text-[12px] text-gray-500">
                @lang('enclaves::app.admin.catalog.category.index.button.field-info')
            </p>

            <x-admin::form.control-group.control
                type="text"
                name="btn_border_color"
                :value="old('btn_border_color')"
                ::rules="{ required: true, regex: /^#([A-Za-z0-9]+)$/ }"
                :label="trans('enclaves::app.admin.catalog.category.index.button.border-color')"
                :placeholder="trans('enclaves::app.admin.catalog.category.index.button.border-color')"
            >
            </x-admin::form.control-group.control>

            <x-admin::form.control-group.error
                control-name="btn_border_color"
            >
            </x-admin::form.control-group.error>
        </x-admin::form.control-group>
        
        <x-admin::form.control-group class="mb-[10px]">
            <x-admin::form.control-group.label class="required">
                @lang('enclaves::app.admin.catalog.category.index.button.background-color')
            </x-admin::form.control-group.label>

            <p class="text-[12px] text-gray-500">
                @lang('enclaves::app.admin.catalog.category.index.button.field-info')
            </p>

            <x-admin::form.control-group.control
                type="text"
                name="btn_background_color"
                :value="old('background_color')"
                ::rules="{ required: true, regex: /^#([A-Za-z0-9]+)$/ }"
                :label="trans('enclaves::app.admin.catalog.category.index.button.background-color')"
                :placeholder="trans('enclaves::app.admin.catalog.category.index.button.background-color')"
            >
            </x-admin::form.control-group.control>

            <x-admin::form.control-group.error
                control-name="btn_background_color"
            >
            </x-admin::form.control-group.error>
        </x-admin::form.control-group>

        <x-admin::form.control-group class="mb-[10px]">
            <x-admin::form.control-group.label class="required">
                @lang('enclaves::app.admin.catalog.category.index.button.sort')
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="number"
                name="sort"
                :value="old('sort')"
                ::rules="{required: true}"
                :label="trans('enclaves::app.admin.catalog.category.index.button.sort')"
                :placeholder="trans('enclaves::app.admin.catalog.category.index.button.sort')"
            >
            </x-admin::form.control-group.control>

            <x-admin::form.control-group.error
                control-name="sort"
            >
            </x-admin::form.control-group.error>
        </x-admin::form.control-group>
    </x-slot:content>
</x-admin::accordion>