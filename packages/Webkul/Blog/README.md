### 1. Introduction:

Bagisto Blog Creation allows the admin to create Blog from the back-end. 

It packs in lots of demanding features that allows your business to scale in no time:

* Admin can enable or disable the module

* Admin can Create/Edit/Delete.

### 2. Requirements:

* **Bagisto**: v2.x.x.

### 3. Installation:

* Unzip the respective extension zip and then merge "packages" folders into project root directory.

* Goto config/app.php file and add following line under 'providers'

~~~
Webkul\Blog\Providers\BlogServiceProvider::class,
~~~

* Goto composer.json file and add following line under 'psr-4'

~~~
"Webkul\\Blog\\": "packages/Webkul/Blog/src"
~~~

* Run these commands below to complete the setup

~~~
composer dump-autoload
~~~

~~~
php artisan route:cache
~~~

~~~
php artisan vendor:publish --force

-> Press number of the Webkul\Blog\Providers\BlogServiceProvider and then press enter to publish all assets and configurations.
~~~

~~~
php artisan optimize
php artisan migrate
~~~


## Add `@bagistoVite(['src/Resources/assets/css/blog-app.css'], 'blog')` line under head section into below given path.

path = packages/Webkul/Enclaves/src/Resources/views/shop/components/layouts/index.blade.php