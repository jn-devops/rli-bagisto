@inject('productConditionRepository', 'Webkul\Enclaves\Repositories\ProductConditionRepository')

<v-product-conditions></v-product-conditions>

@push ('styles')
    <style>
        ul, ol {
            padding-left: 40px;
            list-style: disc;
        }
        
        ol {
            list-style: decimal;
        }
        
        ol li, ul li {
            margin-bottom: 10px;
        }
    </style>
@endpush

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-conditions-template">
        <div class="box-shadow relative rounded bg-white p-4 dark:bg-gray-900">
            <div>
                <div class="flex flex-wrap items-center justify-between gap-2.5">
                    <div class="flex flex-col gap-2">
                        <p class="text-base font-semibold text-gray-800 dark:text-white">
                            @lang('enclaves::app.admin.catalog.product.condition.title')
                        </p>

                        <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                            @lang('enclaves::app.admin.catalog.product.condition.info')
                        </p>
                    </div>

                    <div class="secondary-button" @click="$refs.addOptionsRow.toggle();swatchValue=''">
                        @lang('enclaves::app.admin.catalog.product.condition.add-btn')
                    </div>
                </div>

                <div v-for="detail in details">
                    <div class="text-[15px] font-bold" v-text="detail.heading"></div>
                    <div class="pl-3 text-[10px]" v-html="detail.description"></div>
                    
                    <div class="mb-2 mt-2 flex items-center gap-2">
                        <button type="button" class="secondary-button" @click="destroy(detail.id)">
                            @lang('enclaves::app.admin.catalog.product.condition.remove-btn')
                        </button>
                    </div>
                </div>
            </div>

            <div>
                <!-- Add Options Model Form -->
                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                    ref="modelForm"
                    >
                    <form
                        @submit.prevent="handleSubmit($event, storeOptions)"
                        enctype="multipart/form-data"
                        ref="editOptionsForm"
                    >
                        <x-admin::modal
                            @toggle="listenModel"
                            ref="addOptionsRow"
                        >
                            <!-- Modal Header !-->
                            <x-slot:header>
                                <p class="text-lg font-bold text-gray-800 dark:text-white">
                                    @lang('enclaves::app.admin.catalog.product.condition.add-condition')
                                </p>
                            </x-slot>

                            <!-- Modal Content !-->
                            <x-slot:content>
                                <x-admin::form.control-group class="mb-2.5">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('enclaves::app.admin.catalog.product.condition.heading')
                                    </x-admin::form.control-group.label>
                                    
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="heading"
                                        rules="required"
                                        id="heading"
                                        :value="old('heading') ?: ''"
                                        :label="trans('enclaves::app.admin.catalog.product.condition.heading')"
                                        :placeholder="trans('enclaves::app.admin.catalog.product.condition.heading')"
                                    >
                                    </x-admin::form.control-group.control>
                                </x-admin::form.control-group>

                                 <!-- Product Id -->
                                <input type="hidden" name="product_id" :value="{{ $product->id }}"/>

                                <!-- Description -->
                                <x-admin::form.control-group class="mb-2.5">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('enclaves::app.admin.catalog.product.condition.description')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="textarea"
                                        name="description"
                                        id="description1"
                                        rules="required"
                                        class="description"
                                        :value="old('description')"
                                        :label="trans('enclaves::app.admin.catalog.product.condition.description')"
                                        :tinymce="true"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="description"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </x-slot:content>

                            <!-- Modal Footer !-->
                            <x-slot:footer>
                                <!-- Save Button -->
                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('enclaves::app.admin.catalog.product.condition.save-btn')
                                </button>
                            </x-slot>
                        </x-admin::modal>
                    </form>
                </x-admin::form>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-product-conditions', {
            template: '#v-product-conditions-template',

            data() {
                return {
                    details: @json($productConditionRepository->findWhere(['product_id' => $product->id])),
                }
            },

            methods: {
                storeOptions($event) {
                    this.$refs.addOptionsRow.toggle();
                    let formData = new FormData(this.$refs.editOptionsForm);
                    
                    this.$axios.post("{{ route('enclaves.admin.product.conditions.store') }}", formData)
                        .then(response => {
                            this.details = response.data.conditions;
                        })
                        .catch((error) => {
                                    
                        });
                },

                destroy(id) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.$axios.post(`{{ route('enclaves.admin.product.conditions.destroy', '') }}/${id}`)
                                .then(response => {
                                    this.details = response.data.conditions;
                                })
                                .catch((error) => {
                                    
                                });
                        }
                    });
                },
            }
        });
    </script>
@endPushOnce