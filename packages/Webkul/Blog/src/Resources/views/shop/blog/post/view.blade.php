
<x-shop::layouts>
    <link 
        rel="preload" 
        as="image" 
        href="{{ Storage::url($blog->src ?? 'placeholder-thumb.jpg') }}" 
    />
    
    @php
        $channel = core()->getCurrentChannel();
    @endphp

    <!-- SEO Meta Content -->
    @push ('meta')
        <meta 
            name="title" 
            content="{{ $blog->meta_title ?? ( $blogSeoMetaTitle ?? ( $channel->home_seo['meta_title'] ?? '' ) ) }}" 
        />

        <meta 
            name="description" 
            content="{{ $blog->meta_description ?? ( $blogSeoMetaKeywords ?? ( $channel->home_seo['meta_description'] ?? '' ) ) }}" 
        />

        <meta 
            name="keywords" 
            content="{{ $blog->meta_keywords ?? ( $blogSeoMetaDescription ?? ( $channel->home_seo['meta_keywords'] ?? '' ) ) }}" 
        />
    @endPush

    <!-- Page Title -->
    <x-slot:title>
        {{ $blog->slug }}
    </x-slot>

    <v-blog-view>
        <x-blog::shimmer.post.view />
    </v-blog-view>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-blog-view-template">
            <!-- Section new place made just for you -->

            <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
                <template v-if="isLoading">
                    <x-blog::shimmer.post.view />
                </template>

                <template v-else>
                    <!-- Breadcrumbs -->
                    <div class="overflow-auto">
                        <x-shop::breadcrumbs name="blog" :entity="$blog"></x-shop::breadcrumbs>
                    </div>

                    <div class="flex justify-between gap-[20px] max-lg:flex-wrap">
                        <div class="max-lg:w-full md:w-full lg:w-[60%]">
                            @if ($blog->src)
                                <x-shop::media.images.lazy
                                    class="w-full max-lg:h-[300px] md:min-h-[480px] lg:min-h-[500px] lg:rounded-3xl"
                                    alt="{{ $blog->src }}"
                                    src="{{ Storage::url($blog->src ?? 'placeholder-thumb.jpg') }}"
                                ></x-shop::media.images.lazy>
                            @else
                                <x-shop::media.images.lazy
                                    class="w-full max-lg:h-[300px] md:min-h-[480px] lg:h-[500px] lg:rounded-3xl"
                                    alt="large-product-placeholder"
                                    src="{{ bagisto_asset('images/large-product-placeholder.webp', 'shop') }}"
                                ></x-shop::media.images.lazy>
                            @endif
                        </div>

                        <div class="max-md:w-full max-sm:w-full lg:w-[40%]">
                            <h3 class="text-[40px] font-bold max-md:text-[20px]">
                                {{ $blog->name }}
                            </h3>

                            <p class="text-[25px] max-sm:text-[12px]">
                                @lang('blog::app.shop.blog.post.view.author') {{ $blog->author }}
                            </p>

                            <p class="text-[25px] max-sm:text-[12px]">
                                @lang('blog::app.shop.blog.post.view.date-published') {{ date('M d, Y', strtotime($blog->created_at)) }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-10 whitespace-normal break-words max-sm:text-[12px]">
                        {!! $blog->description !!}
                    </div>

                    <p  v-if="blogs.length > 0"
                        class="mb-[20px] mt-[40px] text-[25px] font-bold max-sm:text-[14px]"
                        >
                        @lang('blog::app.shop.blog.post.view.check-out-news')
                    </p>

                    <div class="grid gap-6 max-lg:grid-cols-2 md:grid-cols-3 lg:grid-cols-4" v-if="blogs.length > 0">
                        <x-blog::blogs.items.post-item v-for="blog in blogs" />
                    </div>

                    <div v-if="isRelativeLoading">
                        <x-blog::shimmer.blogs.item count=4 />
                    </div>
                    
                    <div class="mt-5 flex justify-center">
                        <button
                            @click="getMoreBlogs()"
                            class="rounded-[20px] bg-[#CC035C] px-[25px] py-[10px] text-white"
                            v-text="loadMoreTxt"
                        >
                        </button>
                    </div>
                </template>
            </div>
        </script>

        <script type="module">
            app.component('v-blog-view', {
                template: '#v-blog-view-template',

                data() {
                    return {
                        blogs: {},
                        blog: @json($blog),
                        isLoading: true,
                        isRelativeLoading: false,
                        limit: 4,
                        loadMoreTxt: `{{ trans('blog::app.shop.blog.load-more') }}`,
                    };
                },

                mounted() {
                    this.getRelatedPost();

                    setTimeout(() => {
                        this.isLoading = false;
                    }, 500);
                },

                methods: {
                    getMoreBlogs() {
                        this.limit += 4;

                        this.isRelativeLoading = true;

                        this.loadMoreTxt = `{{ trans('blog::app.shop.blog.loading') }}`;

                        this.getRelatedPost();
                    },

                    getRelatedPost() {
                        console.log(this.limit);
                        
                        this.$axios.get("{{ route('shop.blogs.front-end') }}", {
                            params: {
                                limit: this.limit,
                                id: this.blog.id
                            }
                        })
                        .then(response => {
                            this.loadMoreTxt = `{{ trans('blog::app.shop.blog.load-more') }}`;

                            this.blogs = response.data.data;

                            this.isRelativeLoading = false;
                        }).catch(error => {
                            console.log(error);
                        });
                    },
                },
            });
        </script>
    @endPushOnce

</x-shop::layouts>