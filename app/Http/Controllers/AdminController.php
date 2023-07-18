<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function products(){
        $products = DB::table('products')
            ->join("categories", "products.category_id",'=', 'categories.id')
            ->select('products.*', "categories.name as cate_name")
            ->get();
//        dd($products);
        return view('admin.products.products', compact('products'));
    }

    public function addProducts(AllRequest $request){
        $category = DB::table('categories')->get();

        if($request->isMethod('POST')){
//            dd($request->except('_token'));
                $params =$request->except('_token');
                if ($request->hasFile('image') && $request->file('image')->isValid()){
                    $params['image'] = uploadFile('images', $request->file('image'));
                }

              $products = Products::create($params);

            if ($products->id){
                Session::flash('success', 'Success!');
                return redirect()->route('route_admin_addProducts');
            }
        }
        return view('admin.products.add', compact('category'));
    }

    public function editProduct(AllRequest $request, $id){
        $category = DB::table('categories')->get();
        $product = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.*', 'categories.name as cate_name')
            ->where('products.id', '=', $id)
            ->first();
//        dd($product);

//        $products = Products::find($id);
//        dd($products);

        if ($request->isMethod('POST')){
            $params =$request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile('images', $request->file('image'));
            }
            $result = Products::where('id', $id)
                ->update($params);
            if ($result){
                Session::flash('success', "Success!");
                return redirect()->route('route_admin_editProduct',['id'=>$id]);
            }
        }
        return view("admin.products.edit", compact('category', 'product'));
    }
    //
}
