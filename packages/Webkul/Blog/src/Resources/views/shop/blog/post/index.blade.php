
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
        <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
            <!-- Breadcrumbs -->
            <x-shop::breadcrumbs name="blogs"></x-shop::breadcrumbs>

            <div class="grid grid-cols-3 mt-[40px]" v-if="blogs.length > 0">
                <x-blog::blogs.item v-for="blog in blogs"/>
            </div>
            <div class="flex justify-center mt-[40px]" v-else>
                <p class="text-[20px] font-bold">
                    @lang('blog::app.shop.blog.post.index.no-record')

                    <img 
                        class="" 
                        src="{{ bagisto_asset('images/thank-you.png') }}" 
                        alt="thankyou" 
                        title=""
                    >
                </p>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-blog-list', {
            template: '#v-blog-list-template',

            data() {
                return {
                    isLoading: true,
                    blogs: {},
                };
            },

            mounted() {
                this.getblogs();
            },

            methods: {
                getblogs() {
                    this.$axios.get("{{ route('shop.blogs.front-end') }}", {
                        params: {
                            page: 10,
                        }
                    })
                        .then(response => {
                            this.isLoading = false;

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