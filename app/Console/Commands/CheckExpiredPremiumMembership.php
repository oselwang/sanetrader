<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailer;

class CheckExpiredPremiumMembership extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:expired-premium';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check expired membership that will expire in 1 day ahead and email them.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Mailer $mailer)
    {
        $end_date = Carbon::now()->addDay(1)->endOfDay();
        $model = new User();
        $users = $model->where(function ($query) use ($end_date) {
            $query->where('expired_premium_membership_date', '<=', $end_date);
        })->get();

        if (!empty($users)) {
            foreach ($users as $user) {
                $data = $user->toArray();
                $mailer->send('mails.expired_premium_reminder', $data, function ($message) use ($user) {
                    $message->from(env('SMTP_MAIL_USERNAME'), 'Sanetrader')->to($user->email)
                        ->subject('Your premium membership will expire in next few days');
                });
                $this->info($user->email . ' sudah berhasil di email');
            }
        }

        $this->info('Success');
    }
}