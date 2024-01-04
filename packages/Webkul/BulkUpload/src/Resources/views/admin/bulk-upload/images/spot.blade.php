<v-product-image-spot-url></v-product-image-spot-url>

@pushOnce('scripts')

<script type="text/x-template" id="v-product-image-spot-url-template">
    <div class="p-4 relative bg-white dark:bg-gray-900 rounded box-shadow">

        <!-- Panel Header -->
        <div class="flex gap-5 justify-between mb-4">
            <div class="flex flex-col gap-2">
                <p class="text-base text-gray-800 dark:text-white font-semibold">
                    @lang('bulkupload::app.admin.bulk-upload.slot.heading')
                </p>

                <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">
                    @lang('bulkupload::app.admin.bulk-upload.slot.info')
                </p>
            </div>
        </div>

        <!-- Image Blade Component -->
        <div class="flex flex-wrap gap-1">
            <div class="grid justify-items-center min-w-[120px] max-h-[120px] relative rounded overflow-hidden transition-all hover:border-gray-400 group"
                v-for="image in images"
                >
                <!-- Image Preview -->
                <img
                    :src="image.url"
                    :style="{'width': '120px', 'height': '120px'}"
                />

                <div class="flex flex-col justify-between invisible w-full p-3 bg-white dark:bg-gray-900 absolute top-0 bottom-0 opacity-80 transition-all group-hover:visible">
                    <!-- Action -->
                    <div class="flex justify-between">
                        <span
                            class="icon-edit text-2xl p-1.5 rounded-md cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800"
                            @click="selectImage(image.url)"
                        ></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-1">
            <div 
                v-if="url" 
                class="grid justify-items-center relative rounded overflow-hidden transition-all hover:border-gray-400 group"
            >
                <v-product-spot 
                    :image-url="url" 
                    :key="refresh_product_slot"
                >
                </v-product-spot>
            </div>
        </div>
    </div>
</script>

<script  type="text/x-template" id="v-product-spot-template">
    <div
        class="mt-4" 
        style="border: 1px solid red;"
        >
        <img
            :src="slot.image_url" 
            :alt="slot.image_url" 
            @click="handleClick()"
            id="slot-image"
            style="height: 500px; width: 650px;"
        />

        <x-admin::form
            v-slot="{ meta, errors, handleSubmit }"
            as="div"
            >
            <form @submit="handleSubmit($event, addSlot)">
                <!-- Model Form -->

                <x-admin::modal ref="addSpotModal">
                    <!-- Model Header -->
                    <x-slot:header>
                        <p class="text-lg text-gray-800 dark:text-white font-bold">
                            @lang('bulkupload::app.admin.bulk-upload.slot.title')
                        </p>
                    </x-slot:header>

                    <!--Model Content -->
                    <x-slot:content>
                        <!-- Flot Number -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.label class="required">
                                @lang('bulkupload::app.admin.bulk-upload.slot.flate')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="text"
                                name="flat_numbers"
                                rules="required"
                                v-model="slot.flat_numbers"
                                :label="trans('bulkupload::app.admin.bulk-upload.slot.flate')"
                                :placeholder="trans('bulkupload::app.admin.bulk-upload.slot.flate')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!-- x_coordinate Number -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="x_coordinate"
                                rules="required"
                                v-model="slot.x_coordinate"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- y_coordinate Number -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="y_coordinate"
                                rules="required"
                                v-model="slot.y_coordinate"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Id -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="slot_id"
                                rules="required"
                                v-model="slot.slot_id"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Url -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="image_url"
                                rules="required"
                                v-model="slot.image_url"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Product Id -->
                        <x-admin::form.control-group class="mb-2.5">
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="product_id"
                                rules="required"
                                v-model="slot.product_id"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>
                        
                    </x-slot:content>

                    <!-- Model Footer -->
                    <x-slot:footer>
                        <div class="flex gap-x-2.5 items-center">
                            <!-- Add Group Button -->
                            <button
                                type="submit"
                                class="primary-button"
                            >
                                @lang('bulkupload::app.admin.bulk-upload.slot.button')
                            </button>
                        </div>
                    </x-slot:footer>
                </x-admin::modal>
            </form>
        </x-admin::form>
    </div>
</script>

<script type="module">
    app.component('v-product-spot', {
        
        props: ['imageUrl'],

        template: '#v-product-spot-template',

        data() {
            return {
                slot: {
                    product_id: '{{ $product->id }}',
                    image_url: null,
                    x_coordinate: 0,
                    y_coordinate: 0,
                    slot_id: 0,
                    flat_numbers: null,
                },
                
                number: 0,
                color: '#ed3838',
                bcolor: '#292727',
                size: '50px',
                textColor: "#fffff",
            };
        },

        created() {
            this.slot.image_url = this.imageUrl;
            
            this.getSlots();
        },

        methods: {
            // add slot into image
            handleClick() {
                this.slot.x_coordinate = event.offsetX;

                this.slot.y_coordinate = event.offsetY;

                ++this.number;

                this.callSpot(this.slot.x_coordinate, this.slot.y_coordinate, this.number);
            },

            // add slot
            addSlot(params, { resetForm, setErrors }) {
                this.$axios.post("{{ route('admin.bulk-upload.product.url.store') }}", params)
                    .then(response => {
                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                       // resetForm();
                        this.$refs.addSpotModal.close();

                    }).catch(error => {
                        console.log(error);
                    });
            },

            // Get all slots in image.
            getSlots() {
                this.$axios.get("{{ route('admin.bulk-upload.product.url.get') }}", {
                    params: {
                        product_id: this.slot.product_id,
                        image_url: this.slot.image_url,
                    }
                })
                .then(response => {
                    // reset all slots
                    document.querySelectorAll('.slots').forEach((e) => {
                        e.remove();
                    });

                    response.data.flats.forEach(flat => {
                        // Add Slot on image
                        flat.slots.forEach(slot => {
                            this.number = slot.slot_id;

                            this.callSpot(slot.x_coordinate, slot.y_coordinate, slot.flat_numbers);
                            
                        });
                    });
                    
                }).catch(error => {
                    console.log(error);
                });
            },

            // get single slot with condition.
            getSlot(slot_id) {
                this.slot.flat_numbers = null;

                this.$axios.get("{{ route('admin.bulk-upload.product.url.slot') }}", {
                    params: {
                        slot_id: slot_id,
                        product_id: this.slot.product_id,
                        image_url: this.slot.image_url,
                    }
                })
                .then(response => {
                    if(response.data.slot.length) {
                        this.slot = response.data.slot;
                    }

                    this.$refs.addSpotModal.open();
                }).catch(error => {
                    console.log(error);
                });
            },

            // create slot attribute.
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

                div.addEventListener("dblclick", (e) => {
                    this.slot.slot_id = e.target.id;
                    this.getSlot(this.slot.slot_id);
                });

                document.querySelector('#slot-image').after(div);
            },

            // close form model
            closeModal() {
                this.$refs.addSpotModal.close();
            },
        },
    });

    app.component('v-product-image-spot-url', {
        template: '#v-product-image-spot-url-template',

        data() {
            return {
                images: @json($product->images),
                refresh_product_slot: 1,
                url: '',
            }
        },

        methods: {
            selectImage(url) {
                ++this.refresh_product_slot;

                this.url = url;
            }
        }
    });
</script>
    
@endPushOnce