<?php

namespace App\Request;

use App\Http\Controllers\Account\SubscriptionController;
use App\PaymentTransaction;
use Carbon\Carbon;
use Veritrans_Config;
use Veritrans_Notification;
use Auth;

class HandleSnapNotificationForm extends Form
{

    public function handle()
    {
        Veritrans_Config::$serverKey = env('APP_ENV') != 'production' ? SubscriptionController::SNAP_SERVER_KEY_SANDBOX : SubscriptionController::SNAP_SERVER_KEY;

        // Uncomment for production environment
        Veritrans_Config::$isProduction = env('APP_ENV') != 'production' ? false : true;

        Veritrans_Config::$isSanitized = true;
        Veritrans_Config::$is3ds = true;
        $notif = new Veritrans_Notification();
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        $model = new PaymentTransaction();
        $payment_transaction = $model->with('user')->where('order_id', $order_id)->first();
        $payment_transaction->transaction_status = $transaction;
        $payment_transaction->save();
        $expired_premium_membership_date = $payment_transaction->user->expired_premium_membership_date;
        if ($notif->gross_amount < 1000000 && $expired_premium_membership_date > Carbon::now()) {
            $expired_date = Carbon::parse($expired_premium_membership_date)->addMonth(1);
        } elseif ($notif->gross_amount < 1000000 && $expired_premium_membership_date < Carbon::now()) {
            $expired_date = Carbon::now()->addMonth(1)->endOfDay();
        } elseif ($notif->gross_amount > 1000000 && $expired_premium_membership_date > Carbon::now()) {
            $expired_date = Carbon::parse($expired_premium_membership_date)->addYear(1);
        } else {
            $expired_date = Carbon::parse($expired_premium_membership_date)->addYear(1);
        }

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP

                } else {

                }
            }
        } else if ($transaction == 'settlement') {
            if ($type == 'credit_card') {
                return true;
            }
            $payment_transaction->user->expired_premium_membership_date = $expired_date;
            $payment_transaction->user->save();
        } else if ($transaction == 'pending') {

        } else if ($transaction == 'deny') {

        } else if ($transaction == 'expire') {

        } else if ($transaction == 'cancel') {

        }

        return true;
    }
}