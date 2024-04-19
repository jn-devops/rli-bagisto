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

        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-5 font-bold text-gray-800 dark:text-white">
                @lang('blog::app.setting.index.title')
            </p>

            <div class="flex items-center gap-x-3">
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
                        
                        <!-- Post Maximum Related Posts Allowed -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('blog::app.setting.index.post.max-posts-allow')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="number"
                                name="blog_post_maximum_related"
                                id="blog_post_maximum_related"
                                :value="old('blog_post_maximum_related') ?? $settings['blog_post_maximum_related']"
                                label="{{ trans('blog::app.setting.index.post.max-posts-allow') }}"
                                placeholder="{{ trans('blog::app.setting.index.post.max-posts-allow') }}"
                                min="1"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Show Categories With Posts Count -->
                        <input 
                            type="hidden" 
                            name="blog_post_show_categories_with_count" 
                            id="blog_post_show_categories_with_count" 
                            value="@php echo $settings['blog_post_show_categories_with_count'] @endphp"
                        >
                        
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="font-medium text-gray-800 dark:text-white">
                                @lang('blog::app.setting.index.post.category-post-count')
                            </x-admin::form.control-group.label>

                            @php 
                                $blogPostShowCategoriesWithCount = old('blog_post_show_categories_with_count') ?: $settings['blog_post_show_categories_with_count'] 
                            @endphp

                            <x-admin::form.control-group.control
                                type="switch"
                                name="switch_blog_post_show_categories_with_count"
                                id="switch_blog_post_show_categories_with_count"
                                class="cursor-pointer"
                                value="1"
                                label="{{ trans('blog::app.setting.index.post.category-post-count') }}"
                                :checked="(boolean) $blogPostShowCategoriesWithCount"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Show Tags With Posts Count -->
                        <input 
                            type="hidden"
                            name="blog_post_show_tags_with_count"
                            id="blog_post_show_tags_with_count"
                            value="@php echo $settings['blog_post_show_tags_with_count'] @endphp"
                        />
                        
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="font-medium text-gray-800 dark:text-white">
                                @lang('blog::app.setting.index.post.tag-post-count')
                            </x-admin::form.control-group.label>

                            @php 
                                $blogPostShowTagsWithCount = old('blog_post_show_tags_with_count') ?: $settings['blog_post_show_tags_with_count'] 
                            @endphp

                            <x-admin::form.control-group.control
                                type="switch"
                                name="switch_blog_post_show_tags_with_count"
                                id="switch_blog_post_show_tags_with_count"
                                class="cursor-pointer"
                                value="1"
                                label="{{ trans('blog::app.setting.index.post.tag-post-count') }}"
                                :checked="(boolean) $blogPostShowTagsWithCount"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Show Author Page -->
                        <input 
                            type="hidden"
                            name="blog_post_show_author_page"
                            id="blog_post_show_author_page"
                            value="@php echo $settings['blog_post_show_author_page'] @endphp"
                        >
                        
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="font-medium text-gray-800 dark:text-white">
                                @lang('blog::app.setting.index.post.author-page')
                            </x-admin::form.control-group.label>

                            @php 
                                $blogPostShowAuthorPage = old('blog_post_show_author_page') ?: $settings['blog_post_show_author_page'] 
                            @endphp

                            <x-admin::form.control-group.control
                                type="switch"
                                name="switch_blog_post_show_author_page"
                                id="switch_blog_post_show_author_page"
                                class="cursor-pointer"
                                value="1"
                                label="{{ trans('blog::app.setting.index.post.author-page') }}"
                                :checked="(boolean) $blogPostShowAuthorPage"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>
                    </div>
                </div>
                
                <!-- Comment Setting Section -->
                <div class="box-shadow rounded-1 bg-white p-4 dark:bg-gray-900">
                    <p class="text-4 mb-4 font-semibold text-gray-800 dark:text-white">
                        @lang('blog::app.setting.index.comment.title')
                    </p>

                    <div class="mt-8">
                        <!-- Enable Post Comment -->
                        <input 
                            type="hidden"
                            name="blog_post_enable_comment"
                            id="blog_post_enable_comment"
                            value="@php echo $settings['blog_post_enable_comment'] @endphp"
                        />
                        
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="font-medium text-gray-800 dark:text-white">
                                @lang('blog::app.setting.index.comment.status')
                            </x-admin::form.control-group.label>

                            @php $postEnableComment = old('blog_post_enable_comment') ?: $settings['blog_post_enable_comment'] @endphp

                            <x-admin::form.control-group.control
                                type="switch"
                                id="switch_blog_post_enable_comment"
                                name="switch_blog_post_enable_comment"
                                class="cursor-pointer"
                                value="1"
                                label="{{ trans('blog::app.setting.index.comment.status') }}"
                                :checked="(boolean) $postEnableComment"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Allow Guest Comment -->
                        <input 
                            type="hidden" 
                            name="blog_post_allow_guest_comment"
                            id="blog_post_allow_guest_comment"
                            value="@php echo $settings['blog_post_allow_guest_comment'] @endphp"
                        >

                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="font-medium text-gray-800 dark:text-white">
                                @lang('blog::app.setting.index.comment.allow-guest-comment')
                            </x-admin::form.control-group.label>

                            @php 
                                $postAllowGuestComment = old('blog_post_allow_guest_comment') ?: $settings['blog_post_allow_guest_comment'] 
                            @endphp

                            <x-admin::form.control-group.control
                                type="switch"
                                id="switch_blog_post_allow_guest_comment"
                                name="switch_blog_post_allow_guest_comment"
                                class="cursor-pointer"
                                value="1"
                                label="{{ trans('blog::app.setting.index.comment.allow-guest-comment') }}"
                                :checked="(boolean) $postAllowGuestComment"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Allowed maximum nested comment level -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="">
                                @lang('blog::app.setting.index.comment.allow-maximum-nested-comment')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="number"
                                name="blog_post_maximum_nested_comment"
                                id="blog_post_maximum_nested_comment"
                                :value="old('blog_post_maximum_nested_comment') ?? $settings['blog_post_maximum_nested_comment']"
                                label="{{ trans('blog::app.setting.index.comment.allow-maximum-nested-comment') }}"
                                placeholder="{{ trans('blog::app.setting.index.comment.allow-maximum-nested-comment') }}"
                                min="2"
                                max="4"
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

            <v-wc-custom-js></v-wc-custom-js>
        </div>

        {!! view_render_event('admin.blogs.setting.after') !!}

    </x-admin::form>

