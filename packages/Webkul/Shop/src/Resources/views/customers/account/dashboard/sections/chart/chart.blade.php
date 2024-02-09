<!-- const config = {
  type: 'pie',
  data: data,
}; -->


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
                    legend: {
                        position: 'bottom',
                        align: 'center',
                    },
                    datasets: [{
                            label: 'My First Dataset',
                            data: [270000, 70000, 50000],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                        }]
                    },
                };

            const chart = new Chart(this.$el, config);
        },
    });
</script>
@endpushOnce