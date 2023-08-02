<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Categories;
use App\Models\Admin\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public $categories;
    public function __construct()
    {
        $this->categories = Categories::all();
    }

    public function products(){
        $categories = $this->categories;
        $products = DB::table('products')
            ->join("categories", "products.category_id",'=', 'categories.id')
            ->select('products.*', "categories.name as cate_name")
            ->whereNull('products.deleted_at')
            ->get();

        return view('client.products.products', compact('products', 'categories'));
    }

    public function productsDetail($id){
        $categories = $this->categories;
        $imgsPrd = DB::table('img_products')->where('id_products', '=', $id)->get();
//        dd($imgsPrd);
        $productsDetail = DB::table('products')
            ->join("categories", "products.category_id",'=', 'categories.id')
            ->select('products.*', "categories.name as cate_name")
            ->where('products.id','=', $id)
            ->whereNull('products.deleted_at')
            ->get();

        $prdByCate = DB::table('products')
            ->join('categories', 'products.category_id', '=','categories.id')
            ->select('products.*', "categories.name as cate_name")
            ->whereNull('products.deleted_at')
            ->get();

//        dd($prdByCate, $productsDetail);

        return view('client.products.productsDetail', compact('productsDetail', 'categories', 'imgsPrd', 'prdByCate'));
    }
    public function productsByCategoriesName($name){
        $categories = $this->categories;
        $productsByIdCategory = DB::table('products')
            ->join('categories', 'products.category_id','=','categories.id')
            ->select('products.*', 'categories.name as cate_name')
            ->whereNull('products.deleted_at')
            ->where('categories.name','=',$name)
            ->get();
//        dd($productsByIdCategory);

        return view('client.products.productsByCategoriesName', compact('categories', 'productsByIdCategory'));
    }
    //
}
