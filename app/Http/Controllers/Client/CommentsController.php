<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function comment(Request $request){
        if ($request->isMethod('POST')){
            $comments = Comments::create([
                    'products_id'=>$request->prd_id,
                    'users_id'=>Auth::user()->id,
                    'content'=>$request->content_comment
            ]
            );
            if ($comments->id){
                return redirect()->route('route_client_productsDetail', ['id'=>$request->prd_id]);
            }
        }
    }
    //
}
