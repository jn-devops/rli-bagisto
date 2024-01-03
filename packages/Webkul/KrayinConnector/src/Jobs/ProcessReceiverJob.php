<?php

namespace Webkul\KrayinConnector\Jobs;

use Illuminate\Support\Facades\Log;
use Webkul\KrayinConnector\Hooks\Receivers\ProductReceiver;
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
        
        Log::info($payload);

        // switch ($payload['api_entity_type']) {
        //     case 'product.update':
        //         try {
        //             ProductReceiver::create($payload);
        //         } catch(\Exception $exception) {
        //             $this->exceptionResponse($exception, $payload['api_entity_type']);
        //         }
                
        //         break;
        //     default:
        //         break;
        // }
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
