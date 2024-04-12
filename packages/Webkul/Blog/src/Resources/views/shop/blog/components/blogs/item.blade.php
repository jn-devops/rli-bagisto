<v-blog-card
    {{ $attributes }}
    :blog="blog"
>
</v-blog-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-card-template">

        <div class="grid gap-2.5 relative min-w-[350px] max-w-[350px]">
            <div class="relative overflow-hidden group max-w-[350px] max-h-[289px] rounded-[20px]">
                <x-shop::media.images.lazy
                    class="rounded bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300 h-[290px]"
                    ::src="blog.base_image"
                ></x-shop::media.images.lazy>
            </div>

            <div class="grid gap-2.5 content-start">
                <p 
                    class="text-[20px] font-bold font-popins" 
                    v-text="blog.name"
                ></p>

                <div class="grid grid-cols-2 items-center justify-between max-425:grid">
                    <button
                        @click="redirectBlogPage(blog)"
                        class="px-[25px] py-[10px] rounded-[20px] text-[#CC035C] font-semibold border-[#CC035C] border-[3px]">
                        @lang('blog::app.shop.blog.read-more')
                    </button>
                </div>
            </div>
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