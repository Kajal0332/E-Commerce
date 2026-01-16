<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Checkout extends Model
{
    protected $fillable = ['user_id', 'order_id', 'transaction_mode', 'transaction_status'];
    use HasFactory;

    public function order() {
        return $this->belongsTo(Order::class);
    }
}