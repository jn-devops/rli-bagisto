<x-shop::layouts
    :has-header="true"
    :has-feature="true"
    :has-footer="true"
>

<v-user-kyc-summary></v-user-kyc-summary>

@pushOnce('scripts')
    <script type="text/x-template" id="v-user-kyc-summary-template">
        {{-- Page Content --}}
        <div class="container">
            <div class="flex items-center gap-x-[40px] pt-[28px] max-[1180px]:gap-x-[20px]">
                <div class="left-part">
                    authentication
                </div>

                <div class="right-part">
                    is processing
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-user-kyc-summary', {
            template: '#v-user-kyc-summary-template',

            data() {
                return {
                }
            },

            methods: {
                
            },
        });
    </script>
@endPushOnce

</x-shop::layouts>
