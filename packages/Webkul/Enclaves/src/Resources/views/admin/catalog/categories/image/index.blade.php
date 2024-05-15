<v-category-url></v-category-url>

@pushOnce('scripts')
    <script type="text/x-template" id="v-category-url-template">
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
                        <div v-for="image, index in images" class="group relative grid max-h-[120px] min-w-[120px] justify-items-center overflow-hidden rounded transition-all hover:border-gray-400">
                            <!-- Image Preview -->
                            <img
                                :src="image.url"
                                style="width: 120px; height: 120px"
                            />

                            <div class="invisible absolute bottom-0 top-0 flex w-full flex-col justify-between bg-white p-3 opacity-80 transition-all group-hover:visible dark:bg-gray-900">

                            <!-- Image Name -->
                            <p class="break-all text-xs font-semibold text-gray-600 dark:text-gray-300"></p>
                            
                            </div>
                        </div>
                    </div>
                </form>
            </x-admin::form>

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
        app.component('v-category-url', {
            template: '#v-category-url-template',

            data() {
                return {
                    isLoading: false,
                    not_found: null,
                    message: null,
                }
            },

            methods: {
                updateOrCreate(params) {
                    let self = this;
                    
                    self.isLoading = true;
                    
                    this.$axios.post("{{ route('enclaves.admin.category.image.url', $category->id) }}", params)
                        .then(function(response) {
                            self.isLoading = false;

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