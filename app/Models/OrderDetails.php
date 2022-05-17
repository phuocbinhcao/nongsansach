<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;


class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $fillable = [
        'id',
        'product_id',
        'orders_id',
        'order_detail_quantity',
        'order_detail_price',
        'active',
    ];
    public $timestamps = true;

    public function getOrders()
    {
        return $this->belongsTo(Orders::class , 'orders_id');
    }

    public function getProduct()
    {
        return $this->belongsTo(Products::class , 'product_id');
    }
}
