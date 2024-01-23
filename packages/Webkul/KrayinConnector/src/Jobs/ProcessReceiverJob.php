<?php

namespace Webkul\KrayinConnector\Jobs;

use Webkul\KrayinConnector\Hooks\Receivers\CheckoutKycAuthenticateReceiver;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as BaseProcessWebhookJob;

class ProcessReceiverJob extends BaseProcessWebhookJob
{
    /**
     * Process webhook job.
     *
     * @return void
     */
    public function handle()
    {
        $payload = $this->webhookCall->payload;

        switch ($payload['entity_type']) {
            case 'checkout.property.kyc.authenticate.after':
                try {
                    CheckoutKycAuthenticateReceiver::create($payload);
                } catch(\Exception $exception) {
                    $this->exceptionResponse($exception, $payload['entity_type']);
                }
                
                break;
            default:
                break;
        }
    }

    /**
     * Custom validation error message
     *
     * @param object $validator
     * @return json
     */
    private function exceptionResponse($exception, $type)
    {
        $response = response()->json([
            'status'         => false,
            'retry'          => true,
            'webhook_type'   => $type,
            'trace'          => $this->webhookCall->id,
            'message'        => $exception->getMessage() ?? 'Something went wrong!'
        ], 400)
        ->header('Content-Type', 'json')->send();
        $response->getContent();
        exit;
    }
}
