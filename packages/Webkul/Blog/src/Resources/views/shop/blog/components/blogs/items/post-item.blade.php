<v-blog-card
    {{ $attributes }}
    :blog="blog"
>
</v-blog-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-card-template">
        <div>
            <x-shop::media.images.lazy 
                class="w-full rounded-3xl max-lg:h-[150px] lg:h-[310px]"
                ::src="blog.base_image"
                ::alt="blog.base_image"
            ></x-shop::media.images.lazy>
    
            <p
                class="font-popins mt-5 overflow-hidden text-ellipsis whitespace-nowrap text-[20px] font-bold max-sm:text-[14px]" 
                v-text="blog.name"
            ></p>

            <button
                @click="redirectBlogPage(blog)"
                class="flex items-start text-[#CC035C] underline">
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