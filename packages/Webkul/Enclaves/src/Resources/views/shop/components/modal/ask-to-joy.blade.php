@props([
    'isActive' => false,
])

<v-modal-ask-to-joy
    is-active="{{ $isActive }}"
    {{ $attributes }}
>
    @isset($toggle)
        <template v-slot:toggle>
            {{ $toggle }}
        </template>
    @endisset

    @isset($header)
        <template v-slot:header="{ toggle, isOpen }">

        </template>
    @endisset

    @isset($content)
        <template v-slot:content>
            <div {{ $content->attributes->merge(['class' => 'bg-white p-2 px-9']) }}>
                {{ $content }}
            </div>
        </template>
    @endisset

    @isset($footer)
        <template v-slot:footer>
            <div {{ $content->attributes->merge(['class' => 'bg-white px-10 py-5 max-md:px-3 max-md:py-2']) }}>
                {{ $footer }}
            </div>
        </template>
    @endisset
</v-modal-ask-to-joy>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-modal-ask-to-joy-template"
    >
        <div>
            <div @click="toggle">
                <slot name="toggle">
                </slot>
            </div>

            <transition
                tag="div"
                name="modal-overlay"
                enter-class="duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-class="duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    class="fixed inset-0 z-[999] bg-gray-500 bg-opacity-50 transition-opacity"
                    v-show="isOpen"
                ></div>
            </transition>

            <transition
                tag="div"
                name="modal-content"
                enter-class="duration-300 ease-out"
                enter-from-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
                enter-to-class="translate-y-0 opacity-100 md:scale-100"
                leave-class="duration-200 ease-in"
                leave-from-class="translate-y-0 opacity-100 md:scale-100"
                leave-to-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
            >
                <div
                    class="fixed inset-0 z-[999] transform overflow-y-auto transition" v-show="isOpen"
                >
                    <div class="flex min-h-full items-end justify-center p-4 sm:items-center sm:p-0">
                        <div class="absolute left-1/2 top-1/2 z-[999] w-full max-w-[70vw] -translate-x-1/2 -translate-y-1/2 overflow-hidden bg-zinc-100 max-md:w-[90%] rounded-[57px] bg-white">
                            <!-- Header Slot-->
                            <div
                                class='flex items-center justify-end gap-5 bg-white p-4 px-9'
                                :class="step > 1 ? 'justify-between' : ''"
                                >
                                <span
                                    v-if="step > 1"
                                    class="icon-arrow-right-stylish cursor-pointer rounded-full bg-[#F3F4F6] p-[10px] text-[15px] text-[#989898] max-md:text-[10px] rotate-180"
                                    @click="updateStep(-1)"
                                    >
                                </span>
                                <span
                                    class="icon-cancel cursor-pointer rounded-full bg-[#F3F4F6] p-[10px] text-[15px] text-[#989898] max-md:text-[10px]"
                                    @click="toggle"
                                    >
                                </span>
                            </div>

                            <div class="flex h-[60vh] flex-col gap-2 overflow-auto max-md:px-[10px] md:gap-5 p-6 bg-white">
                                <div
                                    v-if="step != 4"
                                    class="relative flex max-md:flex-wrap max-md:justify-center items-center gap-7 bg-white px-20 max-lg:px-10 max-md:py-24 rounded-[30px] max-w-[90vw] h-[586px] max-lg:h-auto max-h-[90vh] overflow-auto scrollbar-hide">

                                    <img
                                        src="{{ bagisto_asset('images/ask-to-joy-1.png') }}"
                                        class="w-[390px] max-md:w-full max-lg:w-2/4 max-w-full max-h-full">
                                    <div
                                        v-if="step == 1"
                                        class="font-dm-sans text-center">
                                        <h3 class="font-bold text-3xl text-dark max-sm:text-2xl max-lg:text-2xl tracking-[-0.75px]">@lang('enclaves::app.shop.ask-to-joy.modal.title.split1') <span class="text-secondary"> @lang('enclaves::app.shop.ask-to-joy.modal.title.split2')</span> @lang('enclaves::app.shop.ask-to-joy.modal.title.split3')</h3>
                                        <button
                                            @click="updateStep(1)"
                                            class="inline-block bg-[#F7F7F7] mt-14 max-md:mt-6 px-20 py-4 rounded-[40px] w-80 max-lg:w-auto font-normal text-[15px] text-primary hover:text-dark">
                                                @lang('enclaves::app.shop.ask-to-joy.modal.start')
                                        </button>
                                    </div>
                                    <div
                                        v-if="step == 2"
                                        class="font-dm-sans text-center">
                                        <div v-if="propertyTypes.length">
                                            <button
                                                v-for="(option, index) in propertyTypes" :key="index"
                                                class="inline-block bg-[#F7F7F7] mt-5 px-20 py-4 rounded-[40px] w-80 max-lg:w-auto font-normal text-[15px] text-primary hover:text-dark"
                                                @click="updateParams('property_type', option.id)"
                                                >
                                                @{{ option.admin_name }}
                                            </button>
                                            <button
                                                class="inline-block bg-[#F7F7F7] mt-5 px-20 py-4 rounded-[40px] w-80 max-lg:w-auto font-normal text-[15px] text-primary hover:text-dark"
                                                @click="updateParams()"
                                                >
                                                @lang('enclaves::app.shop.ask-to-joy.modal.all-kinds')
                                            </button>
                                        </div>
                                        <div v-else>
                                            <button
                                                class="mt-7 px-20 h-[53px] rounded-[40px] w-80 max-lg:w-auto shimmer"
                                                >
                                            </button>
                                            <button
                                                class="mt-5 px-20 h-[53px] rounded-[40px] w-80 max-lg:w-auto shimmer"
                                                >
                                            </button>
                                            <button
                                                class="mt-5 px-20 h-[53px] rounded-[40px] w-80 max-lg:w-auto shimmer"
                                                >
                                            </button>
                                        </div>
                                    </div>
                                    <div v-if="step == 3">
                                        <div class="font-dm-sans text-center">
                                            <button
                                                class="inline-flex justify-center items-center gap-3 bg-[#F7F7F7] px-4 py-4 rounded-[40px] w-full font-normal text-[15px] text-primary"
                                                @click="getStepThreeFilterOptions('monthly_amortization')"
                                                >
                                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.73077 0.230774C2.99579 0.230774 0.769231 2.31511 0.769231 5.8077V6.77625C0.288462 7.13482 0 7.69271 0 8.3077C0 9.21515 0.63101 9.97637 1.47736 10.1767C2.11138 12.6957 3.58874 14.5076 5.38462 15.0535V13.8195C4.05749 13.2236 2.94972 11.623 2.51102 9.53466C2.45393 9.26523 2.21955 9.07292 1.94611 9.07292C1.9351 9.07292 1.91506 9.07693 1.90004 9.07693C1.48838 9.06491 1.15385 8.72336 1.15385 8.3077C1.15385 8.01523 1.32312 7.7498 1.59255 7.6236C1.79687 7.52745 1.92308 7.32312 1.92308 7.09976V5.8077C1.92308 2.9962 3.67688 1.38462 6.73077 1.38462C8.95433 1.38462 10.7041 2.38422 11.5154 4.15405C11.0116 4.3073 9.98798 4.46154 8.84615 4.46154C6.09575 4.46154 5.02704 3.48097 5.02304 3.47697C4.88882 3.33875 4.6885 3.28466 4.5002 3.32272C4.30789 3.36078 4.14964 3.50001 4.07652 3.67729C4.07252 3.68129 3.89223 4.12701 3.30028 4.58073C3.04988 4.77705 3.00381 5.13863 3.19611 5.39203C3.39243 5.64243 3.75401 5.68851 4.00741 5.4962C4.36198 5.22276 4.61539 4.94632 4.79267 4.71194C5.46575 5.10057 6.75381 5.61539 8.84615 5.61539C9.66547 5.61539 10.3956 5.54628 10.9655 5.45413C11.0537 5.72356 11.1538 6.12721 11.1538 6.57693V7.14283C11.1538 7.42328 11.3532 7.65365 11.6156 7.70774C11.8079 7.84997 11.9231 8.06932 11.9231 8.3077C11.9231 8.72336 11.5885 9.06491 11.1769 9.07693C11.1619 9.07693 11.1418 9.07292 11.1308 9.07292C10.8574 9.07292 10.623 9.26523 10.5659 9.53466C10.5158 9.77304 10.4577 10.0034 10.3886 10.2308H11.5845C11.5915 10.2117 11.5966 10.1957 11.5996 10.1767C12.4459 9.97637 13.0769 9.21515 13.0769 8.3077C13.0769 7.69572 12.7885 7.13783 12.3077 6.78426V6.57693C12.3077 6.01904 12.1965 5.51924 12.0843 5.16166C12.3077 5.03446 12.489 4.84215 12.5921 4.60377C12.7304 4.28827 12.7224 3.9347 12.5771 3.62721C11.5455 1.46976 9.41506 0.230774 6.73077 0.230774ZM7.11539 11C6.59055 11 6.15385 11.4367 6.15385 11.9615V15.8077C6.15385 16.3325 6.59055 16.7692 7.11539 16.7692H14.0385C14.5633 16.7692 15 16.3325 15 15.8077V11.9615C15 11.4367 14.5633 11 14.0385 11H7.11539ZM8.07592 12.1539H13.0779C13.0779 12.5785 13.4215 12.9231 13.8462 12.9231V14.8462C13.4215 14.8462 13.0779 15.1907 13.0779 15.6154H8.07592C8.07592 15.1907 7.73237 14.8462 7.30769 14.8462V12.9231C7.73237 12.9231 8.07592 12.5785 8.07592 12.1539ZM10.5769 12.5385C9.9399 12.5385 9.42308 13.1414 9.42308 13.8846C9.42308 14.6278 9.9399 15.2308 10.5769 15.2308C11.2139 15.2308 11.7308 14.6278 11.7308 13.8846C11.7308 13.1414 11.2139 12.5385 10.5769 12.5385Z" fill="#CC035C"/>
                                                </svg>
                                                @lang('enclaves::app.shop.ask-to-joy.modal.by-amortization')
                                            </button>
                                            <button
                                                class="inline-flex justify-center items-center gap-3 bg-[#F7F7F7] mt-5 px-4 py-4 rounded-[40px] w-full font-normal text-[15px] text-primary"
                                                @click="getStepThreeFilterOptions('location')"
                                                >
                                                <svg width="11" height="15" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 0C2.60059 0 0.25 2.35059 0.25 5.25C0.25 9 5.5 15 5.5 15C5.5 15 10.75 9 10.75 5.25C10.75 2.35059 8.39941 0 5.5 0ZM5.5 7.125C4.46387 7.125 3.625 6.28613 3.625 5.25C3.625 4.21387 4.46387 3.375 5.5 3.375C6.53613 3.375 7.375 4.21387 7.375 5.25C7.375 6.28613 6.53613 7.125 5.5 7.125Z" fill="#CC035C"/>
                                                </svg>
                                                @lang('enclaves::app.shop.ask-to-joy.modal.by-location')
                                            </button>
                                            <button
                                                class="inline-flex justify-center items-center gap-3 bg-[#F7F7F7] mt-5 px-4 py-4 rounded-[40px] w-full font-normal text-[15px] text-primary"
                                                @click="getStepThreeFilterOptions('price_range')"
                                                >
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.5 3.23351V3.22483C15.5 2.82498 15.175 2.5 14.7752 2.5H12.9935C12.1998 1.01671 10.5901 0 8.72917 0H4.25C3.32932 0 2.58333 0.745985 2.58333 1.66667V2.5H1.22483C0.824978 2.5 0.5 2.82498 0.5 3.22483V3.23351C0.5 3.63336 0.824978 3.95833 1.22483 3.95833H2.58333V5.20833H1.22483C0.824978 5.20833 0.5 5.53331 0.5 5.93316V5.94184C0.5 6.34169 0.824978 6.66667 1.22483 6.66667H2.58333V13.9583C2.58333 14.5334 3.04991 15 3.625 15C4.20009 15 4.66667 14.5334 4.66667 13.9583V9.16667C4.66667 9.16667 8.50727 9.16667 8.72917 9.16667C10.5901 9.16667 12.1998 8.14996 12.9935 6.66667H14.7752C15.175 6.66667 15.5 6.34169 15.5 5.94184V5.93316C15.5 5.53331 15.175 5.20833 14.7752 5.20833H13.4709C13.5002 5.00326 13.5208 4.79601 13.5208 4.58333C13.5208 4.37066 13.5008 4.16341 13.4709 3.95833H14.7752C15.175 3.95833 15.5 3.63336 15.5 3.23351ZM4.66667 1.66667H8.625C9.41819 1.66667 10.136 1.98568 10.6617 2.5H4.66667V1.66667ZM8.625 7.5H4.66667V6.66667H10.6617C10.136 7.18099 9.41819 7.5 8.625 7.5ZM11.4706 5.20833H4.66667V3.95833H11.4706C11.5151 4.16016 11.5417 4.36849 11.5417 4.58333C11.5417 4.79818 11.5151 5.00651 11.4706 5.20833Z" fill="#CC035C"/>
                                                </svg>
                                                @lang('enclaves::app.shop.ask-to-joy.modal.by-price_range')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    v-else
                                    >
                                    <div v-if="stepFourOptions.length">
                                        <div class="bg-white flex flex-col gap-7 justify-center max-lg:px-10 px-20 rounded-[30px] scrollbar-hide">
                                            <div
                                                v-for="(option, index) in stepFourOptions" :key="index"
                                                class="border-[#E2E2E2] pb-5 border-b-[1px] w-full"
                                                @click="UpdateStepFourOption(stepThreeFilterKey, option.id)"
                                                >
                                                <button
                                                    class="font-medium text-[17px] text-dark text-left"
                                                    >
                                                    @{{ printOptionLables(option) }}
                                                </button>
                                                <span class="float-right flex justify-center items-center border-[#EDEFF5] border-[1px] mt-[-4px] rounded-full icon-arrow-down w-7 h-7 text-[24px] text-primary -rotate-90"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else>
                                        <div class="border-b-[1px] w-[80%] max-lg:mx-10 mx-20 h-[53px] rounded-[30px] shimmer">
                                        </div>

                                        <div class="border-b-[1px] w-[80%] mt-2.5 max-lg:mx-10 mx-20 h-[53px] rounded-[30px] shimmer"></div>
                                        <div class="border-b-[1px] w-[80%] mt-2.5 max-lg:mx-10 mx-20 h-[53px] rounded-[30px] shimmer"></div>
                                        <div class="border-b-[1px] w-[80%] mt-2.5 max-lg:mx-10 mx-20 h-[53px] rounded-[30px] shimmer"></div>
                                        <div class="border-b-[1px] w-[80%] mt-2.5 max-lg:mx-10 mx-20 h-[53px] rounded-[30px] shimmer"></div>
                                        <div class="border-b-[1px] w-[80%] mt-2.5 max-lg:mx-10 mx-20 h-[53px] rounded-[30px] shimmer"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Slot-->
                            <slot name="footer"></slot>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </script>

    <script type="module">
        app.component('v-modal-ask-to-joy', {
            template: '#v-modal-ask-to-joy-template',

            props: ['isActive'],

            data() {
                return {
                    isOpen: this.isActive,
                    step:1,
                    propertyTypes:[],
                    stepThreeFilterKey:'',
                    stepFourOptions:[],
                };
            },

            created() {
                this.registerGlobalEvents();
            },

            methods: {
                toggle() {
                    this.isOpen = ! this.isOpen;

                    if (this.isOpen) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow ='auto';
                    }

                    this.$emit('toggle', { isActive: this.isOpen });
                },

                open() {
                    this.isOpen = true;
                    this.step = 1;
                    document.body.style.overflow = 'hidden';

                    this.$emit('open', { isActive: this.isOpen });
                },

                close() {
                    this.isOpen = false;

                    document.body.style.overflow = 'auto';

                    this.$emit('close', { isActive: this.isOpen });
                },

                registerGlobalEvents() {
                    this.$emitter.on('open-ask-to-joy-modal', this.open);
                },

                async updateStep(step){
                    this.step =  step === 0 ? 1 : this.step + (step);

                    if(this.step == 2){
                        await this.getAttributeOptionDetails('property_type');
                    }
                },

                async getAttributeOptionDetails(code){
                    this.$axios.get("{{ route('enclaves.api.attribute', '') }}/" + code)
                        .then(response => {
                            if(this.step == 2 && code == 'property_type' ){
                                this.propertyTypes = response.data.data.options;
                            }

                            if(this.step == 4){
                                this.stepFourOptions = response.data.data.options
                            }

                        }).catch(error => {
                            console.log('error', error);
                        });
                },

                async getStepThreeFilterOptions(key){
                    await this.getAttributeOptionDetails(key);
                    this.stepThreeFilterKey = key;
                    this.updateStep(1);
                },

                UpdateStepFourOption(key, value){
                    if (key == 'monthly_amortization' || key == 'price_range') {
                        value = this.UpdateValueByKey(key, value);
                    }

                    this.updateParams(key, value)
                },

                UpdateValueByKey(key, id) {
                    let selectedOption = this.stepFourOptions.find(option => option.id == id);

                    const result = this.stepFourOptions
                        .sort((a, b) => Number(a.admin_name) - Number(b.admin_name))
                        .filter(item => Number(item.admin_name) >= selectedOption.admin_name)
                        .map(item => item.id);


                    return result.join();
                },

                updateParams(key = null, value = null){

                    if (key == null && value == null) {
                        this.updateStep(1);
                        localStorage.removeItem('askToJoyWebNewQuery');

                        return;
                    }

                    let askToJoy = localStorage.getItem('askToJoyWebNewQuery') === null ? {} : JSON.parse(localStorage.getItem('askToJoyWebNewQuery'));

                    askToJoy[key] = value;

                    localStorage.setItem('askToJoyWebNewQuery', JSON.stringify(askToJoy));

                    if (this.step < 4) {
                        this.updateStep(1);
                    } else {
                        localStorage.setItem('askToJoyWeb', JSON.stringify(askToJoy));
                        localStorage.removeItem('askToJoyWebNewQuery');
                        this.close();
                        window.location.href = `{{ route('enclaves.products.ask_to_joy') }}`;
                    }
                },

                printOptionLables(option) {
                    let label = option.translations.find(translation => translation.locale === '{{core()->getCurrentLocale()->code}}')?.label || null;

                    if (!label) {
                        label = option.admin_name
                    }

                    return label
                }
            }
        });
    </script>
@endPushOnce
