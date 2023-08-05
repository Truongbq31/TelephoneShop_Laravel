<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(AllRequest $request){
        if ($request->isMethod('POST')){
            if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
                Session::flash('success', 'Login success!');
                return redirect()->route('route_admin_index');
            }else{
//                Session::flash('error', 'Incorrect account or password!');
                echo "<script>alert('Incorrect account or password!')</script>";
//                return redirect()->route('route_admin_login');
            }
        }
        return view('admin.login.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('route_admin_login');
    }

    public function register(AllRequest $request){
        if ($request->isMethod('POST')){
            $flag = $request->password == $request->confirm_password ? true : false;
//            dd($flag);
            if ($flag){
                $user = User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'role'=>1
                ]);
            }else{
                Session::flash('error', 'Password does not match!');
                return redirect()->route('route_admin_register');
            }
            if ($user->id){
                Session::flash('success', 'Sign up successfully!');
                return redirect()->route('route_admin_register');
            }
        }
        return view('admin.login.register');
    }
    //
}
