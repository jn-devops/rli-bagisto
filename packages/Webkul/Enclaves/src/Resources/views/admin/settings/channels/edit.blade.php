<div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
    <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
        @lang('enclaves::app.admin.settings.channels.edit.footer-logo')
    </p>

    <div class="flex justify-between">
        <!-- Logo -->
        <div class="flex w-2/5 flex-col">
            <x-admin::form.control-group>
                <x-admin::form.control-group.label>
                    @lang('enclaves::app.admin.settings.channels.edit.footer-logo')
                </x-admin::form.control-group.label>
                
                <x-admin::media.images
                    name="footer_logo"
                    width="110px"
                    height="110px"
                    :uploaded-images="$channel->footer_logo ? [['id' => 'logo_path', 'url' => $channel->footer_logo_url]] : []"
                />
            </x-admin::form.control-group>

            <p class="text-xs text-gray-600 dark:text-gray-300">
                @lang('enclaves::app.admin.settings.channels.edit.footer-size')
            </p>
        </div>
    </div>
</div>

<v-setting-url></v-setting-url>

@pushOnce('scripts')
<script type="text/x-template" id="v-setting-url-template">
    <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
        <x-admin::form
            v-slot="{ meta, errors, handleSubmit }"
            as="div"
        >
            <form @submit="handleSubmit($event, updateOrCreate)">
                <div class="flex justify-between">
                    <p class="flex items-center text-base font-semibold text-gray-800 dark:text-white">
                        @lang('enclaves::app.admin.settings.channels.edit.footer-logo-image')
                    </p>

                    <button class="primary-button" v-if="! isLoading">
                        @lang('enclaves::app.admin.settings.channels.edit.preview')
                    </button>

                    <button class="secondary-button" disabled v-else>
                        @lang('enclaves::app.admin.settings.channels.edit.loading')
                    </button>
                </div>
                
                <!-- Theme Selector -->
                <x-admin::form.control-group>
                    <x-admin::form.control-group.label>
                        @lang('enclaves::app.admin.settings.channels.edit.type')
                    </x-admin::form.control-group.label>

                    <x-admin::form.control-group.control
                        type="select"
                        id="type"
                        name="type"
                        rules="required"
                        :value="old('type')"
                        :label="trans('enclaves::app.admin.settings.channels.edit.type')"
                    >
                        <!-- Default Option -->
                        <option value="" disabled>
                            @lang('enclaves::app.admin.settings.channels.edit.select-type')
                        </option>
                        <!-- Default Option -->
                        @foreach (['logo', 'footer_logo', 'favicon'] as $type)
                            <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </x-admin::form.control-group.control>

                    <x-admin::form.control-group.error control-name="theme" />
                </x-admin::form.control-group>

                <x-admin::form.control-group>
                    <x-admin::form.control-group.label>
                        @lang('enclaves::app.admin.settings.channels.edit.cdn-link')
                    </x-admin::form.control-group.label>

                    <x-admin::form.control-group.control
                        type="text"
                        id="link"
                        name="link"
                        rules="required"
                        :value="old('link')"
                        :label="trans('enclaves::app.admin.settings.channels.edit.cdn-link')"
                    >
                    </x-admin::form.control-group.control>

                    <x-admin::form.control-group.error control-name="link" />
                </x-admin::form.control-group>
            </form>
        </x-admin::form>

        <div class="flex gap-3" v-if="image_links">
            <template v-for="image_link in image_links">
                <img
                    :src="image_link"
                    width="110px"
                    height="110px"
                />
            </template>
        </div>

        <div v-if="image_not_found.length">
            <p class="text-base font-semibold text-gray-800 dark:text-white">
                @lang('enclaves::app.admin.catalog.product.image.not-found')
            </p>
            
            <span v-for="image in image_not_found">
                <p 
                    class="mt-1 text-xs italic text-red-600" 
                    v-text="image"
                ></p>
            </span>
        </div>

        <input type="hidden" name="cdn_image_links" :value="cdn_image_links">
    </div>
</script>

<script type="module">
    app.component('v-setting-url', {
        template: '#v-setting-url-template',

        data() {
            return {
                isLoading: false,
                cdn_image_links: [],
                image_links: [],
                image_not_found: [],
            }
        },

        methods: {
            updateOrCreate(params) {
                let self = this;
                
                self.isLoading = true;
                
                this.$axios.post("{{ route('enclaves.admin.channel.image.url') }}", params)
                    .then(function(response) {
                        self.isLoading = false;

                        if(response.data.status) {
                            self.cdn_image_links = [response.data.file, ...self.cdn_image_links];

                            self.image_links = [response.data.name, ...self.image_links];
                        } else {
                            self.image_not_found = [response.data.url, ...self.image_not_found];
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
        }
    });
</script>
    
@endPushOnce