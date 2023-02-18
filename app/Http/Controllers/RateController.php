<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;

class RateController extends Controller
{
    public  function productRateAvg($productid) {
        $productRateAvg=Rate::where('product_id', $productid)->avg('rate');
         $productRateAvg=round($productRateAvg,1);
      
         if($productRateAvg){
          return ApiTraits::data(compact('productRateAvg'),'productRateAvg display success');
      
         }else{
          $productRateAvg=0;
          return ApiTraits::data(compact('productRateAvg'),'productRateAvg display success');
      
         }
      
      }
      
      
     public function addRate(Request $request,$productid) {
       
        $request->validate([
            'rate' => ['required',Rule::in([1,2,3,4,5])],
           // 'product_id'=> ['required','exists:App\Models\Product,id'],
        ]);

        $productRate=Rate::create([
          'rate' => $request->rate,
          'product_id' =>$productid,
      
      ]);
      
      return ApiTraits::data(compact('productRate'),'productRate insert success');
      
      }
}
