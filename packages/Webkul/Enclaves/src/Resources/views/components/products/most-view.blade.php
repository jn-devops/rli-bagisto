<v-products-most-view></v-products-most-view>

@pushOnce('scripts')
    <script type="text/x-template" id="v-products-most-view-template">
        <!-- Most Viewed Properties -->
        <div class="container mt-24 max-lg:px-[30px] max-sm:mt-[30px]">
    
            <h3 class="rli-title max-sm:text-[25px] text-center">Most Viewed Properties</h3>
            
            <div class="flex mt-[96px] gap-[30px] justify-between max-1280:flex-wrap">
                <div class="relative max-h-[971px]">
                    <img class="rounded-[20px] 1280:h-[971px]" :src="mostViewImage" alt="Most Viewed Properties" />

                    <div
                        class="flex justify-between absolute bottom-0 pb-12 px-8 w-full rounded-[20px] max-768:flex-wrap max-768:gap-[20px] max-768:pl-4 max-768:pb-4 bg-[linear-gradient(180deg,_rgba(0,_0,_0,_0)_0%,_#000000_100%)]">
                        <div class="flex">
                            <div class="max-w-[523px]">
                                <p class="text-[45px] font-bold text-white max-768:text-[18px]" v-text="firstMostViewProduct.name"></p>
                                <p
                                    class="text-[20px] font-bold text-[#FFAD00] mt-[15px] max-768:text-[14px] max-768:mt-[8px]"
                                    v-text="firstMostViewProduct.price"
                                >
                                </p>
                                <p class="text-[12px] text-[#A0A0A0] mt-[10px]">@lang('Total Contract Price')</p>
                            </div>
                        </div>
                        <a 
                            href="javascript:void(0)"
                            alt="choose area"
                            class="h-max self-end text-white px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]">
                            @lang('Choose Area')
                        </a>
                    </div>
                </div>

                <div
                    class="grid gap-[10%] max-1280:grid-cols-2 max-1280:items-start max-1280:w-full max-1280:justify-items-center max-668:grid-cols-1 max-668:gap-[20px]">
                    <div class="grid gap-2.5 relative max-w-[350px] max-h-[434px] max-sm:max-h-max">
                        <div class="relative overflow-hidden  group max-w-[350px] max-h-[289px] rounded-[20px]">

                            <img 
                                class="rounded-sm bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300 h-[289px]"
                                :src="secoundMostViewImage"
                            >
                        </div>
                        <div class="grid gap-2.5 content-start">
                            <p class="text-[20px] font-bold font-popins" v-text="secoundMostViewProduct.name"></p>
                            <div class="flex items-center gap-5 justify-between max-425:flex-wrap">

                                <div class="grid gap-[12px]">
                                    <p class="text-[20px] font-medium font-popins" v-text="secoundMostViewProduct.price"></p>
                                    <p class="text-[16px] font-medium font-popins text-[#A0A0A0] text-nowrap">@lang('Total Contract Price')</p>
                                </div>

                                <a 
                                    href="javascript:void(0)"
                                    alt="choose area"
                                    class="text-white text-nowrap px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]">
                                    @lang('Choose Area')
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-2.5 relative max-w-[350px] max-h-[434px] max-sm:max-h-max">

                        <div class="relative overflow-hidden  group max-w-[350px] max-h-[289px] rounded-[20px]">
                            <img 
                                class="rounded-sm bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300 h-[289px]"
                                :src="thirdMostViewImage"
                            >
                        </div>

                        <div class="grid gap-2.5 content-start">
                            <p class="text-[20px] font-bold font-popins" v-text="thirdMostViewProduct.name"></p>

                            <div class="flex items-center gap-5 justify-between max-425:flex-wrap">
                                <div class="grid gap-[12px]">
                                    <p class="text-[20px] font-medium font-popins" v-text="thirdMostViewProduct.price"></p>
                                    <p class="text-[16px] font-medium font-popins text-[#A0A0A0] text-nowrap">@lang('Total Contract Price')</p>
                                </div>

                                <a 
                                    href=""
                                    alt="choose area"
                                    class="text-white text-nowrap px-[25px] py-[10px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]">
                                    @lang('Choose Area')
                                </a>
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
                    isLoading: true,
                    products: [],
                    mostViewImage: null,

                    secoundMostViewImage: null,

                    firstMostViewProduct: [],

                    secoundMostViewProduct: [],

                    thirdMostViewProduct: [],

                    thirdMostViewImage: null,
                };
            },

            mounted() {
                this.$axios.get('{{ route("enclaves.product.most-view.index") }}')
                    .then(response => {
                        this.isLoading = false;
                        
                        this.products = response.data.products;

                        this.firstMostViewProduct = response.data.products[0];

                        this.mostViewImage = this.firstMostViewProduct.images[0].url;

                        this.secoundMostViewProduct = response.data.products[1];
                        this.secoundMostViewImage = this.secoundMostViewProduct.images[0].url;
                        

                        this.thirdMostViewProduct = response.data.products[2];
                        this.thirdMostViewImage = this.thirdMostViewProduct.images[0].url;

                    }).catch(error => {
                        //console.log(error);
                    });
            }
        });
    </script>
@endPushOnce
