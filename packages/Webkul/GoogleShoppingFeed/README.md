### 1. Introduction:

Bagisto Google Shopping Feed is a bagisto extension which allows you to share your product on google shopping.


### 2. Requirements:

* **Bagisto**: v2.0.0.


### 3. Installation:

* Unzip the respective extension zip and then merge "packages" and "public" folders into project root directory.
* Goto config/app.php file and add following line under 'providers'

~~~
Webkul\GoogleShoppingFeed\Providers\GShoppingFeedServiceProvider::class,
~~~

* Goto composer.json file and add following line under 'psr-4'

~~~
"Webkul\\GoogleShoppingFeed\\": "packages/Webkul/GoogleShoppingFeed/src"
~~~

* Goto the config\bagisto-vite and add the following array under viters

~~~
'google_feed' => [
    'hot_file'                 => 'google-feed-default-vite.hot',
    'build_directory'          => 'themes/google_feed/default/build',
    'package_assets_directory' => 'src/Resources/assets',
],
~~~

* Run these commands below to complete the setup

~~~
composer dump-autoload
~~~

~~~
php artisan route:cache
~~~

~~~
php artisan config:cache
~~~

~~~
php artisan migrate
~~~

~~~
composer require google/apiclient:"^2.7"
~~~

~~~
php artisan db:seed --class=Webkul\\GoogleShoppingFeed\\Database\\Seeders\\DatabaseSeeder
~~~

~~~
php artisan vendor:publish --force

-> Press number of the  Webkul\GoogleShoppingFeed\Providers\GShoppingFeedServiceProvider class and then press enter to publish all assets and configurations.
~~~


-> That's it, now just execute the project on your specified domain.