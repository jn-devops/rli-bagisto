@bagistoVite(['src/Resources/assets/css/bulk-app.css'], 'bulk')

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
                <div class="flex w-[30%] max-w-full flex-col gap-2 max-sm:w-full">
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
                                <p v-if="running" class="dark:text-white">@lang('bulkUpload::app.admin.bulk-upload.run-profile.upload-product-time'): @{{ formattedTime }}</p> 
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
                <div class="flex w-[70%] flex-1 flex-col gap-2 max-xl:flex-auto">
                    <div class="box-shadow rounded-1 p-2">
                        <div class="flex justify-between">
                            <div class="">
                                <p class="mb-3 text-base font-semibold text-gray-800 dark:text-white">
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.uploaded-product')
                                </p>

                                <p class="mb-3 text-xs text-gray-500">
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.uploaded-product-info')
                                </p>
                            </div>

                            <div v-if="responseResult.product_uploaded.data">
                                <a :href="responseResult.product_uploaded.url" class="text-blue-700 underline" download>
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.download')
                                </a>
                            </div>
                        </div>
                        
                        <div class="mb-3 max-h-[250px] overflow-auto rounded-md bg-gray-300 p-3 dark:bg-gray-500">
                            <code v-if="responseResult.product_uploaded.data" v-for="product in responseResult.product_uploaded.data">
                                <pre v-html="'{<br/>' + highlightJSON(product) + ' <br/>},'"></pre>
                            </code>
                            
                            <code v-else>
                                <pre>Result Not Found!</pre>
                            </code>
                        </div>
                    </div>

                    <div class="box-shadow rounded-1 p-4">
                        <div class="flex justify-between">
                            <div class="">
                                <p class="text-base font-semibold text-gray-800 dark:text-white">
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.image-not-found')
                                </p>

                                <p class="mb-3 text-xs text-gray-500">
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.uploaded-product-info')
                                </p>
                            </div>

                            <div v-if="responseResult.image_not_found.data">
                                <a :href="responseResult.image_not_found.url" class="text-blue-700 underline" download>
                                    @lang('bulkUpload::app.admin.bulk-upload.run-profile.download')
                                </a>
                            </div>
                        </div>
                        
                        <div class="mb-3 max-h-[250px] overflow-auto bg-white dark:bg-gray-900">
                            <div class="max-h-[440px] overflow-auto rounded-md bg-gray-300 p-3 dark:bg-gray-500">
                                <code v-if="responseResult.image_not_found.data" v-for="url in responseResult.image_not_found.data">
                                    <pre v-html="'{<br/>' + highlightJSON(url) + ' <br/>},'"></pre>
                                </code>

                                <code v-else>
                                    <pre>Result Not Found!</pre>
                                </code>
                            </div>
                        </div>
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
                        isProductUploaded: false,
                        startTime: 0,   
                        timer: {
                            seconds: 0,
                            minutes: 0,
                            interval: null,
                        },
                        running: false,
                        responseResult: {},
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
                    this.getResults();
                    
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
                        if (this.product_file_id === '' 
                            || this.product_file_id === 'Please Select') {
                            
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
                            this.getResults();
                        });
                    },
                    
                    // Get all Result
                    getResults() {
                        const uri = "{{ route('admin.bulk-upload.upload-file.run-profile.results') }}"
                        
                        this.$axios
                            .get(uri)
                            .then((result) => {
                                this.responseResult = result.data;
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
                        let constCurrentTime = new Date().getTime();
                        
                        let constElapsedTime = Math.floor((constCurrentTime - this.startTime) / 1000);
                        
                        this.timer.seconds = constElapsedTime;
                        
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
                        let constStoredState = localStorage.getItem('timerState');
                        
                        if (constStoredState) {
                            const { running, startTime, seconds } = JSON.parse(constStoredState);
                           
                            this.running = running;
                            this.startTime = startTime;
                            this.timer.seconds = seconds;
                            
                            if (running) {
                                this.timer.interval = setInterval(this.updateTimer, 1000);
                            }
                        }
                    },

                    highlightJSON(data) {
                        let highlightedJSON = '';
                        // Parse JSON data
                        const parsedData = data;

                        // Iterate over each key-value pair
                        for (const key in parsedData) {
                            if (parsedData.hasOwnProperty(key)) {
                                // Highlight key
                                highlightedJSON += `   <span class="highlight-key">"${key}"</span>: `;

                                // Highlight value
                                highlightedJSON += `<span class="highlight-value">${JSON.stringify(parsedData[key])}</span>, <br/>`;
                            }
                        }

                        // Remove trailing comma
                        highlightedJSON = highlightedJSON.slice(0, -2);

                        return highlightedJSON;
                    }
                }
            });
        </script>
    @endPushOnce

</x-admin::layouts>