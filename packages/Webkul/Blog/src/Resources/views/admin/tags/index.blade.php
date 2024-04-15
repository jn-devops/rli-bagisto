<x-admin::layouts>
    <x-slot:title>
        @lang('blog::app.tag.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-[16px] max-sm:flex-wrap">
        <p class="text-[20px] font-bold text-gray-800 dark:text-white">
            @lang('blog::app.tag.index.title')
        </p>

        <div class="flex items-center gap-x-[10px]">
            @if (bouncer()->hasPermission('blog.tag.create'))
                <a href="{{ route('admin.blog.tag.create') }}">
                    <div class="primary-button">
                        @lang('blog::app.tag.index.create-tag')
                    </div>
                </a>
            @endif
        </div>        
    </div>

    {!! view_render_event('bagisto.admin.catalog.categories.list.before') !!}

    <x-admin::datagrid src="{{ route('admin.blog.tag.index') }}"></x-admin::datagrid>

    {!! view_render_event('bagisto.admin.catalog.categories.list.after') !!}
</x-admin::layouts>