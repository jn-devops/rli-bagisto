<v-profile-header></v-profile-header>

@pushOnce('scripts')
    <script type="text/x-template" id="v-profile-header-template">
        <section class="flex flex-col justify-between gap-x-4 gap-y-8 rounded-[1.25rem] bg-[rgba(237,_239,_245)] px-8 py-5 md:items-center lg:flex-row xl:gap-x-8 xl:px-12 xl:pb-[1.875rem] xl:pt-[2.313rem]">
            <figure class="flex w-full justify-start gap-x-8">

                <x-shop::form
                    class="mt-[30px] rounded"
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

                <figcaption class="flex flex-col gap-y-1.5 pt-2 lg:gap-y-2.5">
                    <h3 class="text-lg font-semibold text-black xl:text-[1.565rem] xl:leading-7">
                        {{ $customer->first_name }}
                    </h3>

                    <h4 class="text-base font-bold text-black xl:text-[1.313rem] xl:leading-6"> 
                        @lang('enclaves::app.shop.customers.account.customer-profile.header.email') 
                        <span class="font-normal">{{ $customer->email }}</span>
                    </h4>

                    <h4 class="text-base font-bold text-black xl:text-[1.313rem] xl:leading-6"> 
                        @lang('enclaves::app.shop.customers.account.customer-profile.header.age') 

                        <span class="font-normal">{{ $customer->date_of_birth }}</span>
                    </h4>
                </figcaption>
            </figure>
            
            <article
                class="flex w-full max-w-full flex-col gap-y-6 rounded-[1.25rem] bg-[rgba(161,_184,_214)] px-6 py-5 lg:max-w-64">
                <h3 class="text-xl font-semibold text-white xl:text-[1.565rem] xl:leading-7">
                    @lang('enclaves::app.shop.customers.account.customer-profile.header.step') 
                </h3>

                <button class="font-regular ml-auto max-w-fit text-balance rounded-full bg-white px-6 py-3.5 text-base leading-4 text-black">
                    @lang('enclaves::app.shop.customers.account.customer-profile.header.read-now') 
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