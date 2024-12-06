<v-product-gallery ref="gallery">
    <x-shop::shimmer.products.gallery/>
</v-product-gallery>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-gallery-template">
        <div>
            <div class="slider max-sm:ml-[-15px] max-sm:mr-[-15px]">
                <div class="">
                    <x-shop::media.images.lazy
                        alt="{{ trans('shop::app.products.view.gallery.product-image') }}"
                        class="w-full cursor-pointer rounded-[10px] max-lg:h-[240px] lg:h-[431px] object-cover"
                        v-show="! isMediaLoading"
                        v-if="baseFile.type == 'image'"
                        ::key="refreshBaseImageComponent"
                        ::src="baseFile.path"
                        @load="onMediaLoad()"
                    >
                    </x-shop::media.images.lazy>

                    <div
                        class="w-full h-full min-w-[450px] rounded-xl  max-lg:h-[240px] lg:h-[431px] overflow-hidden flex items-center justify-center"
                        v-if="baseFile.type == 'video'"
                    >
                        <video
                            controls
                            width="475"
                            @loadeddata="onMediaLoad()"
                            alt="{{ $product->name }}"
                            class="max-w-full h-auto object-contain"
                        >
                            <source
                                :src="baseFile.path"
                                type="video/mp4"
                            />
                        </video>
                    </div>
                </div>
            </div>
            <div class="scrollbar-hide mt-7 overflow-auto pb-9 max-sm:pb-0">
                <div class="homeful-slider-thumbs mx-auto flex gap-2.5">
                    <div
                        v-for="(image, index) in media.images"
                        class="thumb group w-[82px] cursor-pointer"
                        :class="activeIndex === 'image_' + index ? 'active' : ''"
                        >
                        <div class="h-[50px] w-[75px] overflow-hidden">
                            <img
                                class="h-full w-full rounded-[8px] border border-transparent object-cover transition hover:border-primary group-[.active]:border-primary"
                                :src="image.small_image_url"
                                @click="change(image, `image_${index}`)"
                                alt="{{ trans('shop::app.products.view.gallery.thumbnail-image') }}"
                                >
                        </div>
                        {{-- <p class="mt-[5px] text-[8px] font-normal leading-none text-[#8B8B8B] transition group-[.active]:text-primary">Facade</p> --}}
                    </div>

                    <div
                        v-for="(video, index) in media.videos"
                        class="thumb group w-[82px] cursor-pointer"
                        :class="activeIndex === 'video_' + index ? 'active' : ''"
                        >
                        <div class="h-[50px] w-[75px] overflow-hidden">
                            <video
                                class="h-full w-full rounded-[8px] border border-transparent object-cover transition hover:border-primary group-[.active]:border-primary"
                                @click="change(video, `video_${index}`)"
                                alt="{{ $product->name }}"
                            >
                                <source
                                    :src="video.video_url"
                                    type="video/mp4"
                                />
                            </video>
                        </div>
                        <p class="mt-[5px] text-[8px] font-normal leading-none text-[#8B8B8B] transition group-[.active]:text-primary">Facade</p>

                    </div>
                    <!-- Need to Set Play Button  -->
                </div>
                    <p
                        v-if="media.images.length >= imageLimit"
                        class="absolute right-[0px] top-[0px] cursor-pointer rounded-[5px] bg-black p-[6px] text-[14px] leading-[normal] text-white"
                        v-text="'+' + (media.images.length - imageLimit)"
                        @click="productSliderModel()"
                    ></p>
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

             <!-- Image Slider modal -->
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
                                    class="w-full cursor-pointer rounded-[5px] shadow-2xl max-lg:max-h-[270px] max-lg:min-h-[200px] lg:h-[480px] max-h-[382px]"
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

                    location: null,

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

            console.log('media', this.media);

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

                    console.log('change', this.baseFile, this.activeIndex);

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
