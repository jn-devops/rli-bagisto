<v-personal-details
 :attributes=attributes
 :values=values
 @select-option="updateFieldsValue($event)"
></v-personal-details>

@pushOnce('scripts')
<script type="text/x-template" id="v-personal-details-template">
    <section class="inset-1 rounded-[1.25rem] border border-[rgba(237,_239,_245)] p-8 lg:px-[3.375rem] lg:py-[3.75rem]">
        <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7"> 
            @lang('enclaves::app.shop.customers.account.customer-profile.personal-details.title') 
        </h3>

        <article class="py-8 md:py-[3.125rem]">
            <table class="table-auto">
                <dl class="flex flex-col gap-3">
                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.personal-details.full-name') 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->name }}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 lg:columns-2 lg:flex-row">
                        <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.personal-details.dob') 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->date_of_birth ?? '-' }}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 md:columns-2 md:flex-row">
                        <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                        @lang('enclaves::app.shop.customers.account.customer-profile.personal-details.email') 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->email ?? '-'}}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 md:columns-2 md:flex-row">
                        <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.personal-details.phone') 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl"> 
                            {{ $customer->phone ?? '-'}}
                        </dd>
                    </div>

                    <div class="flex flex-col gap-x-6 gap-y-1.5 sm:px-0 md:columns-2 md:flex-row">
                        <dt class="w-full text-base font-semibold leading-5 tracking-tighter text-gray-900 sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap sm:tracking-normal md:w-[17rem] md:min-w-[17rem] md:text-xl">
                            @lang('enclaves::app.shop.customers.account.customer-profile.personal-details.lot_unit_number') 
                        </dt>

                        <dd class="text-base font-normal leading-5 text-gray-900 md:text-xl">
                            Lot A 
                        </dd>
                    </div>
                </dl>
            </table>
        </article>

        <article>
            <div class="grid gap-7 lg:grid-cols-2 lg:gap-9">
                <template v-for="personal_details in attributes.personal_details">
                    <div class="flex min-w-full flex-col gap-2 lg:gap-4">
                        <label
                            for="civil-status"
                            class="block text-lg font-medium leading-[1.565rem] text-black lg:text-xl xl:text-[1.565rem]"
                            v-text="personal_details.name"
                        >
                        </label>
                        
                        <!-- select -->
                        <select
                            class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat px-6 py-3 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)] lg:px-8 lg:py-6"
                            v-if="personal_details.type === 'select'"
                            :id="personal_details.code"
                            :name="personal_details.code"
                            :autocomplete="off"
                            formType="personal_details"
                            @change="selectOption($event)"
                        >
                            <option class="text-[rgba(184,_184,_184)]">
                                @lang('enclaves::app.shop.customers.account.customer-profile.personal-details.select') 
                            </option>

                            <template v-for="option in personal_details.options">
                                <option v-text="option.value" :selected="values.personal_details[personal_details.code] == option.value"></option>
                            </template>
                        </select>

                        <!-- checkbox -->
                        <div
                            class="flex flex-wrap items-center gap-x-5 gap-y-5 pt-1 lg:pt-1" 
                            v-if="personal_details.type === 'checkbox'"
                        >
                            <div
                                class="flex items-center gap-x-5 gap-y-5" 
                                v-for="option in personal_details.options"
                            >
                                <input
                                    type="radio"
                                    class="size-7 appearance-none rounded-full border-2 border-white shadow-[0px_4px_4px] shadow-neutral-300 outline-none ring-0 checked:bg-blue-400 [&:not(checked)]:bg-[rgba(245,_245,_245)]" 
                                    :id="personal_details.code"
                                    :name="personal_details.code"
                                    :value="option.value.toLowerCase()"
                                    :checked="values.personal_details[personal_details.code] == option.value.toLowerCase()"
                                    formType="personal_details"
                                    @change="selectOption($event)"
                                />

                                <label
                                    :for="option.value"
                                    class="block text-[1.313rem] font-medium leading-[1.313rem] text-black"
                                    v-text="option.value"
                                >
                                </label>
                            </div>
                        </div>

                        <!-- input type text -->
                        <input
                            type="text"
                            :value="values.personal_details[personal_details.code]"
                            class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] px-6 py-3 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)] lg:px-8 lg:py-6" 
                            autocomplete="off"
                            v-if="personal_details.type === 'text'"
                            :id="personal_details.code"
                            :name="personal_details.code"
                            :placeholder="personal_details.name"
                            formType="personal_details"
                            @change="selectOption($event)"
                        />
                    </div>
                </template>
            </div>
        </article>
    </section>
</script>

<script type="module">
    app.component("v-personal-details", {
        template: '#v-personal-details-template',

        props: ['attributes', 'values'],

        data() {
            return {
            };
        },

        methods: {
            selectOption($event) {
                this.$emit("select-option", $event);
            }
        },
    });
</script>

@endpushOnce