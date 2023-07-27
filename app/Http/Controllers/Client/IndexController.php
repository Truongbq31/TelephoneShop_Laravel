<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banners;
use App\Models\Admin\Categories;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Categories::all();
        $banners = Banners::all();
//        dd($banners);
//        dd($categories);
        return view('client.index', compact('categories', 'banners'));
    }
    //
}
