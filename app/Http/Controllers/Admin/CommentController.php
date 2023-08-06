<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function comment(){
        $comments = DB::table('comments')
            ->join('users','users.id','=','comments.users_id')
            ->join('products','products.id','=','comments.products_id')
            ->select('comments.*', 'products.name as prd_name', 'users.name as username')
            ->whereNull('comments.deleted_at')
            ->get();
//        dd($comments);
        return view('admin.comments.comments', compact('comments'));
    }
    public function delete($id){
        Comments::where('id', $id)->delete();
        Session::flash('success', "Success!");
        return redirect()->route('route_admin_review');
    }
    public function updateStatus($id, $status){
        if ($status == 1){
            Comments::where('id',$id)->update([
                'status'=>0
            ]);
        }else{
            Comments::where('id',$id)->update([
                'status'=>1
            ]);
        }
        Session::flash('success', "Success!");
        return redirect()->route('route_admin_review');

    }
    //
}
