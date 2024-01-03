<?php

namespace Webkul\KrayinConnector\Hooks;

use Illuminate\Http\Request;
use Spatie\WebhookClient\Exceptions\InvalidConfig;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class KrayinSignatureValidator implements SignatureValidator
{
    /**
     * Is signature valid.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\WebhookClient\WebhookConfig  $config
     * @return bool
     */
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $signatureHeaderName = $config->signatureHeaderName;

        $signature = $request->header($signatureHeaderName);

        if (! $signature) {
            return false;
        }

        $signingSecret = $config->signingSecret;

        if (empty($signingSecret)) {
            throw InvalidConfig::signingSecretNotSet();
        }

        $computedSignature = hash_hmac('sha256', $signatureHeaderName, $signingSecret);

        return hash_equals($signature, $computedSignature);
    }
}
