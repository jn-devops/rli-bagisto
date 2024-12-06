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
        <div class="lg:container">
            <div
                class="m-[20px] p-[20px]"
                v-if="! sended && ! embedURL"
            >
                <div class="flex w-full justify-center gap-x-[40px] max-[1180px]:gap-x-[20px]"
                    v-if="isLoaded"
                >
                    <h1
                        class="text-[40px] font-bold leading-[48px] max-lg:text-[26px] max-lg:leading-[36px]"
                        v-text="crmPage.page_title"
                    >
                    </h1>
                </div>

                <div v-else class="flex justify-center">
                    <div class="shimmer h-[50px] w-[250px]"></div>
                </div>

                <div v-if="isLoaded">
                    <p
                        class="mt-[50px] text-[20px] max-lg:mt-[25px] max-lg:text-[16px]"
                        v-html="crmPage.html_content"
                    >
                    </p>
                </div>

                <div v-else class="mt-[50px]">
                    <div class="shimmer mt-2 h-[20px] w-full"></div>

                    <div class="shimmer mt-2 h-[20px] w-[80%]"></div>

                    <div class="shimmer mt-2 h-[20px] w-full"></div>

                    <div class="shimmer mt-2 h-[20px] w-[80%]"></div>

                    <div class="shimmer mt-2 h-[20px] w-full"></div>

                    <div class="shimmer mt-2 h-[20px] w-[80%]"></div>

                    <div class="shimmer mt-2 h-[20px] w-full"></div>

                    <div class="shimmer mt-2 h-[20px] w-[80%]"></div>
                </div>

                <!-- Loader Spinner -->
                <button
                    v-if="isLoaded || crmPage.translations"
                    class="mx-auto mt-[30px] flex rounded-[18px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[43px] py-[16px] text-center text-[16px] font-medium text-white"
                    @click="handleKycVerification"
                    v-text="crmPage.translations[0].btn_title"
                >
                </button>

                <div v-else class="mt-12 flex justify-center">
                    <div class="shimmer h-[50px] w-[250px]"></div>
                </div>
            </div>

            <div v-else>
                <div v-if="isIframeLoaded"
                    class="mt-4 flex justify-center border-2"
                >
                    <iframe
                        :src="embedURL"
                        width="1160"
                        height="700"
                        style="overflow:auto;"
                    >
                    </iframe>
                </div>

                <div v-else class="mt-4 flex justify-center border-2">
                    <div class="shimmer flex h-[700px] w-full items-center justify-center">
                        <span>lang('enclaves::app.shop.actions.page-loading')</span>
                    </div>
                </div>
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
                    alreadyRedirect: 0,
                    embedURL: null,
                    isIframeLoaded: 0,
                    crmPage: {},
                    isLoaded: false,
                }
            },

            mounted() {
                if (this.verification) {
                    this.sended = true;
                }

                this.resetKycVerification();

                this.getEmbedUrl();

                this.loading();

                this.getPageCMS();
            },

            methods: {
                getPageCMS() {
                    this.$axios.get("{{ route('ekyc.verification.cms') }}")
                    .then(response => {
                        this.isLoaded = true;

                        this.crmPage = response.data.data.page;
                    })
                    .catch(error => console.log(error));
                },

                loading() {
                    setTimeout(() => {
                        this.isIframeLoaded = 1;
                    }, 2000);
                },

                handleKycVerification() {
                    this.$axios.post("{{ route('ekyc.verification.store') }}", {
                        request: this.request,
                    })
                    .then(response => {
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
                        if (! response.data.data.status && response.data.data.url) {
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
