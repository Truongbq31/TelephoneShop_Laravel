<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(AllRequest $request){
        if ($request->isMethod('POST')){
            if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
                if (Auth::user()->status == 1){
                    return redirect()->route('route_client_index');
                }else{
                    echo "<script>alert('Account is disabled. Contact admin for support!')</script>";
                }
            }else{
                echo "<script>alert('Incorrect account or password!')</script>";
//                Session::flash('error', 'Incorrect account or password!');
//                return redirect()->route('route_client_login');
            }
        }
        return view('client.login.login');
    }

    public function register(AllRequest $request){
        if ($request->isMethod('POST')){
            $password = $request->password == $request->confirm_password ? Hash::make($request->password) : false;
            if ($password){
                $newUser = User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$password,
                    'role'=>0
                ]);
                if ($newUser->id){
                    Session::flash('success', 'Create Account Success!');
                    return redirect()->route('route_client_login');
                }
            }else{
                Session::flash('error', 'Password does not match!');
                return redirect()->route('route_client_register');
            }
        }
        return view('client.login.register');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('route_client_index');
    }
    //
}
