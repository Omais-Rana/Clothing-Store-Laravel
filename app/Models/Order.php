<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'city', 'zip', 'total_amount'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
