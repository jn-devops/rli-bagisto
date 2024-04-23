<v-blog-card
    {{ $attributes }}
    :blog="blog"
>
</v-blog-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-card-template">
        <div class="min-w-[350px] max-w-[350px]">
          
            <x-shop::media.images.lazy
                class="h-[290px] rounded-[20px] bg-[#F5F5F5] transition-all duration-300 group-hover:scale-105"
                ::src="blog.base_image"
            ></x-shop::media.images.lazy>
    
            <p 
                class="font-popins mt-[10px] text-[20px] font-bold" 
                v-text="blog.name"
            ></p>

            <button
                @click="redirectBlogPage(blog)"
                class="mt-[10px] text-nowrap rounded-[20px] border-[2px] border-[#CC035C] bg-white p-[8px] font-semibold text-[#CC035C]">
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
                    window.location.href = `{{ route('shop.article.view','') }}/` + blog.category.slug + '/' + blog.slug;
                },
            }
        });
    </script>
@endpushOnce