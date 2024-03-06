@props(['position' => 'left'])

<v-tabs position="{{ $position }}"
    :attributes=attributes
>
    <x-shop::shimmer.tabs/>
</v-tabs>

@pushOnce('scripts')
    <script type="text/x-template" id="v-tabs-template">
        <div>
            <!-- Tabs -->
            <div
                class="flex gap-[30px] justify-center pt-[18px]"
                :style="positionStyles"
            >
                <template v-for="attribute, index in attributes">
                    <div
                        v-if="['employment_type', 'borrower_data'].includes(index)"
                        class="pb-[10px] px-[20px] text-[15px] font-medium text-[#6E6E6E] cursor-pointer"
                        :class="{'text-black border-b-pink-700 border-b-[2px] transition': tabs[index].isActive }"
                        @click="change(index)"
                        v-text="tabs[index].title"
                    >
                    </div>
                </template>
            </div>

            <!-- Tabs Items -->
            <div ref="tabs" class="mt-4">
                <template v-for="attribute, index in attributes">
                    <div 
                        :id="tabs[index].title"
                        v-if="['employment_type', 'borrower_data'].includes(index) && tabs[index].isActive"
                    >
                    <section class="inset-1 grid gap-7 lg:gap-11 p-6 rounded-[1.25rem] border border-[rgba(237,_239,_245)] lg:px-[3.185rem] lg:py-[3.75rem] lg:grid-cols-2">
                        
                        <div class="inset-1 gap-7 lg:gap-11 p-6 lg:px-[3.185rem] lg:py-[3.75rem] lg:grid-cols-2"
                            v-if="['borrower_data'].includes(index)"
                        >
                            <div>
                                <span class="font-semibold text-[21px]">
                                    Full Name:
                                </span>
                                <span>
                                    Maria Teresa Asprec
                                </span>
                            </div>

                            <div>
                                <span class="font-semibold text-[21px]">
                                    Primary Home Address:
                                </span>
                                <span>
                                    Floodway Street, Cambridge Village, Cluster One Duke
                                </span>
                            </div>

                            <div>
                                <span class="font-semibold text-[21px]">
                                    Lot / Unit umber:
                                </span>
                                <span>
                                    Lot A
                                </span>
                            </div>
                        </div>

                        <template v-for="employment_type in attribute">
                                <div class="flex flex-col min-w-full gap-2 lg:gap-4">
                                    <label
                                        :for="employment_type.name"
                                        class="block text-lg lg:text-xl font-medium leading-[1.565rem] text-black xl:text-[1.565rem]"
                                        v-text="employment_type.name"
                                    >
                                    </label>

                                    <!-- select -->
                                    <select
                                        id="civil-status"
                                        :name="civil-status"
                                        autocomplete="civil-status"
                                        class="form-select styled-select flex min-w-full appearance-none rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] bg-no-repeat py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]"
                                        v-if="employment_type.type === 'select'"
                                    >
                                        <option class="text-[rgba(184,_184,_184)]" selected>@lang('Select')</option>

                                        <option v-for="option in employment_type.options">
                                            <span v-text="option.value"></span>
                                        </option>
                                    </select>

                                    <!-- checkbox -->
                                    <div
                                        class="flex flex-wrap items-center pt-1 gap-x-5 gap-y-5 lg:pt-1" 
                                        v-if="employment_type.type === 'checkbox'"
                                    >
                                        <div
                                            class="flex items-center gap-x-5 gap-y-5" 
                                            v-for="option in employment_type.options"
                                        >
                                            <input
                                                type="radio"
                                                id="male"
                                                name="gender"
                                                class="size-7 appearance-none rounded-full border-2 border-white shadow-[0px_4px_4px] shadow-neutral-300 outline-none ring-0 checked:bg-blue-400 [&:not(checked)]:bg-[rgba(245,_245,_245)]" 
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
                                        id="address"
                                        name="address"
                                        value="{{ $customer->default_address->address1 ?? '-'}}"
                                        placeholder="Enter Address"
                                        autocomplete="address"
                                        class="flex min-w-full rounded-[1.25rem] border-0 bg-[rgba(245,_245,_245)] py-3 lg:py-6 px-6 lg:px-8 text-xl leading-5 shadow-sm ring-0 ring-inset ring-[rgba(184,_184,_184)] placeholder:text-[rgba(184,_184,_184)] focus:ring-1 focus:ring-inset focus:ring-[rgba(184,_184,_184)]" 
                                        v-if="employment_type.type === 'text'"
                                    />
                                </div>
                            </template>
                        </section>
                    </div>
                </template>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-tabs', {
            template: '#v-tabs-template',

            props: ['position', 'attributes'],

            data() {
                return {

                    tabs: {
                        'employment_type' : {
                            title: 'Employment Information',
                            isActive: true,
                        }, 

                        'borrower_data': {
                            title: `Borrower's Data (Spouse, Attorney in fact, Co-Borrower)`,
                            isActive: false,
                        }
                    }
                }
            },

            updated() {
              //  console.log(this.attributes, this.tabs);
            },

            computed: {
                positionStyles() {
                    return [
                        `justify-content: ${this.position}`
                    ];
                },
            },

            methods: {
                change(selectedTabIndex) {
                    Object.entries(this.tabs).forEach(([key, tab]) => {
                        tab.isActive = (key == selectedTabIndex);
                    });

                    console.log(this.tabs)
                },
            },
        });
    </script>
@endPushOnce
