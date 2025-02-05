<?php

namespace App\Http\Controllers\Front\Payments;

use App\Http\Controllers\Controller;
use App\Services\StripeService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function charge(Request $request)
    {
        $request->validate([
            'card_token' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $charge = $this->stripeService->charge(
                cartsTotal(),
                'egp',
                $request->card_token,
                'Payment for Order'
            );

            return response()->json(['success' => true, 'charge' => $charge]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
