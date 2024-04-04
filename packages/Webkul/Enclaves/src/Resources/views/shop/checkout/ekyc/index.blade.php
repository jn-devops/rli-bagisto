<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="true"
>

<!-- Page Title -->
<x-slot:title>
    @lang('enclaves::app.shop.authentication.title')
</x-slot>

<v-user-kyc-summary></v-user-kyc-summary>

@pushOnce('scripts')
    <script type="text/x-template" id="v-user-kyc-summary-template">
        <!-- Page Content -->
        <div class="container">
            <div class="p-[20px] m-[20px]">
                <div class="w-full flex justify-center gap-x-[40px] max-[1180px]:gap-x-[20px]">
                    <h1 
                        class="text-[40px] font-bold mt-[26px] leading-[48px] max-sm:text-[26px] max-sm:leading-[36px]"
                        :class="opacity"
                    >
                        @lang('enclaves::app.shop.authentication.title')
                    </h1>
                </div>
           
                <p 
                    class="text-[20px] mt-[50px] max-sm:text-[16px] max-sm:mt-[25px]" 
                    :class="opacity"
                >
                    @lang('enclaves::app.shop.authentication.body_text')
                </p>

                <!-- Loader Spinner -->
                <div 
                    v-if="sended"
                    role="status" 
                    class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2"
                    >
                    <svg 
                        aria-hidden="true" 
                        class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" 
                        viewBox="0 0 100 101" 
                        fill="none" 
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" 
                            fill="currentColor"
                        />

                        <path 
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"
                        />
                    </svg>

                    <span class="absolute text-nowrap -left-[80px]" v-text="loadingText"></span>
                </div>
                
                <button
                    v-if="sended"
                    class="flex mt-[30px] block mx-auto bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] text-white text-[16px] font-medium py-[16px] px-[43px] rounded-[18px] text-center"
                    :class="opacity"
                >
                    @lang('enclaves::app.shop.authentication.authenticate')
                </button>

                <button
                    v-else
                    class="flex mt-[30px] block mx-auto bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] text-white text-[16px] font-medium py-[16px] px-[43px] rounded-[18px] text-center"
                    @click="handleKycVerification"
                >
                    @lang('enclaves::app.shop.authentication.authenticate')
                </button>
                
                <x-admin::modal ref="addFreamModal">
                    <x-slot:header>
                        <p class="text-[18px] text-gray-800 dark:text-white font-bold">
                            @lang('enclaves::app.shop.authentication.title')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div class="p-5">
                            <iframe 
                                :src="embedURL"
                                width="560" 
                                height="330" 
                                title="W3Schools Free Online Web Tutorials"
                                >
                            </iframe>
                        </div>
                    </x-slot:content>
                </x-admin::modal>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-user-kyc-summary', {
            template: '#v-user-kyc-summary-template',

            data() {
                return {
                    request: @json($request),
                    verification: @json($verification),
                    sended: false,
                    opacity: '',
                    loadingText: 'Loading...',
                    alreadyRedirect: 0,
                    embedURL: null,
                }
            },
            
            mounted() {
                if (this.verification) {
                    this.sended = true;
                    this.opacity = 'opacity-20';
                    this.loadingText = "Please complete Kyc process";
                }

                this.resetKycVerification();
                this.getEmbedUrl();
            },

            methods: {
                handleKycVerification() {
                    this.$axios.post("{{ route('ekyc.verification.store') }}", {
                        request: this.request,
                    })
                    .then(response => {
                        this.opacity = 'opacity-20';
                        this.loadingText = "Kyc Request Sent";

                        this.sended = true;

                        this.resetKycVerification();

                        this.getEmbedUrl();
                    })
                    .catch(error => console.log(error));
                },

                resetKycVerification() {
                    const verification = setInterval(() => {
                        this.$axios.get("{{ route('ekyc.verification.get') }}", {
                            params: {
                                cart_id: this.request.cartId,
                                slug: this.request.slug,
                            }
                        })
                        .then(response => {
                            if (response.data.data.status) {
                                clearInterval(verification);

                                ++this.alreadyRedirect;

                                this.customerLogin(response.data.data.transaction_id);
                            } else {
                                console.log('waiting');
                            }
                        })
                        .catch(error => console.log(error));
                    }, 5000);
                },
                
                customerLogin(transaction_id) {
                    if (this.alreadyRedirect > 1) {
                        return;
                    }

                    this.$axios.post("{{ route('ekyc.verification.customer.login') }}", {
                            transaction_id: transaction_id
                        })
                        .then(response => {
                            window.open(response.data.data.redirect, "_self");
                        })
                        .catch(error => console.log(error));
                },

                getEmbedUrl() {
                    this.$axios.get("{{ route('ekyc.verification.url.get') }}", {
                        params: {
                            cart_id: this.request.cartId,
                            slug: this.request.slug,
                        }
                    })
                    .then(response => {
                        if (! response.data.data.status) {
                            this.$refs.addFreamModal.open();
                            this.embedURL = response.data.data.url;
                        }
                    })
                    .catch(error => console.log(error));
                },
            },
        });
    </script>
@endPushOnce

</x-shop::layouts>