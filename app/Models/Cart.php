<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'price',
        'img',
        'size',
        'created_at',
        'updated_at',

    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
