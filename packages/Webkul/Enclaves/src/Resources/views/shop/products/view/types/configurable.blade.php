@if (Webkul\Product\Helpers\ProductType::hasVariants($product->type))
    {!! view_render_event('bagisto.shop.products.view.configurable-options.before', ['product' => $product]) !!}

    <v-product-configurable-options :errors="errors"></v-product-configurable-options>

    {!! view_render_event('bagisto.shop.products.view.configurable-options.after', ['product' => $product]) !!}

    @push('scripts')
        <script type="text/x-template" id="v-product-configurable-options-template">
            <div class="">
                <input
                    type="hidden"
                    name="selected_configurable_option"
                    id="selected_configurable_option"
                    :value="selectedProductId"
                    ref="selected_configurable_option"
                >

                <div
                    class="relative mt-5"
                    v-for='(attribute, index) in childAttributes'
                >
                    <!-- Dropdown Options Container -->
                    <template
                        v-if="! attribute.swatch_type || attribute.swatch_type == '' || attribute.swatch_type == 'dropdown'"
                        >
                        <!-- Dropdown Options -->
                        <v-field
                            as="select"
                            :name="'super_attribute[' + attribute.id + ']'"
                            class="relative flex w-full appearance-none items-center justify-between gap-4 rounded-full border border-[#D9D9D9] bg-white px-[38px] py-[28px] max-md:px-[15px] max-md:py-[10px] max-md:text-[12px]"
                            :class="[errors['super_attribute[' + attribute.id + ']'] ? 'border border-red-500' : '']"
                            :id="'attribute_' + attribute.id"
                            rules="required"
                            :label="attribute.label"
                            :disabled="attribute.disabled"
                            :aria-label="'super_attribute[' + attribute.id + ']'"
                            @change="configure(attribute, $event.target.value)"
                        >
                            <option
                                v-for='(option, index) in attribute.options'
                                :value="option.id"
                                :selected="index == attribute.selectedIndex"
                            >
                                @{{ option.label }}
                            </option>
                        </v-field>

                        <p class="absolute right-6 top-[30px] flex items-center gap-1.5 text-base font-normal text-[#CC035C] max-md:top-[10px] max-md:text-[12px] max-sm:text-[18px]">
                            <span v-if="attribute.options.length" class="text-[#CC035C] max-md:text-[12px]">
                                @lang('enclaves::app.shop.product.select')
                            </span>
                            <span class="text-[#898386] max-md:text-[12px]" v-else>
                                @lang('enclaves::app.shop.product.select')
                            </span>

                            <svg
                                v-if="attribute.options.length"
                                width="20" 
                                height="12" 
                                viewBox="0 0 20 12" 
                                fill="none" 
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9.66732 11.3781L0.703827 2.36689C0.0751711 1.73489 0.52645 0.659683 1.41787 0.663007L18.8104 0.727855C19.6853 0.731117 20.1345 1.77702 19.5344 2.41372L11.1039 11.3586C10.7164 11.7697 10.0657 11.7786 9.66732 11.3781Z"
                                    fill="#CC035C"
                                />
                            </svg>

                            <svg
                                v-else
                                width="20" 
                                height="12" 
                                viewBox="0 0 20 12" 
                                fill="none" 
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M9.66732 11.3781L0.703827 2.36689C0.0751711 1.73489 0.52645 0.659683 1.41787 0.663007L18.8104 0.727855C19.6853 0.731117 20.1345 1.77702 19.5344 2.41372L11.1039 11.3586C10.7164 11.7697 10.0657 11.7786 9.66732 11.3781Z" fill="#8b8b8b"></path>
                            </svg>
                        </p>
                    </template>

                    <!-- Swatch Options Container -->
                    <template v-else>
                        <!-- Option Label -->
                        <h3
                            class="mb-[15px] text-xl max-lg:text-[18px]"
                            v-text="attribute.label"
                        ></h3>

                        <!-- Swatch Options -->
                        <div class="flex items-center space-x-3">
                            <template v-for="(option, index) in attribute.options">
                                <!-- Color Swatch Options -->
                                <template v-if="option.id">
                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none"
                                        :class="{'ring-gray-900 ring ring-offset-1' : index == attribute.selectedIndex}"
                                        :title="option.label"
                                        v-if="attribute.swatch_type == 'color'"
                                    >
                                        <v-field
                                            type="radio"
                                            :name="'super_attribute[' + attribute.id + ']'"
                                            :value="option.id"
                                            v-slot="{ field }"
                                            rules="required"
                                            :label="attribute.label"
                                        >
                                            <input
                                                type="radio"
                                                :name="'super_attribute[' + attribute.id + ']'"
                                                :value="option.id"
                                                v-bind="field"
                                                :id="'attribute_' + attribute.id"
                                                :aria-labelledby="'color-choice-' + index + '-label'"
                                                class="peer sr-only"
                                                @click="configure(attribute, $event.target.value)"
                                            />
                                        </v-field>

                                        <span
                                            class="h-8 w-8 rounded-full border border-navyBlue border-opacity-10 bg-navyBlue max-lg:h-[25px] max-lg:w-[25px]"
                                            :style="{ 'background-color': option.swatch_value }"
                                        ></span>
                                    </label>

                                    <!-- Image Swatch Options -->
                                    <label 
                                        class="group relative flex h-[60px] w-[60px] cursor-pointer items-center justify-center overflow-hidden rounded-full border bg-white font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none max-lg:h-[35px] max-lg:w-[35px] sm:py-6"
                                        :class="{'ring-2 ring-navyBlue' : index == attribute.selectedIndex }"
                                        :title="option.label"
                                        v-if="attribute.swatch_type == 'image'"
                                    >
                                        <v-field
                                            type="radio"
                                            :name="'super_attribute[' + attribute.id + ']'"
                                            :value="option.id"
                                            v-slot="{ field }"
                                            rules="required"
                                            :label="attribute.label"
                                        >
                                            <input
                                                type="radio"
                                                :name="'super_attribute[' + attribute.id + ']'"
                                                :value="option.id"
                                                v-bind="field"
                                                :id="'attribute_' + attribute.id"
                                                :aria-labelledby="'color-choice-' + index + '-label'"
                                                class="peer sr-only"
                                                @click="configure(attribute, $event.target.value)"
                                            />
                                        </v-field>

                                        <img
                                            :src="option.swatch_value"
                                            :title="option.label"
                                        />
                                    </label>

                                    <!-- Text Swatch Options -->
                                    <label 
                                        class="group relative flex h-[60px] min-w-[60px] cursor-pointer items-center justify-center rounded-full border bg-white px-4 py-3 font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none max-lg:h-[35px] max-lg:w-[35px] sm:py-6"
                                        :class="{'ring-2 ring-navyBlue' : index == attribute.selectedIndex }"
                                        :title="option.label"
                                        v-if="attribute.swatch_type == 'text'"
                                    >
                                        <v-field
                                            type="radio"
                                            :name="'super_attribute[' + attribute.id + ']'"
                                            :value="option.id"
                                            v-slot="{ field }"
                                            rules="required"
                                            :label="attribute.label"
                                        >
                                            <input
                                                type="radio"
                                                :name="'super_attribute[' + attribute.id + ']'"
                                                :value="option.id"
                                                v-bind="field"
                                                :id="'attribute_' + attribute.id"
                                                :aria-labelledby="'color-choice-' + index + '-label'"
                                                class="peer sr-only"
                                                @click="configure(attribute, $event.target.value)"
                                            />
                                        </v-field>

                                        <span
                                            class="text-[18px] max-lg:text-[12px]"
                                            v-text="option.label"
                                        ></span>

                                        <span class="pointer-events-none absolute -inset-px rounded-full"></span>
                                    </label>
                                </template>
                            </template>

                            <span
                                class="text-sm text-gray-600 max-lg:text-[12px]"
                                v-if="! attribute.options.length"
                            >
                                @lang('shop::app.products.view.type.configurable.select-above-options')
                            </span>
                        </div>
                    </template>

                    <v-error-message
                        :name="['super_attribute[' + attribute.id + ']']"
                        v-slot="{ message }"
                    >
                        <p
                            class="mt-1 text-xs italic text-red-500"
                            v-text="message"
                        >
                        </p>
                    </v-error-message>

                </div>
                <hr v-if="childAttributes.length" class="mb-11 mt-16 h-px border-t border-[#D9D9D9]" />
            </div>
        </script>

        <script type="module">
            let galleryImages = @json(product_image()->getGalleryImages($product));

            app.component('v-product-configurable-options', {
                template: '#v-product-configurable-options-template',

                props: ['errors'],

                data() {
                    return {
                        defaultVariant: @json($product->getTypeInstance()->getDefaultVariant()),

                        config: @json(app('Webkul\Product\Helpers\ConfigurableOption')->getConfigurationConfig($product)),

                        childAttributes: [],

                        selectedProductId: '',

                        simpleProduct: null,

                        galleryImages: [],
                    }
                },

                mounted() {
                    this.prepareAttributes();

                    this.prepareDefaultSelection();
                },

                methods: {
                    prepareAttributes() {
                        let config = JSON.parse(JSON.stringify(this.config));

                        let childAttributes = this.childAttributes,
                            attributes = config.attributes.slice(),
                            index = attributes.length,
                            attribute;

                        while (index--) {
                            attribute = attributes[index];

                            attribute.options = [];

                            if (index) {
                                attribute.disabled = true;
                            } else {
                                this.fillSelect(attribute);
                            }

                            attribute = Object.assign(attribute, {
                                childAttributes: childAttributes.slice(),
                                prevAttribute: attributes[index - 1],
                                nextAttribute: attributes[index + 1]
                            });

                            childAttributes.unshift(attribute);
                        }
                    },

                    prepareDefaultSelection() {
                        if (this.defaultVariant) {
                            this.childAttributes.forEach((attribute) => {
                                let attributeValue = this.defaultVariant[attribute.code];

                                this.configure(attribute, attributeValue);
                            });
                        }
                    },

                    configure(attribute, value) {
                        this.simpleProduct = this.getSelectedProductId(attribute, value);

                        if (value) {
                            attribute.selectedIndex = this.getSelectedIndex(attribute, value);

                            if (attribute.nextAttribute) {
                                attribute.nextAttribute.disabled = false;

                                this.fillSelect(attribute.nextAttribute);

                                this.resetChildren(attribute.nextAttribute);
                            } else {
                                this.selectedProductId = this.simpleProduct;
                            }
                        } else {
                            attribute.selectedIndex = 0;

                            this.resetChildren(attribute);

                            this.clearSelect(attribute.nextAttribute)
                        }

                        this.reloadPrice();
                        this.changeProductImages();
                        this.loadLocation();
                    },

                    getSelectedIndex(attribute, value) {
                        let selectedIndex = 0;

                        attribute.options.forEach(function(option, index) {
                            if (option.id == value) {
                                selectedIndex = index;
                            }
                        })

                        return selectedIndex;
                    },

                    getSelectedProductId(attribute, value) {
                        let options = attribute.options,
                            matchedOptions;

                        matchedOptions = options.filter(function (option) {
                            return option.id == value;
                        });

                        if (matchedOptions[0] != undefined && matchedOptions[0].allowedProducts != undefined) {
                            return matchedOptions[0].allowedProducts[0];
                        }

                        return undefined;
                    },

                    fillSelect(attribute) {
                        let options = this.getAttributeOptions(attribute.id),
                            prevOption,
                            index = 1,
                            allowedProducts,
                            i,
                            j;

                        this.clearSelect(attribute)
                        
                        attribute.options = [{
                            'id': '',
                            'label': attribute.label + '?',
                            'products': []
                        }];

                        if (attribute.prevAttribute) {
                            prevOption = attribute.prevAttribute.options[attribute.prevAttribute.selectedIndex];
                        }

                        if (options) {
                            for (i = 0; i < options.length; i++) {
                                allowedProducts = [];

                                if (prevOption) {
                                    for (j = 0; j < options[i].products.length; j++) {
                                        if (prevOption.allowedProducts && prevOption.allowedProducts.indexOf(options[i].products[j]) > -1) {
                                            allowedProducts.push(options[i].products[j]);
                                        }
                                    }
                                } else {
                                    allowedProducts = options[i].products.slice(0);
                                }

                                if (allowedProducts.length > 0) {
                                    options[i].allowedProducts = allowedProducts;

                                    attribute.options[index] = options[i];

                                    index++;
                                }
                            }
                        }
                    },

                    resetChildren(attribute) {
                        if (attribute.childAttributes) {
                            attribute.childAttributes.forEach(function (set) {
                                set.selectedIndex = 0;
                                set.disabled = true;
                            });
                        }
                    },

                    clearSelect (attribute) {
                        if (! attribute)
                            return;

                        if (! attribute.swatch_type || attribute.swatch_type == '' || attribute.swatch_type == 'dropdown') {
                            let element = document.getElementById("attribute_" + attribute.id);

                            if (element) {
                                element.selectedIndex = "0";
                            }
                        } else {
                            let elements = document.getElementsByName('super_attribute[' + attribute.id + ']');

                            let self = this;

                            elements.forEach(function(element) {
                                element.checked = false;
                            })
                        }
                    },

                    getAttributeOptions (attributeId) {
                        let self = this,
                            options;

                        this.config.attributes.forEach(function(attribute, index) {
                            if (attribute.id == attributeId) {
                                options = attribute.options;
                            }
                        })

                        return options;
                    },

                    reloadPrice () {
                        let selectedOptionCount = 0;

                        this.childAttributes.forEach(function(attribute) {
                            if (attribute.selectedIndex) {
                                selectedOptionCount++;
                            }
                        });

                        let priceElement = document.querySelector('.special-price') ? document.querySelector('.special-price') : document.querySelector('.final-price');
                        
                        let priceInElement = document.querySelector('.price-in-final');

                        let processingFeeBtn = document.querySelector('.processing_fee_btn');

                        let regularPriceElement = document.querySelector('.special-price');
                        
                        let processingFee = document.querySelector('.processing_fee');

                        let processingFeeText = document.querySelector('.processing_fee_text');

                        if (this.childAttributes.length == selectedOptionCount) {
                            priceElement.innerHTML = this.config.variant_prices[this.simpleProduct].final.formatted_price;

                            priceInElement.innerHTML = this.config.variant_prices[this.simpleProduct].final.formatted_price;

                            processingFeeBtn.innerHTML = this.config.variant_prices[this.simpleProduct].processing_fee.formatted_price;

                            processingFee.innerHTML = this.config.variant_prices[this.simpleProduct].processing_fee.formatted_price;
                            
                            processingFeeText.style.display = 'block';

                            if (regularPriceElement) {
                                regularPriceElement.innerHTML = this.config.variant_prices[this.simpleProduct].regular.formatted_price;
                                
                                regularPriceElement.style.display = 'inline-block';
                            }

                            this.$emitter.emit('configurable-variant-selected-event',this.simpleProduct);
                        } else {
                            priceElement.innerHTML = this.config.regular.formatted_price;

                            this.$emitter.emit('configurable-variant-selected-event', 0);
                        }
                    },

                    changeProductImages () {
                        galleryImages.splice(0, galleryImages.length)
                        
                        if (this.simpleProduct) {
                            this.config.variant_images[this.simpleProduct].forEach(function(image) {
                                galleryImages.push(image)
                            });

                            this.config.variant_videos[this.simpleProduct].forEach(function(video) {
                                galleryImages.push(video)
                            });
                        }

                        this.galleryImages.forEach(function(image) {
                            galleryImages.push(image)
                        });
                        
                        if(this.config.variants.options[this.simpleProduct]) {
                            this.$parent.$parent.$refs.gallery.options = this.config.variants.options[this.simpleProduct];
                        }

                        if(this.config.variants.details[this.simpleProduct]) {
                            this.$parent.$parent.$parent.$refs.details.product = this.config.variants.details[this.simpleProduct];
                        }

                        if (galleryImages.length) {
                            this.$parent.$parent.$refs.gallery.media.images = this.config.variant_images[this.simpleProduct];
                        }

                        ++this.$parent.$parent.$refs.gallery.refreshBaseImageComponent;
                    },

                    loadLocation() {
                        this.$parent.$parent.$refs.gallery.location = this.config.variant_location[this.simpleProduct].label;
                    },
                }
            });

        </script>
    @endpush
@endif