## some code update into code file.

## Path: packages/Webkul/Customer/src/Models/Customer.php

1. Add `image` into fillable property.



## Add event in theme edit form into admin package.

# Path: packages/Webkul/Admin/src/Resources/views/settings/themes/edit.blade.php
# search: ref="addSliderModal"

# Add: {!! view_render_event('bagisto.admin.settings.themes.form.content.after') !!} & {!! view_render_event('bagisto.admin.settings.themes.form.content.before') !!}


# Webkul\Checkout\Cart.php

# Add processing_fee and property_code in prepareDataForOrder and prepareDataForOrderItem methods.

# array $finalData and 

`
'processing_fee'        => ($this->getCart()->processing_fee * $data['items_qty']),
'property_code'         => $this->getCart()->property_code,
`