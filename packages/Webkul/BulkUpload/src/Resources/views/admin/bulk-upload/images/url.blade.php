<v-product-url></v-product-url>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-url-template">
        <div class="p-4 relative bg-white dark:bg-gray-900 rounded box-shadow">
            <!-- Panel -->
            <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
            >
                <form @submit="handleSubmit($event, updateOrCreate)">
                    <div class="flex flex-wrap gap-2.5 items-center justify-between">
                        <div class="flex flex-col gap-2">
                            <p class="text-base text-gray-800 dark:text-white font-semibold">
                                @lang('bulkupload::app.admin.bulk-upload.image.title')
                            </p>

                            <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">
                                @lang('bulkupload::app.admin.bulk-upload.image.info')
                            </p>
                        </div>

                        <button class="secondary-button">
                            @lang('bulkupload::app.admin.bulk-upload.image.add-btn')
                        </button>
                    </div>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('bulkupload::app.admin.bulk-upload.image.url')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="urls"
                            :value="old('urls') ?: ''"
                            rules="required"
                            :label="trans('bulkupload::app.admin.bulk-upload.image.url')"
                            :placeholder="trans('bulkupload::app.admin.bulk-upload.image.placeholder')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="urls"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>
                    
                    <div class="flex flex-wrap gap-1">
                        <!-- Uploaded Images -->
                        <div v-for="image, index in images" class="grid justify-items-center min-w-[120px] max-h-[120px] relative rounded overflow-hidden transition-all hover:border-gray-400 group">
                            <!-- Image Preview -->
                            <img
                                :src="image.url"
                                style="width: 120px; height: 120px"
                            />

                            <div class="flex 
                                    flex-col
                                    justify-between
                                    invisible
                                    w-full
                                    p-3
                                    bg-white
                                    dark:bg-gray-900
                                    absolute
                                    top-0
                                    bottom-0
                                    opacity-80
                                    transition-all
                                    group-hover:visible">

                                <!-- Image Name -->
                                <p class="text-xs
                                    text-gray-600
                                    dark:text-gray-300
                                    font-semibold
                                    break-all">
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