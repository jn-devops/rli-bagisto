<v-product-image-spot-url></v-product-image-spot-url>

@bagistoVite(['src/Resources/assets/css/app.css'], 'bulk-upload')

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

                <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">
                    @lang('bulkupload::app.admin.bulk-upload.slot.big_info')
                </p>

                <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">
                    @lang('bulkupload::app.admin.bulk-upload.slot.big_info_secound')
                </p>
            </div>
        </div>

        <!-- Image Blade Component -->
        <div class="flex flex-wrap gap-[4px]">
            <div class="grid gap-[8px] justify-items-center min-w-[120px] max-h-[120px] relative rounded overflow-hidden transition-all hover:border-gray-400 group cursor-pointer"
                v-for="image in images"
                >
                <!-- Image Preview -->
                <img
                    :src="image.url"
                    :style="{'width': '120px', 'height': '120px'}"
                    @click="selectImage(image.url)"
                />
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
        id="spotsCollection"
        class="mt-4" 
        style="border: 1px solid red; margin-top:10px;"
    >
        <img
            :src="flats.image_url" 
            :alt="flats.image_url" 
            @click="handleClick()"
            id="slot-image"
            style="height: 500px; width: 650px;"
        />

        <x-admin::form
            v-slot="{ meta, errors, handleSubmit }"
            as="div"
            >
            <form @submit="handleSubmit($event, storeSlot)">
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
                        <x-admin::form.control-group
                            class="mb-[10px] justify-between p-[10px] dark:border-gray-800"
                            >
                            <x-admin::form.control-group.label class="required">
                                @lang('bulkupload::app.admin.bulk-upload.slot.flat')
                            </x-admin::form.control-group.label>
                            
                            <x-admin::form.control-group.control
                                type="text"
                                name="flat_numbers"
                                rules="required"
                                v-model="flats.slot.flat_numbers"
                                :label="trans('bulkupload::app.admin.bulk-upload.slot.flat')"
                                :placeholder="trans('bulkupload::app.admin.bulk-upload.slot.flat')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <!-- x_coordinate Number -->
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="x_coordinate"
                                rules="required"
                                v-model="flats.slot.x_coordinate"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- y_coordinate Number -->
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="y_coordinate"
                                rules="required"
                                v-model="flats.slot.y_coordinate"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Id -->
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="slot_id"
                                rules="required"
                                v-model="flats.slot.slot_id"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Url -->
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="image_url"
                                rules="required"
                                v-model="flats.image_url"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>

                        <!-- Product Id -->
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="product_id"
                                rules="required"
                                v-model="flats.product_id"
                            >
                            </x-admin::form.control-group.control>
                        </x-admin::form.control-group>
                        
                    </x-slot:content>

                    <!-- Model Footer -->
                    <x-slot:footer>
                        <div class="flex gap-x-[10px] items-center">
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
                flats: {
                    product_id: '{{ $product->id }}',
                    image_url: null,
                    slot: {
                        x_coordinate: 0,
                        y_coordinate: 0,
                        slot_id: 0,
                        flat_numbers: null,
                        width: '200px',
                        height: '200px',
                    }
                },
                number: 0,
                color: '#ed3838',
                bcolor: '#292727',
                size: '50px',
                textColor: "#fffff",
                flatsSlots: [],
            };
        },

        created() {
            this.flats.image_url = this.imageUrl;
            
            this.getSlots();

            this.$emitter.on('emitter-flats', (data) => {
                this.updateCoordinates(data);
            });
        },

        methods: {
            // add slot into image
            handleClick() {
                this.flats.slot.x_coordinate = event.offsetX;

                this.flats.slot.y_coordinate = event.offsetY;

                this.flats.slot.slot_id = 0;

                this.flats.slot.flat_numbers = null;

                this.flats.slot.width = '200px';

                this.flats.slot.height = '200px';

                ++this.number;

                this.callSpot(this.flats.slot, this.number);
            },

            // store slot in db
            storeSlot(params, { resetForm, setErrors }) {
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
                        product_id: this.flats.product_id,
                        image_url: this.flats.image_url,
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

                            this.callSpot(slot, slot.slot_id);
                        });
                    });
                }).catch(error => {
                    console.log(error);
                });
            },

            // get single slot with condition.
            getSlot(slot_id) {
                this.flats.slot.flat_numbers = null;

                this.$axios.get("{{ route('admin.bulk-upload.product.url.slot') }}", {
                    params: {
                        slot_id: slot_id,
                        product_id: this.flats.product_id,
                        image_url: this.flats.image_url,
                    }
                })
                .then(response => {
                    let slot = this.flats.slot;

                    if(response.data.flat) {
                        this.flats = response.data.flat;
                    }

                    // If flat slot is null
                    if(! this.flats.slot) {
                        this.flats.slot = slot;
                    }

                    this.$refs.addSpotModal.open();
                }).catch(error => {
                    console.log(error);
                });
            },

            // create slot attribute.
            callSpot(slot, slot_number) {
                var div = document.createElement("div");
                console.log(slot);
                div.style.position = 'absolute';
                div.style.top = slot.y_coordinate + 'px';
                div.style.left = slot.x_coordinate + 'px';
                div.style.width = slot.width;
                div.style.height = slot.height;
                div.style.color = '#000';
                div.style.border = '2px solid #4286f4';
                div.style.backgroundColor = '#bb8a8a52';
                div.textContent = slot.flat_numbers ?? slot_number;
                div.setAttribute('id', 'resizable_' + slot_number);

                div.setAttribute('class', 'slots resizable_' + slot_number);

                this.makeResizableDiv('resizer top-left', div);

                this.makeResizableDiv('resizer top-right', div);

                this.makeResizableDiv('resizer bottom-left', div);

                this.makeResizableDiv('resizer bottom-right', div);

                this.dragSlots(div);

                div.addEventListener("dblclick", (e) => {
                    this.flats.slot.slot_id = e.target.id;
                    this.flats.slot.width = e.target.style.width;
                    this.flats.slot.height = e.target.style.height;
                    this.flats.slot.x_coordinate = e.target.style.left.replace('px', '');
                    this.flats.slot.y_coordinate = e.target.style.top.replace('px', '');

                    this.getSlot(this.flats.slot.slot_id);
                });

                document.querySelector('#slot-image').after(div);
            },

            dragSlots(div) {
                let self = this;
                
                var xDrogCoordinate = 0, yDrogCoordinate = 0, drogClientX = 0, drogClientY = 0;

                div.onmousedown = dragMouseDown;

                function dragMouseDown(e) {
                    // Box drag with out ctrl Key.
                    if(! e.ctrlKey) {
                        e = e || window.event;
                        
                        e.preventDefault();

                        // get the mouse cursor position at startup:
                        drogClientX = e.clientX;

                        drogClientY = e.clientY;

                        document.querySelector('#spotsCollection').onmouseup = closeDragElement;
                        
                        // call a function whenever the cursor moves:
                        document.querySelector('#spotsCollection').onmousemove = elementDrag;
                    }
                }

                function elementDrag(e) {
                    e = e || window.event;

                    e.preventDefault();

                    // calculate the new cursor position:
                    xDrogCoordinate = drogClientX - e.clientX;
                    yDrogCoordinate = drogClientY - e.clientY;

                    // Reset X & Y
                    drogClientX = e.clientX;
                    drogClientY = e.clientY;

                    // set the element's new position:
                    div.style.top = (div.offsetTop - yDrogCoordinate) + "px";

                    div.style.left = (div.offsetLeft - xDrogCoordinate) + "px";

                    self.flats.slot.x_coordinate = (div.offsetLeft - xDrogCoordinate);

                    self.flats.slot.y_coordinate = (div.offsetTop - yDrogCoordinate);
                    
                    self.flats.slot.width = e.target.style.width;

                    self.flats.slot.height = e.target.style.height;

                    self.flats.slot.slot_id = e.target.id;
                }

                function closeDragElement() {
                    self.$emitter.emit('emitter-flats', self.flats);

                    /* stop moving when mouse button is released:*/
                    document.querySelector('#spotsCollection').onmouseup = null;
                    document.querySelector('#spotsCollection').onmousemove = null;
                }
            },

            updateCoordinates(params) {
                setTimeout(() => {
                    this.$axios.post("{{ route('admin.bulk-upload.product.url.slot.update') }}", params)
                        .then(response => {
                        }).catch(error => {
                            console.log(error);
                        });
                }, 1000);
            },

            // close form model
            closeModal() {
                this.$refs.addSpotModal.close();
            },

            makeResizableDiv(classNames, div) {
                let self = this;

                var dots = document.createElement("div");
                
                dots.setAttribute('class', classNames);

                const minimum_size = 20;
                let original_width = 0;
                let original_height = 0;
                let original_x = 0;
                let original_y = 0;
                let original_mouse_x = 0;
                let original_mouse_y = 0;

                dots.addEventListener('mousedown', function(e) {
                    // Zoom move with ctrl Key
                    if(e.ctrlKey) {
                        e.preventDefault();

                        original_width = parseFloat(getComputedStyle(dots, null).getPropertyValue('width').replace('px', ''));

                        original_height = parseFloat(getComputedStyle(dots, null).getPropertyValue('height').replace('px', ''));

                        original_x = dots.getBoundingClientRect().left;

                        original_y = dots.getBoundingClientRect().top;

                        original_mouse_x = e.offsetX;

                        original_mouse_y = e.offsetY;
                       
                        // set Slot Id
                        self.flats.slot.slot_id = e.toElement.parentElement.id;

                        // set Slot width
                        self.flats.slot.width = e.toElement.parentElement.style.width;
                        
                        // set Slot height
                        self.flats.slot.height = e.toElement.parentElement.style.height;

                        // id
                        self.flats.slot.slot_id = e.toElement.parentElement.id;

                        // set Slot left
                        self.flats.slot.x_coordinate = e.toElement.parentElement.style.left.replace('px', '');

                        // set Slot top
                        self.flats.slot.y_coordinate = e.toElement.parentElement.style.top.replace('px', '');

                        document.querySelector('#spotsCollection').addEventListener('mousemove', resize);

                        document.querySelector('#spotsCollection').addEventListener('mouseup', stopResize);

                        self.$emitter.emit('emitter-flats', self.flats);
                    }
                })
                
                function resize(dotSize) {
                    if (dots.classList.contains('bottom-right')) {
                        const width = original_width + (dotSize.offsetX - original_mouse_x);
                        
                        const height = original_height + (dotSize.offsetY - original_mouse_y);

                        if (width > minimum_size) {
                            div.style.width = self.flats.slot.width = width + 'px';
                        }

                        if (height > minimum_size) {
                            div.style.height = self.flats.slot.height = height + 'px';
                        }

                        console.log(width, height, 'bottom-right');
                    } else if (dots.classList.contains('bottom-left')) {
                        console.log('bottom-left');

                        const height = original_height + (dotSize.offsetY - original_mouse_y);

                        const width = original_width - (dotSize.offsetX - original_mouse_x);

                        if (height > minimum_size) {
                            div.style.height = self.flats.slot.height = height + 'px';
                        }

                        if (width > minimum_size) {
                            div.style.width =  self.flats.slot.width = width + 'px';
                            div.style.left = original_x + (dotSize.offsetX - original_mouse_x) + 'px';
                        }

                    } else if (dots.classList.contains('top-right')) {
                        console.log('top-right');

                        const width = original_width + (dotSize.offsetX - original_mouse_x);

                        const height = original_height - (dotSize.offsetY - original_mouse_y);

                        if (width > minimum_size) {
                            div.style.width = self.flats.slot.width = width + 'px'
                        }

                        if (height > minimum_size) {
                            div.style.height = self.flats.slot.height = height + 'px'
                            div.style.top = original_y + (dotSize.offsetY - original_mouse_y) + 'px'
                        }

                    } else {
                        console.log('top-left');

                        const width = original_width - (dotSize.offsetX - original_mouse_x);

                        const height = original_height - (dotSize.offsetY - original_mouse_y);

                        if (width > minimum_size) {
                            div.style.width = self.flats.slot.width = width + 'px';
                            div.style.left = original_x + (dotSize.offsetX - original_mouse_x) + 'px';
                        }

                        if (height > minimum_size) {
                            div.style.height = self.flats.slot.height = height + 'px';
                            div.style.top = original_y + (dotSize.offsetY - original_mouse_y) + 'px';
                        }
                    }
                }

                function stopResize() {
                    document.querySelector('#spotsCollection').removeEventListener('mousemove', resize);
                }

                div.appendChild(dots);
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