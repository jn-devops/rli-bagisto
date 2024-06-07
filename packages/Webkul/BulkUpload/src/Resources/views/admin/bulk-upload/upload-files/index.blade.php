@bagistoVite(['src/Resources/assets/css/bulk-app.css'], 'bulk')
<x-admin::layouts>
    <x-slot:title>
        @lang('bulkUpload::app.admin.bulk-upload.upload-files.index')
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.upload')
        </p> 
    </div>
  
    <!-- Import New products -->
    <importer-product-input></importer-product-input>

    @pushOnce('scripts')
        <script type="text/x-template" id="importer-product-input-template">
            <!-- Full Panel -->
            <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">

                <!-- Left Section -->
                <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                    <div class="box-shadow rounded-1 bg-white p-4 dark:bg-gray-900">
                        <!-- download samples -->
                        <p class="text-4 mb-4 font-semibold text-gray-800 dark:text-white">
                            @lang('bulkUpload::app.admin.bulk-upload.upload-files.sample-file')
                        </p>

                        <x-admin::form
                            :action="route('admin.bulk-upload.upload-file.download-sample-files')"
                            method="post"
                            >
                            @csrf

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="download_sample"
                                    id="download-sample"
                                    rules="required"
                                    :label="trans('bulkUpload::app.admin.bulk-upload.run-profile.please-select')"
                                >
                                    <option value="">
                                        @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
                                    </option>
                                    
                                    @foreach(config('product_types') as $key => $productType)
                                        <option value="{{ $key }}-product-upload.csv">
                                            @lang('bulkUpload::app.admin.bulk-upload.upload-files.csv-file', ['filetype' => ucwords($key) ])
                                        </option>

                                        <option value="{{ $key }}-product-upload.xlsx">
                                            @lang('bulkUpload::app.admin.bulk-upload.upload-files.xls-file', ['filetype' => ucwords($key) ])
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
                            <div class="flex items-center gap-x-2.5">
                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.download')
                                </button>
                            </div><br>
                        </x-admin::form>
                    </div>

                    <p class="mb-2 mt-4 text-xl font-semibold text-gray-800 dark:text-white">
                        @lang('bulkUpload::app.admin.bulk-upload.upload-files.upload-file')
                    </p> 
                    
                    <div class="box-shadow max-h-[200px] overflow-auto rounded bg-white p-3 dark:bg-gray-900">
                        <ul class="p-4" @wheel="getMoreFile" v-if="uploadFiles.length">

                            <li v-for="file in uploadFiles">
                                <div class="flex justify-between border-b-2">
                                    <a class="mb-3 mt-3 text-blue-700 hover:underline" :href="storageUrl + file.file_path" download>

                                        @{{ file.id }} - @{{ file.file_name }}

                                        &nbsp; (@{{ new Date(file.created_at).toLocaleDateString('fr-CA') }})
                                    </a>

                                    <button @click="deleteFile(file)" class="text-red-700">
                                        @lang('bulkUpload::app.admin.bulk-upload.upload-files.delete-file')
                                    </button>
                                </div>
                            </li>
                        </ul>

                        <p v-else>
                            @lang('bulkUpload::app.admin.bulk-upload.upload-files.no-record-found')
                        </p>

                        <div v-if="! isLoaded">
                            <div class="mt-4 flex flex-wrap justify-between">
                                <div class="shimmer h-[40px] w-[50%]"></div>

                                <div class="shimmer h-[40px] w-[20%]"></div>
                            </div>

                            <div class="mt-4 flex flex-wrap justify-between">
                                <div class="shimmer h-[40px] w-[50%]"></div>

                                <div class="shimmer h-[40px] w-[20%]"></div>
                            </div>

                            <div class="mt-4 flex flex-wrap justify-between">
                                <div class="shimmer h-[40px] w-[50%]"></div>

                                <div class="shimmer h-[40px] w-[20%]"></div>
                            </div>

                            <div class="mt-4 flex flex-wrap justify-between">
                                <div class="shimmer h-[40px] w-[50%]"></div>

                                <div class="shimmer h-[40px] w-[20%]"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Section -->
                <div class="flex w-[360px] max-w-full flex-col gap-2">
                    <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                        <p class="text-4 mb-4 font-semibold text-gray-800 dark:text-white">
                            @lang('bulkUpload::app.admin.bulk-upload.upload-files.import-products')
                        </p>  

                        <x-admin::form
                            method="POST"
                            :action="route('admin.bulk-upload.upload-file.import-products-file')"
                            enctype="multipart/form-data"
                        >
                            @csrf
                        
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.is-downloadable')
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
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.upload-link-files')
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
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.sample-links')
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
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.upload-link-sample-files')
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
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.sample-available')
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
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.upload-sample-files')
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
                                    @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.family')
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
                                        @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
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
                                    @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.index')
                                </x-admin::form.control-group.label>
                
                                <x-admin::form.control-group.control
                                    type="select"
                                    name="bulk_product_importer_id"
                                    id="bulk_product_importer_id"
                                    rules="required"
                                    :label="trans('bulkUpload::app.admin.bulk-upload.bulk-product-importer.index')"
                                >
                                    <option value="">
                                        @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
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
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.file')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="file"
                                    name="file_path"
                                    id="file"
                                >
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>
            
                            <!-- Modal Submission -->
                            <div class="flex items-center gap-x-2.5">
                                <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-files.save')
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
                            uploadFiles: {},
                            storageUrl: @json(Storage::url('')),
                            limit: 5,
                            isLoaded: false,
                        }
                    },

                    mounted () {
                        this.getDownloadFiles();
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
                        },

                        getDownloadFiles() {           
                            var uri = "{{ route('admin.bulk-upload.upload-file.get-uploaded') }}"
                           
                                this.$axios.get(uri, {
                                    params: {
                                        limit: this.limit,
                                    }
                                })
                                .then((response) => {
                                    this.isLoaded = true;
                                    console.log(response.data);
                                    
                                    this.limit += 5;
                                    
                                    this.uploadFiles = response.data.files;
                                })
                                .catch(error => {
                                });
                        },

                        deleteFile(file) {
                            var uri = "{{ route('admin.bulk-upload.upload-file.run-profile.delete-csv-file') }}"
                           
                            this.$axios.get(uri, {
                                params: {
                                    id: file.id
                                },
                            })
                            .then((response) => {
                                console.log(response);
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                this.getDownloadFiles();
                            })
                            .catch(error => {
                            });
                        },

                        getMoreFile() {
                            this.isLoaded = false;

                            this.getDownloadFiles();
                        }
                    },
            });
        </script>
    @endPushOnce
</x-admin::layouts>
