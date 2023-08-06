<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Order extends Controller
{
    public function order_detail(){
        $orders = DB::table('order_detail')
            ->join('products','products.id','=','order_detail.products_id')
            ->join('users','users.id','=','order_detail.user_id')
            ->select('order_detail.*', 'products.name as prd_name','products.image', 'users.name as username')
            ->whereNull('order_detail.deleted_at')
            ->get();
//        dd($orders);
        return view('admin.order.order', compact('orders'));
    }

    public function delete($id){
        Order_detail::where('id',$id)->delete();
        Session::flash('success', 'Success!');
        return redirect()->route('route_admin_order');
    }
    //
}
