<v-category-url-create></v-category-url-create>

@pushOnce('scripts')
    <script type="text/x-template" id="v-category-url-create-template">
        <div class="box-shadow relative rounded bg-white p-4 dark:bg-gray-900">
            <!-- Panel -->
            <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
            >
                <form @submit="handleSubmit($event, updateOrCreate)">
                    <div class="flex flex-wrap items-center justify-between gap-2.5">
                        <div class="flex flex-col gap-2">
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                @lang('enclaves::app.admin.catalog.category.image.title')
                            </p>

                            <p class="text-xs text-gray-500">
                                @lang('enclaves::app.admin.catalog.category.image.info')
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <a href="" class="primary-button" v-if="status">
                                @lang('enclaves::app.admin.catalog.category.image.reload')
                            </a>
                            
                            <button class="secondary-button" v-if="! isLoading">
                                @lang('enclaves::app.admin.catalog.category.image.add-btn')
                            </button>

                            <button class="secondary-button" disabled v-else>
                                @lang('enclaves::app.admin.catalog.category.image.is-loading')
                            </button>
                        </div>
                    </div>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('enclaves::app.admin.catalog.category.image.type')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="type"
                            v-model="type"
                            :value="old('type') ?: ''"
                            rules="required"
                            :label="trans('enclaves::app.admin.catalog.category.image.type')"
                            :placeholder="trans('enclaves::app.admin.catalog.category.image.type')"
                        >
                            @foreach (['logo_path', 'banner_path', 'community_banner_path'] as $type)
                                <option value="{{ $type }}">
                                    @lang('enclaves::app.admin.catalog.category.image.' . $type)
                                </option>
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="type"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('enclaves::app.admin.catalog.category.image.url')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="url"
                            :value="old('url') ?: ''"
                            v-model="url"
                            rules="required"
                            :label="trans('url.url')"
                            :placeholder="trans('enclaves::app.admin.catalog.category.image.url')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="url"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>
                    
                    <div class="flex flex-wrap gap-1">
                        <!-- Uploaded Images -->
                        <div v-for="image, index in images">
                            <!-- Image Preview -->
                       
                            <img
                                :src="`{{ Storage::url(`+ image +`) }}` + image"
                                style="width: 120px; height: 120px"
                                class="rounded"
                            />

                            <p class="break-all text-xs font-semibold text-gray-600 dark:text-gray-300" >@{{ index }}</p>
                        </div>
                    </div>
                </form>
            </x-admin::form>

            <div v-for="image, index in images">
                <input
                    v-if="index == 'logo_path'"
                    type="hidden"
                    name="cdn_image_logo_path"
                    :value="images.logo_path"
                >

                <input
                    v-if="index == 'banner_path'"
                    type="hidden"
                    name="cdn_image_banner_path"
                    :value="images.banner_path"
                >

                <input
                    v-if="index == 'community_banner_path'"
                    type="hidden"
                    name="cdn_image_community_banner_path"
                    :value="images.community_banner_path"
                >
            </div>

            <div v-if="! status">
                <p class="text-base font-semibold text-gray-800 dark:text-white" v-text="message"></p>
               
                <p 
                    class="mt-1 text-xs italic text-red-600" 
                    v-text="not_found"
                ></p>
            </div>

            <p 
                v-if="status" 
                v-text="message"
                class="mt-1 text-xs italic text-[#135F29]" 
            ></p>
        </div>
    </script>

    <script type="module">
        app.component('v-category-url-create', {
            template: '#v-category-url-create-template',

            data() {
                return {
                    isLoading: false,
                    not_found: null,
                    message: null,
                    images: [],
                    type: null,
                    url: null,
                }
            },

            methods: {
                updateOrCreate(params) {
                    let self = this;
                    
                    self.isLoading = true;
                    
                    this.$axios.post("{{ route('enclaves.admin.category.image.upload') }}", {
                        url: this.url,
                        type: this.type,
                        images: this.images,
                    })
                    .then(function(response) {
                        self.isLoading = false;
                        
                        self.images = response.data.images;

                        self.status = response.data.status;

                        self.message = response.data.message;

                        self.not_found = response.data.not_found;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                },
            }
        });
    </script>
    
@endPushOnce