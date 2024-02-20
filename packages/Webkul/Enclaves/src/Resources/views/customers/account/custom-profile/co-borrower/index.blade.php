<v-co-borrower></v-co-borrower>

@pushOnce('scripts')

<script type="text/x-template" id="v-co-borrower-template">
    <div class="">
        <div class="grid justify-center my-10"
            v-if="! formEnable"
        >
            <h1 class="text-[20px] font-bold">
                @lang('shop::app.customers.account.addresses.input-co-borrower')
            </h1>

            <div class="grid justify-center">
                <button 
                    type="button" 
                    class="p-4 my-4 bg-gradient-to-r from-yellow-500 to-[#e0165d] rounded-lg text-white"
                    @click="handleFormEnable"
                >
                    @lang('shop::app.customers.account.addresses.add-co-borrower')
                </button>
            </div>
        </div>

        <!-- Form -->
        <div v-else>
            {!! view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]) !!}
                <!-- Profile Edit Form -->
                <x-shop::form
                    :action="route('shop.customers.account.profile.store')"
                    class="rounded mt-[30px] grid grid-cols-[2fr_2fr] gap-10"
                    enctype="multipart/form-data"
                    method="POST"
                >
                    {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}

                        <div class="">
                            <!-- First Name -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap !text-[14px] font-medium !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.first-name')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="first_name"
                                    :value="old('first_name') ?? $customer->first_name"
                                    rules="required-before"
                                    :label="trans('shop::app.customers.account.profile.first-name')"
                                    :placeholder="trans('shop::app.customers.account.profile.first-name')"
                                    class="!mb-1 h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="first_name"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.first_name.after') !!}
                            
                            <!-- Middle Name -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.middle-name')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="middle_name"
                                    :value="old('middle_name') ?? $customer->middle_name"
                                    rules="required-before"
                                    :label="trans('shop::app.customers.account.profile.middle-name')"
                                    :placeholder="trans('shop::app.customers.account.profile.middle-name')"
                                    class="h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="last_name"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.middle_name.after') !!}

                            <!-- Last Name -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.last-name')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="last_name"
                                    :value="old('last_name') ?? $customer->last_name"
                                    rules="required-before"
                                    :label="trans('shop::app.customers.account.profile.last-name')"
                                    :placeholder="trans('shop::app.customers.account.profile.last-name')"
                                    class="h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="last_name"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.last_name.after') !!}

                            <!-- Date of Birth -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.dob')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="date"
                                    name="date_of_birth"
                                    :value="old('date_of_birth') ?? $customer->date_of_birth"
                                    :label="trans('shop::app.customers.account.profile.dob')"
                                    :placeholder="trans('shop::app.customers.account.profile.dob')"
                                    class="h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="date_of_birth"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.date_of_birth.after') !!}

                            <!-- Gender -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.contact-details')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="contact_details"
                                    :value="old('contact_details') ?? $customer->contact_details"
                                    rules="required-before"
                                    :label="trans('shop::app.customers.account.profile.contact-details')"
                                    :placeholder="trans('shop::app.customers.account.profile.contact-details')"
                                    class="h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="last_name"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.gender.after') !!}

                            <!-- Address -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.addresses.title')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="address"
                                    :value="old('address') ?? $customer->address"
                                    rules="required-before"
                                    :label="trans('shop::app.customers.account.addresses.title')"
                                    :placeholder="trans('shop::app.customers.account.addresses.title')"
                                    class="h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="address"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.address.after') !!}

                            <!-- Phone -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.phone')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="phone"
                                    :value="old('phone') ?? $customer->phone"
                                    rules="required-before|phone"
                                    :label="trans('shop::app.customers.account.profile.phone')"
                                    :placeholder="trans('shop::app.customers.account.profile.phone')"
                                    class="h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="phone"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.phone.after') !!}

                            <!-- Email -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.email')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="email"
                                    :value="old('email') ?? $customer->email"
                                    rules="required-before|email"
                                    :label="trans('shop::app.customers.account.profile.email')"
                                    :placeholder="trans('shop::app.customers.account.profile.email')"
                                    class="h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="email"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.email.after') !!}

                            <!-- Employment Details -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.employment-details')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="employment_details"
                                    :value="old('employment_details') ?? $customer->employment_details"
                                    rules="required-before"
                                    :label="trans('shop::app.customers.account.profile.employment-details')"
                                    :placeholder="trans('shop::app.customers.account.profile.employment-details')"
                                    class="h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="employment_details"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.employment_details.after') !!}

                            <!-- Employe Status -->
                            <x-shop::form.control-group class="grid grid-cols-[2fr_2.5fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.employment-status')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="select"
                                    name="status"
                                    :value="old('employment_status') ?? $customer->status"
                                    class="mb-3"
                                    rules="required-before"
                                    aria-label="Select Employment Status"
                                    :label="trans('shop::app.customers.account.profile.employment-status')"
                                    class="h-[40px]"
                                >
                                    <option value="1">@lang('shop::app.customers.account.profile.enable')</option>
                                    <option value="0">@lang('shop::app.customers.account.profile.disable')</option>
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="status"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.status.after') !!}
                        </div>

                        <div class="">
                            <p class="text-[#db4db8] mb-3">@lang('Document')</p>

                            <!-- Id number -->
                            <x-shop::form.control-group class="grid grid-cols-[1fr_2fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.id-number')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="id_number"
                                    :value="old('id_number') ?? $customer->id_number"
                                    rules="required-before"
                                    :label="trans('shop::app.customers.account.profile.id-number')"
                                    :placeholder="trans('shop::app.customers.account.profile.id-number')"
                                    class="!mb-1 h-[40px]"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="id_number"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.id_number.after') !!}

                            <!-- Attach id -->
                            <x-shop::form.control-group class="grid grid-cols-[1fr_2fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.attach-id')
                                </x-shop::form.control-group.label>

                                <input class="text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 !mb-1 h-[40px]" aria-describedby="attach_id_help" id="attach_id" type="file">
                            </x-shop::form.control-group>

                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.attach_id.after') !!}
                            
                            <!-- Marital Status -->
                            <x-shop::form.control-group class="grid grid-cols-[1fr_2fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrapfont-medium !text-[14px] font-medium !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.relationship')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="select"
                                    name="status"
                                    :value="old('marital_status') ?? $customer->marital_status"
                                    class="mb-3"
                                    rules="required-before"
                                    aria-label="Select Employment Status"
                                    :label="trans('shop::app.customers.account.profile.employment-status')"
                                    class="h-[40px]"
                                >
                                    <option value="1">@lang('shop::app.customers.account.profile.enable')</option>
                                    <option value="0">@lang('shop::app.customers.account.profile.disable')</option>
                                </x-shop::form.control-group.control>
                                <x-shop::form.control-group.error
                                    control-name="status"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>
                            
                            {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.marital_status.after') !!}

                            <!-- Text -->
                            <x-shop::form.control-group class="grid grid-cols-[1fr_2fr]">
                                <x-shop::form.control-group.label class="text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]"></x-shop::form.control-group.label>
                                <p>@lang('If spouse, evidence of the marital relationship may be requied')</p>
                                
                            </x-shop::form.control-group>

                            <p class="text-[#db4db8] mb-3">@lang('Additional Documents')</p>

                            <!-- Authorization Letter -->
                            <x-shop::form.control-group class="grid grid-cols-[1fr_2fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.authorization-letter')
                                </x-shop::form.control-group.label>

                                <input class="text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 !mb-1 h-[40px]" aria-describedby="attach_id_help" id="attach_id" type="file">
                            </x-shop::form.control-group>

                            <!-- Text -->
                            <x-shop::form.control-group class="grid grid-cols-[1fr_2fr]">
                                <x-shop::form.control-group.label class="text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]"></x-shop::form.control-group.label>
                                <p>@lang('Upload Authorization with both signature')</p>
                            </x-shop::form.control-group>


                            <!-- Authorization Letter -->
                            <x-shop::form.control-group class="grid grid-cols-[1fr_2fr]">
                                <x-shop::form.control-group.label class="required-before text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]">
                                    @lang('shop::app.customers.account.profile.id-with-signature')
                                </x-shop::form.control-group.label>

                                <input class="text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 !mb-1 h-[40px]" aria-describedby="id_with_signature" id="id_with_signature" type="file">
                            </x-shop::form.control-group>

                            <!-- Text -->
                            <x-shop::form.control-group class="grid grid-cols-[1fr_2fr]">
                                <x-shop::form.control-group.label class="text-nowrap font-medium !text-[14px] !mt-[10px] h-[40px]"></x-shop::form.control-group.label>
                                <p>@lang('Upload photocopy of ID with 3 signature')</p>
                            </x-shop::form.control-group>

                            <div class="text-right">
                                <button
                                    type="submit"
                                    class="primary-button mt-20 min-w-[185px] !bg-gradient-to-r from-yellow-500 to-[#e0165d] border-0"
                                >
                                    @lang('shop::app.customers.account.profile.save')
                                </button>
                            </div>
                        </div>
                    {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]) !!}

                </x-shop::form>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]) !!}
        </div>
    </div>
</script>

<script type="module">

app.component("v-co-borrower", {
        template: '#v-co-borrower-template',

        data() {
            return {
                formEnable: false,
            };
        },

        methods: {
            handleFormEnable () {
                this.formEnable = true; 
            }
        },
    });
</script>
@endpushOnce