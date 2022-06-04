<?php

namespace App\Models;

use App\Transformers\OrderTransformer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'payment_method',
        'status',
        'address_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }
}
