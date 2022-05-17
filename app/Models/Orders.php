<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetails;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'order_customer_name',
        'order_customer_phone',
        'order_customer_email',
        'order_customer_address',
        'order_total_price',
        'customer_id',
        'active',
        'order_status',
        'order_note',];
    public $timestamps = true;

    public function getOrderDetail()
    {
        return $this->hasMany(OrderDetails::class, 'orders_id');
    }

    public function getCustomer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
