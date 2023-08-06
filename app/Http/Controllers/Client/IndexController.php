<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banners;
use App\Models\Admin\Categories;
use App\Models\Admin\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $categories = Categories::all();
        $banners = Banners::all();
        $products = DB::table('products')
            ->join('categories', 'products.category_id','=','categories.id')
            ->select('products.*', 'categories.name as cate_name')
            ->whereNull('products.deleted_at')
            ->get();
//        dd($products);
//        dd($banners);
//        dd($categories);
        $productsApple = DB::table('products')
            ->join("categories", "products.category_id",'=', 'categories.id')
            ->select('products.*', "categories.name as cate_name")
            ->where('categories.name','=','apple')
            ->whereNull('products.deleted_at')
            ->get();

        $productsSamsung = DB::table('products')
            ->join("categories", "products.category_id",'=', 'categories.id')
            ->select('products.*', "categories.name as cate_name")
            ->where('categories.name','=','samsung')
            ->whereNull('products.deleted_at')
            ->get();
//        dd($productsApple);
        return view('client.index', compact('categories', 'banners', 'products', 'productsApple', 'productsSamsung'));
    }
    //
}
