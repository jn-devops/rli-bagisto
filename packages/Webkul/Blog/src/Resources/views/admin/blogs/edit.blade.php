<x-admin::layouts>
    <x-slot:title>
        @lang('blog::app.blog.edit.title')
    </x-slot:title>

    @pushOnce('styles')
        <style type="text/css">
            .v-tree-container>.v-tree-item:not(.has-children) {
                padding-left: 18px !important;
            }
        </style>
    @endPushOnce

    @php
        $currentLocale = core()->getRequestedLocale();
    @endphp
    
    <!-- Blog Edit Form -->
    <x-admin::form
        :action="route('admin.blog.update', $blog->id)"
        method="POST"
        enctype="multipart/form-data"
    >

        {!! view_render_event('admin.blogs.edit.before') !!}

        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('blog::app.blog.edit.title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <!-- Back Button -->
                <a
                    href="{{ route('admin.blog.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('blog::app.blog.edit.back-btn')
                </a>

                <!-- Save Button -->
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('blog::app.blog.edit.save-btn')
                </button>
            </div>
        </div>

        <!-- Full Panel -->
        <div class="mt-4 flex gap-3 max-xl:flex-wrap">

            <!-- Left Section -->
            <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">

                <!-- General -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('blog::app.blog.edit.general')
                    </p>

                    <!-- Locales -->
                    <x-admin::form.control-group.control
                        type="hidden"
                        name="locale"
                        value="en"
                    >
                    </x-admin::form.control-group.control>

                    <!-- Channel -->
                    <x-admin::form.control-group.control
                        type="hidden"
                        name="channels"
                        value="1"
                    >
                    </x-admin::form.control-group.control>

                    <!-- Name -->
                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('blog::app.blog.edit.name')
                        </x-admin::form.control-group.label>

                        <v-field
                            type="text"
                            name="name"
                            value="{{ old('name') ?? $blog->name }}"
                            label="{{ trans('blog::app.blog.edit.name') }}"
                            rules="required"
                            v-slot="{ field }"
                        >
                            <input
                                type="text"
                                name="name"
                                id="name"
                                v-bind="field"
                                :class="[errors['{{ 'name' }}'] ? 'border border-red-600 hover:border-red-600' : '']"
                                class="flex min-h-10 w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                placeholder="{{ trans('blog::app.blog.edit.name') }}"
                                v-slugify-target:slug="setValues"
                            >
                        </v-field>

                        <x-admin::form.control-group.error
                            control-name="name"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <!-- Slug -->
                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('blog::app.blog.edit.slug')
                        </x-admin::form.control-group.label>

                        <v-field
                            type="text"
                            name="slug"
                            value="{{ old('slug') ?? $blog->slug }}"
                            label="{{ trans('blog::app.blog.edit.slug') }}"
                            rules="required"
                            v-slot="{ field }"
                        >
                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                v-bind="field"
                                :class="[errors['{{ 'slug' }}'] ? 'border border-red-600 hover:border-red-600' : '']"
                                class="flex min-h-10 w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                placeholder="{{ trans('blog::app.blog.edit.slug') }}"
                                v-slugify-target:slug
                            >
                        </v-field>

                        <x-admin::form.control-group.error
                            control-name="slug"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                </div>

                <!-- Description and images -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('blog::app.blog.edit.description-and-images')
                    </p>

                    <!-- Meta Description -->
                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('blog::app.blog.edit.short-description')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="short_description"
                            id="short_description"
                            rules="required"
                            :value="old('short_description') ?? $blog->short_description"
                            :label="trans('blog::app.blog.edit.short-description')"
                            :placeholder="trans('blog::app.blog.edit.short-description')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error control-name="short_description"></x-admin::form.control-group.error>

                    </x-admin::form.control-group>

                    <!-- Description -->
                    <v-description>
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.blog.edit.description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="description"
                                id="description"
                                class="description"
                                rules="required"
                                :value="old('description') ?? $blog->description"
                                :label="trans('blog::app.blog.edit.description')"
                                :tinymce="true"
                                :prompt="core()->getConfigData('general.magic_ai.content_generation.category_description_prompt')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="description"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </v-description>

                    <div class="flex gap-12">
                        <!-- Add Logo -->
                        <div class="mt-5 flex w-2/5 flex-col gap-2">
                            <p class="font-medium text-gray-800 dark:text-white">
                                @lang('blog::app.blog.edit.image')
                            </p>

                            <x-admin::media.images 
                                name="src" 
                                :uploaded-images="$blog->src ? [['id' => 'src', 'url' => $blog->src_url]] : []"
                            >
                            </x-admin::media.images>

                        </div>

                    </div>
                </div>

                <!-- SEO Details -->
                <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
                        @lang('blog::app.blog.edit.search-engine-optimization')
                    </p>

                    <!-- SEO Title & Description Blade Component -->
                    {{-- <x-admin::seo/> --}}
                    <v-seo-helper-custom></v-seo-helper-custom>

                    <div class="mt-8">
                        <!-- Meta Title -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.blog.edit.meta-title')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="meta_title"
                                id="meta_title"
                                rules="required"
                                :value="old('meta_title') ?? $blog->meta_title"
                                :label="trans('blog::app.blog.edit.meta-title')"
                                :placeholder="trans('blog::app.blog.edit.meta-title')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="meta_title"></x-admin::form.control-group.error>

                        </x-admin::form.control-group>

                        <!-- Meta Keywords -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.blog.edit.meta-keywords')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="meta_keywords"
                                rules="required"
                                :value="old('meta_keywords') ?? $blog->meta_keywords"
                                :label="trans('blog::app.blog.edit.meta-keywords')"
                                :placeholder="trans('blog::app.blog.edit.meta-keywords')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="meta_keywords"></x-admin::form.control-group.error>

                        </x-admin::form.control-group>

                        <!-- Meta Description -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.blog.edit.meta-description')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="meta_description"
                                id="meta_description"
                                rules="required"
                                :value="old('meta_description') ?? $blog->meta_description"
                                :label="trans('blog::app.blog.edit.meta-description')"
                                :placeholder="trans('blog::app.blog.edit.meta-description')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="meta_description"></x-admin::form.control-group.error>

                        </x-admin::form.control-group>
                    </div>
                </div>

            </div>

            <!-- Right Section -->
            <div class="flex w-[360px] max-w-full flex-col gap-2">
                <!-- Settings -->

                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-4 p-3 font-semibold text-gray-600 dark:text-gray-300">
                            @lang('blog::app.blog.edit.settings')
                        </p>
                    </x-slot:header>

                    <x-slot:content>

                        <!-- Published At -->
                        <x-admin::form.control-group class="mb-2.5 w-full">
                            <x-admin::form.control-group.label class="required">
                                @lang('blog::app.blog.edit.published_at')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="date"
                                name="published_at" 
                                id="published_at"
                                rules="required"
                                :value="old('published_at') ?? date_format(date_create($blog->published_at),'Y-m-d')"
                                :label="trans('blog::app.blog.edit.published_at')"
                                :placeholder="trans('blog::app.blog.edit.published_at')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="published_at"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!-- Status -->
                        <input 
                            type="hidden"
                            name="status"
                            id="status"
                            value="{{ $blog->status }}">
                        
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="font-medium text-gray-800 dark:text-white">
                                @lang('blog::app.blog.edit.status')
                            </x-admin::form.control-group.label>

                            @php 
                                $selectedValueStatus = old('status') ?: $blog->status
                            @endphp

                            <x-admin::form.control-group.control
                                type="switch"
                                name="status_switch"
                                id="status_switch"
                                class="cursor-pointer"
                                value="1"
                                :label="trans('blog::app.blog.edit.status')"
                                :checked="(boolean) $selectedValueStatus"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>
                        <!-- Author -->
                        @php

                        $loggedIn_user = auth()->guard('admin')->user()->toarray();

                        $user_id = ( array_key_exists('id', $loggedIn_user) ) ? $loggedIn_user['id'] : 0;

                        $user_name = ( array_key_exists('name', $loggedIn_user) ) ? $loggedIn_user['name'] : '';

                        $role = ( array_key_exists('role', $loggedIn_user) ) ? ( array_key_exists('name', $loggedIn_user['role']) ? $loggedIn_user['role']['name'] : 'Administrator' ) : 'Administrator';

                        @endphp

                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required font-medium text-gray-800 dark:text-white">
                            @lang('blog::app.blog.edit.author')
                        </x-admin::form.control-group.label>

                        @if( $role != 'Administrator' )
                            <input 
                                type="hidden" 
                                name="author_id" 
                                id="author_id" 
                                value="{{$user_id}}"
                            >
                            
                            <x-admin::form.control-group.control
                                type="text"
                                name="author"
                                rules="required"
                                disabled="disabled"
                                :value="$user_name"
                                :label="trans('blog::app.blog.edit.author')"
                                :placeholder="trans('blog::app.blog.edit.author')"
                            >
                            </x-admin::form.control-group.control>
                        @else
                            <x-admin::form.control-group.control
                                type="select"
                                name="author_id"
                                id="author_id"
                                rules="required"
                                :value="old('author_id') ?? $blog->author_id"
                                :label="trans('blog::app.blog.author')"
                            >
                                <!-- Options -->
                                <option value="">@lang('blog::app.blog.edit.select-author')</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="author"
                            >
                            </x-admin::form.control-group.error>
                        @endif
                        </x-admin::form.control-group>
                    </x-slot:content>
                    
                </x-admin::accordion>
                {!! view_render_event('admin.blogs.edit.after', ['blogs' => $blog]) !!}
            </div>
        </div>
    </x-admin::form>

@pushOnce('scripts')
    <!-- SEO Vue Component Template -->
    <script type="text/x-template" id="v-seo-helper-custom-template">
        <div class="mb-8 flex flex-col gap-1">
            <p 
                class="text-[#161B9D] dark:text-white"
                v-text="metaTitle"
            >
            </p>

            <p 
                class="text-[#161B9D] dark:text-white"
                style="display: none;"
                v-text="metaSlug"
            >
            </p>

            <p 
                class="text-[#161B9D] dark:text-white"
                style="display: none;"
                v-text="metaSlugCategory"
            >
            </p>

            <!-- SEO Meta Title -->
            <p 
                class="text-[#135F29]"
                v-text="'{{ URL::to('/') }}/blog' + ( ( metaSlugCategory != '' && metaSlugCategory != null && metaSlugCategory != undefined ) ? '/'+metaSlugCategory : '' ) + '/' + (metaSlug ? metaSlug.toLowerCase().replace(/\s+/g, '-') : '')"
            >
            </p>

            <!-- SEP Meta Description -->
            <p 
                class="text-gray-600 dark:text-gray-300"
                v-text="metaDescription"
            >
            </p>
        </div>
    </script>

    <script type="module">
        app.component('v-seo-helper-custom', {
            template: '#v-seo-helper-custom-template',

            data() {
                return {
                    metaTitle: this.$parent.getValues()['meta_title'],

                    metaDescription: this.$parent.getValues()['meta_description'],

                    metaSlug: this.$parent.getValues()['slug'],
                }
            },

            mounted() {
                let self = this;

                self.metaTitle = document.getElementById('meta_title').value;

                self.metaDescription = document.getElementById('meta_description').value;

                self.metaSlug = document.getElementById('slug').value;

                self.metaSlugCategory = '';

                document.getElementById('meta_title').addEventListener('input', function(e) {
                    self.metaTitle = e.target.value;
                });

                document.getElementById('meta_description').addEventListener('input', function(e) {
                    self.metaDescription = e.target.value;
                });

                document.getElementById('name').addEventListener('input', function(e) {
                    setTimeout(function(){
                        var slug = document.getElementById('slug').value;
                        self.metaSlug = ( slug != '' && slug != null && slug != undefined ) ? slug : '';
                    }, 1000);
                });

                document.getElementById('slug').addEventListener('input', function(e) {
                    var slug = e.target.value;
                    self.metaSlug = ( slug != '' && slug != null && slug != undefined ) ? slug : '';
                })
            },
        });
    </script>
@endPushOnce

</x-admin::layouts>