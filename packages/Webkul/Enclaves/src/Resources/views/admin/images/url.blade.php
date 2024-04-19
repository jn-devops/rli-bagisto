<v-product-url></v-product-url>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-url-template">
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
                                @lang('bulkUpload::app.admin.bulk-upload.image.title')
                            </p>

                            <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                @lang('bulkUpload::app.admin.bulk-upload.image.info')
                            </p>
                        </div>

                        <button class="secondary-button">
                            @lang('bulkUpload::app.admin.bulk-upload.image.add-btn')
                        </button>
                    </div>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('bulkUpload::app.admin.bulk-upload.image.url')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="urls"
                            :value="old('urls') ?: ''"
                            rules="required"
                            :label="trans('bulkUpload::app.admin.bulk-upload.image.url')"
                            :placeholder="trans('bulkUpload::app.admin.bulk-upload.image.placeholder')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="urls"
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
                                <p class="break-all text-xs font-semibold text-gray-600 dark:text-gray-300">
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </x-admin::form>

            <input type="hidden" name="images_url" :value="names">
        </div>
    </script>

    <script type="module">
        app.component('v-product-url', {
            template: '#v-product-url-template',

            data() {
                return {
                    images: [],
                    names: null,
                }
            },

            methods: {
                updateOrCreate(params) {
                    let self = this;
                  
                    this.$axios.post("{{ route('admin.bulk-upload.product.url', $product->id) }}", params)
                        .then(function(response) {
                            self.images = response.data.images;
                            self.names = response.data.names;
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                },
            }
        });
    </script>
    
@endPushOnce