<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Categories;
use App\Models\Admin\Comments;
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
//        dd($products);

        return view('client.products.products', compact('products', 'categories'));
    }

    public function productsDetail($id){
        $comments = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.users_id')
            ->where('products_id','=',$id)
            ->get();
//        dd($comments);
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

        return view('client.products.productsDetail', compact('productsDetail', 'comments', 'categories', 'imgsPrd', 'prdByCate'));
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

}
