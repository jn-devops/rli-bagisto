<v-profile-header></v-profile-header>

@pushOnce('scripts')
    <script type="text/x-template" id="v-profile-header-template">
        <section class="flex flex-col justify-between gap-y-8 gap-x-4 rounded-[1.25rem] bg-[rgba(237,_239,_245)] px-8 py-5 md:items-center lg:flex-row xl:gap-x-8 xl:px-12 xl:pt-[2.313rem] xl:pb-[1.875rem]">
            <figure class="flex justify-start w-full gap-x-8">

                <x-shop::form
                    class="rounded mt-[30px]"
                    enctype="multipart/form-data"
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form @change="handleSubmit($event, updateProfile)">
                        <div class="size-24 xl:size-[7.565rem] relative rounded-full">
                            <img
                                v-if="imagePreviewURL"
                                :src="imagePreviewURL"
                                alt="Image preview"
                                class="size-24 xl:size-[7.565rem] rounded-full object-cover"
                            />

                            <img
                                v-else
                                src="{{ $customer->image_url ??  bagisto_asset('images/user-placeholder.png') }}"
                                alt="Image preview"
                                class="size-24 xl:size-[7.565rem] rounded-full object-cover"
                            />

                            <label 
                                for="profile-upload" 
                                class="absolute top-14 right-3 xl:top-20 xl:right-4"
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
                                    alt="profile image"
                                    class="rounded-full size-9" 
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
                        Email: <span class="font-normal">{{ $customer->email }}</span>
                    </h4>

                    <h4 class="text-base font-bold text-black xl:text-[1.313rem] xl:leading-6"> 
                        Age: <span class="font-normal">{{ $customer->date_of_birth }}</span>
                    </h4>
                </figcaption>
            </figure>
            
            <article
                class="lg:max-w-64 flex w-full max-w-full flex-col gap-y-6 rounded-[1.25rem] bg-[rgba(161,_184,_214)] py-5 px-6">
                <h3 class="text-xl font-semibold text-white xl:text-[1.565rem] xl:leading-7">
                    @lang('Steps to get your dream house')
                </h3>

                <button class="text-balance font-regular ml-auto max-w-fit rounded-full bg-white py-3.5 px-6 text-base leading-4 text-black">
                    @lang('Read now')
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