@props([
    'isActive' => false,
])

<v-quick-modal
    is-active="{{ $isActive }}"
    {{ $attributes }}
>
    @isset($toggle)
        <template v-slot:toggle>
            {{ $toggle }}
        </template>
    @endisset

    @isset($header)
        <template v-slot:header>
            {{ $header }}
        </template>
    @endisset

    @isset($content)
        <template v-slot:content>
            {{ $content }}
        </template>
    @endisset

    @isset($footer)
        <template v-slot:footer>
            {{ $footer }}
        </template>
    @endisset
</v-quick-modal>

@pushOnce('scripts')
    <script type="text/x-template" id="v-quick-modal-template">
        <div>
            <div @click="toggle">
                <slot name="toggle"></slot>
            </div>

            <transition
                tag="div"
                name="modal-overlay"
                enter-class="ease-out duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-class="ease-in duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
                >
                <div
                    class="fixed inset-0 z-[1] bg-gray-500 bg-opacity-50 transition-opacity"
                    v-show="isOpen"
                ></div>
            </transition>

            <transition
                tag="div"
                name="modal-content"
                enter-class="ease-out duration-300"
                enter-from-class="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
                enter-to-class="opacity-100 translate-y-0 md:scale-100"
                leave-class="ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0 md:scale-100"
                leave-to-class="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
                >
                <div class="fixed inset-0 z-10 transform overflow-y-auto transition" 
                    v-show="isOpen"
                >
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="box-shadow absolute left-[50%] md:top-[55%] top-[45%] z-[999] mt-[30px] w-full max-w-[950px] -translate-x-[50%] -translate-y-[50%] rounded-lg bg-white max-md:w-[90%] dark:bg-gray-900 pb-[40px] px-[20px]">

                            <div class="shadow-md">
                                <div class="flex items-center justify-between gap-[20px] border-[#E9E9E9] bg-white p-[20px]">
                                    <slot name="header"></slot>

                                    <span
                                        class="icon-cancel cursor-pointer text-[30px] bg-gray-100 p-[10px] rounded-[50%]"
                                        @click="toggle"
                                    >
                                    </span>
                                </div>
                            </div>

                            <div>
                                <slot name="content"></slot>
                            </div>

                            <div class="flex justify-end px-[16px] py-[10px] shadow-md">
                                <slot name="footer"></slot>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </script>

    <script type="module">
        app.component('v-quick-modal', {
            template: '#v-quick-modal-template',

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
                        document.body.style.overflow ='scroll';
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