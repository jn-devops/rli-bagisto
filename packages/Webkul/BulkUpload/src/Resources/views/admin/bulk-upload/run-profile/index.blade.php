<x-admin::layouts>

    <x-slot:title>
        @lang('bulkUpload::app.admin.bulk-upload.run-profile.index')
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('bulkUpload::app.admin.bulk-upload.run-profile.index')
        </p> 
    </div>

    <run-profile-form :families="{{ json_encode($families) }}"></run-profile-form>

    @pushOnce('scripts')
        <script type="text/x-template" id="run-profile-form-template">
            <!-- Full Panel -->
            <div class="mt-3.5 flex gap-2 max-xl:flex-wrap">
                <!-- Left Section -->
                <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                    <div class="box-shadow rounded-1 bg-white p-4 dark:bg-gray-900">

                        <x-admin::form>
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.family')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="attribute_family_id"
                                    id="attribute_family_id"
                                    v-model="attribute_family_id"
                                    @change="getImporter"
                                    :label="trans('bulkUpload::app.admin.bulk-upload.bulk-product-importer.family')"
                                >
                                    <option value="">
                                        @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
                                    </option>

                                    <option v-for="family in families" :key="family.id" :value="family.id">
                                        @{{ family.name }}
                                    </option>
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label>
                                    @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.index')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="bulk_product_importer_id"
                                    id="bulk_product_importer_id"
                                    v-model="bulk_product_importer_id"
                                    @change="setProductFiles"
                                    :label="trans('bulkUpload::app.admin.bulk-upload.bulk-product-importer.family')"
                                >
                                    <option value="">
                                        @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
                                    </option>

                                    <option v-for="importer in product_importer" :key="importer.id" :value="importer.id">
                                        @{{ importer.name }}
                                    </option>
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="mb-2.5 w-full">
                                <x-admin::form.control-group.label>
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.select-file')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="product_file"
                                    id="product_file"
                                    v-model="product_file_id"
                                    @change="setProductFiles"
                                    :label="trans('bulkUpload::app.admin.bulk-upload.bulk-product-importer.family')"
                                >
                                    <option value="">
                                        @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
                                    </option>

                                    <option v-for="file in product_file" :key="file.id" :value="file.id">
                                        @{{ file.file_name }}
                                        (@{{ formatDateTime(file.created_at) }})
                                    </option>
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>
                            
                            <div class="control-group product-uploading-message">
                                <p v-if="running" class="dark:text-white">@lang('bulkUpload::app.admin.bulk-upload.upload-files.upload-product-time'): @{{ formattedTime }}</p> 
                            </div>
                            
                            <div class="flex gap-2.5"  v-if="this.product_file_id != '' && this.product_file_id != 'Please Select'">
                                <span type="submit" @click="runProfiler" :class="{ disabled: isDisabled }" :disabled="isDisabled" class="primary-button">
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.run')
                                </span>
                                
                                <span type="submit" @click="deleteFile" class="primary-button">
                                    @lang('bulkUpload::app.admin.bulk-upload.upload-file.delete')
                                </span>
                            </div>
                        </x-admin::form>
                    </div>

                    
                </div>
                
                <!-- Right Section -->
                <div class="flex w-[360px] max-w-full flex-col gap-2">
                    <div class="box-shadow rounded-1 bg-white p-2.5 dark:bg-gray-900">
                        <p class="text-base font-semibold text-gray-800 dark:text-white">@lang('bulkUpload::app.admin.bulk-upload.upload-files.uploaded-product')</p>

                        <ul class="border-3 mt-[10px] h-40 rounded border-gray-800 bg-gray-200 p-4 dark:border-gray-800 dark:bg-gray-200" style="max-height: 250px;overflow: auto;">
                            
                        </ul>
                    </div>

                    <div class="box-shadow rounded-1 bg-white p-2.5 dark:bg-gray-900">

                        <!-- Uploaded product records -->
                        <p class="text-base font-semibold text-gray-800 dark:text-white">
                            @lang('bulkUpload::app.admin.bulk-upload.run-profile.error')
                        </p>

                        <ul class="border-3 mt-[10px] h-40 rounded border-gray-800 bg-gray-200 p-4 dark:border-gray-800 dark:bg-gray-200" style="max-height: 250px;overflow: auto;">
                          
                        </ul>
                    </div>
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
                },

                computed: {
                    isDisabled() {
                        return this.product_file_id === '' || this.product_file_id === 'Please Select';
                    },

                    formattedTime() {
                        let minutes = Math.floor(this.timer.seconds / 60);
                        
                        let seconds = this.timer.seconds % 60;

                        return `${minutes} minutes ${seconds} seconds`;
                    },
                },

                created() {
                    this.getErrorCsvFile();
                    
                    this.resetTimer();
                },

                methods: {
                    async getImporter() {
                        if (this.attribute_family_id === '' 
                                    || this.attribute_family_id === 'Please Select') {
                            // Exit early if attribute_family_id is empty or 'Please Select'
                            return;
                        }

                        try {
                            const uri = "{{ route('admin.bulk-upload.upload-file.get-importer') }}";
                            
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
                        

                        this.$axios.post(uri, {
                            product_file_id: id,
                            bulk_product_importer_id: this.bulk_product_importer_id
                        })
                        .then((result) => {
                            const uri = "{{ route('admin.bulk-upload.upload-file.run-profile.read-csv') }}";

                            this.$emitter.emit('add-flash', { type: 'success', message: result.data.message });
                           
                            if (result.data.success == true) {
                                this.stopTimer();
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

                    startTimer() {
                        if (! this.running) {
                            this.startTime = new Date().getTime() - (this.timer.seconds * 1000);
                            t
                            his.timer.interval = setInterval(this.updateTimer, 1000); // Update every second
                            
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