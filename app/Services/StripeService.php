<?php

namespace App\Services;
use Stripe\Stripe;
use Stripe\Charge;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }
    public function charge($amount, $currency, $source, $description)
    {
        return Charge::create([
            'amount' => $amount * 100, 
            'currency' => $currency,
            'source' => $source,
            'description' => $description
            ]);
    }
}
