<?php

if (! function_exists('webhook_server_url')) {
    /**
     * Webhook server url.
     *
     * @return string
     */
    function webhook_server_url()
    {
        return config('krayin.webhook_server_url');
    }
}

if (! function_exists('webhook_server_secret')) {
    /**
     * Webhook server secret.
     *
     * @return string
     */
    function webhook_server_secret()
    {
        return config('krayin.webhook_server_secret');
    }
}
