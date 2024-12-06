<v-blog-card
    {{ $attributes }}
    :blog="blog"
>
</v-blog-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-blog-card-template">
        <div class="max-w-[280px] cursor-pointer max-lg:max-w-[122px] md:max-w-[256px] lg:max-w-[300px]">
            <div class="h-80 w-full overflow-hidden">
                <x-shop::media.images.lazy
                    class="h-full w-full rounded-[20px] object-cover"
                    ::src="blog.base_image"
                    ::alt="blog.base_image"
                ></x-shop::media.images.lazy>
			</div>

            <p
                class="line-clamp-2 font-popins mt-[10px] overflow-hidden text-ellipsis text-[20px] font-bold max-sm:text-[14px]"
                v-text="blog.name"
            ></p>

            <button
                @click="redirectBlogPage(blog)"
                class="w-full mt-[5px] rounded-full border-[1px] border-[#CC035C] pl-3 pr-3 py-1.5 text-[#CC035C] max-sm:text-[12px]">
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
