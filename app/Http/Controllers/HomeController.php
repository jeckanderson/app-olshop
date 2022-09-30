<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'product' => Product::all(),
            'category' => Category::all(),
            'title' => 'Home Page',
            'active' => 'home'
        ]);
    }

    public function kategori($id_category)
    {
        $data =  Product::join('categories', 'categories.id_category', '=', 'products.id_category')
                ->where('products.id_category','=',$id_category)
                ->get();

        return view('home.category', [
            'title' => 'Kategori Produk',
            'categories' => $data,
            'category' => Category::all(),
        ]);
    }


    public function show($id)
    {
        return view('home.show', [
            'product' => Product::find($id),
            'title' => 'Detail Produk',
            'active' => 'home'
        ]);
    }

}
