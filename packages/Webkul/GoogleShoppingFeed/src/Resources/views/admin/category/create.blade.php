<x-admin::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('google_feed::app.admin.map-categories.create.add-title')
    </x-slot>

    <x-admin::form
        :action="route('google_feed.category.map.store')"
        enctype="multipart/form-data"
    >
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <!-- Title -->
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('google_feed::app.admin.map-categories.create.add-title')
            </p>

            <div class="flex items-center gap-x-2.5">
                <a
                    href="{{ route('google_feed.category.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    @lang('admin::app.settings.taxes.rates.create.back-btn')
                </a>
                        
                <button class="primary-button cursor-pointer">
                    @lang('google_feed::app.admin.map-categories.create.save')
                </button>
            </div>
        </div>

        <div class="mt-3 flex gap-2.5">
            <div class="flex flex-1 flex-col gap-2 overflow-auto">
                <div class="box-shadow rounded-[4px] bg-white p-4 dark:bg-gray-900">
                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.map-categories.create.entry-choose-bagisto-category')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="bagisto_category[]"
                            :value="old('bagisto_category')"
                            rules="required"
                            :label="trans('google_feed::app.admin.map-categories.create.entry-choose-bagisto-category')"
                            :placeholder="trans('google_feed::app.admin.map-categories.create.entry-choose-bagisto-category')"
                        >
                            <option value="" disabled>
                                @lang('google_feed::app.admin.map-categories.create.select-category')
                            </option>

                            @foreach ($storeCategory as $category)
                               <option value="{{ $category->id }}">
                                   {{ $category->name }}
                               </option>
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="bagisto_category"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <v-google-category></v-google-category>
                </div>
            </div>
        </div>
    </x-admin::form>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-google-category-template">
            <x-admin::form.control-group class="mb-2.5">
                <x-admin::form.control-group.label class="required">
                    @lang('google_feed::app.admin.map-categories.create.entry-choose-origin-category')
                </x-admin::form.control-group.label>
                
                <v-category-dropdown 
                    v-for="categories, index in originCategory" 
                    :categories="categories" 
                    :index="index"
                >
                </v-category-dropdown>

                <x-admin::form.control-group.error
                    control-name="origin_map_category"
                >
                </x-admin::form.control-group.error>
            </x-admin::form.control-group>
        </script>
        
        <script type="text/x-template" id="v-category-dropdown-template">
            <div class="mb-4 mt-4">
                <select
                    class="custom-select flex min-h-[39px] w-full rounded-[6px] border bg-white px-3 py-1.5 text-base font-normal text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400"
                    id="origin_map_category" 
                    name="origin_category[]" 
                    v-model="selectedRootCategory"
                    @change="addDropdown($event)"
                >  
                    <option value="" disabled>
                       @lang('google_feed::app.admin.map-categories.create.select-category')
                    </option>
 
                    <option
                        v-for="category in categories"
                        v-text="category"
                    >
                    </option>
                </select>
           </div>
        </script>

        <script type="module">
            app.component('v-category-dropdown', {
                template: '#v-category-dropdown-template',

                props: ['index', 'categories'],

                data() {
                    return {
                       originCategories: @json($googleCategory),

                       selectedRootCategory: '',
                    }
                },

                methods: {
                    addDropdown(event) {
                        let subCategory = [];

                        this.originCategories.forEach ((category, index) => {
                            let subKey = this.getKeyByValue(category, this.selectedRootCategory);

                            if (category[subKey] == this.selectedRootCategory) {
                                if (subKey == 'root') {
                                    if (! (subCategory.find( element => element == category.sub1))) {
                                        if (category.sub1) {
                                            subCategory.push(category.sub1)
                                        }
                                    }
                                } else {
                                    let keyIndex = 'sub'+ (parseInt(subKey.charAt(3))+1).toString();

                                    if (! (subCategory.find( element => element == category[keyIndex]))) {
                                        if (category[keyIndex]) {
                                            subCategory.push(category[keyIndex])
                                        }
                                    }
                                }
                            }
                        });

                        if (subCategory.length > 0) {
                            this.$parent.originCategory.push(subCategory);
                        }
                   },

                    getKeyByValue(category, value) {
                        return Object.keys(category).find(key => category[key] === value);
                    },
                },

            });

        </script>

        <script type="module">
            app.component('v-google-category', {
                template: '#v-google-category-template',

                data() {
                    return {
                        originCategories: @json($googleCategory),

                        selectedRootCategory: '',

                        originCategory: [],

                        rootCategory: [],
                    };
                },

                mounted() {
                    this.googleCategories();
                },

                methods: {
                    googleCategories() {
                        this.originCategories.forEach ((category, index) => {
                            if (! (this.rootCategory.find( element => element == category.root))) {
                                this.rootCategory.push(
                                    category.root
                                );
                            }
                        });

                        this.originCategory.push(this.rootCategory);
                    },
                },
           });
        </script>
    @endPushOnce
</x-admin::layouts>