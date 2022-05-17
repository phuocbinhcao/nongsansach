<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\nhanvien;
use App\Models\Customer;
use DateTimeInterface;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'phone', 'address', 'email', 'email_verified_at', 'password', 'avatar', 'rolename', 'active',
    ];

    protected $table = 'users';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'active',
    ];

    public function getEmployee(){
        return $this->hasOne(nhanvien::class);
    }

    public function getCustomer(){
        return $this->hasOne(Customer::class);
    }

    /**
     * Summary of serializeDate
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
    return $date->format('Y-m-d H:i:s');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
