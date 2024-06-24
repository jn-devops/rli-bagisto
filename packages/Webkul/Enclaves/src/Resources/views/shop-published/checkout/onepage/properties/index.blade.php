<v-checkout-properties ref="vCheckoutProperties"></v-checkout-properties>

@pushOnce('scripts')
<script type="module">
    app.component('v-checkout-properties', {
        created() {
            this.handlePropertyForm();
        },

        methods: {
            handlePropertyForm() {
                this.$axios.get('{{ route("shop.checkout.authentication.store") }}')
                .then(response => {
                    if (response.data.data.payment_methods) {
                        this.$parent.$refs.vPaymentMethod.payment_methods = response.data.data.payment_methods;
                        
                        this.$parent.$refs.vPaymentMethod.isShowPaymentMethod = true;

                        this.$parent.$refs.vPaymentMethod.isPaymentMethodLoading = false;
                    }
                })
                .catch(error => {                 
                    console.log(error);
                });
            },
        },
    });
</script>
@endPushOnce