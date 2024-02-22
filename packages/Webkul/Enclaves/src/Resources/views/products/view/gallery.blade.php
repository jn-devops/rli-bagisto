<v-product-gallery ref="gallery">
    <x-shop::shimmer.products.gallery/>
</v-product-gallery>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-gallery-template">
        <div class="flex">
            <div class="flex gap-[20px] max-1280:flex-wrap">
                <div class="">
                    <!-- Media shimmer Effect -->
                    <div class="max-w-[560px] max-h-[609px]" v-show="isMediaLoading">
                        <div class="min-w-[560px] min-h-[607px] bg-[#E9E9E9] rounded-[12px] shimmer"></div>
                    </div>

                    <div v-show="! isMediaLoading">
                        <img
                            :src="baseFile.path" 
                            v-if="baseFile.type == 'image'"
                            class="rounded-[5px] w-[560px] h-[287px]"
                            alt="@lang('shop::app.products.view.gallery.product-image')"
                            @load="onMediaLoad()"
                        />
                    </div>
                </div>
                
                <div class="flex flex-col gap-[16px] max-1280:flex-row max-1024:flex-row max-1024:flex-nowrap">
                    <img 
                        v-for="image in media.images"
                        class="rounded-[5px] w-[148px] max-h-[88px]" 
                        :src="image.small_image_url" 
                        alt="@lang('shop::app.products.view.gallery.thumbnail-image')" 
                    />
                </div>
            </div>
        </div>

        <!-- Product slider Image with shimmer -->
        <div class="flex gap-[30px] 1180:hidden overflow-auto scrollbar-hide">
            <!-- <x-shop::media.images.lazy
                ::src="image.large_image_url"
                class="min-w-[450px] max-sm:min-w-full w-[490px]" 
                v-for="image in media.images"
            >
            </x-shop::media.images.lazy> -->
        </div>
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

                    hover: false,
                }
            },

            watch: {
                'media.images': {
                    deep: true,

                    handler(newImages, oldImages) {
                        if (JSON.stringify(newImages) !== JSON.stringify(oldImages)) {
                            this.baseFile.path = newImages[0].large_image_url; 
                        }
                    },
                },
            },

            mounted() {
                if (this.media.images.length) {
                    this.baseFile.type = 'image';
                    this.baseFile.path = this.media.images[0].large_image_url;
                } else {
                    this.baseFile.type = 'video';
                    this.baseFile.path = this.media.videos[0].video_url;
                }
            },

            methods: {
                onMediaLoad() {
                    this.isMediaLoading = false;
                },

                change(file) {
                    if (file.type == 'videos') {
                        this.baseFile.type = 'video';

                        this.baseFile.path = file.video_url;
                    } else {
                        this.baseFile.type = 'image';

                        this.baseFile.path = file.large_image_url;
                    }
                    
                    this.hover = true;
                }
            }
        })
    </script>
@endpushOnce
