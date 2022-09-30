<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    //    dd($request->keyword);
       $product = Product::latest();

       if($request->keyword) {
            $product->where('nama_produk', 'like', '%' . $request->keyword . '%')
                    ->orWhere('deskripsi_produk', 'like', '%' . $request->keyword . '%');
       }

       return view('home.search', [
            'title' => 'Search',
            'product' => $product->get(),
            'request' => $request,
            'categories' => Category::all()
       ]);
    }
}
