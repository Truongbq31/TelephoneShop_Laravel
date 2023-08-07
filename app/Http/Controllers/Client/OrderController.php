<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order_detail(){
        $orderDetail = DB::table('order_detail')
            ->join('products','products.id','=','order_detail.products_id')
            ->join('users','users.id','=','order_detail.user_id')
            ->select('products.name as product_name','users.name as user_name','products.image','order_detail.*')
            ->where('order_detail.user_id','=',Auth::user()->id)
            ->whereNull('order_detail.deleted_at')
            ->get();
        Cart::destroy();
        return view('client.checkout.index',compact('orderDetail'));
    }
    //
}
