<?php

namespace App\Services;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalService
{
    protected $apiContext;

    public function __construct()
    {
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');
        $mode = config('services.paypal.mode');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential($clientId, $clientSecret)
        );

        $this->apiContext->setConfig([
            'mode' => $mode,
        ]);
    }

    public function getApiContext()
    {
        return $this->apiContext;
    }
}
