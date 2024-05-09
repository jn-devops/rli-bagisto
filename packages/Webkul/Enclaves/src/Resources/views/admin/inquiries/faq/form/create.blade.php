
<v-inquiries-faq-create-form />

@pushOnce('scripts')
    <script type="text/x-template" id="v-inquiries-faq-create-form-template">
        <div>
            <!-- Create Button -->
            <button
                type="button"
                class="primary-button"
                @click="$refs.inquiriesFaqCreateModal.toggle()"
            >
                @lang('enclaves::app.admin.inquiries.faq.form.create.create-btn')
            </button>

            <x-admin::form
                :action="route('enclaves.admin.inquiries.faq.store')"
                enctype="multipart/form-data"
                method="post"
            >
                <!-- Customer Create Modal -->
                <x-admin::modal ref="inquiriesFaqCreateModal">
                    <x-slot:header>
                        <p class="text-[18px] font-bold text-gray-800 dark:text-white">
                            @lang('enclaves::app.admin.inquiries.faq.title')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <!-- Modal Content -->
                        <div class="border-b-[1px] px-[16px] py-[10px] dark:border-gray-800">
                            {!! view_render_event('bagisto.admin.inquiries.create.before') !!}
                            
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('enclaves::app.admin.inquiries.faq.form.create.question')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="textarea"
                                    name="question"
                                    rules="required"
                                    :label="trans('enclaves::app.admin.inquiries.faq.form.create.question')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="question"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('enclaves::app.admin.inquiries.faq.form.create.answer')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="textarea"
                                    name="answer"
                                    rules="required"
                                    :label="trans('enclaves::app.admin.inquiries.faq.form.create.answer')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="answer"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('enclaves::app.admin.inquiries.faq.form.create.status')
                                </x-admin::form.control-group.label>

                                <div class="mt-2.5 w-full gap-2.5">
                                    <x-admin::form.control-group.control
                                        type="switch"
                                        name="status_switch"
                                        :value="1"
                                        :label="trans('enclaves::app.admin.inquiries.faq.form.create.status')"
                                    />
                                </div>
                            </x-admin::form.control-group>
                            
                            {!! view_render_event('bagisto.admin.inquiries.create.after') !!}
                        </div>
                    </x-slot:content>

                    <x-slot:footer>
                        <div class="flex items-center gap-x-[10px]">
                            <button
                                type="submit"
                                class="primary-button"
                            >
                                @lang('enclaves::app.admin.inquiries.faq.form.create.save-btn')
                            </button>
                        </div>
                    </x-slot:footer>
                </x-admin::modal>
            </x-admin::form>
        </div>
    </script>

    <script type="module">
        app.component('v-inquiries-faq-create-form', {
            template: '#v-inquiries-faq-create-form-template',
        });
    </script>
@endPushOnce