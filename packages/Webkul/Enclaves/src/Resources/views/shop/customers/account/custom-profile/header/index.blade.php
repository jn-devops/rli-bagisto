<v-profile-header></v-profile-header>

@pushOnce('scripts')
    <script type="text/x-template" id="v-profile-header-template">
        <section class="mt-[18px] grid grid-cols-3 items-center gap-5 rounded-[1.25rem] bg-[rgba(237,_239,_245)] p-3 max-lg:grid-cols-1">
            <figure class="w-full items-center justify-start p-3">

                <x-shop::form
                    class="rounded"
                    enctype="multipart/form-data"
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form @change="handleSubmit($event, updateProfile)">
                        <div class="relative size-24 rounded-full xl:size-[7.565rem]">
                            <img
                                v-if="imagePreviewURL"
                                :src="imagePreviewURL"
                                alt="image-preview"
                                class="size-24 rounded-full object-cover xl:size-[7.565rem]"
                            />

                            <img
                                v-else
                                src="{{ $customer->image_url ??  bagisto_asset('images/user-placeholder.png') }}"
                                alt="image-preview"
                                class="size-24 rounded-full object-cover xl:size-[7.565rem]"
                            />

                            <label 
                                for="profile-upload" 
                                class="absolute right-3 top-14 xl:right-4 xl:top-20"
                            >
                                <input 
                                    type="file"
                                    name="profile-upload"
                                    class="absolute hidden"
                                    id="profile-upload"
                                    @change="onFileChanged"
                                    ref="file"
                                />

                                <img
                                    src="{{ bagisto_asset('images/camera-icon.png') }}"
                                    alt="profile-image"
                                    class="size-9 rounded-full" 
                                />
                            </label>
                        </div>
                    </form>
                </x-shop::form>
            </figure>

            <article class="flex flex-col gap-y-1.5 pt-2 lg:gap-y-2.5">
                <h3 class="text-[20px] font-semibold text-black xl:text-[1.565rem] xl:leading-7">
                    {{ $customer->first_name }}
                </h3>

                <h4 class="text-nowrap text-base font-bold text-black xl:leading-6"> 
                    @lang('enclaves::app.shop.customers.account.customer_profile.header.email')

                    <span class="font-normal">
                        {{ $customer->email }}
                    </span>
                </h4>

                <h4 class="text-base font-bold text-black xl:leading-6"> 
                    @lang('enclaves::app.shop.customers.account.customer_profile.header.age') 

                    <span class="font-normal">
                        {{ $customer->age }}{{ '+ Years' }}
                    </span>
                </h4>
            </article>
            
            <article class="flex w-full flex-wrap gap-3 rounded-[1.25rem] bg-[rgba(161,_184,_214)] p-5">
                <h3 class="text-xl font-semibold text-white xl:text-[1.565rem] xl:leading-7">
                    @lang('enclaves::app.shop.customers.account.customer_profile.header.step') 
                </h3>

                <button class="font-regular max-w-fit text-balance rounded-full bg-white px-6 py-3.5 text-base leading-4 text-black">
                    @lang('enclaves::app.shop.customers.account.customer_profile.header.read-now') 
                </button>
            </article>
        </section>
    </script>

    <script type="module">
        app.component('v-profile-header', {
            template: '#v-profile-header-template',

            data() {
                return {
                    selectedFile: null,
                    imagePreviewURL: null,
                    images: null,
                }
            },

            methods: {
                onFileChanged() {
                    this.images = this.$refs.file.files[0];

                    this.imagePreviewURL = URL.createObjectURL(this.images);
                },

                updateProfile(params, { resetForm, setErrors }) {
                    const formData = new FormData();

                    formData.append('image', this.images);

                    formData.append('customer_id', '{{ $customer->id }}')

                    this.$axios.post("{{ route('enclaves.customers.account.profile.update') }}", formData)
                            .then(response => {
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                            })
                            .catch(error => {});
                }
            }
        })
    </script>
@endPushOnce