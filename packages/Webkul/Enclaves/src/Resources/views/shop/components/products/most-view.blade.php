<v-products-most-view></v-products-most-view>

@pushOnce('scripts')
    <script type="text/x-template" id="v-products-most-view-template">
        <!-- Most Viewed Properties -->
        <div class="container mt-[60px] max-lg:px-[30px] max-sm:mt-[30px]">

            <div class="rli-title max-sm:text-[25px] text-center" v-show="isMediaLoading">
                <div class="w-[100%] h-[90px] shimmer"></div>
            </div>

            <h3 class="rli-title max-sm:text-[25px] text-center" v-show="! isMediaLoading">@lang('enclaves::app.shop.homepage.most-view.title')</h3>
            
            <div class="flex mt-[30px] gap-[30px] justify-between max-1280:flex-wrap">
                 <!-- Media shimmer Effect -->
                 <div class="max-w-[819px] max-h-[860px]" v-show="isMediaLoading">
                    <div class="rounded-[20px] w-[819px] h-[860px] shimmer"></div>
                </div>

                <div 
                    class="relative max-h-[860px]" 
                    v-show="! isMediaLoading"
                >
                    <img
                        v-if="firstMostViewProduct.all_images"
                        class="rounded-[20px] 1280:h-[860px] cursor-pointer" 
                        :src="firstMostViewProduct.all_images.large_image_url" 
                        alt="Most Viewed Properties"
                        @click="redirectToProduct(firstMostViewProduct.url_key)"
                    />

                    <div
                        class="flex justify-between absolute bottom-0 pb-12 px-8 w-full rounded-[20px] max-768:flex-wrap max-768:gap-[20px] max-768:pl-4 max-768:pb-4 bg-[linear-gradient(180deg,_rgba(0,_0,_0,_0)_0%,_#000000_100%)]">
                        <div class="flex">
                            <div class="max-w-[523px]">
                                <p class="text-[45px] font-bold text-white max-768:text-[18px]" v-text="firstMostViewProduct.name"></p>
                                <p
                                    class="text-[20px] font-bold text-[#FFAD00] mt-[15px] max-768:text-[14px] max-768:mt-[8px]"
                                    v-text="firstMostViewProduct.format_price"
                                >
                                </p>
                                <p class="text-[12px] text-[#A0A0A0] mt-[10px]">@lang('enclaves::app.shop.homepage.most-view.contract-price')</p>
                            </div>
                        </div>

                        <button
                            class="h-max self-end text-white px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]"
                            @click="redirectToProduct(firstMostViewProduct.url_key)"
                        >
                            @lang('enclaves::app.shop.homepage.most-view.choose-unit')
                        </button>
                    </div>
                </div>

                <div class="grid gap-[5%] max-1280:grid-cols-2 max-1280:items-start max-1280:w-full max-1280:justify-items-center max-668:grid-cols-1 max-668:gap-[20px]">
                    
                    <!-- Media shimmer Effect -->
                    <div class="w-[322px] h-[443px]" v-show="isMediaLoading">
                        <div class="relative rounded-sm">
                            <div class="shimmer rounded-[20px] bg-[#F5F5F5] w-full h-[290px]"></div>
                        </div>

                        <div class="grid gap-2.5 content-start mt-[20px]">
                            <p class="shimmer w-[75%] h-[24px]"></p>
                            <p class="shimmer w-[55%] h-[24px]"></p>

                            {{-- Needs to implement that in future --}}
                            <div class="flex gap-4 mt-[12px]">
                                <span class="shimmer w-[100%] h-[30px] block"></span>
                                <span class="shimmer w-[100%] h-[30px] block"></span>
                            </div>
                        </div>
                    </div>
                
                    <div 
                        v-show="! isMediaLoading" 
                        class="grid gap-2.5 relative max-w-[350px] max-h-[434px] max-sm:max-h-max"
                    >
                        <div class="relative overflow-hidden  group max-w-[350px] max-h-[289px] rounded-[20px]">
                            <img
                                v-if="secoundMostViewProduct.all_images"
                                class="rounded-sm bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300 cursor-pointer"
                                :src="secoundMostViewProduct.all_images.medium_image_url"
                                @click="redirectToProduct(secoundMostViewProduct.url_key)"
                            >
                        </div>

                        <div class="grid gap-2.5 content-start">
                            <p class="text-[20px] font-bold font-popins" v-text="secoundMostViewProduct.name"></p>
                            
                            <div class="flex items-center gap-5 justify-between max-425:flex-wrap">

                                <div class="grid gap-[12px]">
                                    <p class="text-[16px] font-medium font-popins text-[#A0A0A0] text-nowrap">@lang('enclaves::app.shop.homepage.most-view.contract-price')</p>
                                    <p class="text-[20px] font-medium font-popins" v-text="secoundMostViewProduct.format_price"></p>
                                </div>

                                <button
                                    class="text-white text-nowrap px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]"
                                    @click="redirectToProduct(secoundMostViewProduct.url_key)"
                                >
                                    @lang('enclaves::app.shop.homepage.most-view.choose-unit')
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Media shimmer Effect -->
                    <div class="w-[322px] h-[443px]" v-show="isMediaLoading">
                        <div class="relative rounded-sm">
                            <div class="shimmer rounded-[20px] bg-[#F5F5F5] w-full h-[290px]"></div>
                        </div>

                        <div class="grid gap-2.5 content-start mt-[20px]">
                            <p class="shimmer w-[75%] h-[24px]"></p>
                            <p class="shimmer w-[55%] h-[24px]"></p>

                            {{-- Needs to implement that in future --}}
                            <div class="flex gap-4 mt-[12px]">
                                <span class="shimmer w-[100%] h-[30px] block"></span>
                                <span class="shimmer w-[100%] h-[30px] block"></span>
                            </div>
                        </div>
                    </div>

                    <div
                        v-show="! isMediaLoading"
                        class="grid gap-2.5 relative max-w-[350px] max-h-[434px] max-sm:max-h-max"
                    >
                        <div class="relative overflow-hidden  group max-w-[350px] max-h-[289px] rounded-[20px]">
                            <img
                                v-if="thirdMostViewProduct.all_images"
                                class="rounded-sm bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300 cursor-pointer"
                                :src="thirdMostViewProduct.all_images.medium_image_url"
                                @click="redirectToProduct(thirdMostViewProduct.url_key)"
                            >
                        </div>

                        <div class="grid gap-2.5 content-start">
                            <p class="text-[20px] font-bold font-popins" v-text="thirdMostViewProduct.name"></p>

                            <div class="flex items-center gap-5 justify-between max-425:flex-wrap">
                                <div class="grid gap-[12px]">
                                    <p class="text-[16px] font-medium font-popins text-[#A0A0A0] text-nowrap">
                                        @lang('enclaves::app.shop.homepage.most-view.contract-price')
                                    </p>

                                    <p 
                                        class="text-[20px] font-medium font-popins" 
                                        v-text="thirdMostViewProduct.format_price"
                                    ></p>
                                </div>

                                <button
                                    class="text-white text-nowrap px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]"
                                    @click="redirectToProduct(thirdMostViewProduct.url_key)"
                                >
                                    @lang('enclaves::app.shop.homepage.most-view.choose-unit')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-products-most-view', {
            template: '#v-products-most-view-template',

            data() {
                return {
                    isMediaLoading: true,

                    firstMostViewProduct: [],

                    secoundMostViewProduct: [],

                    thirdMostViewProduct: [],
                };
            },

            mounted() {
                this.$axios.get('{{ route("enclaves.product.most-view.index") }}')
                    .then(response => {
                        this.isMediaLoading = false;

                        this.firstMostViewProduct = response.data.products[0];

                        this.secoundMostViewProduct = response.data.products[1];
                        
                        this.thirdMostViewProduct = response.data.products[2];
                    }).catch(error => {
                    });
            },

            methods: {
                redirectToProduct(url) {
                    window.location.href = `{{ route('shop.product_or_category.index', '') }}/` + url;
                },
            },
        });
    </script>
@endPushOnce
