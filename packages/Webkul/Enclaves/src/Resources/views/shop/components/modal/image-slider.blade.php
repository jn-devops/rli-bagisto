@props([
    'isActive' => false,
])

<v-modal
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
</v-modal>

@pushOnce('scripts')
    <script type="text/x-template" id="v-modal-template">
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
                    class="fixed inset-0 bg-gray-500 bg-opacity-50 transition-opacity z-[1]"
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
                <div
                    class="fixed inset-0 z-10 transform transition overflow-y-auto" 
                    v-show="isOpen"
                >
                    <span
                        class="icon-cancel text-[30px] cursor-pointer"
                        @click="toggle"
                    >
                    </span>

                    <div class="w-full max-w-[1179px] z-[999] inline-table absolute left-[50%] top-[50%] bg-[#F5F5F5] max-md:w-[80%] -translate-x-[50%] -translate-y-[50%] rounded-lg bg-white dark:bg-gray-900 box-shadow">
                        <slot name="content"></slot>
                    </div>
                </div>
            </transition>
        </div>
    </script>

    <script type="module">
        app.component('v-modal', {
            template: '#v-modal-template',

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