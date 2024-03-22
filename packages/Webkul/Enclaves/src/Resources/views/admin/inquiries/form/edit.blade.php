<v-inquiries-edit-form />

@pushOnce('scripts')
    <script type="text/x-template" id="v-inquiries-edit-form-template">
        <div>
            <div class="flex gap-x-[10px] items-center">
                <!-- Delete Button -->
                <button
                    type="button"
                    class="text-red-600 font-bold"
                    @click="destroy"
                >
                    @lang('enclaves::app.admin.inquiries.form.edit.delete')
                </button>

                <!-- Update Button -->
                <button
                    type="button"
                    class="primary-button"
                    @click="$refs.inquiriesCreateModal.toggle()"
                >
                    @lang('enclaves::app.admin.inquiries.form.edit.edit-btn')
                </button>
            </div>

            <x-admin::form
                :action="route('enclaves.admin.inquiries.update', ['id' => $ticket->id])"
                enctype="multipart/form-data"
                method="post"
            >
                <!-- Inquiries Create Modal -->
                <x-admin::modal ref="inquiriesCreateModal">
                    <x-slot:header>
                        <p class="text-[18px] text-gray-800 dark:text-white font-bold">
                            @lang('enclaves::app.admin.inquiries.title')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <!-- Modal Content -->
                        <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800  ">
                            {!! view_render_event('bagisto.admin.inquiries.edit.before') !!}

                            <x-admin::form.control-group>
                                <label class="block leading-[24px] text-[12px] text-gray-800 dark:text-white font-medium required">
                                    @lang('enclaves::app.admin.inquiries.form.edit.customer')
                                </label>

                                <select
                                    type="select"
                                    name="customer_id"
                                    rules="required"
                                    class="custom-select flex w-full min-h-[39px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 dark:hover:border-gray-400"
                                    label="trans('enclaves::app.admin.inquiries.form.edit.customer')"
                                    >
                                    <option value="0" disabled>@lang('Select Customer')</option>

                                    @foreach(app(Webkul\Customer\Repositories\CustomerRepository::class)->get() as $customer)
                                        <option value="{{ $customer->id }}" {{ $customer->id == $ticket->customer_id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach

                                </select>
                                <x-admin::form.control-group.error control-name="customer_id"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <label class="block leading-[24px] text-[12px] text-gray-800 dark:text-white font-medium required">
                                    @lang('enclaves::app.admin.inquiries.form.edit.reason')
                                </label>

                                <select
                                    type="select"
                                    name="ticket_reason_id"
                                    rules="required"
                                    class="custom-select flex w-full min-h-[39px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 dark:hover:border-gray-400"
                                    label="trans('enclaves::app.admin.inquiries.form.edit.reason')"
                                >
                                    <option value="0" disabled>@lang('Select Reason')</option>

                                    @foreach(app(Webkul\Enclaves\Repositories\TicketReasonsRepository::class)->get() as $reason)
                                        <option value="{{ $reason->id }}" {{ $reason->id == $ticket->ticket_reason_id ? 'selected' : '' }}>
                                            {{ $reason->name }}
                                        </option>
                                    @endforeach

                                </select>

                                <x-admin::form.control-group.error control-name="ticket_reason_id"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <label class="block leading-[24px] text-[12px] text-gray-800 dark:text-white font-medium required">
                                    @lang('enclaves::app.admin.inquiries.form.edit.status')
                                </label>

                                <select
                                    type="select"
                                    name="ticket_status_id"
                                    rules="required"
                                    class="custom-select flex w-full min-h-[39px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 dark:hover:border-gray-400"
                                    label="trans('enclaves::app.admin.inquiries.form.edit.status')"
                                >
                                    <option value="0" disabled>@lang('Select Status')</option>

                                    @foreach(app(Webkul\Enclaves\Repositories\TicketStatusRepository::class)->get() as $status)
                                        <option value="{{ $status->id }}" {{ $status->id == $ticket->ticket_status_id ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <x-admin::form.control-group.error control-name="ticket_status_id"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('enclaves::app.admin.inquiries.form.edit.comment')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="textarea"
                                    name="comment"
                                    rules="required"
                                    value="{{ $ticket->comment }}"
                                    :label="trans('enclaves::app.admin.inquiries.form.edit.comment')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="comment"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::media.images 
                                name="file"
                                ::uploaded-images="images"
                            >
                            </x-admin::media.images >
                            
                            {!! view_render_event('bagisto.admin.inquiries.form.edit.after') !!}
                        </div>
                    </x-slot:content>

                    <x-slot:footer>
                        <div class="flex gap-x-[10px] items-center">
                            <button
                                type="submit"
                                class="primary-button"
                            >
                                @lang('enclaves::app.admin.inquiries.form.edit.update-btn')
                            </button>
                        </div>
                    </x-slot:footer>
                </x-admin::modal>
            </x-admin::form>
        </div>
    </script>

    <script type="module">
        app.component('v-inquiries-edit-form', {
            template: '#v-inquiries-edit-form-template',

            data() {
                return {
                    images: @json($ticket->files),
                    app_url: '{{ env("APP_URL") }}',
                }
            },

            mounted() {
                this.images = this.images.map( (image) => {
                    return {
                        'id': image.id,
                        'url':  this.app_url + '/storage/' + image.path + '/' + image.name,
                        'is_new': false,
                    };
                });
            },

            methods: {
                destroy() {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.$axios.get("{{ route('enclaves.admin.inquiries.destroy', ['id' => $ticket->id]) }}")
                                .then(response => {
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    this.get();
                                })
                                .catch((error) => {
                                    this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                                });
                        }
                    });
                },
            },
        });
    </script>
@endPushOnce