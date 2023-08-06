<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Categories;
use App\Models\Admin\Order;
use App\Models\Admin\Order_detail;
use App\Models\Admin\Products;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $totalPrd = Products::count();
        $totalUsers = User::count();
        $totalOrder = Order_detail::count();
        $totalRevenue = DB::table('order_detail')->sum('total_price');
        $categories = Categories::all();
//        dd($totalRevenue);
//        dd($totalPrd);
        return view('admin.index', compact('totalPrd', 'totalUsers', 'totalOrder', 'totalRevenue',
        'categories'));
    }
    //
}
