
<v-processing 
    :sub-total="cart.base_grand_total"
></v-processing>


@pushOnce('scripts')
<script type="text/x-template" id="v-processing-template">
    <div class="flex text-right justify-between">
        <p class="text-[18px]">
            @lang('bulkupload::app.shop.bulk-upload.checkout.onepage.processing_fee')
        </p>

        <p 
            class="text-[18px]"
            v-text="'₱ 20000'"
        >
        </p>
    </div>
</script>


<script type="module">
    app.component('v-processing', {
        template: '#v-processing-template',
        
        props: ['subTotal'],

        data() {
            return {
                code: '',
            }
        },

        mounted() {
            this.applyCoupon();
        },

        methods: {
            applyCoupon() {
                console.log(this.subTotal);

                    this.$axios.post("{{ route('shop.api.checkout.cart.processing.apply') }}", {
                            subTotal: this.subTotal,
                        }
                    )
                    .then((response) => {
                    })
                    .catch((error) => {
                    });

                // this.$axios.post("{{ route('shop.api.checkout.cart.coupon.apply') }}", params)
                //     .then((response) => {
                //         this.$parent.$parent.getOrderSummary();

                //         this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                //         this.$refs.couponModel.toggle();

                //         resetForm();
                //     })
                //     .catch((error) => {
                //         if ([400, 422].includes(error.response.request.status)) {
                //             this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });

                //             this.$refs.couponModel.toggle();

                //             return;
                //         }

                //         this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });

                //         this.$refs.couponModel.toggle();
                //     });
            },
        }
    })
</script>
@endPushOnce




