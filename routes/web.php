<?php

use App\Http\Controllers\MainController;
use App\Models\Products;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products=Products::with(['users','userProduct'])->get();
    return view('invoicePage',compact(['products']));
})->middleware('auth');

Route::post('addProductForUser',[MainController::class,'addProductForUser']);
Route::get("getUserAmountData",[MainController::class,'getUserAmountData']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout',function (){
    Auth::logout();
    return redirect()->back();
});

Route::get('test', function () {
    return $product=Products::find(1)->userProduct;
});
