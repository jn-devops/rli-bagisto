
<v-processing 
    :processing-fee="cart.processing_fee"
></v-processing>

@pushOnce('scripts')
<script type="text/x-template" id="v-processing-template">
    <div class="flex text-right justify-between">
        <p class="text-[18px]">
            @lang('bulkupload::app.shop.bulk-upload.checkout.onepage.processing_fee')
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




