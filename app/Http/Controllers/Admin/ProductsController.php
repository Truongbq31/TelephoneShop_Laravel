<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\Products;
use App\Models\Admin\ImgProducts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function products(){
        $products = DB::table('products')
            ->join("categories", "products.category_id",'=', 'categories.id')
            ->select('products.*', "categories.name as cate_name")
            ->whereNull('products.deleted_at')
            ->get();
//        $products = Products::all();
        $img_products = ImgProducts::all();
//        dd($img_products);
//        dd($products);
        return view('admin.products.products', compact('products', 'img_products'));
    }

    public function addProducts(AllRequest $request){

        $category = DB::table('categories')->get();

        if($request->isMethod('POST')){

//            dd($request->except('_token'));

//            dd($request->has('images'));
//

                $params =$request->except('_token');
                if ($request->hasFile('image') && $request->file('image')->isValid()){
                    $params['image'] = uploadFile('images', $request->file('image'));
                }
//                dd($params['image']);

              $products = Products::create($params);

            if ($request->has('images')){
//                dd($request->file('images'));

                foreach ($request->file('images') as $image){
//                    dd($request->images);
                    $imageName = 'images/'.time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('storage/images'), $imageName);
                    ImgProducts::create([
                        'id_products'=>$products->id,
                        'images'=>$imageName
                    ]);
                }
            }

            if ($products->id){
                Session::flash('success', 'Success!');
                return redirect()->route('route_admin_addProducts');
            }

        }
        return view('admin.products.add', compact('category'));
    }

    public function editProducts(AllRequest $request, $id){
        $category = DB::table('categories')->get();
        $product = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
//            ->join('img_products', 'products.id', '=','img_products.id_products')
            ->select('products.*', 'categories.name as cate_name')
            ->where('products.id', '=', $id)
            ->first();
//        dd($product);
        $img_prd = DB::table('img_products')
            ->where('id_products','=',$id)
            ->get();
        foreach ($img_prd as $imgP){
            if ($imgP->id_products == $product->id){
                $idImgPrd = $imgP->id;
            }
        }
//        dd($img_prd);

//        $products = Products::find($id);
//        dd($products);

        if ($request->isMethod('POST')){
            $params = $request->except('_token', 'images');
//            dd($params);
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $resultDL = Storage::delete('/public/'.$product->image);
                if ($resultDL){
                    $params['image'] = uploadFile('images', $request->file('image'));
                }
            }else{
                $params['image'] = $product->image;
            }
//            dd($params);

            if ($request->has('images')){
                foreach ($img_prd as $img){
//                    dd($img);
                    $deleteImages = Storage::delete('/public/'.$img->images);
                }
                if ($deleteImages){
                    foreach ($request->file('images') as $image){
//                    dd($request->images);
                        $imageName = 'images/'.time().'_'.$image->getClientOriginalName();
                        $image->move(public_path('storage/images'), $imageName);
                        ImgProducts::where('id', $idImgPrd)->update([
                            'images'=>$imageName
                        ]);
                    }
                }
            }

            $result = Products::where('id', $id)
                ->update($params);
            if ($result){
                Session::flash('success', "Success!");
                return redirect()->route('route_admin_editProducts',['id'=>$id]);
            }
        }
        return view("admin.products.edit", compact('category', 'product'));
    }

    public function deleteProducts($id){
        Products::where('id', $id)->delete();
        Session::flash('success', "Success!");
        return redirect()->route('route_admin_products');
    }
    //
}
