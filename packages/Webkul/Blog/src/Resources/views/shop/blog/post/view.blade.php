
<x-shop::layouts>

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
<x-slot:title>{{ $blog->slug }}</x-slot>

<v-blog-view></v-blog-view>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-view-template">
        <!-- Section new place made just for you -->
        <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
            <!-- Breadcrumbs -->
            <x-shop::breadcrumbs name="blog" :entity="$blog"></x-shop::breadcrumbs>

            <div class="flex justify-between gap-[20px] mt-10">
                <div class="w-[60%]">
                    @if ($blog->src)
                        <img
                            src="{{ Storage::url($blog->src ?? 'placeholder-thumb.jpg') }}"
                            alt="{{ $blog->src }}"
                            class="h-[500px] w-full rounded-3xl"
                        />
                    @else
                        <div class="shimmer h-[500px] w-full rounded-3xl"></div>
                    @endif
                </div>

                <div class="w-[40%]">
                    <h3 class="text-[40px] font-bold">{{ $blog->name }}</h3>

                    <p class="text-[25px]">@lang('blog::app.shop.blog.post.view.author') {{ $blog->author }}</p>

                    <p class="text-[25px]">@lang('blog::app.shop.blog.post.view.date-published') {{ date('M d, Y', strtotime($blog->created_at)) }}</p>

                </div>
            </div>

            <div class="mt-10 whitespace-normal break-words">
                {!! $blog->description !!}
            </div>

            <p class="mt-[40px] mb-[20px] text-[25px] font-bold">@lang('blog::app.shop.blog.post.view.check-out-news')</p>

            <div class="grid grid-cols-3">
                <x-blog::blogs.item v-for="blog in blogs" />
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-blog-view', {
            template: '#v-blog-view-template',

            data() {
                return {
                    blogs: {},
                    blog: @json($blog)
                };
            },

            mounted() {
                this.getblogs();
            },

            methods: {
                getblogs() {
                    this.$axios.get("{{ route('shop.blogs.front-end') }}", {
                        params: {
                            page: 3,
                            id: this.blog.id
                        }
                    })
                        .then(response => {
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