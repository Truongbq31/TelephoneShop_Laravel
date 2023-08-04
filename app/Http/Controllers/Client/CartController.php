<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\Categories;
use App\Models\Admin\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //

    public function add($id){
        $product = Products::findOrFail($id);
        Cart::add([
            'id'=>$id,
            'name'=>$product->name,
            'qty' =>1,
            'price' =>$product->price,
            'weight' => $product->weight ?? 0,
            'options' => [
                'image' => $product->image,
            ],
        ]);

        return back();
    }
    public function index(){
        $categories = Categories::all();
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('client.products.cart',compact('categories','carts','total','subtotal'));
    }
    public function delete($rowId){
        Cart::remove($rowId);
        return back();
    }
    public function update(AllRequest $request){
        if($request->ajax()){
            Cart::update($request->rowId, $request->qty);
        }
    }
}
