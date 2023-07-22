<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AttributesController extends Controller
{
    public function attributes(){
        $attributes = Attributes::all();
        return view('admin.attributes.attributes', compact('attributes'));
    }

    public function deleteAttributes($id){
        Attributes::where('id', $id)->delete();
        Session::flash('success', 'Success!');
        return redirect()->route('route_admin_attributes');
    }

    public function addAttributes(AllRequest $request){
        if ($request->isMethod('POST')){
            $params = $request->except('_token');
            $attributes = Attributes::create($params);
            if ($attributes->id){
                Session::flash('success', 'Success!');
                return redirect()->route('route_admin_addAttributes');
            }
        }
        return view('admin.attributes.add');
    }

    public function editAttributes(AllRequest $request, $id){
        $attributes = Attributes::find($id);

        if ($request->isMethod('POST')){
            $params = $request->except('_token');
            $result = Attributes::where('id', $id)->update($params);
            if ($result){
                Session::flash('success', 'Success!');
                return redirect()->route('route_admin_attributes');
            }
        }
        return view('admin.attributes.edit', compact('attributes'));
    }

    //
}
