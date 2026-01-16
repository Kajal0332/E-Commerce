<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id',
        'username',
        'streetAddress',
        'apartment',
        'city',
        'phone',
        'country',
        'email',
        'is_default'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function transactions()
    {
        return $this->hasOne(Checkout::class);
    }
}
