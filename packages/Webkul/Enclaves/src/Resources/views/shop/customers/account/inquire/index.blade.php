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
            <div class="grid w-full font-montserrat gap-y-[0.813rem] max-md:mt-[30px]">
                <h2 class="text-[1.813rem] font-semibold leading-[1.975rem] text-black">
                    @lang('enclaves::app.shop.customers.inquiries.title')
                </h2>

                <div class="mb-14">
                    <h1 class="font-bold text-[25px]">
                        @lang('enclaves::app.shop.customers.inquiries.help_test')
                    </h1>
                </div>

                <div class="flex flex-col md:px-6 xl:flex-row gap-11">
                    <button 
                        class="flex rounded-[0.625rem] items-center pl-8 pr-6 text-left hover:shadow-xl shadow-lg duration-300 shadow-[rgba(0,_0,_0,_0.1)] gap-x-3 pt-9 pb-11"
                        @click="$refs.addInquireModal.open()"
                    >
                        <div class="flex items-center justify-center p-3 border-[rgba(233,_233,_233)] border rounded-full">
                            <svg 
                                width="38" 
                                height="38" 
                                viewBox="0 0 38 38" 
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M25.0869 0C24.5413 0 24.0105 0.232211 23.5924 0.643046L23.5687 0.619229L19.0852 5.07292C18.9636 5.14735 18.8658 5.25452 18.8005 5.38253L0.629378 23.4831C0.629378 23.492 0.629378 23.498 0.629378 23.5069C-0.209793 24.3494 -0.209793 25.7129 0.629378 26.5554L3.00159 28.9133C3.26847 29.1842 3.69547 29.2139 3.99792 28.9847C4.65028 28.4607 5.50131 28.0797 6.34642 28.0797C8.36576 28.0797 9.90474 29.6992 9.90474 31.6522C9.90474 32.5363 9.58449 33.3401 9.02702 33.9624C8.76311 34.269 8.78387 34.7304 9.07446 35.0103L11.423 37.3681C12.2621 38.2106 13.6202 38.2106 14.4594 37.3681L32.4171 19.339H32.4408C32.7314 19.2705 32.9538 19.0383 33.0101 18.7436C33.0101 18.7347 33.0101 18.7287 33.0101 18.7198L37.2327 14.5043C37.2623 14.4834 37.2771 14.4566 37.3038 14.4328C38.2171 13.6647 38.2142 12.2744 37.3987 11.4557L35.0265 9.09791C34.7596 8.827 34.3326 8.79723 34.0302 9.02646C33.3808 9.54745 32.6572 9.86004 31.7766 9.86004C29.7572 9.86004 28.1945 8.24052 28.1945 6.28756C28.1945 5.40337 28.5059 4.65315 29.0248 4.00117C29.2531 3.69751 29.2235 3.26882 28.9536 3.00088L26.6051 0.643046C26.187 0.22328 25.6385 0 25.0869 0ZM25.0869 1.54807C25.2559 1.54807 25.425 1.60166 25.5376 1.71479L27.4828 3.66774C27.0203 4.42987 26.6763 5.30215 26.6763 6.28756C26.6763 9.05921 28.9358 11.3843 31.7766 11.3843C32.761 11.3843 33.6032 11.039 34.3623 10.5745L36.3075 12.5275C36.5328 12.7537 36.5506 13.1259 36.3312 13.2896C36.2986 13.3105 36.266 13.3343 36.2363 13.3611L32.1798 17.4337C32.0256 17.2938 31.8181 17.2253 31.6105 17.2432C31.3258 17.27 31.0827 17.4545 30.9759 17.7225C30.8721 17.9874 30.9226 18.2911 31.1123 18.5054L13.3919 36.2964C13.1665 36.5226 12.7158 36.5226 12.4905 36.2964L10.5452 34.3434C11.0612 33.5456 11.423 32.6405 11.423 31.6522C11.423 28.8805 9.18714 26.5554 6.34642 26.5554C5.32933 26.5554 4.43678 26.9484 3.66581 27.4366L1.7206 25.4837C1.49524 25.2574 1.49524 24.8049 1.7206 24.5786L19.4885 6.83534C19.782 7.139 20.2654 7.14198 20.5678 6.84725C20.8703 6.55252 20.8733 6.06726 20.5797 5.7636L24.6362 1.71479C24.7489 1.60166 24.9179 1.54807 25.0869 1.54807ZM22.0268 7.66892L21.4574 8.04998L21.4337 8.74066L21.5998 8.95501L22.6435 10.0268L23.3077 10.2411L23.8534 9.83622L23.8771 9.16936L23.7347 8.93119L22.6673 7.88327L22.0268 7.66892ZM25.2055 10.8603L24.6599 11.2652L24.6362 11.9321L24.7785 12.1702L25.846 13.242L26.4865 13.4563L27.0558 13.0515L27.0796 12.3846L26.9372 12.1464L25.8697 11.0747L25.2055 10.8603ZM28.408 14.0756L27.8624 14.4566L27.8387 15.1473L27.981 15.3617L29.0485 16.4334L29.689 16.6477L30.2583 16.2667L30.2821 15.576L30.116 15.3617L29.0485 14.2899L28.408 14.0756Z"
                                    fill="#CC035C" 
                                />
                            </svg>
                        </div>

                        <hgroup class="flex flex-col max-w-80 gap-4 pr-1.5 mr-4">
                            <h4 class="text-xl font-bold leading-5 text-black">
                                @lang('enclaves::app.shop.customers.inquiries.submit-header')
                            </h4>

                            <p class="text-[1.065rem] leading-[1.375rem] font-normal"> 
                                @lang('enclaves::app.shop.customers.inquiries.submit-text')
                            </p>
                        </hgroup>

                        <svg 
                            class="ml-auto min-w-10 ml-auto"
                            width="39"
                            height="27"
                            viewBox="0 0 39 27"
                            fill="none" 
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M24.8251 0.00342727C24.3999 0.0785219 24.0588 0.387737 23.9392 0.79855C23.8196 1.21378 23.9436 1.65552 24.2581 1.94706L34.6767 12.3367H1.18855C1.15311 12.3367 1.11767 12.3367 1.08224 12.3367C0.457656 12.3676 -0.029606 12.8977 0.00140176 13.5205C0.0324096 14.1434 0.563967 14.6293 1.18855 14.5983H34.6767L24.2581 24.9879C23.9215 25.2618 23.7664 25.6991 23.8639 26.1232C23.9614 26.5429 24.2936 26.8742 24.7144 26.9713C25.1396 27.0685 25.5782 26.9139 25.8528 26.5782L38.2204 14.2803L39 13.4675L38.2204 12.6547L25.8528 0.356815C25.618 0.105027 25.277 -0.0230763 24.9314 0.00342727C24.896 0.00342727 24.8606 0.00342727 24.8251 0.00342727Z"
                                fill="black" 
                            />
                        </svg>
                    </button>

                    <a 
                        href="{{ route('enclaves.customers.account.inquiries.tickets') }}"
                        class="flex rounded-[0.625rem] items-center pl-8 pr-6 text-left hover:shadow-xl shadow-lg duration-300 shadow-[rgba(0,_0,_0,_0.1)] gap-x-3 pt-9 pb-11"
                    >

                        <div class="flex items-center justify-center p-3 border-[rgba(233,_233,_233)] border rounded-full">
                            <svg 
                                width="35"
                                height="35"
                                viewBox="0 0 35 35"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M34.4353 10.5316L32.2659 8.3528C32.0145 8.10035 31.6129 8.0784 31.3342 8.30067C30.7085 8.80557 30.009 9.06076 29.2549 9.06076C27.4406 9.06076 25.9679 7.57899 25.9679 5.7597C25.9679 5.00235 26.222 4.29988 26.722 3.66876C26.9461 3.38887 26.9242 2.9855 26.6728 2.73305L24.5034 0.557036C23.7657 -0.186594 22.4323 -0.183849 21.6973 0.554293L17.9458 4.29714L18.9076 5.26303C19.1808 5.53744 19.1808 5.98197 18.9076 6.25637C18.771 6.39357 18.5907 6.46217 18.4131 6.46217C18.2327 6.46217 18.0551 6.39357 17.9185 6.25637L16.954 5.28773L0.571054 21.6311C0.202191 22.0016 0 22.501 0 23.0388C0 23.5794 0.202191 24.0788 0.571054 24.4492L2.74051 26.628C2.99188 26.8804 3.3908 26.9051 3.67223 26.6801C4.33618 26.145 5.10123 25.8487 5.82256 25.8487C7.63408 25.8487 9.10953 27.3305 9.10953 29.1497C9.10953 29.9483 8.82537 30.7056 8.30896 31.2791C8.06032 31.559 8.07125 31.9816 8.33629 32.2477L10.503 34.4238C10.8719 34.7942 11.3719 35 11.9074 35C12.443 35 12.943 34.7942 13.3118 34.4238L29.6401 18.0255L28.6893 17.0733C28.4161 16.7989 28.4161 16.3544 28.6893 16.08C28.9652 15.8056 29.4051 15.8056 29.6784 16.08L30.6292 17.0321L34.3342 13.3113C34.7195 13.0012 34.9599 12.5402 34.9955 12.0353C35.0337 11.4755 34.8288 10.9267 34.4353 10.5316ZM21.8476 9.20894C21.711 9.34614 21.5334 9.41474 21.353 9.41474C21.1727 9.41474 20.9951 9.34614 20.8585 9.20894L19.8776 8.22383C19.6043 7.94943 19.6043 7.5049 19.8776 7.2305C20.1508 6.9561 20.5907 6.9561 20.8667 7.2305L21.8476 8.2156C22.1208 8.49 22.1208 8.93454 21.8476 9.20894ZM24.793 12.167C24.6564 12.3042 24.4788 12.3728 24.2985 12.3728C24.1209 12.3728 23.9405 12.3042 23.8039 12.167L22.823 11.1819C22.5498 10.9075 22.5498 10.4602 22.823 10.1886C23.0962 9.91415 23.5389 9.91415 23.8121 10.1886L24.793 11.1737C25.0662 11.4481 25.0662 11.8926 24.793 12.167ZM27.7384 15.125C27.6018 15.2622 27.4242 15.3309 27.2439 15.3309C27.0663 15.3309 26.886 15.2622 26.7493 15.125L25.7684 14.1399C25.4952 13.8655 25.4952 13.421 25.7684 13.1466C26.0417 12.8722 26.4843 12.8722 26.7575 13.1466L27.7384 14.1317C28.0117 14.4061 28.0117 14.8506 27.7384 15.125Z"
                                    fill="#D9D9D9"
                                />
                            </svg>
                        </div>

                        <hgroup class="flex flex-col max-w-80 gap-4 pr-1.5 mr-4">
                            <h4 class="text-xl font-bold leading-5 text-black">
                                @lang('enclaves::app.shop.customers.inquiries.tickets')
                            </h4>

                            <p class="text-[1.065rem] leading-[1.375rem] font-normal"> 
                                @lang('enclaves::app.shop.customers.inquiries.tickets_text')
                            </p>
                        </hgroup>

                        <svg 
                            class="ml-auto min-w-10"
                            width="39"
                            height="27"
                            viewBox="0 0 39 27"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.8251 0.00342727C24.3999 0.0785219 24.0588 0.387737 23.9392 0.79855C23.8196 1.21378 23.9436 1.65552 24.2581 1.94706L34.6767 12.3367H1.18855C1.15311 12.3367 1.11767 12.3367 1.08224 12.3367C0.457656 12.3676 -0.029606 12.8977 0.00140176 13.5205C0.0324096 14.1434 0.563967 14.6293 1.18855 14.5983H34.6767L24.2581 24.9879C23.9215 25.2618 23.7664 25.6991 23.8639 26.1232C23.9614 26.5429 24.2936 26.8742 24.7144 26.9713C25.1396 27.0685 25.5782 26.9139 25.8528 26.5782L38.2204 14.2803L39 13.4675L38.2204 12.6547L25.8528 0.356815C25.618 0.105027 25.277 -0.0230763 24.9314 0.00342727C24.896 0.00342727 24.8606 0.00342727 24.8251 0.00342727Z"
                                fill="black" 
                            />
                        </svg>
                    </a>
                </div>

                <div class="mb-10 mt-10">
                    <h1 class="font-bold text-[25px]">@lang('enclaves::app.shop.customers.inquiries.frequently')</h1>
                </div>

                <x-shop::accordion.custom-accordion :is-active=false>
                    <x-slot:header>
                        <div>@lang('Is it safe to buy or rent property online?')</div>
                    </x-slot:header>

                    <x-slot:content>
                        <x-shop::layouts.read-more-smooth 
                                text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                limit="400"
                            >
                        </x-shop::layouts.read-more-smooth>
                    </x-slot:content>
                </x-shop::accordion.custom-accordion>

                <x-shop::accordion.custom-accordion :is-active=false>
                    <x-slot:header>
                        <div>@lang('Is it safe to buy or rent property online?')</div>
                    </x-slot:header>

                    <x-slot:content>
                        <x-shop::layouts.read-more-smooth 
                                text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."                                    
                                limit="400"
                            >
                        </x-shop::layouts.read-more-smooth>
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
                                    @lang('enclaves::app.shop.customers.inquiries.submit')
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
                                    <div class="mx-[28px] max-w-[155px]">
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
                                            role="button"
                                            for="upload-file"
                                            refs="upload-file"
                                            class="primary-button flex gap-2 py-[8px] px-[20px] rounded-[18px] !bg-[#F8EBEB] text-[#CC035C] border-[#F8EBEB] my-[15px]"
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
                                        class="primary-button flex py-[11px] px-[30px] rounded-[15px] max-sm:text-[14px] max-sm:px-[25px] !bg-gradient-to-r from-[#e0165d] to-yellow-500 border-[#F8EBEB] text-white"
                                    >
                                        @lang('enclaves::app.shop.customers.inquiries.submit')
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