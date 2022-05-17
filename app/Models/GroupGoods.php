<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductType;

class GroupGoods extends Model
{
    use HasFactory;
    protected $table = 'group_goods';
    protected $fillable = [
        'group_name',
        'group_image',
        'group_description',
        'active',
    ];
    public $timestamps = true;

    public function getProductType()
    {
        return $this->hasMany(ProductType::class);
    }
}
