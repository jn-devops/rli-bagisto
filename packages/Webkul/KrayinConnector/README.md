### 1. Introduction:
Product detail send into Krayin CRM.

### 2. Requirements:

* **Bagisto**: v1.5.0 or higher.

~~~
composer require spatie/laravel-webhook-client
~~~

~~~
composer require spatie/laravel-webhook-server
~~~

### 3. Installation:

* Unzip the respective extension zip and then merge "packages" and "storage" folders into project root directory.
* Goto config/app.php file and add following line under 'providers'

~~~
Webkul\KrayinConnector\Providers\KrayinConnectorServiceProvider::class,
~~~

* Goto composer.json file and add following line under 'psr-4'

~~~
"Webkul\\KrayinConnector\\": "packages/Webkul/KrayinConnector/src"
~~~

* Run these commands below to complete the setup

~~~
composer dump-autoload
~~~

~~~
php artisan route:cache
~~~

~~~
php artisan vendor:publish

-> Press 0 and then press enter to publish all assets and configurations.
~~~

## 3. Add in .env file

~~~
WEBHOOK_CLIENT_SECRET=krayin123
WEBHOOK_SERVER_URL=
WEBHOOK_SERVER_SECRET=krayin123
~~~


# Webhook Docs

A webhook is a way for an app to provide information to another app about a particular event. The way the two apps communicate is with a simple HTTP request.

## Authorization Process

When setting up, it's common to generate, store, and share a secret between your app and the app that wants to receive webhooks.

~~~ php
$data = 'X-Krayin-Signature'; 
$secret = 'krayin123';

$signature = hash_hmac('sha256', $data, $secret);
~~~

## Headers

For development purposes we are giving direct hash but in production we should compute.

~~~ headers
X-Krayin-Signature : 83bdbbc385f0d59aa2b944305e598789d54aa8103136a657644c1e6934dde8f8 // signature value
Accept            : application/json
~~~
