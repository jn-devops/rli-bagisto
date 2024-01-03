## Installation without composer:

- Unzip the respective extension zip and then merge "packages" and "storage" folders into project root directory.
- Goto config/app.php file and add following line under 'providers'

```
Webkul\BulkUpload\Providers\BulkUploadServiceProvider::class
```

- Goto composer.json file and add following line under 'psr-4'

```
"Webkul\\BulkUpload\\": "packages/Webkul/BulkUpload/src"
```

- Goto config/concord.php file and add following line under 'modules'

```
\Webkul\BulkUpload\Providers\ModuleServiceProvider::class
```

- Run these commands below to complete the setup

```
composer dump-autoload
```

```
php artisan migrate
```

```
php artisan storage:link
```

```
php artisan route:cache
```


```
npm install vue-konva konva --save
```

## add 

import in admin app.js file.

```
/**
 * 
 * import VueKonva for image drag;
 */
import VueKonva from 'vue-konva'; 
```
 and `VueKonva` in below array.


```
php artisan vendor:publish

-> Press 0 and then press enter to publish all assets and configurations.
```

## Replace addtocart button into product view page.
`
@if ($product->getTypeInstance()->showQuantityBox())
    <x-shop::button
        type="submit"
        class="secondary-button w-full max-w-full"
        button-type="secondary-button"
        :loading="false"
        :title="trans('shop::app.products.view.add-to-cart')"
        :disabled="! $product->isSaleable(1)"
        ref="addToCartButton"
    >
    </x-shop::button>
@endif
`

## update.

path = packages/Webkul/Marketing/src/Listeners/Product.php
Search = `'target_path'   => $currentURLKey`
Replace = `'target_path'   => $currentURLKey ?? $product->url_key,`

Path = packages/Webkul/Product/src/Type/Configurable.php
Search = `$this->updateVariant($variantData, $variantId);`
add Before = `$variantData['inventories'] = $data['inventories'] ?? []; $variantData['price'] = $data['price'] ?? 0;`
