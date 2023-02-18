<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'text',
        'created_at',
        'updated_at',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
