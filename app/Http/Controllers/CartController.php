<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use App\Traits\CustomHelpers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    public function showCartItems() {
        $showCartItems=Auth::guard('sanctum')->user()->cart;
      return ApiTraits::data(compact('showCartItems'),'showCartItems success');
   
     }

     public function totalPriceCart() {
          $user=Auth::guard('sanctum')->user();

          $totalPriceCart=Cart::where('user_id',$user->id)->sum('price');
          return ApiTraits::data(compact('totalPriceCart'),'totalPriceCart display success');
 
   }


  
  
     public function addCart($productid,Request $request ) {
      $product=Product::find($productid);
      $user=Auth::guard('sanctum')->user();
    
      $request->validate([
        'size' => ['required'],
    ]);
    
      $cartItem=Cart::create([
          'product_id' =>$product->id,
          'user_id' => $user->id,
          'price' => $product->price,
          'img' => $product->img1,
          'size' => $request->size,
      ]);
  
  
        return ApiTraits::data(compact('cartItem'),'cartItem add success');
  
  
    }
  
    public function deleteCart($cartid) {
     $user=Auth::guard('sanctum')->user();
      $cartItem=Cart::where('id', $cartid)->where('user_id', $user->id)->delete();
  
      return ApiTraits::data(compact('cartItem'),'cartItem delete success');
  
    }
  
   
    public function clearCart() {
     
      $user=Auth::guard('sanctum')->user();
      // $cartItem=User::findOrfail($user->id);
      // $cartItem->cart()->delete();
      $cartItem=Cart::where('user_id', $user->id)->delete();
       return ApiTraits::data(compact('cartItem'),'cartItems delete success');
   
     }
  
  
}
