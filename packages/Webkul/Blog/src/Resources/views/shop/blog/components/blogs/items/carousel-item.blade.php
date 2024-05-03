<v-blog-card
    {{ $attributes }}
    :blog="blog"
>
</v-blog-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-card-template">
        <div class="max-w-[350px] max-lg:min-w-[120px] lg:min-w-[350px]">
            <x-shop::media.images.lazy
                class="h-[310px] w-full rounded-3xl max-lg:h-[128px]"
                ::src="blog.base_image"
                ::alt="blog.base_image"
            ></x-shop::media.images.lazy>
    
            <p 
                class="font-popins mt-[10px] overflow-hidden text-ellipsis whitespace-nowrap text-[20px] font-bold max-sm:text-[14px]" 
                v-text="blog.name"
            ></p>

            <button
                @click="redirectBlogPage(blog)"
                class="mt-[5px] flex items-start text-[#CC035C] underline max-sm:text-[12px]">
                @lang('blog::app.shop.blog.read-more')
            </button>
        </div>
    </script>

    <script type="module">
        app.component('v-blog-card', {
            template: '#v-blog-card-template',

            props: ['mode', 'blog'],

            data() {
                return {
                    isCustomer: '{{ auth()->guard("customer")->check() }}',
                }
            },

            methods: {
                redirectBlogPage(blog) {
                    window.location.href = `{{ route('shop.article.view','') }}/` + blog.slug;
                },
            }
        });
    </script>
@endpushOnce