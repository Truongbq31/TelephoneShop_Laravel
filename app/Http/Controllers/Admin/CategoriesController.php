<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }
    public function categories(){
        $categories = DB::table('categories')
            ->select('id','name')->get();
        return view('admin.categories.categories',compact('categories'));
    }
    public function addCategories(AllRequest $request){
        if($request->isMethod('POST')){
            $categories = Categories::create($request->except('_token'));
            if($categories->id){
                Session::flash('success','thêm thành công');
                return redirect()->route('route_admin_addCategories');
            }
        }
        return view('admin.categories.add');
    }
    public function editCategories(AllRequest $request,$id){
        $categories = Categories::find($id);
        if($request->isMethod('POST')){
            $result = Categories::where('id',$id)->update($request->except('_token'));
            if($result){
                Session::flash('success','sửa thành công');
                return redirect()->route('route_admin_editCategories',['id'=>$id]);
            }
        }
        return view('admin.categories.edit',compact('categories'));
    }
}
