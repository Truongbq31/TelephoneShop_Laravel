<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\Categories;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function profile(){
        return view('client.user.profile');
    }

    public function updateProfile(AllRequest $request, $id){
        if ($request->isMethod('POST')){

//            dd($request->except('_token'));
            $result = User::where('id', $id)->update($request->except('_token'));
            if ($result){
                Session::flash('success','Profile updated');
                return redirect()->route('route_client_profile', ['id'=>$id]);
            }
        }
    }

    public function changePassword(AllRequest $request, $id){
        if ($request->isMethod('POST')){
            $password = $request->new_pass == $request->con_new_pass ? Hash::make($request->new_pass) : false;
            if ($password){
                User::where('id', $id)->update([
                    'password' => $password
                ]);
                Session::flash('success', 'Password updated');
                return redirect()->route('route_client_profile', ['id'=>$id]);
            }else{
                Session::flash('error', 'Password does not match!');
                return redirect()->route('route_client_profile', ['id'=>$id]);
            }
        }
    }
    //
}
