<?php

namespace App\Models;

use App\Models\Rate;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'price',
        'desc',
        'img1',
        'img2',
        'img3',
        'xl',
        'xxl',
        'xxxl',
        'category_id',
        'created_at',
        'updated_at',

    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');


    }


   
    public function comment()
    {
        return $this->hasMany(Comment::class,'product_id');
    }


    public function rate()
    {
        return $this->hasMany(Rate::class,'product_id');
    }
}