@pushOnce('scripts')
    {{-- SEO Vue Component Template --}}
    <script type="text/x-template" id="v-wc-custom-js-template">
        
    </script>

    <script type="module">
        app.component('v-wc-custom-js', {
            template: '#v-wc-custom-js-template',

            data() {
                return {
                    
                }
            },

            mounted() {
                let self = this;
                
                document.getElementById('switch_blog_post_show_categories_with_count').addEventListener('change', function(e) {
                    document.getElementById('blog_post_show_categories_with_count').value = ( e.target.checked == true || e.target.checked == 'true' ) ? 1 : 0;
                });
                
                document.getElementById('switch_blog_post_show_tags_with_count').addEventListener('change', function(e) {
                    document.getElementById('blog_post_show_tags_with_count').value = ( e.target.checked == true || e.target.checked == 'true' ) ? 1 : 0;
                });
                
                document.getElementById('switch_blog_post_show_author_page').addEventListener('change', function(e) {
                    document.getElementById('blog_post_show_author_page').value = ( e.target.checked == true || e.target.checked == 'true' ) ? 1 : 0;
                });
                
                document.getElementById('switch_blog_post_enable_comment').addEventListener('change', function(e) {
                    document.getElementById('blog_post_enable_comment').value = ( e.target.checked == true || e.target.checked == 'true' ) ? 1 : 0;
                });
                
                document.getElementById('switch_blog_post_allow_guest_comment').addEventListener('change', function(e) {
                    document.getElementById('blog_post_allow_guest_comment').value = ( e.target.checked == true || e.target.checked == 'true' ) ? 1 : 0;
                });
                
                document.getElementById('switch_blog_post_enable_comment_moderation').addEventListener('change', function(e) {
                    document.getElementById('blog_post_enable_comment_moderation').value = ( e.target.checked == true || e.target.checked == 'true' ) ? 1 : 0;
                });
            },
        });
    </script>
@endPushOnce

</x-admin::layouts>