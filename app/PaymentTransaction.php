<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $fillable = ['user_id', 'order_id', 'price', 'payment_type', 'transaction_status'];

    protected $table = 'payment_transactions';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
