<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\Attributes;
use App\Models\Admin\Categories;
use App\Models\Admin\Products;
use App\Models\Admin\ProductsAttributes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class  ProductsAttributesController extends Controller
{
    //
//    public function getById(array $id){
//        return ProductsAttributes::where('products_id',$id['products_id'])
//            ->where('attributes_id',$id['attributes_id'])->first();
//    }
    public function productsAttributes(){
      $productsAttributes = Products::with('attributes')->get();
        return view('admin.productsAttributes.productsAttributes',compact('productsAttributes'));
    }

    public function addProductsAttributes(AllRequest $request){
//        $data = [
//            'products_id'=>$request->products_id,
//            'attributes_id'=>$request->attributes_id
//        ];
//        $pa = new ProductsAttributes();
//        $pa->products_id = $data['products_id'];
//        $pa->attributes_id = $data['attributes_id'];
//        $pa->save();
//        return view('admin.productsAttributes.add');


        $products = DB::table('products')->get();
        $attributes = DB::table('attributes')->get();
        if ($request->isMethod('POST')){
            $params = $request->except('_token');
//            dd($params);
            $productsAttributes =  ProductsAttributes::create($params);
            if ($productsAttributes->id){
                Session::flash('success', "Success!");
                return redirect()->route('route_admin_addProductsAttributes');
            }
        }
        return view('admin.productsAttributes.add',compact('products','attributes'));

    }
    public function editProductsAttributes(AllRequest $request ,$id){
        $products = DB::table('products')->get();
        $attributes = DB::table('attributes')->get();
        $productsAttributes = ProductsAttributes::find($id);
        if ($request->isMethod('POST')){
            $params = $request->except('_token');
            $result = ProductsAttributes::where('id',$id)->update($params);
            if ($result){
                Session::flash('success', "Success!");
                return redirect()->route('route_admin_editProductsAttributes',['id'=>$id]);
            }
        }
        return view('admin.productsAttributes.edit',compact('productsAttributes','products','attributes'));
    }
}
