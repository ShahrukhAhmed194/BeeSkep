<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $infos = Product::all();

        return view('product',['products' => $infos]);
    }

    public function detail($id){

        $info = Product::find($id);

        return view('detail',['product' => $info]);
    }

    public function search(Request $request){

        $data = Product::where('name','like', '%'.$request->input('query').'%')
        ->get();

        return view('search',['products'=>$data]);
    }
}
