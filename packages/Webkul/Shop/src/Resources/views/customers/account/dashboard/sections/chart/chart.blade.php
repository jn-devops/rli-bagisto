<v-product-reviews></v-product-reviews>

@pushOnce('scripts')

<script type="text/x-template" id="v-product-reviews-template">
    <canvas :width="width" :height="height"></canvas>
</script>

<script type="module">
    app.component("v-product-reviews", {
        template: '#v-product-reviews-template',

        data() {
            return {
                width: 100,
                height: 100,
            };
        },

        mounted() {
            const config = {
                type: 'pie',
                data: {
                    labels: ['TCP', 'MA', 'Balence'],
                    datasets: [{
                            data: [270000, 70000, 50000],

                            backgroundColor: [
                                '#990ca8',
                                '#ed9609',
                                '#de2c18'
                            ],

                            hoverOffset: 25
                        }]
                    },

                    options: {
                        plugins: {
                            legend: {
                                position: 'bottom',
                                align: 'center',
                            },
                        },
                        layout: {
                            padding: 20,
                        },
                    },
                };

            const chart = new Chart(this.$el, config);
        },
    });
</script>
@endpushOnce