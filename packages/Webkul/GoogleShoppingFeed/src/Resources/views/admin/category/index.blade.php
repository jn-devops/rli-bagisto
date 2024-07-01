<x-admin::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('google_feed::app.admin.map-categories.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="py-4 text-xl font-bold text-gray-800 dark:text-white">
            @lang('google_feed::app.admin.map-categories.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <a href="{{ route('google_feed.category.map.create') }}">
                @if (bouncer()->hasPermission('google_feed.category.create'))
                    <button class="primary-button">
                        @lang('google_feed::app.admin.map-categories.index.map-btn-title')
                    </button>
                @endif
            </a>
        </div>
    </div>

    <x-admin::datagrid src="{{ route('google_feed.category.index') }}"/>
</x-admin::layouts>