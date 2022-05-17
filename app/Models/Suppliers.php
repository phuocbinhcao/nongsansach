<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WareHouse;

class Suppliers extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = [
        'supplier_name',
        'supplier_address',
        'supplier_phone',
        'active',
    ];

    public $timestamps = true;

    public function getWareHouse(){
        return $this->hasMany(WareHouse::class);
    }
}
