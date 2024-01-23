<v-checkout-properties ref="vCheckoutProperties"></v-checkout-properties>

@pushOnce('scripts')
<script type="text/x-template" id="v-checkout-properties-template">
    <div class="mt-[30px] mb-[30px]">
        
        <template v-if="! isShowProperties">
            <!-- shimmer Effect For Now using dommy-->
            <x-shop::shimmer.checkout.onepage.shipping-method/>
        </template>

        <template v-if="isShowProperties">
            <x-shop::accordion>
                <x-slot:header>
                    <div class="flex justify-between items-center">
                        <h2 class="text-[26px] font-medium max-sm:text-[20px]">
                            @lang('bulkupload::app.shop.bulk-upload.checkout.title')
                        </h2>
                    </div>
                </x-slot:header>

                <x-slot:content>
                <!-- property choose form -->
                    <x-shop::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                    >
                        <form @submit="handleSubmit($event, handlePropertyForm)">

                            <div class="flex flex-wrap gap-1"
                                v-for="flat in flats"    
                            >
                                <div class="grid justify-items-center min-w-[120px] max-h-[120px] relative rounded overflow-hidden transition-all hover:border-gray-400 group"
                                    v-for="flat_details in flat"
                                >
                                    <!-- Image Preview -->
                                    <img
                                        :src="flat_details.image_url"
                                        :style="{'width': '120px', 'height': '120px', 'cursor': 'pointer'}"
                                        @click="selectImage(flat_details.image_url, flat_details.product_id)"
                                    />
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <v-checkout-properties-image
                                :product-id = productId
                                :image-url = imageUrl
                                :key = refresh_product_image
                            >
                            </v-checkout-properties-image>
                            
                            <div class="flex justify-between items-center">
                                <div>
                                    <x-shop::form
                                        v-slot="{ meta, errors, handleSubmit }"
                                        as="div"
                                        >
                                        <form @submit="handleSubmit($event, handlePropertyAuthenticationForm)">

                                            <div class="mt-2">
                                                <x-shop::form.control-group>
                                                    <x-shop::form.control-group.label class="required">
                                                        @lang('bulkupload::app.shop.bulk-upload.checkout.code')
                                                    </x-shop::form.control-group.label>
                                                    
                                                    <x-shop::form.control-group.control
                                                        type="text"
                                                        name="code"
                                                        rules="required"
                                                        :label="trans('bulkupload::app.shop.bulk-upload.checkout.code')"
                                                        :placeholder="trans('bulkupload::app.shop.bulk-upload.checkout.code')"
                                                        v-model="code"
                                                    >
                                                    </x-shop::form.control-group.control>
                                                
                                                    <x-shop::form.control-group.error
                                                        control-name="code"
                                                    >
                                                    </x-shop::form.control-group.error>
                                                </x-shop::form.control-group>

                                                <div 
                                                    class="flex justify-end mt-4 mb-4"
                                                >
                                                    <button
                                                        type="submit"
                                                        class="block w-max px-[43px] py-[11px] bg-navyBlue rounded-[18px] text-white text-base font-medium text-center cursor-pointer"
                                                    >
                                                        @lang('bulkupload::app.shop.bulk-upload.checkout.authentication')
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </x-shop::form>
                                </div>

                                <div class="flex justify-end mt-4 mb-4">
                                    <button
                                        type="submit"
                                        
                                        class="block w-max px-[43px] py-[11px] bg-navyBlue rounded-[18px] text-white text-base font-medium text-center cursor-pointer"
                                    >
                                        @lang('shop::app.checkout.onepage.addresses.shipping.confirm')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </x-shop::form>
                </x-slot:content>
            </x-shop::accordion>
        </template>
    </div>
</script>

<script type="text/x-template" id="v-checkout-properties-image-template">
    <div class="flex flex-wrap gap-1">
        <div class="grid justify-items-center relative rounded overflow-hidden transition-all hover:border-gray-400 group">
            <div 
                style="border: 1px solid red;"
                id="slots"
            ></div>
        </div>
    </div>
</script>

<script type="module">
    app.component('v-checkout-properties', {
        template: '#v-checkout-properties-template',

        data() {
            return  {
                isShowProperties: true,
                flats: [],
                refresh_product_image: 1,
                productId: null,
                imageUrl: null,
                code: null,
                disabled: true,
            }
        },

        mounted() {
            this.$emitter.on('slot', (slot) => {
                this.code = slot.flat_numbers;
            });
        },
        
        created() {
            this.getImages();
        },

        methods: {
            getImages(){
                this.$axios.get("{{ route('shop.checkout.property.images') }}")
                    .then(response => {
                        this.flats = response.data.flats;
                    })
                    .catch(error => {});
            },

            selectImage(url, productId) {
                this.productId = productId;
                this.imageUrl = url;

                ++this.refresh_product_image;
            },

            handlePropertyAuthenticationForm($event) {
                console.log($event);
            },

            handlePropertyForm($event) {
                this.$axios.post('{{ route("shop.checkout.authentication.store") }}', {
                    isAuthenticate: true
                })
                .then(response => {
                    if (response.data.data.payment_methods) {
                        this.$parent.$refs.vPaymentMethod.payment_methods = response.data.data.payment_methods;
                        
                        this.$parent.$refs.vPaymentMethod.isShowPaymentMethod = true;

                        this.$parent.$refs.vPaymentMethod.isPaymentMethodLoading = false;
                    }
                })
                .catch(error => {                 
                    console.log(error);
                });
            },
        },
    });

    app.component('v-checkout-properties-image', {
        props: ['productId', 'imageUrl'],

        template: '#v-checkout-properties-image-template',

        data() {
            return  {
                color: '#ed3838',
                size: '50px',
            }
        },

        created() {
            this.getImage();
        },

        methods: {
            getImage(){
                this.$axios.get("{{ route('shop.checkout.property.image') }}", {
                    params: {
                        product_id: this.productId,
                        imageUrl: this.imageUrl,
                    }
                })
                .then(response => {
                    response.data.slots.forEach(flat => {
                        var img = document.createElement("img");

                        img.src = flat.image_url;
                        img.style.height = "500px";
                        img.style.width = "650px";
                        
                        img.setAttribute('id', "slots-image");
                        
                        document.querySelector('#slots').append(img);

                        flat.slots.forEach(slot => {
                            this.callSpot(slot);
                        });
                    });

                    ++this.refresh_product_image;
                })
                .catch(error => {});
            },

            callSpot(slot) {
                var div = document.createElement("div");
                
                div.style.position = 'absolute';
                div.style.top = slot.y_coordinate + 'px';
                div.style.left = slot.x_coordinate + 'px';
                div.style.width = slot.width;
                div.style.height = slot.height;
                div.style.color = '#000';
                div.style.border = '1px solid #7f84b114';
                div.style.backgroundColor = '#7f84b114';
                //div.textContent = slot.flat_numbers;
                div.setAttribute('id', slot.slot_id);

                div.setAttribute('class', 'slots');

                let emitter = this.$emitter;

                div.addEventListener('click', function handleClick() {
                    emitter.emit('slot', slot);
                });

                document.querySelector('#slots-image').after(div);
            },
        }
    });
</script>
@endPushOnce