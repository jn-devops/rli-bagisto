@props([
    'isActive' => false,
])

<v-modal-enclave-form
    is-active="{{ $isActive }}"
    {{ $attributes }}
>
    @isset($toggle)
        <template v-slot:toggle>
            {{ $toggle }}
        </template>
    @endisset

    @isset($header)
        <template v-slot:header="{ toggle, isOpen }">
            <div {{ $header->attributes->merge(['class' => 'flex items-start justify-between gap-7 border-b-[1px] border-[#8B8B8B4D] pb-4']) }}>
                {{ $header }}

                <span
                    class="icon-cancel cursor-pointer rounded-full bg-[#F3F4F6] p-[10px] text-[15px] text-[#989898] max-md:text-[10px]"
                    @click="toggle"
                >
                </span>
            </div>
        </template>
    @endisset

    @isset($content)
        <template v-slot:content>
            <div {{ $content->attributes->merge(['class' => 'bg-white p-2']) }}>
                {{ $content }}
            </div>
        </template>
    @endisset

    @isset($footer)
        <template v-slot:footer>
            <div {{ $content->attributes->merge(['class' => 'bg-white px-10 py-5 max-md:px-3 max-md:py-2']) }}>
                {{ $footer }}
            </div>
        </template>
    @endisset
</v-modal-enclave-form>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-modal-enclave-form-template"
    >
        <div>
            <div @click="toggle">
                <slot name="toggle">
                </slot>
            </div>

            <transition
                tag="div"
                name="modal-overlay"
                enter-class="duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-class="duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    class="fixed inset-0 z-[999] bg-gray-500 bg-opacity-50 transition-opacity"
                    v-show="isOpen"
                ></div>
            </transition>

            <transition
                tag="div"
                name="modal-content"
                enter-class="duration-300 ease-out"
                enter-from-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
                enter-to-class="translate-y-0 opacity-100 md:scale-100"
                leave-class="duration-200 ease-in"
                leave-from-class="translate-y-0 opacity-100 md:scale-100"
                leave-to-class="translate-y-4 opacity-0 md:translate-y-0 md:scale-95"
            >
                <div
                    class="fixed inset-0 z-[999] transform overflow-y-auto transition" v-show="isOpen"
                >
                    <div class="absolute left-1/2 top-1/2 z-[999] w-full max-w-[595px] -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-[57px] max-md:w-[90%] scrollbar-hide max-h-[90vh] overflow-auto rounded-[30px] bg-white px-10 py-8 max-sm:h-full max-sm:w-full max-sm:rounded-none max-sm:px-4">
                        <!-- Header Slot-->
                        <slot
                            name="header"
                            :toggle="toggle"
                            :isOpen="isOpen"
                        >
                        </slot>

                        <!-- Content Slot-->
                        <slot name="content"></slot>

                        <!-- Footer Slot-->
                        <slot name="footer"></slot>
                    </div>
                </div>
            </transition>
        </div>
    </script>

    <script type="module">
        app.component('v-modal-enclave-form', {
            template: '#v-modal-enclave-form-template',

            props: ['isActive'],

            data() {
                return {
                    isOpen: this.isActive,
                };
            },

            methods: {
                toggle() {
                    this.isOpen = ! this.isOpen;

                    if (this.isOpen) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow ='auto';
                    }

                    this.$emit('toggle', { isActive: this.isOpen });
                },

                open() {
                    this.isOpen = true;

                    document.body.style.overflow = 'hidden';

                    this.$emit('open', { isActive: this.isOpen });
                },

                close() {
                    this.isOpen = false;

                    document.body.style.overflow = 'auto';

                    this.$emit('close', { isActive: this.isOpen });
                }
            }
        });
    </script>
@endPushOnce
