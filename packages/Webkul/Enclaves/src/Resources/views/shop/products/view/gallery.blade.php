<v-product-gallery ref="gallery">
    <x-shop::shimmer.products.gallery/>
</v-product-gallery>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-gallery-template">
        <div class="flex gap-[20px] max-1280:flex-wrap">
            <div class="">
                <!-- Media shimmer Effect -->
                <div class="max-w-[657px] max-h-[610px]" v-show="isMediaLoading">
                    <div class="min-w-[657px] min-h-[610px] bg-[#E9E9E9] rounded-[12px] shimmer"></div>
                </div>

                <img
                    v-show="! isMediaLoading"
                    :src="baseFile.path" 
                    v-if="baseFile.type == 'image'"
                    class="rounded-[5px] w-[657px] h-[610px] cursor-pointer"
                    alt="@lang('shop::app.products.view.gallery.product-image')"
                    @load="onMediaLoad()"
                />
            </div>
            
            <div class="flex flex-wrap gap-[16px] relative" v-if="isMobile">
                <template v-for="(image, index) in media.images">
                    <div v-if="index < 3" 
                        :class="`${index == `2` ? 'relative' : ''}`">
                        <x-shop::media.images.lazy
                            alt="@lang('shop::app.products.view.gallery.thumbnail-image')" 
                            v-if="index < 3"
                            ::class="`min-w-[100px] max-h-[100px] rounded-xl border transparent cursor-pointer ${activeIndex === `image_${index}` ? 'border border-navyBlue pointer-events-none' : 'border-white'}`"
                            ::src="image.small_image_url"
                            @click="change(image, `image_${index}`)"
                        >
                        </x-shop::media.images.lazy>

                        <p
                            v-if="index == 2"
                            class="p-1 absolute bg-black bottom-[10px] right-2 text-white cursor-pointer" 
                            v-text="'+' + (media.images.length - 3)"
                            @click="productSliderModel()"
                        ></p>
                    </div>
                </template>
            </div>

            <div class="flex flex-wrap w-[100px]" v-else>
                <template v-for="(image, index) in media.images">
                    <div v-if="index < 5" 
                        :class="`${index == `4` ? 'relative' : ''}`">
                        <x-shop::media.images.lazy
                            alt="@lang('shop::app.products.view.gallery.thumbnail-image')"
                            ::class="`min-w-[100px] max-h-[100px] rounded-xl border transparent cursor-pointer ${activeIndex === `image_${index}` ? 'border border-navyBlue pointer-events-none' : 'border-white'}`"
                            ::src="image.small_image_url"
                            @click="change(image, `image_${index}`)"
                        >
                        </x-shop::media.images.lazy>

                        <p
                            v-if="index == 4"
                            class="p-1 absolute bottom-[30px] right-2 bg-black text-white cursor-pointer" 
                            v-text="'+' + (media.images.length - 5)"
                            @click="productSliderModel()"
                        ></p>
                    </div>
                </template>
            </div>
        </div>

        <!-- Product slider Image with shimmer -->
        <div class="flex gap-[30px] max-1180:hidden 1180:hidden overflow-auto scrollbar-hide">
            <x-shop::media.images.lazy
                ::src="baseFile.path"
                v-if="baseFile.type == 'image'"
                class="rounded-[5px] w-[657px] h-[610px]"
                alt="@lang('shop::app.products.view.gallery.product-image')"
                @load="onMediaLoad()"
            >
            </x-shop::media.images.lazy>
        </div>

        <x-shop::modal.image-slider ref="imageSliderModel">

            <!-- Modal Contentd -->
            <x-slot:content>
                <x-shop::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <div class="relative m-auto">
                        <div
                            v-for="(image, index) in media.images"
                            class="fade p-10"
                            ref="slides"
                            :key="index"
                            aria-label="Image Slide"
                        >
                            <img
                                :src="image.large_image_url"
                                class="w-full rounded-[5px] cursor-pointer h-[480px]"
                                alt="@lang('shop::app.products.view.gallery.product-image')"
                            />
                        </div>

                        <span
                            class="icon-arrow-left text-[24px] font-bold text-white w-auto -mt-[22px] p-[12px] absolute top-1/2 left-[10px] bg-[rgba(0,0,0,0.8)] transition-all opacity-30 rounded-full hover:opacity-100 cursor-pointer"
                            v-if="media.images?.length >= 2"
                            @click="navigate(currentIndex -= 1)"
                        >
                        </span>

                        <span
                            class="icon-arrow-right text-[24px] font-bold text-white w-auto -mt-[22px] p-[12px] absolute top-1/2 right-[10px] bg-[rgba(0,0,0,0.8)] transition-all opacity-30 rounded-full hover:opacity-100 cursor-pointer"
                            v-if="media.images?.length >= 2"
                            @click="navigate(currentIndex += 1)"
                        >
                        </span>
                    </div>
                </x-shop::form>
            </x-slot:content>
        </x-shop::modal.image-slider>
    </script>

    <script type="module">
        app.component('v-product-gallery', {
            template: '#v-product-gallery-template',

            data() {
                return {
                    isMobile: window.innerWidth <= 768,

                    isMediaLoading: true,

                    currentIndex: 1,

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
                }
            },

            watch: {
                'media.images': {
                    deep: true,

                    handler(newImages, oldImages) {
                        let selectedImage = newImages?.[this.activeIndex.split('_').pop()];

                        if (JSON.stringify(newImages) !== JSON.stringify(oldImages) && selectedImage?.large_image_url) {
                            this.baseFile.path = selectedImage.large_image_url;
                        }
                    },
                },
            },
            
            mounted() {
                this.navigate(this.currentIndex);

                if (this.media.images.length) {
                    this.activeIndex = 'image_0';

                    this.baseFile.type = 'image';

                    this.baseFile.path = this.media.images[0].large_image_url;
                } else if (this.media.videos.length) {
                    this.activeIndex = 'video_0';

                    this.baseFile.type = 'video';

                    this.baseFile.path = this.media.videos[0].video_url;
                }
            },

            computed: {
                lengthOfMedia() {
                    if (this.media.images.length) {
                        return [...this.media.images, ...this.media.videos].length > 5;
                    }
                }
            },

            methods: {
                productSliderModel() {
                    this.$refs.imageSliderModel.toggle();
                },

                onMediaLoad() {
                    this.isMediaLoading = false;
                },

                change(file, index) {
                    this.isMediaLoading = true;

                    if (file.type == 'videos') {
                        this.baseFile.type = 'video';

                        this.baseFile.path = file.video_url;

                        this.onMediaLoad();
                    } else {
                        this.baseFile.type = 'image';

                        this.baseFile.path = file.large_image_url;
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
