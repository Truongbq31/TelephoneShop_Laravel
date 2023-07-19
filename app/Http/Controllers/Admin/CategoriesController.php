<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('admin.categories.categories', compact('categories'));
    }

    public function addCategories(AllRequest $request){
        if ($request->isMethod('POST')){
            $params = $request->except('_token');
//            dd($params);
            $categories = Categories::create($params);
            if ($categories->id){
                Session::flash('success', "Success!");
                return redirect()->route('route_admin_addCategories');
            }
        }

        return view('admin.categories.add');
    }

    public function deleteCategories($id){
        Categories::where('id', $id)->delete();
        Session::flash('success', "Success!");
        return redirect()->route('route_admin_categories');
    }

    public function editCategories(AllRequest $request, $id){
//        $categories = DB::table('categories')->where('id', $id)->first();
        $categories = Categories::find($id);
//        dd($categories);
        if ($request->isMethod("POST")){
            $params = $request->except('_token');
            $result = Categories::where('id', $id)->update($params);
            if ($result){
                Session::flash('success', 'Success!');
                return redirect()->route('route_admin_editCategories', ['id'=>$categories->id]);
            }
        }

        return view('admin.categories.edit', compact('categories'));
    }
    //
}
