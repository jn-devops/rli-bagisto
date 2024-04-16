
<x-shop::layouts>

@php
    $channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta name="title" content="{{ $enableBlogSeoMetaTitle ?? ( $channel->home_seo['meta_title'] ?? '' ) }}" />

    <meta name="description" content="{{ $enableBlogSeoMetaKeywords ?? ( $channel->home_seo['meta_description'] ?? '' ) }}" />

    <meta name="keywords" content="{{ $enableBlogSeoMetaDescription ?? ( $channel->home_seo['meta_keywords'] ?? '' ) }}" />
@endPush

<!-- Page Title -->
<x-slot:title>@lang('blog::app.shop.blog.post.index.title')</x-slot>

<v-blog-list></v-blog-list>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-list-template">
        <!-- Section new place made just for you -->
        <div class="container px-[60px] max-lg:px-[30px]">
            <template v-if="isLoading">
                <!-- Shimmer Load -->
                <div class="shimmer rounded-1xl mb-[10px] mt-[10px] h-[65px] w-[30%]"></div>
                
                <x-blog::shimmer.blogs.item count="9"/>
            </template>

            <template v-else>
                <!-- Breadcrumbs -->
                <x-shop::breadcrumbs name="blogs"></x-shop::breadcrumbs>
                
                <div class="mt-[30px] grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-sm:mt-[20px] max-sm:grid-cols-1 max-sm:justify-items-center">
                    <x-blog::blogs.item v-for="blog in blogs"/>
                </div>


                <div class="mt-3 text-center">
                    <button
                        @click="getMoreBlogs()"
                        class="w-[150px] rounded-[20px] border-[3px] px-[25px] py-[10px] font-semibold text-[#CC035C]"
                        v-text="loadMoreTxt"
                    >
                        
                    </button>
                </div>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-blog-list', {
            template: '#v-blog-list-template',

            data() {
                return {
                    isLoading: true,
                    blogs: {},
                    limit: 10,
                    loadMoreTxt: `{{ trans('blog::app.shop.blog.load-more') }}`,
                };
            },

            mounted() {
                this.getblogs();
            },

            methods: {
                getMoreBlogs() {
                    this.limit += 10;

                    this.loadMoreTxt = `{{ trans('blog::app.shop.blog.loading') }}`;

                    this.getblogs();
                },

                getblogs() {
                    this.$axios.get("{{ route('shop.blogs.front-end') }}", {
                        params: {
                            limit: this.limit,
                        }
                    })
                    .then(response => {
                        this.isLoading = false;

                        this.loadMoreTxt = `{{ trans('blog::app.shop.blog.load-more') }}`;

                        this.blogs = response.data.data;
                    }).catch(error => {
                        console.log(error);
                    });
                },
            },
        });
    </script>
@endPushOnce

</x-shop::layouts>