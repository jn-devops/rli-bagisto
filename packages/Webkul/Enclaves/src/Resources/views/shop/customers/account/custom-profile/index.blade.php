<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.profile.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="profile"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between items-center">
        <h2 class="text-[26px] font-medium">
            @lang('shop::app.customers.account.profile.title')
        </h2>
    </div>

    <section class="grid w-full gap-y-[0.813rem] max-md:mt-[30px]">
        <!-- Header -->
        @include('shop::customers.account.custom-profile.header.index')

        <v-customer-profile></v-customer-profile>
    </section>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-customer-profile-template">
            <button 
                class="my-1.5 ml-auto flex max-w-fit rounded-[1.25rem] bg-gradient-to-r from-[rgba(252,_177,_21)] to-[rgba(204,_3,_92)] px-16 py-5 text-sm font-medium leading-[0.875rem] text-white"
                @click="enableEditForm"
            >
                @lang('Fill out the Form')
            </button>

            <div v-if="editEnable">
                @include('shop::customers.account.custom-profile.personal-details.index')

                @include('shop::customers.account.custom-profile.form.index')
            </div>

            <div v-else>
                @include('shop::customers.account.custom-profile.view.index')
            </div>
        </script>

        <script type="module">
            app.component("v-customer-profile", {
                template: '#v-customer-profile-template',

                data() {
                    return {
                        editEnable: false,
                        attributes: [],
                        values: [],
                    };
                },

                methods: {
                    enableEditForm() {
                        this.editEnable = true;

                        this.$axios.get("{{ route('shop.customers.account.profile.attributes') }}")
                            .then(response => {
                                this.attributes = response.data.attributes;
                                this.values = response.data.values;
                            })
                            .catch(error => {});
                    },

                    updateFieldsValue($event) {
                        this.$axios.post("{{ route('shop.customers.account.profile.store') }}", {
                                name: $event.target.name,
                                value: $event.target.value,
                                formType: $event.currentTarget.getAttribute('formType'),
                            })
                            .then(response => {
                                if(response.data.message.success) {
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message.success });
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'error', message: response.data.message.fail });
                                }
                            })
                            .catch(error => {});
                    }
                },
            });
        </script>
    @endpushOnce
</x-shop::layouts.account>