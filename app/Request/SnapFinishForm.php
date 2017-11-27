<?php

namespace App\Request;

use App\Http\Controllers\Account\SubscriptionController;
use App\PaymentTransaction;
use Carbon\Carbon;
use Veritrans_Config;
use Auth;

class SnapFinishForm extends Form
{

    public function handle()
    {
        $order_id = $this->fields('order_id');
        Veritrans_Config::$isProduction = false;
        Veritrans_Config::$serverKey = env('APP_ENV') != 'production' ? SubscriptionController::SNAP_SERVER_KEY_SANDBOX : SubscriptionController::SNAP_SERVER_KEY;
        $transaction = \Veritrans_Transaction::status($order_id);
        $model = new PaymentTransaction();
        $payment_transaction = $model->create([
            'order_id'           => $order_id,
            'user_id'            => Auth::id(),
            'price'              => $transaction->gross_amount,
            'transaction_status' => $transaction->transaction_status,
            'payment_type'       => $transaction->payment_type
        ]);
        if ($transaction->transaction_status == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($transaction->payment_type == 'credit_card') {
                if ($transaction->fraud_status == 'accept') {
                    $expired_premium_membership_date = Auth::user()->expired_premium_membership_date;
                    if (!empty($expired_premium_membership_date)) {
                        if ($transaction->gross_amount < 1000000) {
                            if ($expired_premium_membership_date > Carbon::now()) {
                                $expired_date = Carbon::parse($expired_premium_membership_date)->addMonth(1);
                            } else {
                                $expired_date = Carbon::now()->addMonth(1)->endOfDay();
                            }
                        } else {
                            if (Carbon::parse($expired_premium_membership_date )> Carbon::now()) {
                                $expired_date = Carbon::parse($expired_premium_membership_date)->addYear(1);
                            } else {
                                $expired_date = Carbon::parse($expired_premium_membership_date)->addYear(1);
                            }
                        }
                    } else {
                        $expired_date = $transaction->gross_amount < 1000000 ? Carbon::now()->addMonth(1)->endOfDay() : Carbon::now()->addYear(1)->endOfDay();
                    }
                }
                Auth::user()->expired_premium_membership_date = $expired_date;
                Auth::user()->save();
            }
        }

        return $transaction;
    }
}