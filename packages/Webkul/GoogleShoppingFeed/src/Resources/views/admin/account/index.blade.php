<x-admin::layouts>
    <!-- Page title -->
    <x-slot:title>
       @lang('google_feed::app.admin.layouts.settings.auth')
    </x-slot>

    <x-admin::form
        :action="route('google_feed.account.authenticate')"
        enctype="multipart/form-data"
    >
       <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <!-- Title -->
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('google_feed::app.admin.layouts.settings.auth')
            </p>

            <div class="flex items-center gap-x-2.5">
                @if (bouncer()->hasPermission('google_feed.account.authenticate.refresh'))
                    <a href="{{ route('google_feed.account.authenticate.refresh') }}">
                        <button 
                            type="button"
                            class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                        >
                            @lang('google_feed::app.admin.layouts.settings.auth-refresh-btn')
                        </button>
                   </a>
                @endif

                <button class="primary-button cursor-pointer">
                    @lang('google_feed::app.admin.layouts.settings.auth-btn')
                </button>
            </div>
        </div>
        
        <!-- body content -->
        <div class="mt-[14px] flex gap-[10px]">
            <div class="flex flex-1 flex-col gap-2 overflow-auto">
                <div class="box-shadow rounded-[4px] bg-white p-4 dark:bg-gray-900">
                    <x-admin::form.control-group class="mb-[10px]">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.layouts.settings.api-key')
                        </x-admin::form.control-group.label>
                       
                        <x-admin::form.control-group.control
                            type="text"
                            name="api_key"
                            value="{{ core()->getConfigData('google_feed.settings.general.google_api_key') }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.layouts.settings.api-key')"
                            :placeholder="trans('google_feed::app.admin.layouts.settings.api-key')"
                            readonly
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="api_key"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.layouts.settings.google-api-secret-key')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="password"
                            name="api_secret_key"
                            value="{{ core()->getConfigData('google_feed.settings.general.google_api_secret_key') }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.layouts.settings.google-api-secret-key')"
                            :placeholder="trans('google_feed::app.admin.layouts.settings.google-api-secret-key')"
                            readonly
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="api_secret_key"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>
                </div>
            </div>
        </div>
    </x-admin::form>
</x-admin::layouts>