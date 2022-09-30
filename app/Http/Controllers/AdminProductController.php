<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('products')
                    ->leftJoin('categories', 'products.id_category', '=', 'categories.id_category')
                    ->paginate(5)->withQueryString();
        // paginate(5)->withQueryString()
        return view('admin.produk.index', [
            'title' => 'Produk',
            'products' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('admin.produk.create', [
            'title' => 'Tambah Produk',
            'categories' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('foto_produk')->store('produk-img');
        // $data = $request->file('foto_produk');
        // dd($data[0]);
        // var_dump($request->foto_produk[0]); die;
        $validatedData = $request->validate([
            'id_category' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'berat' => 'required',
            'foto_produk' => 'image|file|max:1024',
            'deskripsi_produk' => 'required',
            'stok_produk' => 'required'
        ]);
        // jika request dari file gambar ada isinya
        if($request->file('foto_produk')) {
            $validatedData['foto_produk'] = $request->file('foto_produk')->store('produk-img');
        }
        // dd($validatedData[0]); die;

        Product::create($validatedData);
        // $images = $request->file('foto_produk');
        // foreach($images as $key => $ambil_nama) {
        //     $lokasi =
        // }

        return redirect('/admin/product')->with('success', 'Data Produk Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('detail.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.produk.edit', [
            'title' => 'Ubah Produk',
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'id_category' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'berat' => 'required',
            'foto_produk' => 'image|file|max:1024',
            'deskripsi_produk' => 'required',
            'stok_produk' => 'required'
        ];

        $validatedData = $request->validate($rules);
        // jika request dari file itu ada isinya. cek image ada atau tidak
        if($request->file('foto_produk')) {
            // hapus gambar jika ada gambar lama
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            // kalau ada gambar baru yg di upload, gambar lama akan di timpah
            $validatedData['foto_produk'] = $request->file('foto_produk')->store('produk-img');
        }

        Product::where('id_produk', $product->id_produk)
                ->update($validatedData);

        return redirect('/admin/product')->with('success', 'Data produk Berhasil di Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // hapus file gambar
        if($product->foto_produk) {
            Storage::delete($product->foto_produk);
        }
        // delete di tabel
        Product::destroy($product->id_produk);
        // kembalikan ke halaman product
        return redirect('/admin/product')->with('success', 'Data Product Berhasil di Hapus!');
    }
}
