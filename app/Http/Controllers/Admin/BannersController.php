<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    public function Banners(){
//        $banners = DB::table('banners')->get();
        $banners = Banners::all();

        return view('admin.banners.banners', compact('banners'));
    }

    public function addBanners(AllRequest $request){
        if ($request->isMethod("POST")){
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile('images', $request->file('image'));
            }
            $banners = Banners::create($params);
            if ($banners->id){
                Session::flash('success', "Success!");
                return redirect()->route('route_admin_banners');
            }
        }

        return view('admin.banners.add');
    }

    public function editBanners(AllRequest $request, $id){
        $banners = Banners::find($id);
//        dd($banners);
        if ($request->isMethod('POST')){
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $resultDL = Storage::delete('/public/'.$banners->image);
                if ($resultDL){
                    $params['image'] = uploadFile('images', $request->file('image'));
                }
            }else{
                $params['image'] = $banners->image;
            }
            $result = Banners::where('id', $id)->update($params);
            if ($result){
                Session::flash('success', 'Success!');
                return redirect()->route('route_admin_banners');
            }
        }

        return view('admin.banners.edit', compact('banners'));
    }

    public function deleteBanners($id){
        Banners::where('id', $id)->delete();
        Session::flash('success', "Success!");
        return redirect()->route('route_admin_banners');
    }
    //
}
