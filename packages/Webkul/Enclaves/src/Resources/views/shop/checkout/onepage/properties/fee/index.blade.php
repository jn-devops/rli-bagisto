
<v-processing 
    :processing-fee="cart.processing_fee"
></v-processing>

@pushOnce('scripts')
<script type="text/x-template" id="v-processing-template">
    <div class="flex justify-between text-right">
        <p class="text-[18px]">
            <!-- TODO: Translate -->
            Processing Fee
        </p>
    
        <p 
            class="text-[18px]"
            v-text="processingFee"
        >
        </p>
    </div>
</script>

<script type="module">
    app.component('v-processing', {
        template: '#v-processing-template',
        
        props: ['processingFee'],
    })
</script>
@endPushOnce




