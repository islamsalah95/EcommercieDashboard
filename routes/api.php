<?php

use App\Models\Cart;
use App\Models\Rate;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\AuthUser;
use App\Http\Controllers\AuthApis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//*******************************>>>>>>auth<<<<<**********************************//
Route::post('/register', [AuthApis::class, 'register']);
Route::post('/send', [AuthApis::class, 'send']);
Route::post('/verify', [AuthApis::class, 'verify']);
Route::post('/login', [AuthApis::class, 'login']);

Route::post('/rest', [AuthApis::class, 'rest']);
Route::post('/Newpass', [AuthApis::class, 'Newpass']);

Route::get('/logoutAll', [AuthApis::class, 'logoutAll']);
Route::get('/logout', [AuthApis::class, 'logout']);
//*******************************>>>>>products<<<<<**********************************//


Route::get('/serchProduct/{word}', function ($word) {


    $myWord2="{$word}%";
     
       $serchProducts=Product::where('name', 'like',$myWord2)->get();

       return ApiTraits::data(compact('serchProducts'),'serchProducts success');


});

Route::post('/allproducts', [ProductController::class, 'allproducts']);


Route::get('/SkirtsCategory', [ProductController::class, 'SkirtsCategory']);
Route::get('/SkirtsCategoryCountProducts', [ProductController::class, 'SkirtsCategoryCountProducts']);


Route::get('/DressCategory', [ProductController::class, 'DressCategory']);
Route::get('/DressCategoryCountProducts', [ProductController::class, 'DressCategoryCountProducts']);


Route::get('/CasualCategory', [ProductController::class, 'CasualCategory']);
Route::get('/CasualCategoryCountProducts', [ProductController::class, 'CasualCategoryCountProducts']);


Route::get('/allCategories', [ProductController::class, 'allCategories']);



Route::get('/oneProductDetails/{id}', [ProductController::class, 'oneProductDetails']);


Route::middleware(['IsAdmin'])->group(function () {
    Route::post('/insertNewProduct', [ProductController::class, 'insertNewProduct']);
    Route::post('/updateNewProduct/{id}', [ProductController::class, 'updateNewProduct']);
    Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
    Route::get('/countprices', [OrderController::class, 'countprices']);


});

//*******************************>>>>>comments<<<<<**********************************//
Route::get('/productComments/{id}', [CommentController::class, 'productComments']);

//*******************************>>>>>rates<<<<<**********************************//
Route::get('/productRateAvg/{id}', [RateController::class, 'productRateAvg']);


//*******************************>>>>>auth user<<<<<**********************************//
Route::middleware(['AuthUser'])->group(function () {
//*******************************>>>>>comments<<<<<**********************************//
Route::post('/insertComment', [CommentController::class, 'insertComment']);//fix
Route::delete('/deleteComment/{id}', [CommentController::class, 'deleteComment']);
//*******************************>>>>>rates<<<<<**********************************//
Route::post('/addRate/{id}', [RateController::class, 'addRate']);
//*******************************>>>>>cart<<<<<**********************************//php artisan make:middleware IsAdmin
Route::get('/showCartItems', [CartController::class, 'showCartItems']);
Route::get('/totalPriceCart', [CartController::class, 'totalPriceCart']);
Route::post('/addCart/{id}', [CartController::class, 'addCart']);
Route::post('/deleteCart/{id}', [CartController::class, 'deleteCart']);
Route::post('/clearCart', [CartController::class, 'clearCart']);
//*******************************>>>>>chickout<<<<<**********************************//
Route::post('/stripe-payment', [StripeController::class, 'handlePost']);
//*******************************>>>>>order<<<<<**********************************//
Route::get('/displayOrders', [OrderController::class, 'displayOrders']);

});


