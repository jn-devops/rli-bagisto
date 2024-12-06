
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
<x-slot:title>
    @lang('blog::app.shop.blog.post.index.title')
</x-slot>

<v-blog-list></v-blog-list>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-list-template">
        <!-- Section new place made just for you -->
        <div class="container px-[60px] max-lg:px-[30px]">
            <template v-if="isLoading">
                <!-- Shimmer Load -->
                <div class="shimmer rounded-1xl mb-3 mt-[30px] h-[24px] w-[30%]"></div>

                <x-blog::shimmer.blogs.item count="6"/>
            </template>

            <template v-else>
                <!-- Breadcrumbs -->
                <x-shop::breadcrumbs name="blogs"></x-shop::breadcrumbs>

                <div class="mt-10 grid grid-cols-4 gap-6 max-lg:grid-cols-2">
                    <x-blog::blogs.items.post-item v-for="blog in blogs"/>
                </div>

                <div
                    v-if="limit < allBlogs.length"
                    class="mt-3 text-center">
                    <button
                        class="rounded-[20px] bg-[#CC035C] px-[25px] py-[10px] text-white"
                        @click="getMoreBlogs()"
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
                    limit: `{{ $limit }}` > 0 ? `{{ $limit }}` : 4,
                    loadMoreTxt: `{{ trans('blog::app.shop.blog.load-more') }}`,
                    allBlogs:{},
                };
            },

            mounted() {
                this.getPosts();
            },

            methods: {
                getMoreBlogs() {
                    this.limit += this.limit;
                    this.blogs = this.allBlogs.slice(0, this.limit);
                },

                getPosts() {
                    this.$axios.get("{{ route('shop.blogs.front-end') }}")
                    .then(response => {
                        this.isLoading = false;

                        this.loadMoreTxt = `{{ trans('blog::app.shop.blog.load-more') }}`;
                        this.allBlogs = response.data.data
                        this.blogs = this.allBlogs.slice(0, this.limit);

                    }).catch(error => {
                        console.log(error);
                    });
                },
            },
        });
    </script>
@endPushOnce

</x-shop::layouts>
