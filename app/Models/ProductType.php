<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GroupGoods;
use App\Models\Products;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'product_types';
    protected $fillable = [
        'product_type_name',
        'product_type_description',
        'group_goods_id',
        'active'
    ];
    public $timestamps = true;

    public function getGroupGoodsOwner()
    {
        return $this->belongsTo(GroupGoods::class, 'group_goods_id');
    }
    public function getProducts(){
        return $this->hasMany(Products::class);
    }
}
