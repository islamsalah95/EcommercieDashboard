<?php

namespace App\Http\Controllers;


use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use Stripe\StripeClient;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use App\Traits\CustomHelpers;
use App\Http\Requests\StripeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use App\Http\Requests\webStore\StorecartRequest;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsenpm
     */
    public function handlePost(StripeRequest $request)
    {

        $user=Auth::guard('sanctum')->user();
       $totalPrice=Cart::where('user_id',$user->id)->sum('price');
       
     // dd($request);

        $stripe = new StripeClient(env('STRIPE_SECRET'));
          $stripeToken=$stripe->tokens->create([
            'card' => [
                'number' => $request->number,
                'exp_month' => $request->exp_month,
                'exp_year' => $request->exp_year,
                'cvc' => $request->cvc,
            ],
          ]);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
                'amount' => 100 * $totalPrice,
                'currency' => 'egp',
                "source" =>$stripeToken,
                'description' => 'desc',
            ]); 


            Order::create([
              'user_id' => $user->id,
              'price' => $totalPrice,

          ]);

          
          Cart::where('user_id', $user->id)->delete();


       return ApiTraits::successMessage($message=" paying success",$statusCode=200);


    }

}
