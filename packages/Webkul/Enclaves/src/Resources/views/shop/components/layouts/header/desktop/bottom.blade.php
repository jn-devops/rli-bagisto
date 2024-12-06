<header class="w-full sticky top-0 z-[999] bg-white shadow-[0px_3px_8px] shadow-black/10">

    <div class="flex items-center justify-center gap-2 px-14 py-7">
        <div class="hidden cursor-pointer py-[10px] pr-4 max-xl:block">
            <span class="block h-3 w-[19px] border-b-[3px] border-t-[3px] border-dark"></span>
        </div>
        <a
            href="{{ route('shop.home.index') }}"
            class="max-w-36 max-xl:mr-auto">
            <img
                src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                alt="homeful">
        </a>
        <div class="mx-auto max-xl:fixed max-xl:inset-y-0 max-xl:-right-full max-xl:bg-whit e max-xl:py-10 max-xl:pl-5 max-xl:pr-8 max-xl:shadow-[0px_3px_8px] max-xl:shadow-black/10">
            <v-desktop-category></v-desktop-category>
        </div>
        <a href="#" class="homeful-share text-[24px] leading-none text-dark">
            <span class="icon-search"></span>
        </a>
    </div>
</header>

@pushOnce('scripts')
<script type="text/x-template" id="v-desktop-category-template">
        <div
            class="flex items-center gap-[20px]"
            v-if="isLoading"
            >
            <span class="shimmer h-[28px] w-[100px] rounded-[4px]"></span>
            <span class="shimmer h-[28px] w-[100px] rounded-[4px]"></span>
            <span class="shimmer h-[28px] w-[100px] rounded-[4px]"></span>
            <span class="shimmer h-[28px] w-[100px] rounded-[4px]"></span>
            <span class="shimmer h-[28px] w-[100px] rounded-[4px]"></span>
            <span class="shimmer h-[28px] w-[100px] rounded-[4px]"></span>
            <span class="shimmer h-[28px] w-[100px] rounded-[4px]"></span>
        </div>
        <div>
            <ul
                v-if="menus"
                class="flex items-center gap-7 max-xl:flex-col max-xl:items-start">
                <li
                    v-for="menu in menus"
                    :class="menu.submenu.length ? 'group relative' : ''"
                    >
                    <span
                        v-if="menu.type == 'button'"
                        class="text-lg font-normal text-dark transitio hover:text-primary cursor-pointer"
                        :class="menu.class ?? ''"
                        v-text="menu.label"
                        >
                    </span>
                    <a
                        v-else
                        :href="menu.url"
                        class="text-lg font-normal text-dark transitio hover:text-primary"
                        v-text="menu.label"
                        >
                    </a>
                    <ul
                        v-if="menu.submenu.length"
                        class="absolute right-0 top-8 hidden min-w-52 flex-col gap-5 rounded-xl bg-white px-7 py-6 shadow-[20px_4px_54px] shadow-black/10 group-hover:flex">
                        <li v-for="sMenu in menu.submenu">
                            <a
                                :href="sMenu.url"
                                class="text-lg font-normal text-dark transition hover:text-primary"
                                v-text="sMenu.label"
                                >
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
</script>

<script type="module">
    app.component('v-desktop-category', {
        template: '#v-desktop-category-template',

        data() {
            return {
                isLoading: true,
                categories: [],
                menus: [],
            }
        },

        mounted() {
            this.getMenus();

        },

        watch: {
            menus() {
                this.attachListeners();
            }
        },
        methods: {
            getMenus() {
                this.$axios.get("{{ route('enclaves.api.menus') }}")
                .then(response => {
                    this.isLoading = false;

                    this.menus = response.data.data;
                }).catch(error => {
                    console.log(error);
                });
            },

            get() {
                this.$axios.get("{{ route('shop.api.categories.tree') }}")
                    .then(response => {
                        this.isLoading = false;
                        this.categories = response.data.data;
                    }).catch(error => {
                        console.log(error);
                    });
            },

            pairCategoryChildren(category) {
                return category.children.reduce((result, value, index, array) => {
                    if (index % 2 === 0) {
                        result.push(array.slice(index, index + 2));
                    }

                    return result;
                }, []);
            },

            openAskToJoyModel(){
                console.log('check');

            },

            attachListeners() {
                this.$nextTick(() => {
                    let openModels = document.getElementsByClassName('openAskToJoyModel');
                    Array.from(openModels).forEach(e => {
                        e.addEventListener('click', () => {
                            this.$emitter.emit('open-ask-to-joy-modal');
                        });
                    });
                });
            }
        },
    });
</script>
@endPushOnce
