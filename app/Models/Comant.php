<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'content',
        'created_at',
        'updated_at',

    ];
}
