<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllRequest;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index(){
//        dd($idAuth);
        $users = DB::table('users')
        ->where('id','!=', Auth::user()->id)
        ->get();
        return view('admin.users.users', compact('users'));
    }
    public function updateStatus($id){
        $user = User::find($id);
        $newStatus = $user->status == 1 ? 0 : 1;
        User::where('id', $id)->update([
            'status'=> $newStatus,
        ]);
        return redirect()->route('route_admin_users');
    }

    public function editUsers(AllRequest $request, $id){
        $user = User::find($id);
        if ($request->isMethod('POST')){
            $password = $request->new_password == $request->confirm_new_password ? Hash::make($request->new_password) : "";
//            dd($password);
            $flag = $password != "" ? true : false;
//            dd($flag);
            if ($flag){
                $resutl = User::where('id', $id)->update([
                   'name'=>$request->name,
                   'email'=>$request->email,
                   'password'=>$password
                ]);
                if ($resutl){
                    Session::flash('success', 'The account has been updated!');
                    return redirect()->route('route_admin_editUsers', ['id'=>$id]);
                }
            }else{
                Session::flash('error', 'Password does not match!');
                return redirect()->route('route_admin_editUsers', ['id'=>$id]);
            }
        }

        return view('admin.users.edit', compact('user'));
    }
    //
}
