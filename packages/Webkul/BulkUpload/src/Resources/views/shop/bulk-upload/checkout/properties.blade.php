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
                    <div class="flex flex-wrap gap-1">
                        <div class="grid justify-items-center min-w-[120px] max-h-[120px] relative rounded overflow-hidden transition-all hover:border-gray-400 group"
                            v-for="flat in flats"
                        >
                            <!-- Image Preview -->
                            <img
                                :src="flat.image_url"
                                :style="{'width': '120px', 'height': '120px', 'cursor': 'pointer'}"
                                @click="selectImage(flat.image_url, flat.product_id)"
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
                this.$axios.get("{{ route('shop.checkout.slot.image') }}", {
                    params: {
                        product_id: this.productId,
                        imageUrl: this.imageUrl,
                    }
                })
                .then(response => {
                    response.data.flats.forEach(flat => {
                        var img = document.createElement("img");

                        img.src = flat.image_url;
                        img.style.height = "500px";
                        img.style.width = "650px";

                        img.setAttribute('id', "slots-image");
                        
                        document.querySelector('#slots').append(img);

                        flat.slots.forEach(slot => {
                            this.callSpot(slot.x_coordinate, slot.y_coordinate, slot.flat_numbers);
                        });
                    });

                    ++this.refresh_product_image;
                })
                .catch(error => {});
            },

            callSpot(x_coordinate, y_coordinate, slot_number) {
                var div = document.createElement("div");
                
                div.style.position = 'absolute';
                div.style.top = y_coordinate + 'px';
                div.style.left = x_coordinate + 'px';
                div.style.width = this.size;
                div.style.height = this.size;
                div.style.color = '#000';
                div.style.border = '1px solid red';
                div.style.backgroundColor = 'red';
                div.textContent = slot_number;
                div.setAttribute('id', slot_number);

                div.setAttribute('class', 'slots');

                document.querySelector('#slots-image').after(div);
            },
        }
    });

    app.component('v-checkout-properties', {
        template: '#v-checkout-properties-template',

        data() {
            return  {
                isShowProperties: true,
                flats: [],
                refresh_product_image: 1,
                productId: null,
                imageUrl: null,
            }
        }, 
        
        created() {
            this.getImages();
        },

        methods: {
            getImages(){
                this.$axios.get("{{ route('shop.checkout.slot.index') }}")
                    .then(response => {
                        this.flats = response.data.flats;
                    })
                    .catch(error => {});
            },

            selectImage(url, productId) {
                this.productId = productId;
                this.imageUrl = url;

                ++this.refresh_product_image;
            }
        },
    });
</script>
@endPushOnce