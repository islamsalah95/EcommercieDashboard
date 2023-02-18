<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Rate;
use App\Models\User;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\AuthApis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
   public function productComments($productid) {
        $productComments=Product::find($productid)->comment;
          return ApiTraits::data(compact('productComments'),'productComments display success');
      }
    
      public function insertComment(Request $request) {
        $user=Auth::guard('sanctum')->user();
      //   $request->validate([
      //     'product_id' => ['required','exists:App\Models\Product,id'],
      //     'user_id' => ['required','exists:App\Models\User,id'],
      //     'text' => ['required','string'],

      // ]);
        $insertComment=Comment::create([
            'product_id' =>$request->product_id,
            'user_id'=>$user->id,
            'text'=>$request->text,
        ]);
    
        return ApiTraits::data(compact('insertComment'),'insertComment success');
      }
    
    
      public function deleteComment($commentid) {
        $deleteComment=Comment::findOrfail($commentid)->delete();
        return ApiTraits::data(compact('deleteComment'),'one comment delete success');
      }
}
