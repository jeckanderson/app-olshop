<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;

class AdminPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.pembelian.index', [
            'title' => 'Pembelian',
            'pembelians' => Pembelian::latest()->paginate(8)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        $users = DB::table('Pembelian_produks')
            ->leftJoin('Products', 'Pembelian_produks.id_produk', '=', 'Products.id_produk')
            ->where('Pembelian_produks.id_pembelian', '=', $pembelian->id_pembelian)
            ->get();

        return view('admin.pembelian.show', [
            'title' => 'Detail Pembelian',
            'pembelians' => $pembelian,
            'products' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }

    public function pembayaran($id_pembelian)
    {
        // var_dump($id);
       $pembayaran = Pembayaran::where('id_pembelian', $id_pembelian)->first();

        return view('admin.pembelian.pembayaran' ,[
            'title' => 'Halaman Pembayaran',
            'pembayaran' => $pembayaran
        ]);
    }

    public function proses(Request $request)
    {
        $product = Pembelian::where('id_pembelian', $request->id_pembelian)->first();
        
        $product->status_pembelian = $request->status;
        $product->resi_pengiriman = $request->resi;
        $product->update();

        return redirect('admin/pembelian')->with('success', "Data Pembelian terUpdate!");
    }

}
