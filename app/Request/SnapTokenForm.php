<?php

namespace App\Request;

use App\Http\Controllers\Account\SubscriptionController;
use Veritrans_Config;
use Veritrans_Snap;
use Auth;

class SnapTokenForm extends Form
{

    public function handle()
    {
        Veritrans_Config::$serverKey = env('APP_ENV') != 'production' ? SubscriptionController::SNAP_SERVER_KEY_SANDBOX : SubscriptionController::SNAP_SERVER_KEY;

        // Uncomment for production environment
        Veritrans_Config::$isProduction = env('APP_ENV') != 'production' ? false : true;

        Veritrans_Config::$isSanitized = true;
        Veritrans_Config::$is3ds = true;

        $transaction = array(
            'transaction_details' => array(
                'order_id'     => 'ORD-' . rand(0, 999999) . '-' . rand(0, 999),
                'gross_amount' => $this->fields('price') * SubscriptionController::ONE_DOLLAR_TO_RUPIAH// no decimal allowed
            ),
            'customer_details'    => array(
                'email'      => Auth::user()->email,
                'first_name' => Auth::user()->name,
            )
        );

        $snapToken = Veritrans_Snap::getSnapToken($transaction);
        return $snapToken;
    }
}