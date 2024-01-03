<x-admin::layouts>

    <x-slot:title>
        @lang('bulkupload::app.admin.bulk-upload.upload-files.index')
    </x-slot>

    <div class="grid gap-2.5">
        <div class="flex gap-4 mb-4 justify-between items-center max-sm:flex-wrap">
            <p class="text-gray-800 dark:text-white font-bold leading-6">
                @lang('bulkupload::app.admin.bulk-upload.bulk-product-importer.upload')
            </p> 
        </div> 
    </div>
  
    <!-- Import New products -->
    <importer-product-input></importer-product-input>

    @pushOnce('scripts')
        <script type="text/x-template" id="importer-product-input-template">
            <div class="flex gap-2.5 mt-3.5 max-xl:flex-wrap">
                <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">
                    <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                        <!-- download samples -->
                        <div class="flex justify-between items-center">
                            <p class="text-base text-gray-800 dark:text-white font-semibold mb-4">
                                @lang('bulkupload::app.admin.bulk-upload.upload-files.sample-file')
                            </p>  
                        </div>

                        <x-admin::form
                            :action="route('admin.bulk-upload.upload-file.download-sample-files')"
                            method="post"
                            >
                            @csrf

                            <x-admin::form.control-group class="w-full mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('bulkupload::app.admin.bulk-upload.run-profile.please-select')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="download_sample"
                                    id="download-sample"
                                    rules="required"
                                    :label="trans('bulkupload::app.admin.bulk-upload.run-profile.please-select')"
                                >
                                    <option value="">
                                        @lang('bulkupload::app.admin.bulk-upload.run-profile.please-select')
                                    </option>
                                    @foreach(config('product_types') as $key => $productType)
                                        <option value="{{ $key }}-product-upload.csv">
                                            @lang('bulkupload::app.admin.bulk-upload.upload-files.csv-file', ['filetype' => ucwords($key) ])
                                        </option>

                                        <option value="{{ $key }}-product-upload.xlsx">
                                            @lang('bulkupload::app.admin.bulk-upload.upload-files.xls-file', ['filetype' => ucwords($key) ])
                                        </option>
                                    @endforeach
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    class="mt-3"
                                    control-name="download_sample"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                    
                            <!-- Download Sample Product -->
                            <div class="flex gap-x-2.5 items-center">
                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.download')
                                </button>
                            </div><br>
                        </x-admin::form>
                    </div>
                </div>

                <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">
                    <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                        <p class="text-base text-gray-800 dark:text-white font-semibold mb-4">
                            @lang('bulkupload::app.admin.bulk-upload.upload-files.import-products')
                        </p>  

                        <x-admin::form
                            method="POST"
                            :action="route('admin.bulk-upload.upload-file.import-products-file')"
                            enctype="multipart/form-data"
                        >
                            @csrf
                        
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.is-downloadable')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="checkbox"
                                    name="is_downloadable"
                                    id="is_downloadable"
                                    @click="showOptions"
                                    v-model="isDownloadableChecked"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group v-if="linkFiles">
                                <x-admin::form.control-group.label>
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.upload-link-files')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="file"
                                    name="link_files"
                                    id="file"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group v-if="isLinkSample">
                                <x-admin::form.control-group.label>
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.sample-links')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="checkbox"
                                    name="is_link_have_sample"
                                    id="is_link_have_sample"
                                    @click="showlinkSamples"
                                    value="is_link_have_sample"
                                    v-model="isLinkSampleHaveChecked"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group v-if="linkSampleFiles">
                                <x-admin::form.control-group.label>
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.upload-link-sample-files')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="file"
                                    name="link_sample_files"
                                    id="file"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group v-if="isSample">
                                <x-admin::form.control-group.label>
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.sample-available')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="checkbox"
                                    name="is_sample"
                                    id="is_sample"
                                    @click="showSamples"
                                    v-model="isSampleAvailableChecked"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group v-if="sampleFile">
                                <x-admin::form.control-group.label>
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.upload-sample-files')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="file"
                                    name="sample_file"
                                    id="file"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('bulkupload::app.admin.bulk-upload.bulk-product-importer.family')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="attribute_family_id"
                                    id="attribute_family_id"
                                    :value="old('attribute_family_id')"
                                    rules="required"
                                    v-model="attribute_family_id"
                                    @change="onChange"                           
                                >
                                    <option value="">
                                        @lang('bulkupload::app.admin.bulk-upload.run-profile.please-select')
                                    </option>

                                    @foreach ($families as $family)
                                        <option :value="{{ $family->id }}">
                                            {{ $family->name }}
                                        </option>
                                    @endforeach
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    class="mt-3"
                                    control-name="attribute_family_id"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('bulkupload::app.admin.bulk-upload.bulk-product-importer.index')
                                </x-admin::form.control-group.label>
                
                                <x-admin::form.control-group.control
                                    type="select"
                                    name="bulk_product_importer_id"
                                    id="bulk_product_importer_id"
                                    rules="required"
                                    :label="trans('bulkupload::app.admin.bulk-upload.bulk-product-importer.index')"
                                >
                                    <option value="">
                                        @lang('bulkupload::app.admin.bulk-upload.run-profile.please-select')
                                    </option>
                                    <option v-for="dataflowprofile,index in dataFlowProfiles" :value="dataflowprofile.id">
                                        @{{ dataflowprofile.name }}
                                    </option>
                                </x-admin::form.control-group.control>
                
                                <x-admin::form.control-group.error
                                    class="mt-3"
                                    control-name="bulk_product_importer_id"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                    
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.file')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="file"
                                    name="file_path"
                                    id="file"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>
            
                            <!-- Modal Submission -->
                            <div class="flex gap-x-2.5 items-center">
                                <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('bulkupload::app.admin.bulk-upload.upload-files.save')
                                </button>
                            </div>
                        </x-admin::form>
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('importer-product-input', {
                    template: '#importer-product-input-template',

                    data() {
                        return {
                            dataFlowProfiles: [],
                            attribute_family_id: null,
                            isLinkSample: false,
                            isSample: false,
                            linkFiles: false,
                            linkSampleFiles: false,
                            sampleFile: false,
                            is_downloadable:false,
                            isDownloadableChecked: false,
                            isLinkSampleHaveChecked: false,
                            isSampleAvailableChecked: false,
                        }
                    },
                    methods:{
                        showOptions() {
                            this.isDownloadableChecked = ! this.isDownloadableChecked;
                            this.isLinkSample = ! this.isLinkSample;
                            this.isSample = ! this.isSample;
                            this.linkFiles = ! this.linkFiles;
                            this.linkSampleFiles = false;
                            this.sampleFile = false;
                        },

                        showlinkSamples() {
                            this.isLinkSampleHaveChecked = !  this.isLinkSampleHaveChecked;
                            this.linkSampleFiles = ! this.linkSampleFiles;
                        },

                        showSamples() {
                            this.isSampleAvailableChecked = ! this.isSampleAvailableChecked;
                            this.sampleFile = ! this.sampleFile;
                        },
                        
                        onChange() {           
                            var uri = "{{ route('admin.bulk-upload.upload-file.get-all-profile') }}"
                           
                            this.$axios.get(uri, {
                                params: {
                                    'attribute_family_id': this.attribute_family_id,
                                }
                            })
                            .then((response) => {
                                this.dataFlowProfiles = response.data.dataFlowProfiles;
                            })
                            .catch(error => {
                            });
                        }
                    },
            });
        </script>
    @endPushOnce
</x-admin::layouts>
