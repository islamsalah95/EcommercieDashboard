<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'price',
        'category_id',
        'created_at',
        'updated_at',

    ];

    public function order()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}





