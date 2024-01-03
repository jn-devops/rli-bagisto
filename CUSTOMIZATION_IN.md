- Run these commands below to complete the setup

~~~
composer require spatie/laravel-webhook-client
composer require spatie/laravel-webhook-server
~~~

~~~
composer dump-autoload
~~~

~~~
php artisan migrate
~~~

~~~
php artisan storage:link
~~~

~~~
php artisan route:cache
~~~

~~~
php artisan vendor:publish

-> Press 0 and then press enter to publish all assets and configurations.
~~~


## Add in .env file
##### For Example:- WEBHOOK_SERVER_URL=domain/webhooks
~~~
WEBHOOK_CLIENT_SECRET=krayin123
WEBHOOK_SERVER_URL=
WEBHOOK_SERVER_SECRET=krayin123