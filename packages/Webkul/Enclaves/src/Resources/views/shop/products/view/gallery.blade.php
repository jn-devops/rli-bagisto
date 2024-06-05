<v-product-gallery ref="gallery">
    <x-shop::shimmer.products.gallery/>
</v-product-gallery>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-gallery-template">
        <div>
            <div class="gap-[20px] max-1280:flex-wrap">
                <div class="w-full">
                    <!-- Media shimmer Effect -->
                    <x-shop::media.images.lazy
                        alt="{{ trans('shop::app.products.view.gallery.product-image') }}" 
                        class="w-full cursor-pointer rounded-[10px] max-lg:h-[240px] lg:h-[431px]"
                        v-show="! isMediaLoading"
                        v-if="baseFile.type == 'image'"
                        ::key="refreshBaseImageComponent"
                        ::src="baseFile.path"
                        @load="onMediaLoad()"
                    >
                    </x-shop::media.images.lazy>
                </div>
                
                <div class="relative">
                    <div class="scrollbar-hide relative mt-[10px] flex w-auto gap-[10px] overflow-auto scroll-smooth">
                        <template v-for="(image, index) in media.images">
                            <img 
                                :src="image.small_image_url"  
                                :class="`min-w-[86px] max-h-[60px] rounded-[5px] border transparent cursor-pointer ${activeIndex === `image_${index}` ? 'border border-navyBlue pointer-events-none' : 'border-white'}`"  
                                @click="change(image, `image_${index}`)"
                                alt="{{ trans('shop::app.products.view.gallery.thumbnail-image') }}"
                            >
                        </template>
                    </div>

                    <p
                        v-if="media.images.length >= imageLimit"
                        class="absolute right-[0px] top-[0px] cursor-pointer rounded-[5px] bg-black p-[6px] text-[14px] leading-[normal] text-white" 
                        v-text="'+' + (media.images.length - imageLimit)"
                        @click="productSliderModel()"
                    ></p>
                </div>
            </div>

            <!-- Product slider Image with shimmer -->
            <div class="scrollbar-hide flex gap-[30px] overflow-auto max-1180:hidden 1180:hidden">
                <x-shop::media.images.lazy
                    ::src="baseFile.path"
                    v-if="baseFile.type == 'image'"
                    class="h-[700px] w-[700px] rounded-[5px]"
                    alt="{{ trans('shop::app.products.view.gallery.product-image') }}"
                    @load="onMediaLoad()"
                >
                </x-shop::media.images.lazy>
            </div>

            <div class="flex flex-wrap lg:gap-[30px]">
                <template v-for="option in options">    
                    <span v-show="option.value" class="mt-[40px] flex gap-[10px] max-lg:mt-[10px]">
                        <span class="flex">
                            <span :class="`icon-` + option.code + ` bg-white text-[19px] text-[#CC035C] max-sm:text-[12px]`"></span>
                        </span>

                        <div class="grid gap-[12px] max-lg:gap-[5px]">
                            <p class="text-[15px] leading-4 text-[#989898] max-sm:text-[12px]" v-text="option.label"></p>
                            
                            <p class="text-[18px] leading-4 max-sm:text-[14px]"  v-text="option.value"></p>
                        </div>
                    </span>
                </template>
            </div>
            
            <x-shop::modal.image-slider ref="imageSliderModel">
                <!-- Modal Content Id -->
                <x-slot:content>
                    <x-shop::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                    >
                        <div class="relative m-auto">
                            <div
                                v-for="(image, index) in media.images"
                                class="fade px-2.5 pb-2.5 pt-0"
                                ref="slides"
                                :key="index"
                                aria-label="Image Slide"
                            >
                                <img
                                    :src="image.original_image_url"
                                    class="w-full cursor-pointer rounded-[5px] shadow-2xl max-lg:max-h-[270px] max-lg:min-h-[200px] lg:h-[480px]"
                                    alt="{{ trans('shop::app.products.view.gallery.product-image') }}"
                                />
                            </div>

                            <span
                                class="icon-arrow-left absolute left-[10px] top-1/2 -mt-[22px] w-auto cursor-pointer rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] p-[12px] text-[24px] font-bold text-white opacity-70 transition-all hover:opacity-100 max-lg:text-[12px]"
                                v-if="media.images?.length >= 2"
                                @click="navigate(currentIndex -= 1)"
                            >
                            </span>

                            <span
                                class="icon-arrow-right absolute right-[10px] top-1/2 -mt-[22px] w-auto cursor-pointer rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] p-[12px] text-[24px] font-bold text-white opacity-70 transition-all hover:opacity-100 max-lg:text-[12px]"
                                v-if="media.images?.length >= 2"
                                @click="navigate(currentIndex += 1)"
                            >
                            </span>
                        </div>
                    </x-shop::form>
                </x-slot:content>
            </x-shop::modal.image-slider>
        </div>
    </script>

    <script type="module">
        app.component('v-product-gallery', {
            template: '#v-product-gallery-template',

            data() {
                return {
                    isMediaLoading: true,

                    refreshBaseImageComponent: 1,

                    currentIndex: 1,

                    options: [],
                   
                    media: {
                        images: @json(product_image()->getGalleryImages($product)),

                        videos: @json(product_video()->getVideos($product)),
                    },

                    baseFile: {
                        type: '',

                        path: ''
                    },

                    activeIndex: 0,

                    containerOffset: 110,

                    imageLimit: 9,

                    screenWidth: window.innerWidth,
                }
            },

            watch: {
                'media.images': {
                    deep: true,

                    handler(newImages, oldImages) {
                        let selectedImage = newImages?.[this.activeIndex.split('_').pop()];

                        if (JSON.stringify(newImages) !== JSON.stringify(oldImages) && selectedImage?.original_image_url) {
                            this.baseFile.path = selectedImage.original_image_url;
                        }
                    },
                },
            },

            updated() {
                this.navigate(this.currentIndex);
            },

            mounted() {
                window.addEventListener('resize', this.updateScreenSize);

                this.navigate(this.currentIndex);
                
                this.updateScreenSize();
                
                ++this.refreshBaseImageComponent;

                if (this.media.images.length) {
                    this.activeIndex = 'image_0';

                    this.baseFile.type = 'image';

                    this.baseFile.path = this.media.images[0].original_image_url;
                } else if (this.media.videos.length) {
                    this.activeIndex = 'video_0';

                    this.baseFile.type = 'video';

                    this.baseFile.path = this.media.videos[0].video_url;
                }
            },

            beforeDestroy() {
                window.removeEventListener('resize', this.updateScreenSize);
            },
            
            computed: {
                lengthOfMedia() {
                    if (this.media.images.length) {
                        return [...this.media.images, ...this.media.videos].length > 5;
                    }
                },
            },

            methods: {
                updateScreenSize() {
                    this.screenWidth = window.innerWidth;
                   
                    if(this.screenWidth <= 320) {
                        this.imageLimit = 4;
                    } else if(this.screenWidth <= 768) {
                        this.imageLimit = 6;
                    } else {
                        this.imageLimit = 9;
                    }
                },
                
                productSliderModel() {
                    this.$refs.imageSliderModel.toggle();
                },

                onMediaLoad() {
                    this.isMediaLoading = false;
                },

                change(file, index) {
                    this.isMediaLoading = true;

                    ++this.refreshBaseImageComponent;

                    if (file.type == 'videos') {
                        this.baseFile.type = 'video';

                        this.baseFile.path = file.video_url;

                        this.onMediaLoad();
                    } else {
                        this.baseFile.type = 'image';

                        this.baseFile.path = file.original_image_url;
                    }

                    this.activeIndex = index;
                },

                navigate(index) {
                    if (index > this.media.images.length) {
                        this.currentIndex = 1;
                    }

                    if (index < 1) {
                        this.currentIndex = this.media.images.length;
                    }

                    let slides = this.$refs.slides;

                    for (let i = 0; i < slides.length; i++) {
                        if (i == this.currentIndex - 1) {
                            continue;
                        }
                        
                        slides[i].style.display = 'none';
                    }

                    slides[this.currentIndex - 1].style.display = 'block';
                },
            },
        })
    </script>
@endpushOnce