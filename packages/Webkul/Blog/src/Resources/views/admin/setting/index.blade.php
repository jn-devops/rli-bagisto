<x-admin::layouts>
    <x-slot:title>
        @lang('blog::app.setting.index.title')
    </x-slot:title>

    <!-- Blog Setting Form -->
    <x-admin::form
        :action="route('admin.blog.setting.store')"
        method="POST"
        enctype="multipart/form-data"
    >
        {!! view_render_event('admin.blogs.setting.before') !!}

        <div class="flex items-center justify-between gap-4 pt-3 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('blog::app.setting.index.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <!-- Save Button -->
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('blog::app.setting.index.save-btn')
                </button>
            </div>
        </div>

        <!-- Full Panel -->
        <div class="mt-4 flex gap-3 max-xl:flex-wrap">
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
            <!-- Post Setting Section -->
                <div class="box-shadow rounded-1 bg-white p-4 dark:bg-gray-900">
                    <p class="text-4 mb-4 font-semibold text-gray-800 dark:text-white">
                        @lang('blog::app.setting.index.post.title')
                    </p>

                    <div class="mt-8">
                        
                        <!-- Post Per Page Records -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('blog::app.setting.index.post.per-page-record')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="number"
                                name="blog_post_per_page"
                                id="blog_post_per_page"
                                :value="old('blog_post_per_page') ?? $settings['blog_post_per_page']"
                                label="{{ trans('blog::app.setting.index.post.per-page-record') }}"
                                placeholder="{{ trans('blog::app.setting.index.post.per-page-record') }}"
                                min="1"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>
                    </div>
                </div> 
            </div>
            
            <div class="flex w-[360px] max-w-full flex-col gap-2">
                <!-- Default Blog SEO Setting Section -->
                <div class="box-shadow rounded-1 bg-white p-4 dark:bg-gray-900">
                    <p class="text-4 mb-4 font-semibold text-gray-800 dark:text-white">
                        @lang('blog::app.setting.index.seo.title')
                    </p>

                    <div class="mt-8">
                        
                        <!-- Meta Title -->
                        <x-admin::form.control-group class="mb-3">
                            <x-admin::form.control-group.label>
                                @lang('blog::app.setting.index.seo.meta-title')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="blog_seo_meta_title"
                                id="blog_seo_meta_title"
                                :value="old('blog_seo_meta_title') ?? $settings['blog_seo_meta_title']"
                                label="{{ trans('blog::app.setting.index.seo.meta-title') }}"
                                placeholder="{{ trans('blog::app.setting.index.seo.meta-title') }}"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Meta Keywords -->
                        <x-admin::form.control-group class="mb-3">
                            <x-admin::form.control-group.label>
                                @lang('blog::app.setting.index.seo.meta-keywords')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="blog_seo_meta_keywords"
                                id="blog_seo_meta_keywords"
                                :value="old('blog_seo_meta_keywords') ?? $settings['blog_seo_meta_keywords']"
                                label="{{ trans('blog::app.setting.index.seo.meta-keywords') }}"
                                placeholder="{{ trans('blog::app.setting.index.seo.meta-keywords') }}"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Meta Description -->
                        <x-admin::form.control-group class="mb-3">
                            <x-admin::form.control-group.label>
                                @lang('blog::app.setting.index.seo.meta-description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="blog_seo_meta_description"
                                id="blog_seo_meta_description"
                                :value="old('blog_seo_meta_description') ?? $settings['blog_seo_meta_description']"
                                label="{{ trans('blog::app.setting.index.seo.meta-description') }}"
                                placeholder="{{ trans('blog::app.setting.index.seo.meta-description') }}"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>
                    </div>
                </div>
            </div>
        </div>
        
        {!! view_render_event('admin.blogs.setting.after') !!}
    </x-admin::form>
</x-admin::layouts>