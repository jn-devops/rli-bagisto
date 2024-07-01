<x-admin::layouts>
    <!--Page Title -->
    <x-slot:title>
        @lang('google_feed::app.admin.product.export.title')
    </x-slot>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <!-- Title -->
        <p class="p-4 text-xl font-bold text-gray-800 dark:text-white">
            @lang('google_feed::app.admin.product.export.title')
        </p>
    </div>

    <div class="my-44 grid place-content-center">
        <div class="box-shadow flex h-48 min-h-full w-96 items-center justify-center rounded-[4px] bg-gray-200 p-4 dark:bg-gray-900">
            <v-export-product></v-export-product>
        </div>  
    </div>

    @PushOnce('scripts')
        <script type="text/x-template" id="v-export-product-template">
            @if (bouncer()->hasPermission('google_feed.product.export'))
                <button 
                    v-if ="! isLoading"
                    class="primary-button"
                    @click="exportProduct({{ $productCount }}, 1)"
                >
                    @lang('google_feed::app.admin.product.export.title')
                </button>
            @endif

            <button
              v-else
            >
               <!-- Spinner -->
               <svg
                    class="absolute h-5 w-5 animate-spin text-blue-600"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none" 
                    aria-hidden="true"
                    viewBox="0 0 24 24"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4"
                    >
                    </circle>

                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                    >
                    </path>
                </svg>

               <span
                   class="relative h-full w-full opacity-0"
                >
               </span>
            </button>          
        </script>

        <script type="module">
            app.component('v-export-product', {
                template: '#v-export-product-template',

                data() {
                    return {
                        initialProdCount: 0,

                        isLoading: false,
                    }
                },

                methods: {
                    exportProduct(productCount, key) {
                        let params = '?productCount=' + productCount + '&page=' + key;

                        if (key == 1) {
                            this.$emitter.emit('open-confirm-modal', {
                                agree: () => {
                                    this.isLoading = true;
                                    
                                    this.$axios.get("{{ route('google_feed.products.export') }}" + params)
                                        .then(response => { 
                                            if (response.status == 200) { 
                                                this.isLoading = false; 
                                                    
                                                if (
                                                    response.data.data.allUploaded == false
                                                    && response.data.data.productsUploaded < parseInt(productCount)
                                                ) {
                                                    this.initialProdCount = this.initialProdCount + response.data.data.productsUploaded;

                                                    this.$emitter.emit('add-flash', { type: 'success', message:  "Total no. of products =  " + response.data.data.productsCount + " and Total = " + this.initialProdCount + ' ' + response.data.message });

                                                    this.exportProduct(productCount, response.data.data.page);
                                                } else {
                                                    this.initialProdCount = 0;

                                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.productsCount + ' ' + response.data.message });

                                                    return;
                                                } 
                                            }
                                        })
                                        .catch(error => {
                                            if (error.response.status == 401) {
                                               this.isLoading = false;

                                               this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                                            }
                                        });
                                }
                            });
                        }
                    },
                }
            });
        </script>
    @endPushOnce
</x-admin::layouts>