<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.inquiries.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="inquiries"></x-shop::breadcrumbs>
    @endSection

    <!-- account inquiries -->
    <v-account-inquiries></v-account-inquiries>


    @pushOnce('scripts')
        <script type="text/x-template" id="v-account-inquiries-template">
            <div class="flex justify-between items-center">
                <div class="">
                    <h2 class="text-[29px] font-medium">
                        @lang('enclaves::app.customers.inquiries.title')
                    </h2>
                </div>
            </div>

            <div class="p-3 pt-10 justify-between items-center">
                <div class="mb-14">
                    <h1 class="font-bold text-[25px]">@lang('enclaves::app.customers.inquiries.help_test')</h1>
                </div>

                <div class="flex justify-between gap-4">
                    <div 
                        class="p-4 flex justify-between items-center border shadow-xl rounded-lg gap-2"
                        @click="$refs.addInquireModal.open()"
                    >
                        <div class="rounded-full border p-5">
                            <img src="{{ bagisto_asset('images/ticket-active.svg') }}" alt="ticket" class="h-[50px] w-[125px]"/>
                        </div>
                        <div> 
                            <p class="text-[20px] font-bold mb-2">@lang('enclaves::app.customers.inquiries.submit-header')</p>
                            <p class="text-[17px]">@lang('enclaves::app.customers.inquiries.submit-text')</p>
                        </div>
                        <div>
                            <img src="{{ bagisto_asset('images/arrow-right.svg') }}" alt="arrow-right"  class="h-[50px] w-[100px]"/>
                        </div>
                    </div>

                    <a href="{{ route('enclaves.customers.account.inquiries.tickets') }}" alt="ticket-list">
                        <div class="p-4 flex justify-between items-center border shadow-xl rounded-lg gap-2">
                            <div class="rounded-full border p-5">
                                <img src="{{ bagisto_asset('images/ticket-deactive.svg') }}" alt="ticket" class="h-[50px] w-[125px]"/>
                            </div>
                            <div> 
                                <p class="text-[20px] font-bold mb-2">@lang('enclaves::app.customers.inquiries.tickets')</p>
                                <p class="text-[17px]">@lang('enclaves::app.customers.inquiries.tickets_text')</p>
                            </div>
                            <div>
                                <img src="{{ bagisto_asset('images/arrow-right.svg') }}" alt="arrow-right" class="h-[50px] w-[100px]"/>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="mb-10 mt-10">
                    <h1 class="font-bold text-[25px]">@lang('enclaves::app.customers.inquiries.frequently')</h1>
                </div>

                <x-shop::accordion.custom-accordion :is-active=false>
                    <x-slot:header>
                        <div>@lang('Is it safe to buy or rent property online?')</div>
                    </x-slot:header>
                    <x-slot:content>
                        {{ "Safety in property ecommerce depends on several factors, including the reputation of the platform, verification processes for listings and users, and adherence to legal regulations. Reputable platforms implement security measures to protect users' personal and financial information and often provide escrow services to secure transactions. However, it's essential for buyers and renters to exercise due diligence, verify property details, and be cautious of potential scams." }}
                    </x-slot:content>
                </x-shop::accordion.custom-accordion>

                <x-shop::accordion.custom-accordion :is-active=false>
                    <x-slot:header>
                        <div>@lang('Is it safe to buy or rent property online?')</div>
                    </x-slot:header>
                    <x-slot:content>
                        {{ "Safety in property ecommerce depends on several factors, including the reputation of the platform, verification processes for listings and users, and adherence to legal regulations. Reputable platforms implement security measures to protect users' personal and financial information and often provide escrow services to secure transactions. However, it's essential for buyers and renters to exercise due diligence, verify property details, and be cautious of potential scams." }}
                    </x-slot:content>
                </x-shop::accordion.custom-accordion>

                <!-- Customers Inquiries modal -->
                <x-shop::form 
                    enctype="multipart/form-data"
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form @submit="handleSubmit($event, addTicket)" enctype="multipart/form-data">
                        <x-shop::modal ref="addInquireModal">
                            <x-slot:header>
                                <h2 class="text-[20px] font-medium max-sm:text-[22px]">
                                    @lang('enclaves::app.customers.inquiries.submit')
                                </h2>
                            </x-slot:header>

                            <x-slot:content>
                                <div v-if="! isSubmited">

                                    <x-shop::form.control-group>
                                        <div class="px-[30px] py-[20px] bg-white">
                                            <x-shop::form.control-group.control
                                                type="select"
                                                name="reason"
                                                class="py-[20px] px-[25px]"
                                                rules="required"
                                            >
                                            @foreach ($reasons as $reason)
                                                <option value="{{ $reason->name }}">{{ $reason->name }}</option>
                                            @endforeach
                                            
                                            </x-admin::form.control-group.control>
                                        </div>
                                    </x-shop::form.control-group>

                                    <x-shop::form.control-group>
                                        <div class="px-[30px] bg-white">
                                            <x-shop::form.control-group.control
                                                type="textarea"
                                                name="comment"
                                                class="py-[20px] px-[25px] h-[150px]"
                                                rules="required"
                                                placeholder="Write the details of your concern here...."
                                            />

                                            <x-shop::form.control-group.error
                                                class=" text-left"
                                                control-name="textarea"
                                            >
                                            </x-shop::form.control-group.error>
                                        </div>
                                    </x-shop::form.control-group>

                                    <!-- Image Input -->
                                    <div class="mx-[28px]">
                                        <img
                                            v-if="imagePreviewURL"
                                            :src="imagePreviewURL"
                                            alt="Image preview"
                                            style="max-width: 100%;width: 250px; object-fit: cover"
                                        />

                                        <input 
                                            id="upload-file"
                                            type="file"
                                            @change="uploadFile"
                                            ref="file"
                                            hidden
                                        >

                                        <label
                                            for="upload-file"
                                            refs="upload-file"
                                            class="primary-button flex gap-2 py-[8px] px-[20px] rounded-[18px] max-sm:text-[14px] max-sm:px-[8px] !bg-[#F8EBEB] text-[#CC035C] border-[#F8EBEB] my-[15px]"
                                        >

                                            <img 
                                                src="{{ bagisto_asset('images/upload-file.png') }}" 
                                                alt="upload-file" 
                                                class="w-[15px] h-[20px] my-[4px]"
                                            />

                                            {{ 'Upload Files' }}
                                        </label>
                                    </div>
                                </div>
                                <div v-else>
                                    @lang('Successfully submitted!')
                                </div>
                            </x-slot:content>

                            <x-slot:footer v-if="isSubmited">
                                <div class="flex mb-5">
                                    <button
                                        type="submit"
                                        class="primary-button flex py-[11px] px-[30px] rounded-[15px] max-sm:text-[14px] max-sm:px-[25px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 border-[#F8EBEB]"
                                    >
                                        @lang('enclaves::app.customers.inquiries.submit')
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-shop::modal>
                    </form>
                </x-shop::form>
            </div>
        </script>

        <script type="module">
            app.component("v-account-inquiries", {
                template: '#v-account-inquiries-template',

                data() {
                    return {
                        isSubmited: false,
                        images: null,
                        imagePreviewURL: null,
                    };
                },

                mounted() {
                },

                methods: {
                    uploadFile() {
                        this.images = this.$refs.file.files[0];

                        this.imagePreviewURL = URL.createObjectURL(this.images);
                    },

                    addTicket(params, { resetForm, setErrors }) {
                        const formData = new FormData();

                        formData.append('file', this.images);
                    
                        formData.append('comment', params.comment);

                        formData.append('reason', params.reason);
                       
                        this.$axios.post("{{ route('enclaves.customers.account.inquiries.tickets') }}", formData)
                            .then(response => {
                                this.isSubmited = true;

                                
                            })
                            .catch(error => {});
                    }
                },
            });
        </script>
    @endpushOnce
    
</x-shop::layouts.account>