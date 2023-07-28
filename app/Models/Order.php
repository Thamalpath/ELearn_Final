<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'zipcode',
        'status',
        'message',
        'tracking_no',
        'total_price',
        'payment_mode',
        'payment_id',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

