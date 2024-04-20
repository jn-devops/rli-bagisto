<x-admin::layouts>
    <x-slot:title>
        @lang('blog::app.comments.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-5 font-bold text-gray-800 dark:text-white">
            @lang('blog::app.comments.index.title')
        </p>
    </div>

    {!! view_render_event('bagisto.admin.catalog.categories.list.before') !!}

        <x-admin::datagrid src="{{ route('admin.blog.comment.index') }}"></x-admin::datagrid>

    {!! view_render_event('bagisto.admin.catalog.categories.list.after') !!}
</x-admin::layouts>