<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suppliers;
use App\Models\Products;

class WareHouse extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    protected $fillable = [
        'id',
        'consignment_symbol',
        'consignment_name',
        'consignment_expiry',
        'consignment_purchase_price',
        'consignment_sale_price',
        'consignment_quantity',
        'consignment_saled',
        'consignment_return',
        'consignment_currently',
        'consignment_status',
        'product_id',
        'supplier_id',
        'active',
    ];

    public $timestamps = true;

    public function getProduct()
    {
        return $this->belongsTo(Products::class , 'product_id');
    }

    public function getSupplier()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id');
    }
}
