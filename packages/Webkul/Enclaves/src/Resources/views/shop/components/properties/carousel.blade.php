<v-properties-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
</v-properties-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-properties-carousel-template">
        <!-- Section new place made just for you -->
        <template v-if="!isLoading">
            <section
                v-if="categories.length"
                class="py-14"
                >

                <div class="container">
                    <h2 class="text-center text-3xl font-bold text-dark max-sm:text-2xl">
                        @lang('enclaves::app.shop.properties.title')
                    </h2>
                    <div class="mt-14 grid grid-cols-3 gap-4 max-lg:grid-cols-2 max-md:grid-cols-1">
                        <div
                            v-for="category in categories"
                            class="rounded-[30px] bg-white px-5 py-6 shadow-[20px_4px_54px] shadow-black/10"
                            >
                            <div class="h-40 w-full overflow-hidden">
                                <x-shop::media.images.lazy
                                    class="h-full w-full rounded-lg object-contain"
                                    ::src="category.images.logo_url"
                                ></x-shop::media.images.lazy>
                            </div>

                            <div class="mx-auto mt-7 w-[302px] max-sm:w-[280px]">
                                <p
                                    class="font-popins overflow-hidden text-ellipsis whitespace-nowrap text-[20px] font-bold max-lg:text-[14px] my-2 font-normal text-[#343064]"
                                    v-text="category.name"
                                ></p>
                                <div class="flex gap-3">
                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.4954 0.916016C7.4543 0.916016 0.912109 7.45821 0.912109 15.4993C0.912109 23.5405 7.4543 30.0827 15.4954 30.0827C23.5366 30.0827 30.0788 23.5405 30.0788 15.4993C30.0788 7.45821 23.5366 0.916016 15.4954 0.916016ZM15.4954 2.19045C22.8333 2.19045 28.8043 8.16146 28.8043 15.4993C28.8043 22.8372 22.8333 28.8082 15.4954 28.8082C8.15755 28.8082 2.18654 22.8372 2.18654 15.4993C2.18654 8.16146 8.15755 2.19045 15.4954 2.19045ZM11.1125 8.27702V11.0619H8.52238V12.3298H11.1125V14.2315H8.52238V15.4993H11.1125V24.356H12.6395V18.2942H16.8062C19.0348 18.2942 20.75 17.2195 21.5242 15.4993H23.7363V14.2315H21.9006C21.9468 13.936 21.9766 13.6323 21.9766 13.3137C21.9766 12.9719 21.9468 12.6451 21.894 12.3298H23.7363V11.0619H21.5143C20.7417 9.34345 19.0497 8.27702 16.8293 8.27702H11.1125ZM12.6379 9.63729H16.4595C17.9865 9.63729 19.1223 10.1441 19.7793 11.0619H12.6379V9.63729ZM12.6379 12.3298H20.3241C20.3901 12.6352 20.4264 12.962 20.4264 13.3137C20.4264 13.6405 20.3934 13.9443 20.3323 14.2315H12.6379V12.3298ZM12.6379 15.4993H19.7876C19.1272 16.4205 17.9799 16.9356 16.4595 16.9356H12.6379V15.4993Z" fill="#989898"/>
                                    </svg>
                                    <p class="text-lg font-normal text-[#343064] max-sm:text-base">₱2,500,000 - ₱10,000,000</p>
                                </div>
                                <div
                                    v-if="property_types.length"
                                    class="mt-7 flex gap-4">
                                    <svg width="31" height="29" viewBox="0 0 31 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.4014 0.1875C14.4014 0.705892 14.0577 1.60216 13.2963 2.59717C12.5348 3.59218 11.3993 4.67833 10.0245 5.69613C7.27306 7.73362 3.56456 9.49197 0.0136719 10.0445L0.351671 12.2055C4.36019 11.5826 8.30984 9.68565 11.3252 7.45448C12.833 6.33984 14.1052 5.13786 15.0337 3.92638C15.2236 3.67763 15.3338 3.42318 15.4952 3.17442C15.6566 3.42318 15.7667 3.67763 15.9566 3.92638C16.8851 5.13786 18.1574 6.33984 19.6651 7.45448C22.6805 9.68565 26.6301 11.5826 30.6387 12.2055L30.9767 10.0445C27.4258 9.49197 23.7173 7.73362 20.9658 5.69613C19.591 4.67833 18.4555 3.59218 17.6941 2.59717C16.9326 1.60216 16.5889 0.705892 16.5889 0.1875H14.4014ZM25.168 0.645128C25.168 0.645128 24.6515 3.39849 23.8825 4.85113L25.8155 5.87652C26.8941 3.84283 27.3251 1.01161 27.3251 1.01161L25.168 0.645128ZM3.46392 13.3125V28.625H27.5264V13.3125H25.3389V26.4375H5.65142V13.3125H3.46392ZM10.5733 13.3125V14.4062C10.5733 19.7288 9.51183 23.9842 9.51183 23.9842L11.6348 24.5158C11.6348 24.5158 12.5291 20.5092 12.6753 15.5H18.315C18.4612 20.5092 19.3556 24.5158 19.3556 24.5158L21.4785 23.9842C21.4785 23.9861 20.417 19.7288 20.417 14.4062V13.3125H10.5733Z" fill="#989898"/>
                                    </svg>
                                    <ul class="list-inside list-disc">
                                        <li
                                            v-for="(option, index) in property_types"
                                            :key="index"
                                            class="text-lg font-normal text-[#343064] max-sm:text-base">
                                            @{{ printAttributeLables(option) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="mt-7 h-[2px] border-0 bg-[#EFEFEF]">
                            <button
                                class="mt-7 block w-full rounded-full border border-primary px-6 py-[18px] text-center text-lg font-normal text-primary max-sm:text-base"
                                @click="redirectCategory(category)"
                                >
                                @lang('enclaves::app.shop.properties.visit-store')
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </template>

        <!-- Product Card Listing -->
        <template v-else>
            <x-shop::shimmer.properties.carousel> </x-shop::shimmer.properties.carousel>
        </template>
    </script>

    <script type="module">
        app.component('v-properties-carousel', {
            template: '#v-properties-carousel-template',

            props: [
                'src',
                'title',
                'navigationLink',
            ],

            data() {
                return {
                    isLoading: true,

                    categories: [],

                    offset: 323,

                    property_types: [],
                };
            },

            mounted() {
                this.getProducts();
                this.getAttributeDetails('property_type');
            },

            methods: {
                getProducts() {
                    this.$axios.get(this.src)
                        .then(response => {
                            this.isLoading = false;

                            this.categories = response.data.data;
                        }).catch(error => {
                            console.log(error);
                        });
                },

                async getAttributeDetails(code){
                    this.$axios.get("{{ route('enclaves.api.attribute', '') }}/" + code)
                        .then(response => {
                            this.property_types = response.data.data.options;

                        }).catch(error => {
                            console.log('error', error);
                        });
                },

                swipeLeft() {
                    const container = this.$refs.swiperContainer;

                    container.scrollLeft -= this.offset;
                },

                swipeRight() {
                    const container = this.$refs.swiperContainer;

                    container.scrollLeft += this.offset;
                },

                redirectCategory(category) {
                    let uri = category.url_path === null ? category.slug : category.url_path;

                    window.location.href = `{{ route('shop.product_or_category.index', '') }}/` + uri;
                },

                printAttributeLables(option) {
                    let label = option.translations.find(translation => translation.locale === '{{core()->getCurrentLocale()->code}}')?.label || null;

                    if (!label) {
                        label = option.admin_name
                    }

                    return label
                },
            },
        });
    </script>
@endPushOnce
