<v-product-gallery ref="gallery">
    <x-shop::shimmer.products.gallery/>
</v-product-gallery>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-gallery-template">
        <div class="relative flex gap-[20px] max-1280:flex-wrap">
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
            
            <div class="flex flex-col gap-[16px] overflow-auto max-w-[290px] max-1280:flex-row max-1024:flex-row max-1024:flex-nowrap">
                <template v-for="(image, index) in media.images">
                    <x-shop::media.images.lazy
                        alt="@lang('shop::app.products.view.gallery.thumbnail-image')" 
                        v-if="index < 5"
                        ::class="`min-w-[100px] max-h-[100px] rounded-xl border transparent cursor-pointer ${activeIndex === `image_${index}` ? 'border border-navyBlue pointer-events-none' : 'border-white'}`"
                        ::src="image.small_image_url"
                        @click="change(image, `image_${index}`)"
                    >
                    </x-shop::media.images.lazy>
                </template>
            </div>

            <p 
                class="p-1 absolute bottom-16 right-2 bg-black text-white cursor-pointer" 
                v-text="'+' + media.images.length"
                @click="productSliderModel()"
            
            ></p>
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



        <x-shop::modal ref="imageSliderModel">
            <!-- Modal Header -->
            <x-slot:header>
                <h2 class="text-[25px] font-medium max-sm:text-[22px]">
                    Image Slider comming soon.
                </h2>
            </x-slot:header>

            <!-- Modal Contentd -->
            <x-slot:content>
                <x-shop::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    
                </x-shop::form>
            </x-slot:content>
        </x-shop::modal>
    </script>

    <script type="module">
        app.component('v-product-gallery', {
            template: '#v-product-gallery-template',

            data() {
                return {
                    isMediaLoading: true,

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
            }
        })
    </script>
@endpushOnce
