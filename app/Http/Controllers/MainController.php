<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function addProductForUser(Request $request){
        // return $request->all();
        if(count(UserProduct::where('user_id',Auth::id())->where('product_id',$request->productId)->get())==0){
            $model=new UserProduct();
            $model->user_id=Auth::id();
            $model->Qty=$request->qty;
            $model->product_id=$request->productId;
            $model->save();
        }
        else{
            $model=UserProduct::where('user_id',Auth::id())
            ->where('product_id',$request->productId)->first();
            $model->Qty=$request->qty;
            $model->save();
            return "updated!";
        }
        return 'ok!';
    }

    public function getUserAmountData(){
        $model=UserProduct::where('user_id',Auth::id())->get();
        $totolPrice=0;
        $tax=0;
        foreach ($model as $m) {
            $tax=$tax+(($m->product->price)*$m->Qty)*5/100 ;
            $totolPrice=$totolPrice+($m->product->price)*$m->Qty;
        }
        return $data=['Subtotal'=>$totolPrice,'Tax'=>$tax,'Total'=>$totolPrice+$tax];
    }
}
