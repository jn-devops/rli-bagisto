
<v-inquiries-create-form />

@pushOnce('scripts')
    <script type="text/x-template" id="v-inquiries-create-form-template">
        <div>
            <!-- Create Button -->
            <button
                type="button"
                class="primary-button"
                @click="$refs.inquiriesCreateModal.toggle()"
            >
                @lang('enclaves::app.admin.inquiries.tickets.form.create.create-btn')
            </button>

            <x-admin::form
                :action="route('enclaves.admin.inquiries.ticket.store')"
                enctype="multipart/form-data"
                method="post"
            >
                <!-- Customer Create Modal -->
                <x-admin::modal ref="inquiriesCreateModal">
                    <x-slot:header>
                        <p class="text-[18px] font-bold text-gray-800 dark:text-white">
                            @lang('enclaves::app.admin.inquiries.tickets.title')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <!-- Modal Content -->
                        <div class="border-b-[1px] px-[16px] py-[10px] dark:border-gray-800">
                            {!! view_render_event('bagisto.admin.inquiries.create.before') !!}

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('enclaves::app.admin.inquiries.tickets.form.create.customer')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="customer_id"
                                    rules="required"
                                    :label="trans('enclaves::app.admin.inquiries.tickets.form.create.customer')"
                                >
                                    <option value="0" disabled>Select Customer</option>

                                    @foreach(app(Webkul\Customer\Repositories\CustomerRepository::class)->get() as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach

                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="customer_id"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('enclaves::app.admin.inquiries.tickets.form.create.reason')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="ticket_reason_id"
                                    rules="required"
                                    :label="trans('enclaves::app.admin.inquiries.tickets.form.create.reason')"
                                >
                                    <option value="0" disabled>Select Reason</option>

                                    @foreach(app(Webkul\Enclaves\Repositories\TicketReasonsRepository::class)->get() as $reason)
                                        <option value="{{ $reason->id }}">
                                            {{ $reason->name }}
                                        </option>
                                    @endforeach
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="ticket_reason_id"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('enclaves::app.admin.inquiries.tickets.form.create.status')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="ticket_status_id"
                                    rules="required"
                                    :label="trans('enclaves::app.admin.inquiries.tickets.form.create.status')"
                                >
                                    <option value="0" disabled>Select Status</option>

                                    @foreach(app(Webkul\Enclaves\Repositories\TicketStatusRepository::class)->get() as $status)
                                        <option value="{{ $status->id }}">
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="ticket_status_id"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('enclaves::app.admin.inquiries.tickets.form.create.comment')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="textarea"
                                    name="comment"
                                    rules="required"
                                    :label="trans('enclaves::app.admin.inquiries.tickets.form.create.comment')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="comment"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::media.images name="file" />
                            
                            {!! view_render_event('bagisto.admin.inquiries.create.after') !!}
                        </div>
                    </x-slot:content>

                    <x-slot:footer>
                        <div class="flex items-center gap-x-[10px]">
                            <button
                                type="submit"
                                class="primary-button"
                            >
                                @lang('enclaves::app.admin.inquiries.tickets.form.create.save-btn')
                            </button>
                        </div>
                    </x-slot:footer>
                </x-admin::modal>
            </x-admin::form>
        </div>
    </script>

    <script type="module">
        app.component('v-inquiries-create-form', {
            template: '#v-inquiries-create-form-template',
        });
    </script>
@endPushOnce