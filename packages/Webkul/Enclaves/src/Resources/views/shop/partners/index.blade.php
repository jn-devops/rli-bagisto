
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
                <div class="shimmer rounded-1xl mt-[10px] h-[65px] w-[30%]"></div>

                <x-blog::shimmer.blogs.item count="6"/>
            </template>

            <template v-else>
                <!-- Breadcrumbs -->
                <x-shop::breadcrumbs name="partners"></x-shop::breadcrumbs>

                <h2 class="text-3xl font-bold text-dark mt-9">
                    @lang('enclaves::app.shop.partners.title')
                </h2>

                <div class="mt-11 grid grid-cols-3 gap-16 max-xl:gap-8 max-lg:grid-cols-2 max-md:grid-cols-1">
                    <div
                        v-for="blog in blogs"
                        class="relative h-full pb-14">
                        <div class="h-80 min-h-80 max-h-80">
                            <x-shop::media.images.lazy
                                class="relative h-full w-full object-contain"
                                ::src="blog.base_image"
                                ::alt="blog.base_image"
                            ></x-shop::media.images.lazy>
                        </div>

                        <div class="active group mt-11">
                            <h2 class="flex items-start justify-between gap-1 rounded-[18px] bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-sm:text-[16px]">
                                Affiliate Marketer
                                <span
                                    class="mt-1 block text-[24px] text-secondary"
                                    :class="blog.accordian ? 'icon-arrow-up' : 'icon-arrow-down'"
                                    @click="blog.accordian = !blog.accordian"
                                ></span>
                            </h2>
                        </div>

                        <div
                            v-if="blog.accordian"
                            class="group-[.active]:block">
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
                                <button
                                    class="absolute inset-x-0 bottom-0 mt-2.5 block rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white max-385:px-3 max-385:text-[13px]"
                                    @click="JoinUsPartner()"
                                    >
                                    @lang('enclaves::app.shop.partners.join-us')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 text-center"
                    v-if="limit < blogs.length"
                    >
                    <button
                        class="rounded-[20px] bg-[#CC035C] px-[25px] py-[10px] text-white"
                        @click="getMoreBlogs()"
                        v-text="loadMoreTxt"
                    >
                    </button>
                </div>

                <x-enclaves-shop::modal.enclave-form ref="PartnerWithUsModal">
                    <!-- Modal Header -->
                    <x-slot:header>
                        <div class="flex w-full">
                            <h2 class="text-2xl text-[25px] font-bold max-md:text-base">
                                @lang('enclaves::app.shop.partners.form.title')
                            </h2>
                        </div>
                    </x-slot:header>

                    <!-- Modal Content Id -->
                    <x-slot:content>
                        <div class="flex h-full max-h-[60vh] flex-col gap-2 overflow-auto max-md:px-[10px]">
                            <div class="mx-auto w-[360px] max-sm:w-full">
                                <form action="">
                                    <div class="">
                                        <label for="f-name" class="block text-sm font-medium text-[#374151]">
                                            @lang('enclaves::app.shop.partners.form.first-name')
                                        <span class="text-[#B4173A]">*</span></label>
                                        <input type="text" name="f-name" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                    </div>
                                    <div class="mt-5">
                                        <label for="l-name" class="block text-sm font-medium text-[#374151]">
                                            @lang('enclaves::app.shop.partners.form.last-name')
                                        <span class="text-[#B4173A]">*</span></label>
                                        <input type="text" name="l-name" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                    </div>
                                    <div class="mt-5">
                                        <label for="email" class="block text-sm font-medium text-[#374151]">
                                            @lang('enclaves::app.shop.partners.form.email')
                                            <span class="text-[#B4173A]">*</span></label>
                                        <input type="email" name="email" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                    </div>
                                    <div class="mt-5">
                                        <label for="phone" class="block text-sm font-medium text-[#374151]">
                                            @lang('enclaves::app.shop.partners.form.mobile')
                                            <span class="text-[#B4173A]">*</span></label>
                                        <div class="flex items-center gap-2">
                                            <p class="mt-1.5 text-sm font-normal text-[#9CA3AF]">+93</p>
                                            <input type="text" name="phone" class="mt-1.5 block w-full rounded-lg border border-[#D1D5DB] px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <label for="work" class="block text-sm font-medium text-[#374151]">
                                            @lang('enclaves::app.shop.partners.form.work')
                                            <span class="text-[#B4173A]">*</span></label>
                                        <div class="relative mt-1.5 overflow-hidden">
                                            <select name="work" id="" class="block w-full appearance-none rounded-lg border border-[#D1D5DB] bg-transparent px-4 py-2 text-base font-normal text-dark shadow-[0px_1px_3px] shadow-black/10">
                                                <option value=""></option>
                                                <option value="b">b</option>
                                                <option value="c">c</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center px-2 text-primary opacity-40">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.57739 6.91009C3.90283 6.58466 4.43047 6.58466 4.7559 6.91009L9.99998 12.1542L15.2441 6.91009C15.5695 6.58466 16.0971 6.58466 16.4226 6.91009C16.748 7.23553 16.748 7.76317 16.4226 8.0886L10.5892 13.9219C10.2638 14.2474 9.73616 14.2474 9.41072 13.9219L3.57739 8.0886C3.25195 7.76317 3.25195 7.23553 3.57739 6.91009Z" fill="#6B7280"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-8 flex items-start gap-3">
                                        <input id="link-checkbox" type="checkbox" value="" class="checbox-primary">
                                        <label for="link-checkbox" class="text-[14px] font-normal text-[#000000E0]">
                                            @lang('enclaves::app.shop.partners.form.termsplit1')
                                            <a href="#" class="text-[14px] font-bold text-[#000000E0]"> @lang('enclaves::app.shop.partners.form.termsplit2') </a>  @lang('enclaves::app.shop.partners.form.termsplit3')
                                            <a href="#" class="text-[14px] font-bold text-[#000000E0]">
                                                @lang('enclaves::app.shop.partners.form.termsplit4')
                                            </a>
                                        </label>
                                    </div>
                                    <button type="submit" class="mt-5 inline-block w-full rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-7 py-5 text-center text-sm font-medium text-white disabled:opacity-[0.4]" disabled>
                                        @lang('enclaves::app.shop.partners.form.submit')
                                    </button>
                                </form>
                            </div>

                            <hr class="mb-2 mt-1 h-px w-full border-t border-[#d9d9d9]" />
                        </div>
                    </x-slot:content>

                </x-enclaves-shop::modal.enclave-form>
            </template>
        </div>

        <x-blog::blogs.carousel
            :title="$data['title'] ?? ''"
            :src="route('shop.blogs.front-end')"
            :navigation-link="route('shop.home.index')"
        >
        </x-blog::blogs.carousel>
    </script>

    <script type="module">
        app.component('v-blog-list', {
            template: '#v-blog-list-template',

            data() {
                return {
                    isLoading: true,
                    blogs: {},
                    limit: 10,
                    loadMoreTxt: `{{ trans('blog::app.shop.blog.load-more') }}`,
                    accordianStatus:[],
                };
            },

            mounted() {
                this.getPosts();
            },

            methods: {
                getMoreBlogs() {
                    this.limit += 10;

                    this.loadMoreTxt = `{{ trans('blog::app.shop.blog.loading') }}`;

                    this.getPosts();
                },

                getPosts() {
                    this.$axios.get("{{ route('shop.blogs.front-end') }}", {
                        params: {
                            limit: this.limit,
                        }
                    })
                    .then(response => {
                        this.isLoading = false;

                        this.loadMoreTxt = `{{ trans('blog::app.shop.blog.load-more') }}`;

                        this.blogs = response.data.data;

                        this.blogs.forEach((ele, index) => {
                            ele['accordian'] = true;
                        });

                    }).catch(error => {
                        console.log(error);
                    });
                },

                JoinUsPartner(){
                    this.$refs.PartnerWithUsModal.toggle();
                }
            },
        });
    </script>
@endPushOnce

</x-shop::layouts>
