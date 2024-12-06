<v-partner-card
    {{ $attributes }}
    :blog="blog"
>
</v-partner-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-partner-card-template">

            <div class="active group mt-11">
                <h2 class="flex items-start justify-between gap-1 rounded-[18px] bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-sm:text-[16px]">
                    Affiliate Marketer
                    <span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span>
                </h2>
                <div class="hidden group-[.active]:block">
                    <div class="bg-white p-5">
                        <p class="line-clamp-[25] overflow-hidden text-ellipsis text-[15px] font-normal leading-[18px] text-[#0F0E0E]">
                            Are you looking to boost your income effortlessly? <br><br>
                            Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
                            <strong class="text-[19px] leading-[22px]">Here's how it works:</strong><br>
                            1. 📣 Simply advertise our provided ads with your personalized link.<br>
                            2. 💰 Earn referral income when  your link leads to a successfully property purchases.<br>
                            3. 💸 Get as much as 20,000 pesos for every 1,000,000 successful sales! (taxes may apply).<br><br>
                            Seize the chance to make money from the comfort of your home or work.  Join us now and start earning while you refer buyers to us!<br><br>
                            Interested?
                            Are you looking to boost your income effortlessly? <br><br>
                            Join our "Affiliate Marketer" program today! Perfect for digital marketers, social media influencers, housewives and office worker.<br><br>
                            <strong class="text-[19px] leading-[22px]">Here's how it works:</strong><br>
                            1. 📣 Simply advertise our provided ads with your personalized link.<br>
                            2. 💰 Earn referral income when  your link leads to a successfully property purchases.<br>
                            3. 💸 Get as much as 20,000 pesos for every 1,000,000 successful sales! (taxes may apply).<br><br>
                            Seize the chance to make money from the comfort of your home or work.  Join us now and start earning while you refer buyers to us!<br><br>
                            Interested?
                        </p>
                        <a href="./product.html" class="absolute inset-x-0 bottom-0 mt-2.5 block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white max-385:px-3 max-385:text-[13px]">
                            @lang('enclaves::app.shop.partners.join-us')
                        </a>
                    </div>
                </div>
            </div>
    </script>

    <script type="module">
        app.component('v-partner-card', {
            template: '#v-partner-card-template',

            props: ['mode', 'blog'],

            data() {
                return {
                    isCustomer: '{{ auth()->guard("customer")->check() }}',
                    accorian:[];
                }
            },

            mounted(){

            },

            methods: {
                redirectBlogPage(blog) {
                    window.location.href = `{{ route('shop.article.view','') }}/` + blog.slug;
                },
            }
        });
    </script>
@endpushOnce
