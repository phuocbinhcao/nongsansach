<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['employee_name', 'employee_phone', 'employee_address', 'employee_identity', 'user_id', 'active'];

    public $timestamps = true;

    public function getUserEmployee(){
        return $this->belongsTo(User::class);
    }
}
