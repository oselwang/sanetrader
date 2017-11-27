<?php

namespace App\Http\Controllers\Account;

use App\Request\HandleSnapNotificationForm;
use App\Request\SnapFinishForm;
use App\Request\SnapTokenForm;
use Illuminate\Routing\Controller;
use DB;

class SubscriptionController extends Controller
{
    const SNAP_SERVER_KEY = 'VT-server-DGkknDSZW5pYJGtu9jqlhXkx';
    const SNAP_SERVER_KEY_SANDBOX = 'VT-server-g90S0UJZ1E62lfgFcVponFha';
    const ONE_DOLLAR_TO_RUPIAH = 13600;

    public function notification(HandleSnapNotificationForm $handleSnapNotificationForm)
    {
        $notification = DB::transaction(function () use ($handleSnapNotificationForm) {
            return $handleSnapNotificationForm->handle();
        });

        return response()->json(true);
    }

    public function finish(SnapFinishForm $snapFinishForm)
    {
        $snap = DB::transaction(function () use ($snapFinishForm) {
            return $snapFinishForm->handle();
        });

        if ($snap->transaction_status == 'pending') {
            flash()->overlay('Please finish your payment', 'One more step !', 'info');
            return redirect('subscription');
        } elseif ($snap->transaction_status == 'capture') {
            flash()->overlay('Chart is enabled', 'Thank you !', 'info');
            return redirect('subscription');
        }

    }

    public function getSnapToken(SnapTokenForm $snapTokenForm)
    {
        $token = $snapTokenForm->handle();

        return response()->json($token);
    }
}