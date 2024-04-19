<x-admin::layouts>
    <x-slot:title>
        @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.index')
    </x-slot>

    <v-create-bulk-product></v-create-bulk-product>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-create-bulk-product-template">
            <div>
                <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                    <p class="text-xl font-bold text-gray-800 dark:text-white">
                        @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.add-profile')
                    </p>
            
                    <div class="flex items-center gap-x-[10px]">
                        <!-- Create a new Group -->
                        @if (bouncer()->hasPermission('admin.bulk-upload.bulk-product-importer.index'))
                            <button 
                                type="button"
                                class="primary-button"
                                @click="$refs.bulkProductUpdateOrCreateModal.open()"
                            >
                                @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.add-profile')
                            </button>
                        @endif
                    </div>
                </div>

                <!-- DataGrid -->
                <x-admin::datagrid src="{{ route('admin.bulk-upload.bulk-product-importer.index') }}" ref="datagrid">
                    @php
                        $hasPermission = bouncer()->hasPermission('admin.bulk-upload.bulk-product-importer.edit') || bouncer()->hasPermission('admin.bulk-upload.bulk-product-importer.delete');
                    @endphp
                    <!-- DataGrid Body -->
                    <template #body="{ columns, records, performAction, setCurrentSelectionMode, applied}">
                        <div
                            v-for="record in records"
                            class="row grid items-center gap-2.5 border-b px-4 py-4 text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                            :style="'grid-template-columns: repeat(' + (record.actions.length ? 6 : 5) + ', 1fr);'"
                        >
                            @if ($hasPermission)
                                <input
                                    type="checkbox"
                                    :name="`mass_action_select_record_${record.id}`"
                                    :id="`mass_action_select_record_${record.id}`"
                                    :value="record.id"
                                    class="peer hidden"
                                    v-model="applied.massActions.indices"
                                    @change="setCurrentSelectionMode"
                                >

                                <label
                                    class="icon-uncheckbox text peer-checked:icon-checked cursor-pointer rounded rounded-[6px] text-[24px] peer-checked:text-blue-600"
                                    :for="`mass_action_select_record_${record.id}`"
                                >
                                </label>
                            @endif
                            <!-- profile name -->
                            <p v-text="record.profile_name"></p>

                            <!-- attribute name -->
                            <p v-text="record.name"></p>

                            <!-- local code -->
                            <p v-text="record.locale_code"></p>
                            
                            <!-- created_at -->
                            <p v-text="record.created_at"></p>
                           
                            <!-- Actions -->
                            <div class="place-self-end">
                                <a @click="id=1; editModal(record)">
                                    <span
                                        :class="record.actions.find(action => action.title === 'Edit')?.icon"
                                        class="icon-edit cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 max-sm:place-self-center dark:hover:bg-gray-800"
                                        :title="record.actions.find(action => action.title === 'Edit')?.title"
                                    >
                                    </span>
                                </a>

                                <a @click="performAction(record.actions.find(action => action.method === 'POST'))">
                                    <span
                                        :class="record.actions.find(action => action.method === 'POST')?.icon"
                                        class="icon-delete cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 max-sm:place-self-center dark:hover:bg-gray-800"
                                        :title="record.actions.find(action => action.method === 'POST')?.title"
                                    >
                                    </span>
                                </a>
                            </div>
                            
                        </div>
                    </template>
                </x-admin::datagrid>

                {!! view_render_event('bagisto.admin.bulk-upload.bulk-product-importer.index.list.after') !!}
                
                <!-- Modal Form -->
                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                    ref="modalForm"
                >
                    <form
                        @submit="handleSubmit($event, updateOrCreate)"
                        ref="bulkProductCreateForm"
                        >
                        <!-- Create Group Modal -->
                        <x-admin::modal ref="bulkProductUpdateOrCreateModal">          
                            <x-slot:header>
                                <!-- Modal Header -->
                                <p class="font-bold text-gray-800 dark:text-white">
                                    <span v-if="id">
                                        @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.edit-profile')
                                    </span>
                                    <span v-else>
                                        @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.add-profile')
                                    </span>
                                </p>    
                            </x-slot:header>
            
                            <x-slot:content>
                                <!-- Modal Content -->
                                <div class="px-4 py-2.5 dark:border-gray-800">
                                    <x-admin::form.control-group class="mb-2.5 w-full">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.name')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="hidden"
                                            name="id"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="name"
                                            id="name"
                                            rules="required"
                                            :label="trans('bulkUpload::app.admin.bulk-upload.bulk-product-importer.name')"
                                            :placeholder="trans('bulkUpload::app.admin.bulk-upload.bulk-product-importer.name')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="name"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                    
                                    <x-admin::form.control-group class="mb-2.5 w-full" >
                                        <x-admin::form.control-group.label class="required">
                                            @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.family')
                                        </x-admin::form.control-group.label>
                                        
                                        <input type="hidden" :value="family.id" v-if="id" name="family_id">

                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="attribute_family_id"
                                            id="attribute_family_id"
                                            rules="required"
                                                                                   
                                            :label="trans('bulkUpload::app.admin.bulk-upload.bulk-product-importer.family')"
                                        >
                                            <option value="">
                                                @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
                                            </option>

                                            <option v-if="id">@{{ family.name }}</option>
                                            
                                            @foreach ($families as $family)
                                                <option :value="{{ $family->id }}" v-if="id && family.id != {{ $family->id }}">
                                                        {{ $family->name }}
                                                </option>

                                                <option class="aaa" value="{{ $family->id }}" v-if="! id">
                                                        {{ $family->name }}
                                                </option>
                                            
                                            @endforeach
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="attribute_family_id"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                    

                                    <x-admin::form.control-group class="mb-2.5 w-full">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('bulkUpload::app.admin.bulk-upload.bulk-product-importer.locale')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="locale_code"
                                            id="locale_code"
                                            rules="required"
                                            :label="trans('bulkUpload::app.admin.bulk-upload.bulk-product-importer.locale')"
                                        >
                                            <option value="">
                                                @lang('bulkUpload::app.admin.bulk-upload.run-profile.please-select')
                                            </option>

                                            @foreach (core()->getAllLocales() as $localeModel)
                                                <option value="{{ $localeModel->code }}">
                                                    {{ $localeModel->name }}
                                                </option>
                                            @endforeach
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="locale_code"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>
                            </x-slot:content>
            
                            <x-slot:footer>
                                <!-- Modal Submission -->
                                <div class="flex items-center gap-x-2.5">
                                    <button 
                                        type="submit"
                                        class="primary-button"
                                    >
                                        @lang('bulkUpload::app.admin.bulk-upload.upload-files.save')
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-admin::modal>
                    </form>
                </x-admin::form>
            </div>
        </script>
        
        <script type="module">
            // create vue template
            app.component('v-create-bulk-product', {
                template: '#v-create-bulk-product-template',

                data() {
                    return {
                        id: 0,
                        data: {
                            id: null,
                            name: null,
                            attribute_family_id: null,
                            locale_code: null,
                            created_at: null,
                        },
                        family:[],
                        
                    }
                },

                methods: {
                    // Open create modal and submit request
                    updateOrCreate(params, { resetForm, setErrors  }) {
                        let formData = new FormData(this.$refs.bulkProductCreateForm);

                        if (params.id) {
                            formData.append('_method', 'put');
                        }

                        this.$axios.post(params.id ? "{{ route('admin.bulk-upload.bulk-product-importer.update') }}" : "{{ route('admin.bulk-upload.bulk-product-importer.add') }}", formData)
                            .then((response) => {
                                this.$refs.bulkProductUpdateOrCreateModal.close();

                                this.$refs.datagrid.get();

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                resetForm();
                            })
                            .catch(error => {
                                if (error.response.status ==422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },
                    // Edit open modal and set the values
                    editModal(value) {
                        this.$refs.bulkProductUpdateOrCreateModal.toggle();
                        
                        this.data.id = value.id;
                        this.data.name = value.profile_name;
                        this.data.locale_code = value.locale_code;
                        this.data.attribute_family_id = value.name;
                        this.data.created_at = value.created_at;  
                        
                        // Get attribute family by importer id
                        const uri = "{{ route('admin.bulk-upload.bulk-product-importer.get-attribute-family') }}"
                        
                        this.$axios.post(uri,{
                            id:value.id
                        })
                        .then((result) => {
                            this.family = result.data.family;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                        this.$refs.modalForm.setValues(this.data);
                    },
                }
            })
        </script>
    @endPushOnce
</x-admin::layouts>