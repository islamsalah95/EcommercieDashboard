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
use App\Traits\CustomHelpers;
use App\Http\Controllers\AuthApis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

 


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allproducts(Request $request) {
        $minPrice=$request->minPrice;
        $MaxPrice=$request->MaxPrice;
        if ($minPrice && $MaxPrice) {
          $allproduts = Product::where('price', '>', $minPrice)->where('price', '<', $MaxPrice)->get()->paginate(8);
        }
        else{
          $allproduts=Product::all();
        }
        return ApiTraits::data(compact('allproduts'),'allproduts success');
        }

  

        public function SkirtsCategory() {
            $SkirtsCategory=Category::find(2)->product;
          
              return ApiTraits::data(compact('SkirtsCategory'),'SkirtsCategory success');
          }

          public function SkirtsCategoryCountProducts() {
            $SkirtsCategoryCountProducts=Category::find(2)->product->count();
              return ApiTraits::data(compact('SkirtsCategoryCountProducts'),'SkirtsCategory Count Products success');
          }



          public function DressCategory() {
            $DressCategory=Category::find(1)->product;
              return ApiTraits::data(compact('DressCategory'),'DressCategory success');
          }

          public function DressCategoryCountProducts() {
            $DressCategoryCountProducts=Category::find(1)->product->count();
              return ApiTraits::data(compact('DressCategoryCountProducts'),'DressCategory Count Products success');
          }



        
          public function CasualCategory() {
            $CasualCategory=Category::find(3)->product;
              return ApiTraits::data(compact('CasualCategory'),'CasualCategory success');
          }
                  public function CasualCategoryCountProducts() {
            $CasualCategoryCountProducts=Category::find(3)->product->count();
              return ApiTraits::data(compact('CasualCategoryCountProducts'),'CasualCategory Count Products success');
          }



        
          public function allCategories() {
            $allCategories=Category::all();
            return ApiTraits::data(compact('allCategories'),'allCategories display success');
          }


          public function insertNewProduct(StoreProductRequest $request ) {           
      $img1=CustomHelpers::uploadImg($request,"img1","assets/images/");
      $img2=CustomHelpers::uploadImg($request,"img2","assets/images/");
      $img3=CustomHelpers::uploadImg($request,"img3","assets/images/");
            $product=Product::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'desc'=>$request->desc,
                'img1'=>$img1,
                'img2'=>$img2,
                'img3'=>$img3,
                'xl'=>$request->xl,
                'xxl'=>$request->xxl,
                'xxxl'=>$request->xxxl,
                'category_id'=>$request->category_id,
            ]);
        
            return ApiTraits::data(compact('product'),'product add success');
          }

          public function oneProductDetails($id) {
            $oneProductDetails=Product::findOrfail($id);
            return ApiTraits::data(compact('oneProductDetails'),'oneProductDetails display success');
          }


        public function updateNewProduct(UpdateProductRequest $request,$productid) {
         
          $img1=CustomHelpers::uploadImgNull($request,"img1","assets/images/");
          $img2=CustomHelpers::uploadImgNull($request,"img2","assets/images/");
          $img3=CustomHelpers::uploadImgNull($request,"img3","assets/images/");
           $oneProductDetails=Product::findOrfail($productid);
          if ($img1 == null){$img1=$oneProductDetails->img1;}
          if ($img2 == null){$img2=$oneProductDetails->img2;}
          if ($img3 == null){$img3=$oneProductDetails->img3;}


            $product=Product::where('id',$productid)->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'desc'=>$request->desc,
                'img1'=>$img1,
                'img2'=>$img2,
                'img3'=>$img3,
                'xl'=>$request->xl,
                'xxl'=>$request->xxl,
                'xxxl'=>$request->xxxl,
                'category_id'=>$request->category_id,
            ]);
            return ApiTraits::data(compact('product'),'product update success');
          }



          public function deleteProduct($productid) {
            $oneProductdelete=Product::findOrfail($productid)->delete();
            return ApiTraits::data(compact('oneProductdelete'),'one Product delete success');
          }



}
