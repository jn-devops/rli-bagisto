<x-admin::layouts>
    <x-slot:title>
        @lang('blog::app.blog.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-[16px] max-sm:flex-wrap">
        <p class="text-[20px] font-bold text-gray-800 dark:text-white">
            @lang('blog::app.blog.index.title')
        </p>

        <div class="flex items-center gap-x-[10px]">
            @if (bouncer()->hasPermission('blog.blogs.create'))
                <a 
                    href="{{ route('admin.blog.create') }}"
                    class="primary-button"
                >
                    @lang('blog::app.blog.index.create-btn')
                </a>
            @endif
        </div>        
    </div>

    {!! view_render_event('bagisto.admin.catalog.categories.list.before') !!}
        <x-admin::datagrid src="{{ route('admin.blog.index') }}"></x-admin::datagrid>
    {!! view_render_event('bagisto.admin.catalog.categories.list.after') !!}
</x-admin::layouts>