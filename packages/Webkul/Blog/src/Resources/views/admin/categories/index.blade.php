<x-admin::layouts>
    <x-slot:title>
        @lang('blog::app.category.index.title')
    </x-slot:title>

    <div class="flex gap-[16px] justify-between items-center max-sm:flex-wrap">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('blog::app.category.index.title')
        </p>

        <div class="flex gap-x-[10px] items-center">
            @if (bouncer()->hasPermission('blog.category.create'))
                <a href="{{ route('admin.blog.category.create') }}">
                    <div class="primary-button">
                        @lang('blog::app.category.index.save-btn')
                    </div>
                </a>
            @endif
        </div>        
    </div>

    {!! view_render_event('bagisto.admin.catalog.categories.list.before') !!}

    <x-admin::datagrid src="{{ route('admin.blog.category.index') }}"></x-admin::datagrid>

    {!! view_render_event('bagisto.admin.catalog.categories.list.after') !!}
</x-admin::layouts>