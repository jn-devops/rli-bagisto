<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('enclaves::app.admin.inquiries.title')
    </x-slot:title>

    <div class="flex justify-between items-center">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('enclaves::app.admin.inquiries.title')
        </p>

        <div class="flex gap-x-[10px] items-center">
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('enclaves.admin.inquiries.index') }}"></x-admin::datagrid.export>

            <div class="flex gap-x-[10px] items-center">
                <!-- Inquiries Create Vue Component -->
                {!! view_render_event('admin.inquiries.create.before') !!}

                @include('enclaves::admin.inquiries.form.create')

                {!! view_render_event('admin.inquiries.create.after') !!}
            </div>
        </div>
    </div>

    {!! view_render_event('bagisto.admin.inquiries.list.before') !!}

        <x-admin::datagrid :src="route('enclaves.admin.inquiries.index')"></x-admin::datagrid>

    {!! view_render_event('bagisto.admin.inquiries.list.after') !!}
</x-admin::layouts>
