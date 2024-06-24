<v-personal_details
 :attributes=attributes
 :values=values
 @select-option="updateFieldsValue($event)"
></v-personal_details>

@pushOnce('scripts')
<script type="text/x-template" id="v-personal_details-template">
    <section class="inset-1 rounded-[1.25rem] border border-[rgba(237,_239,_245)] p-8 lg:px-[3.375rem] lg:py-[3.75rem]">
        <h3 class="text-lg font-semibold text-[rgba(204,_3,_92)] lg:text-[1.565rem] lg:leading-7"> 
            @lang('enclaves::app.shop.customers.account.customer_profile.personal_details.title') 
        </h3>

        <article>
            <div class="grid gap-7 py-8 md:py-[3.125rem] lg:grid-cols-2 lg:gap-9">
                <template v-for="personal_details in attributes.personal_details">
                    <div class="flex min-w-full flex-col gap-2 lg:gap-4">
                        <label
                            :for="personal_details.code"
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
                                @lang('enclaves::app.shop.customers.account.customer_profile.personal_details.select') 
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

                        <!-- Date -->
                        <input
                            type="date"
                            :value="values.personal_details[personal_details.code]"
                            class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] px-6 py-3 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)] lg:px-8 lg:py-6" 
                            autocomplete="off"
                            v-if="personal_details.type === 'date'"
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
    app.component("v-personal_details", {
        template: '#v-personal_details-template',

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