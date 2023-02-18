<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'rate',
        'product_id',
        'created_at',
        'updated_at',

    ];

    



    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }



}
