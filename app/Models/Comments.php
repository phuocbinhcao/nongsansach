<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'comment_username',
        'comment_email',
        'comment_content',
        'product_id',
        'active',
    ];
}
