<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('enclaves::app.admin.inquiries.faq.title')
    </x-slot:title>

    <v-inquiries-faq />

    @pushOnce('scripts')

    <script type="text/x-template" id="v-inquiries-faq-template">
        <div>
            <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
                <p class="text-xl font-bold text-gray-800 dark:text-white">
                    @lang('enclaves::app.admin.inquiries.faq.title')
                </p>
                <!-- Export Modal -->
                
                <div class="flex items-center gap-x-2.5">
                    <x-admin::datagrid.export src="{{ route('enclaves.admin.inquiries.faq') }}"></x-admin::datagrid.export>
                    <!-- Inquiries Create Vue Component -->
                    {!! view_render_event('admin.inquiries.faq.create.before') !!}

                    @include('enclaves::admin.inquiries.faq.form.create')
                    
                    {!! view_render_event('admin.inquiries.faq.create.after') !!}
                </div>
            </div>
        
            {!! view_render_event('bagisto.admin.inquiries.list.before') !!}
            
                <x-admin::datagrid src="{{ route('enclaves.admin.inquiries.faq') }}" ref="datagrid">
                    <template #body="{ columns, records, performAction, setCurrentSelectionMode, applied}">
                        <div
                            v-for="record in records"
                            class="row grid items-center gap-2.5 border-b px-4 py-4 text-gray-600 transition-all hover:bg-gray-50 dark:border-gray-800 dark:text-gray-300 dark:hover:bg-gray-950"
                            :style="'grid-template-columns: repeat(' + (record.actions.length ? 7 : 8) + ', 1fr);'"
                        >

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
                                class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-[6px] text-2xl text-[24px] peer-checked:text-blue-600"
                                :for="`mass_action_select_record_${record.id}`"
                            >
                            </label>
                            
                            <!-- Profile name -->
                            <p v-text="record.id"></p>

                            <!-- Question -->
                            <p v-if="record.question.length > 10" v-text="record.question.substr(0, 10) + '...'"></p>
                            <p v-else v-text="record.question"></p>
                            
                            <!-- Answer -->
                            <p v-if="record.answer.length > 10" v-text="record.answer.substr(0, 10) + '...'"></p>
                            <p v-else v-text="record.answer"></p>

                            <!-- Status -->
                            <p v-html="record.status"></p>

                            <!-- Created At -->
                            <p v-html="record.created_at"></p>
                        
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

            {!! view_render_event('bagisto.admin.inquiries.list.after') !!}
            
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                ref="modelForm"
                >
                
                <form
                    @submit.prevent="handleSubmit($event, updateFaq)"
                    enctype="multipart/form-data"
                    ref="editFaQForm"
                >
                    <!-- Customer Create Modal -->
                    <x-admin::modal ref="inquiriesFaqEditModal">
                        <x-slot:header>
                            <p class="text-[18px] font-bold text-gray-800 dark:text-white">
                                @lang('enclaves::app.admin.inquiries.faq.title')
                            </p>
                        </x-slot:header>

                        <x-slot:content>
                            <!-- Modal Content -->
                            <div class="border-b-[1px] px-[16px] py-[10px] dark:border-gray-800">
                                {!! view_render_event('bagisto.admin.inquiries.edit.before') !!}
                                
                                <!-- Status Hidden -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.control
                                        type="hidden"
                                        name="id"
                                        rules="required"
                                        v-model="data.id"
                                    >
                                    </x-admin::form.control-group.control>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('enclaves::app.admin.inquiries.faq.form.edit.question')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="textarea"
                                        name="question"
                                        rules="required"
                                        v-model="data.question"
                                        :label="trans('enclaves::app.admin.inquiries.faq.form.edit.question')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="question"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('enclaves::app.admin.inquiries.faq.form.edit.answer')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="textarea"
                                        name="answer"
                                        rules="required"
                                        v-model="data.answer"
                                        :label="trans('enclaves::app.admin.inquiries.faq.form.edit.answer')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="answer"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label>
                                        @lang('enclaves::app.admin.inquiries.faq.form.edit.status')
                                    </x-admin::form.control-group.label>

                                    <div class="mt-2.5 w-full gap-2.5">
                                        <x-admin::form.control-group.control
                                            type="switch"
                                            name="status"
                                            :value="1"
                                            :label="trans('enclaves::app.admin.inquiries.faq.form.edit.status')"
                                            ::checked="data.status.search('Active') > 0 ? 1 : 0"
                                        />

                                        <x-admin::form.control-group.error control-name="status" />

                                        <input  
                                            type="hidden" 
                                            name="status" 
                                            :value="data.status.search('Active') > 0 ? 1 : 0" 
                                        />
                                    </div>
                                </x-admin::form.control-group>
                                
                                {!! view_render_event('bagisto.admin.inquiries.edit.after') !!}
                            </div>
                        </x-slot:content>

                        <x-slot:footer>
                            <div class="flex items-center gap-x-[10px]">
                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('enclaves::app.admin.inquiries.faq.form.edit.update-btn')
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
        app.component('v-inquiries-faq', {
            template: '#v-inquiries-faq-template',

            data() {
                return {
                    data: {
                        id: null,
                        question: null,
                        answer: null,
                        status: null,
                    },
                }
            },

            methods: {
                // Open update modal and submit request
                updateFaq(params, { resetForm, setErrors  }) {
                    this.$axios.post("{{ route('enclaves.admin.inquiries.faq.update') }}", params)
                        .then((response) => {
                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                            window.location.reload();

                            this.$refs.inquiriesFaqEditModal.toggle();
                        })
                        .catch(error => {
                            if (error.response.status == 422) {
                                setErrors(error.response.data.errors);
                            }
                        });
                },
                
                // Edit open modal and set the values
                editModal(value) {
                    this.$refs.inquiriesFaqEditModal.toggle();
                    
                    this.data = {
                        id: value.id,
                        question: value.question,
                        answer: value.answer,
                        status: value.status,
                    };
                },
            }
        })
    </script>
    @endPushOnce
</x-admin::layouts>


