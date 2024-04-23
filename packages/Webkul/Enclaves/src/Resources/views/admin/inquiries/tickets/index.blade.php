<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('enclaves::app.admin.inquiries.tickets.title')
    </x-slot:title>

    <div class="flex items-center justify-between">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('enclaves::app.admin.inquiries.tickets.title')
        </p>

        <div class="flex items-center gap-x-[10px]">
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('enclaves.admin.inquiries.tickets') }}"></x-admin::datagrid.export>

            <div class="flex items-center gap-x-[10px]">
                <!-- Inquiries Create Vue Component -->
                {!! view_render_event('admin.inquiries.create.before') !!}

                @include('enclaves::admin.inquiries.tickets.form.create')

                {!! view_render_event('admin.inquiries.create.after') !!}
            </div>
        </div>
    </div>

    {!! view_render_event('bagisto.admin.inquiries.list.before') !!}

        <x-admin::datagrid :src="route('enclaves.admin.inquiries.tickets')"></x-admin::datagrid>

    {!! view_render_event('bagisto.admin.inquiries.list.after') !!}
</x-admin::layouts>
