<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ongkir;
use App\Models\Product;
use App\Models\Category;
use App\Models\Pembelian;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Pembelian_produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class ShopingCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $dataProvinsi = RajaOngkir::provinsi()->all();

        return view('ongkir.checkout', [
            'ongkir' => Ongkir::all(),
            'category' => Category::all(),
            'title' => 'Checkout Page',
            'provinces' => $dataProvinsi,
            // 'kab' => $kabupaten
        ]);
    }

    public function kabupaten(Request $request)
    {
        // $kabupaten = Http::withHeaders(['key' => '8cf66f3be90866e7e8bc3bd60a1880d7'])
        //                  ->get("https://api.rajaongkir.com/starter/city?province=$id_provinsi");
        // $dataKabupaten = $kabupaten['rajaongkir']['results'];

        // $html = '';
        $dataKabupaten = RajaOngkir::kota()->dariProvinsi($request->id_provinsi)->get();
        // return response()->json($dataKabupaten, true);

        // echo "<option value=''>-Pilih Kabupaten-</option>";
        // foreach($dataKabupaten as $key => $kabupaten) {
        //     $html.= '<option value="'.$kabupaten["city_id"].'">'.$kabupaten["city_name"].'</option>';
        // }
        //  return response()->json($html);

        echo "<option value=''>-Pilih Kabupaten-</option>";
        foreach($dataKabupaten as $key => $per_district) {
            echo "<option value=''
                    id_distrik='".$per_district["city_id"]."'
                    nama_province='".$per_district["province"]."'
                    nama_distrik='".$per_district["city_name"]."'
                    type_distrik='".$per_district["type"]."'
                    kodepos='".$per_district["postal_code"]."' >";
            echo $per_district["type"] ." ";
            echo $per_district["city_name"];
            echo "</option>";
        }
        // return response()->json($per_district);

    }

    public function ekspedisi(Request $request)
    {   
        $html = '';
        $html.= '<option value="">-Pilih Ekspedisi-</option>
                 <option value="jne">JNE</option>
                 <option value="tiki">TIKI</option>
                 <option value="pos">POS Indonesia</option>';
        return response()->json($html);
        // response()->json($html)
    }

    public function datapaket(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => 501,     // ID kota/kabupaten asal
            'destination'   => $request->distrik,      // ID kota/kabupaten tujuan
            'weight'        => $request->berat,    // berat barang dalam gram
            'courier'       => $request->ekspedisi    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        $paket = $cost["0"]["costs"];

        echo "<option value=''>--Pilih Paket--</option>";
        foreach ($paket as $key => $per_paket) {
                echo "<option
                    paket='".$per_paket["service"]."'
                    ongkir='".$per_paket["cost"]["0"]["value"]."'
                    etd='".$per_paket["cost"]["0"]["etd"]."' >";
                echo $per_paket["service"]." ";
                echo number_format($per_paket["cost"]["0"]["value"])." ";
                echo $per_paket["cost"]["0"]["etd"];
                echo "</option>";
        }

    }


    public function cart()
    {
        return view('home.cart', [
            'category' => Category::all(),
            'title' => 'Keranjang Belanja'
        ]);
        
    }
    public function riwayat()
    {
            $id = Auth::user()->id;
            $pembelians = DB::table('Pembelians')->where('user_id', $id)->get();

        return view('home.riwayat', [
            'title' => 'Riwayat Pelanggan',
            'pembelians' => $pembelians
        ]);
    }

    public function addCart($id_produk)
    {
        $product = Product::find($id_produk);
        // dd($product);
        $cart = session()->get('cart');

        if(isset($cart[$product->id_produk])) {
            $cart[$product->id_produk]['quantity']++;
            session()->put('cart', $cart);
            return redirect('home/cart')->with('success', "Produk Telah masuk ke Keranjang Belanja!");
        }

        $cart[$id_produk] = [
            'nama_produk'   => $product->nama_produk,
            'harga_produk'  => $product->harga_produk,
            'berat'         => $product->berat,
            'foto_produk'   => $product->foto_produk,
            'quantity'      => 1
        ];
        // var_dump($cart); die;
        session()->put('cart', $cart);
        return redirect('home/cart')->with('success', "Produk Telah masuk ke Keranjang Belanja!");

    }


    public function addcart_detail(Request $request) {
        // dd($request->id_produk); die;
        // dd($request->jumlah); die;
        $request->validate([
            'jumlah' => 'required'
        ]);

        if($request->id_produk and $request->jumlah)
        {
            $cart = session()->get('cart');
            $cart[$request->id_produk]['quantity'] = $request->jumlah;
            session()->put('cart', $cart);
            return Redirect::to('home/cart')->with('success', "Produk telah masuk ke keranjang belanja!");
        }
    }

    public function checkout(Request $request, $totalBelanja)
    {   
        // dd($request->estimasi);
        $pembelian = $request->validate([
            // 'id_ongkir' => 'required',
            'alamat_pengiriman' => 'required',
        ]);

        // $ongkir = Ongkir::where('id_ongkir', $request->id_ongkir)->first();
        $tanggal = Carbon::now();

        // simpan data ke tabel Pembelian
        $pembelian = new Pembelian();
        $pembelian->user_id = Auth::user()->id;
        // $pembelian->id_ongkir = $request->id_ongkir;
        $pembelian->tanggal_pembelian = $tanggal;
        $pembelian->total_pembelian = $totalBelanja+$request->ongkir;
        // $pembelian->nama_kota = $ongkir->nama_kota;
        // $pembelian->tarif = $ongkir->tarif;
        $pembelian->alamat_pengiriman = $request->alamat_pengiriman;
        $pembelian->totalberat = $request->total_berat;
        $pembelian->provinsi = $request->provinsi;
        $pembelian->kabupaten = $request->kabupaten;
        $pembelian->tipe = $request->tipe;
        $pembelian->kodepos = $request->kodepos;
        $pembelian->ekspedisi = $request->ekspedisi;
        $pembelian->paket = $request->paket;
        $pembelian->ongkir = $request->ongkir;
        $pembelian->estimasi = $request->estimasi;
        $pembelian->save();
        
        // simpan data ke tabel Pembelian_produk
        if(session('cart')) {
            foreach (session('cart') as $id_produk => $data)
            {   
                $product = Product::where('id_produk', $id_produk)->first();

                $pembelian_produk = new Pembelian_produk();
                $pembelian_produk->id_pembelian = $pembelian->id_pembelian;
                $pembelian_produk->id_produk = $id_produk;
                $pembelian_produk->jumlah = $data['quantity'];
                $pembelian_produk->nama = $product->nama_produk;
                $pembelian_produk->harga = $product->harga_produk;
                $pembelian_produk->berat = $product->berat;
                $pembelian_produk->subberat = $product->berat*$data['quantity'];
                $pembelian_produk->subharga = $product->harga_produk*$data['quantity'];
                $pembelian_produk->save();

                //skript update stok
                $product->stok_produk = $product->stok_produk-$data['quantity'];
                $product->update();
            }
        }
        // setelah data belanja masuk ke dalam database, makan keranjang belanja di hapus 
        session()->forget('cart');
        return Redirect::to('home/nota/'.$pembelian->id_pembelian)->with('success', "Pembelian Sukses!");
    }

    public function removeCart($id_produk)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id_produk])) {
            unset($cart[$id_produk]);
            session()->put('cart', $cart);
        }
        return redirect('home/cart')->with('success', "Produk di Hapus dari Keranjang Belanja");
    }

    public function nota($request)
    {
        // $request->id_pembelian;
        $users = DB::table('Pembelian_produks')
        ->leftJoin('Products', 'Pembelian_produks.id_produk', '=', 'Products.id_produk')
        ->where('Pembelian_produks.id_pembelian', '=', $request)
        ->get();
        // print_r($users);

        $pembelians = DB::table('pembelians')
        ->leftJoin('users', 'pembelians.user_id', '=', 'users.id')
        ->where('pembelians.id_pembelian', '=', $request)
        ->get();

        return view('home.nota', [
            'title' => 'Nota Pembelian',
            'pembelians' => $pembelians[0],
            'products' => $users,
        ]);
    }


    public function pembayaran($request)
    {
        // dd($request);
        $pembelians = DB::table('pembelians')->where('id_pembelian', $request)->first();
        // cek, pelanggan yang bayar harus pelanggan yang melakukan pembelian
        if($pembelians->user_id !== Auth::user()->id) {
            echo "<script>alert('Anda tidak punya hak untuk megakses halaman ini..!');</script>";
            echo "<script>location='/home/riwayat';</script>";
            exit();
        }

        return view('home.bayar', [
            'categories' => Category::all(),
            'title' => 'Form Pembayaran',
            'pembelians' => $pembelians
        ]);
    }

    public function data_nota(Request $request)
    {
        $pembelians = DB::table('pembelians')->where('id_pembelian', $request->id_pembelian)->first();
        // dd($pembelians->id_pembelian);
       $validatedData =  $request->validate([
            'name' => 'required',
            'bank' => 'required',
            'jumlah' => 'required',
            'bukti_pembayaran' => 'required|image|file|max:1024'
        ]);

        $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bayar-img');
        // tanggal
        $tanggal = date("y-m-d");
        // var_dump($tanggal); die;

        // setelah simpan data pembayaran ke tabel pembayara
        $pembelian = new Pembayaran();
        $pembelian->id_pembelian = $pembelians->id_pembelian;
        $pembelian->name = $validatedData['name'];
        $pembelian->bank = $validatedData['bank'];
        $pembelian->jumlah = $validatedData['jumlah'];
        $pembelian->tanggal = $tanggal;
        $pembelian->bukti_pembayaran = $validatedData['bukti_pembayaran'];
        $pembelian->save();

        // update data pembayara dari pending menjadi sudah kirim pembayaran
        Pembelian::where('id_pembelian', $pembelians->id_pembelian)->update(['status_pembelian' => 'sudah kirim pembayaran']);

        return Redirect::to('home/riwayat')->with('success', "Terima kasih suda melakukan pembayaran!");
    }

    public function lihat_bayar($id_pembelian)
    {   
        // $pembayaran = Pembayaran::where('id_pembelian', $id_pembelian)->get();
        $pembayaran = DB::table('Pembayarans')
                        ->leftJoin('Pembelians', 'Pembelians.id_pembelian', '=', 'Pembayarans.id_pembelian')
                        ->where('pembayarans.id_pembelian', '=', $id_pembelian)
                        ->get();
        // var_dump($pembayaran); die;
        // cek validasi jika belum ada data pembayaran
        if(empty($pembayaran[0])) {
            echo '<script>alert("Maaf.. Belum ada data pembayaran!");</script>';
            echo '<script>location="/home/riwayat";</script>';
            exit();
        }
        // cek validasi jika data pelanggan yg bayat tidak sesuai dgn user yang login
        if(Auth::user()->id!==$pembayaran[0]->user_id) {
            echo '<script>alert("Maaf.. Anda tidak punya hak untuk megakses halaman ini!");</script>';
            echo '<script>location="/home/riwayat";</script>';
        }

        return view('home.lihat_bayar', [
            'categories' => Category::all(),
            'title' => 'Lihat Pembayaran',
            'pembayaran' => $pembayaran[0]
        ]);
    }

    

}
