<v-blog-card
    {{ $attributes }}
    :blog="blog"
>
</v-blog-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-card-template">
        <div class="max-w-[280px] cursor-pointer shadow-inner max-lg:min-w-[122px] md:min-w-64 lg:min-w-[300px]">
            <x-shop::media.images.lazy
                class="w-full rounded-3xl shadow-inner transition-all duration-300 group-hover:scale-105 max-lg:h-32 md:h-60 lg:h-64"
                ::src="blog.base_image"
                ::alt="blog.base_image"
            ></x-shop::media.images.lazy>
    
            <p
                class="font-popins mt-[10px] overflow-hidden text-ellipsis whitespace-nowrap text-[20px] font-bold max-sm:text-[14px]" 
                v-text="blog.name"
            ></p>

            <button
                @click="redirectBlogPage(blog)"
                class="mt-[5px] flex items-start rounded-full border-[1px] border-[#CC035C] pl-3 pr-3 text-[#CC035C] max-sm:text-[12px]">
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