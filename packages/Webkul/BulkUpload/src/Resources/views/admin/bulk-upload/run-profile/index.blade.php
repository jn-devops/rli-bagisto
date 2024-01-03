<x-admin::layouts>

    <x-slot:title>
        @lang('bulkupload::app.admin.bulk-upload.run-profile.index')
    </x-slot>

    <div class="grid gap-2.5">
        <div class="flex gap-4 mb-4 justify-between items-center max-sm:flex-wrap">
            <p class="text-gray-800 dark:text-white font-bold leading-6">
                @lang('bulkupload::app.admin.bulk-upload.run-profile.index')
            </p> 
        </div> 
    </div>

    <run-profile-form :families="{{ json_encode($families) }}"></run-profile-form>

    @pushOnce('scripts')
        <script type="text/x-template" id="run-profile-form-template">
            <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">
                <div class="relative p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                    <x-admin::form>
                        <x-admin::form.control-group class="w-full mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('bulkupload::app.admin.bulk-upload.bulk-product-importer.family')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="attribute_family_id"
                                id="attribute_family_id"
                                v-model="attribute_family_id"
                                @change="getImporter"
                                :label="trans('bulkupload::app.admin.bulk-upload.bulk-product-importer.family')"
                            >
                                <option value="">
                                    @lang('bulkupload::app.admin.bulk-upload.run-profile.please-select')
                                </option>

                                <option v-for="family in families" :key="family.id" :value="family.id">
                                    @{{ family.name }}
                                </option>
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="w-full mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('bulkupload::app.admin.bulk-upload.bulk-product-importer.index')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="bulk_product_importer_id"
                                id="bulk_product_importer_id"
                                v-model="bulk_product_importer_id"
                                @change="setProductFiles"
                                :label="trans('bulkupload::app.admin.bulk-upload.bulk-product-importer.family')"
                            >
                                <option value="">
                                    @lang('bulkupload::app.admin.bulk-upload.run-profile.please-select')
                                </option>

                                <option v-for="importer in product_importer" :key="importer.id" :value="importer.id">
                                    @{{ importer.name }}
                                </option>
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <x-admin::form.control-group class="w-full mb-2.5">
                            <x-admin::form.control-group.label>
                                @lang('bulkupload::app.admin.bulk-upload.run-profile.select-file')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="select"
                                name="product_file"
                                id="product_file"
                                v-model="product_file_id"
                                @change="setProductFiles"
                                :label="trans('bulkupload::app.admin.bulk-upload.bulk-product-importer.family')"
                            >
                                <option value="">
                                    @lang('bulkupload::app.admin.bulk-upload.run-profile.please-select')
                                </option>

                                <option v-for="file in product_file" :key="file.id" :value="file.id">
                                    @{{ file.file_name }}
                                    (@{{ formatDateTime(file.created_at) }})
                                </option>
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>
                        
                        <div class="control-group product-uploading-message">
                            <p v-if="running" class="dark:text-white">@lang('bulkupload::app.admin.bulk-upload.upload-files.upload-product-time'): @{{ formattedTime }}</p> 
                        </div>
                        <div class="page-action" v-if="this.product_file_id != '' && this.product_file_id != 'Please Select'">
                            <div class="flex gap-x-2.5 items-center">
                                <span type="submit" @click="runProfiler" :class="{ disabled: isDisabled }" :disabled="isDisabled" class="primary-button">
                                    @lang('bulkupload::app.admin.bulk-upload.run-profile.run')
                                </span>
                                
                                <span type="submit" @click="deleteFile" class="primary-button">
                                    @lang('bulkupload::app.admin.bulk-upload.upload-file.delete')
                                </span>
                            </div>
                        </div>
                    </x-admin::form>
                </div>
                
                <div v-if="errorCsvFile.length" class="relative p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                    <p
                        class="text-base text-gray-800 dark:text-white font-semibold mb-4">
                        @lang('bulkupload::app.admin.bulk-upload.run-profile.error')
                    </p>

                    <div v-for="(item, index) in errorCsvFile" :key="index" >
                        <div class="row grid grid-cols-[2fr_1fr_1fr] grid-rows-1 items-center px-4 py-2.5 border-b-2 dark:border-gray-800">
                            <div class="text-base text-gray-800 dark:text-white font-semibold mb-4">
                                @lang('bulkupload::app.admin.bulk-upload.upload-files.profiler-name'):- @{{ profilerNames[index] }}
                            </div>
                        </div>

                        <div class="row grid grid-cols-[2fr_1fr_1fr] grid-rows-1 items-center px-4 py-2.5 border-b-2 dark:border-gray-800">
                            <div class="gap-2.5 dark:text-white">@lang('bulkupload::app.admin.bulk-upload.upload-files.csv-link')</div>
                            <div class="gap-2.5 dark:text-white">@lang('bulkupload::app.admin.bulk-upload.upload-files.date-and-time')</div>
                            <div class="gap-2.5 dark:text-white">@lang('bulkupload::app.admin.bulk-upload.upload-files.delete-file')</div>
                        </div>

                        <div v-for="(record) in item" class="row grid grid-cols-[2fr_1fr_1fr] grid-rows-1 items-center px-4 py-2.5 border-b-2 dark:border-gray-800">
                            <div class="flex gap-2.5 items-center select-none">
                                <a :href="record.link" class="text-blue-700 dark:text-white">@lang('bulkupload::app.admin.bulk-upload.upload-file.download-file')</a>
                            </div>
                            
                            <div class="flex gap-2.5 items-center select-none dark:text-white">
                                @{{ record.time }}
                            </div>

                            <div class="flex gap-2.5 items-center select-none">
                                <button @click="deleteCSV(index, record.fileName)" class="primary-button">@lang('bulkupload::app.admin.bulk-upload.upload-file.delete')</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- After Product Uploaded Error Records -->
                <div class="relative p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                    <!-- Uploaded product records -->
                    <p v-if="isProductUploaded" class="text-base text-gray-800 dark:text-white font-semibold mb-4">@lang('bulkupload::app.admin.bulk-upload.run-profile.uploaded-product')</p>
                    <p class="dark:text-white mb-2">@lang('bulkupload::app.admin.bulk-upload.upload-files.uploaded-product')</p>
                    
                    <ul class="p-4 h-40 border-3 border-gray-800 bg-gray-200 rounded dark:border-gray-800 dark:bg-gray-200" style="max-height: 250px;overflow: auto;">
                        <li v-for="(item, index) in uploadedProductList" :key="index" class="mb-3">
                            <p class="text-sm">Product id: <span class="italic">@{{ item.id }}</span></p>
                            <p class="text-sm">Product SKU: <span class="italic">@{{ item.sku }}</span></p>
                            <p class="text-sm">Product type: <span class="italic">@{{ item.type }}</span></p>
                        </li>
                    </ul>
                </div>

                <!-- Not Uploaded Product Records Due to Validation error -->
                <div class="relative p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                    <p v-if="isProductError" class="text-base mb-4 text-gray-800 dark:text-white font-semibold mb-4">@lang('bulkupload::app.admin.bulk-upload.run-profile.error-in-product')</p>
                    <ul class="p-4 w-full border-3 border-gray-800 bg-gray-200 rounded dark:border-gray-800 dark:bg-gray-200" style="max-height: 250px;overflow: auto;">
                        <li v-for="(item, index) in notUploadedProductList" :key="index">
                            @lang('bulkupload::app.admin.bulk-upload.upload-files.not-uploaded-product') : <span class="italic"> @{{ item.error }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('run-profile-form', {
                template:'#run-profile-form-template',

                props: ['families'],

                data() {
                    return {
                        product_file: [],
                        product_file_id: '',
                        product_importer: [],
                        attribute_family_id: null,
                        bulk_product_importer_id: null,
                        uploadedProductList:[],
                        notUploadedProductList:[],
                        errorCsvFile: [],
                        profilerNames: null,
                        stopInterval: null,
                        status:false,
                        isProductUploaded: false,
                        isProductError: false,
                        startTime: 0,   
                        timer: {
                            seconds: 0,
                            minutes: 0,
                            interval: null,
                        },
                        running: false,
                    }
                },

                mounted() {
                    this.loadStoredTimer();
                    this.getUploadedProductAndProductValidation(this.status = this.running);
                },

                computed: {
                    isDisabled() {
                        return this.product_file_id === '' || this.product_file_id === 'Please Select';
                    },

                    formattedTime() {
                        let constminutes = Math.floor(this.timer.seconds / 60);
                        let constseconds = this.timer.seconds % 60;
                        return `${constminutes} minutes ${constseconds} seconds`;
                    },
                },

                created() {
                    this.getErrorCsvFile();
                    
                    this.resetTimer();
                },

                methods: {
                    async getImporter() {
                        if (this.attribute_family_id === '' || this.attribute_family_id === 'Please Select') {
                            return; // Exit early if attribute_family_id is empty or 'Please Select'
                        }

                        try {
                            const uri = "{{ route('admin.bulk-upload.upload-file.get-importar') }}";
                            
                            const response = await this.$axios.get(uri, {
                                params: {
                                    'attribute_family_id': this.attribute_family_id,
                                }
                            });

                            this.product_importer = Object.values(response.data.dataFlowProfiles);
                        } catch (error) {
                            // Handle errors here if needed
                        }
                    },

                    setProductFiles() {
                        if (this.bulk_product_importer_id === '' || this.bulk_product_importer_id === 'Please Select') {
                            return; // Exit early if bulk_product_importer_id is empty or 'Please Select'
                        }
                        
                        const selectedProfile = this.product_importer.find(obj => obj.id === this.bulk_product_importer_id);
                        
                        if (selectedProfile) {
                            // If an item with the specified id is found, set this.product_file to its import_product property
                            this.product_file = selectedProfile.import_product;
                        }
                        
                    },

                    async deleteFile() {

                        if (this.product_file_id === '' || this.product_file_id === 'Please Select') {
                            
                            return; // Exit early if product_file_id is empty or 'Please Select'
                        }
                        
                        let id = this.product_file_id;

                        this.product_file_id = '';

                        try {
                            const uri = "{{ route('admin.bulk-upload.upload-file.delete') }}";
                            
                            const response = await this.$axios.post(uri, {
                                bulk_product_importer_id: this.bulk_product_importer_id,
                                product_file_id: id,
                            });

                            this.product_file = response.data.importer_product_file;
                        } catch (error) {
                            // Handle errors here if needed
                        }
                    },

                    formatDateTime(value) {
                        const dateTime = new Date(value);

                        return dateTime.toLocaleString(); // Adjust the format as needed
                    },
                    // Run profiler and execute bulk-products
                    runProfiler() {
                        this.resetTimer();

                        this.startTimer();
                        
                        this.isProductUploaded = true;

                        const id = this.product_file_id
                        
                        this.product_file_id = '';
                        
                        const uri = "{{ route('admin.bulk-upload.upload-file.run-profile.read-csv') }}";
                        
                        this.getUploadedProductAndProductValidation(this.status = true);
                        this.$axios.post(uri, {
                            product_file_id: id,
                            bulk_product_importer_id: this.bulk_product_importer_id
                        })

                        .then((result) => {
                            const uri = "{{ route('admin.bulk-upload.upload-file.run-profile.read-csv') }}";

                            this.$emitter.emit('add-flash', { type: 'success', message: result.data.message });
                            console.log(result.data);
                            if (result.data.success == true) {
                                this.getUploadedProductAndProductValidation(this.status = false);
                            
                                this.stopTimer();
                                
                                setTimeout(function() {
                                    location.reload();
                                }, 500);
                            }
                            
                        })
                        .catch((error) =>{
                        })
                        .finally(() => {
                            this.getErrorCsvFile();
                        });
                    },
                    // Get CSV file error 
                    getErrorCsvFile() {
                        const uri = "{{ route('admin.bulk-upload.upload-file.run-profile.download-csv') }}"
                        
                        this.$axios.get(uri)
                            .then((result) => {
                                this.errorCsvFile = result.data.resultArray;
                                this.profilerNames = result.data.profilerNames;
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    },
                    // Delete CSV file
                    deleteCSV(id, name) {
                        
                        const uri = "{{ route('admin.bulk-upload.upload-file.run-profile.delete-csv-file') }}"

                        this.$axios.post(uri, {id: id, name:name})
                            .then((result) => {
                                this.$emitter.emit('add-flash', { type: 'success', message: result.data.message });
                                this.getErrorCsvFile();
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    },
                    // Get record uploaded and not uploaded product due to validation error
                    getUploadedProductAndProductValidation() {
                        const uri = "{{ route('admin.bulk-upload.upload-file.get-uploaded-and-not-uploaded-product') }}"
                        var self = this;
                        
                        this.$axios.post(uri,{
                            status:this.status
                        })

                        .then((result) => {
                            this.isProductUploaded = true;
                            this.isProductError = true;
                            
                            if (result.data.response.length == 0) {
                                this.isProductUploaded = false;
                                this.isProductError = false;
                            }

                            this.uploadedProductList = result.data.response.uploadedProduct;
                            this.notUploadedProductList = result.data.response.notUploadedProduct;
                            
                            if (result.data.success) {
                                this.stopTimer();
                                
                                this.$emitter.emit('add-flash', { type: 'success', message: result.data.response.completionMessage });
                                
                                this.running = true;
                                // Remove a specific item from localStorage
                                localStorage.removeItem('timerState');

                                // Remove a specific item from session storage
                                @php
                                    Illuminate\Support\Facades\Session::forget('completionMessage');
                                @endphp
                            }
                            
                            if (result.data.status == true) {
                                // setTimeout(function() {
                                //     self.getUploadedProductAndProductValidation(this.status = true);
                                // }, 3000);
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    },

                    startTimer() {
                        if (! this.running) {
                            this.startTime = new Date().getTime() - (this.timer.seconds * 1000);
                            this.timer.interval = setInterval(this.updateTimer, 1000); // Update every second
                            this.running = true;
                            this.storeTimerState();
                        }
                    },

                    resetTimer() {
                        this.timer.seconds = 0;
                        this.startTime = new Date().getTime();
                        this.storeTimerState();
                    },

                    updateTimer() {
                        let constcurrentTime = new Date().getTime();
                        let constelapsedTime = Math.floor((constcurrentTime - this.startTime) / 1000);
                        this.timer.seconds = constelapsedTime;
                        this.storeTimerState();
                    },

                    stopTimer() {
                        clearInterval(this.timer.interval);
                        this.running = false;
                        this.storeTimerState();
                    },

                    storeTimerState() {
                        localStorage.setItem('timerState', JSON.stringify({
                            running: this.running,
                            startTime: this.startTime,
                            seconds: this.timer.seconds,
                        }));
                    },

                    loadStoredTimer() {
                        let conststoredState = localStorage.getItem('timerState');
                        
                        if (conststoredState) {
                            const { running, startTime, seconds } = JSON.parse(conststoredState);
                           
                            this.running = running;
                            this.startTime = startTime;
                            this.timer.seconds = seconds;
                            
                            if (running) {
                                this.timer.interval = setInterval(this.updateTimer, 1000);
                            }
                        }
                    },
                }
            });
        </script>
    @endPushOnce

</x-admin::layouts>