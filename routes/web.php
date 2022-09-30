<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPelangganController;
use App\Http\Controllers\AdminPembelianController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home', [
//         'product' => Product::latest()->paginate(4)->withQueryString(),
//         'category' => Category::all(),
//         'title' => 'Halaman Home',
//         'active' => 'home'
//     ]);
// });

// Route::get('/home/show/{id}', function ($id) {
//     return view('home.show', [
//         'product' => Product::find($id),
//         'title' => 'Detail Produk',
//         'active' => 'home'
//     ]);
// });

Auth::routes();

// Route Admin
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.index')->middleware('is_admin');
// Admin Profile
Route::resource('/admin/profile', AdminProfileController::class)->middleware('auth');

Route::resource('/admin/product', AdminProductController::class)->middleware('auth');
Route::resource('/admin/pembelian', AdminPembelianController::class)->middleware('auth');
Route::get('/admin/pembelian/pembayaran/{id_pembelian}', [AdminPembelianController::class, 'pembayaran'])->middleware('auth');
Route::post('/admin/pembelian/proses/{id_pembelian}', [AdminPembelianController::class, 'proses']);
Route::resource('/admin/pelanggan', AdminPelangganController::class)->middleware('auth');
Route::get('/admin/laporan', [AdminLaporanController::class, 'index']);
Route::post('/admin/laporan/{data}', [AdminLaporanController::class, 'store']);
Route::get('/laporan/cetakpdf/{tglm}/{tgls}/{status}', [AdminLaporanController::class, 'cetakpdf']);

// Route Home User
Route::get('/home/cart', [App\Http\Controllers\ShopingCartController::class, 'cart'])->name('cart');
Route::get('/add-cart/{id_produk}', [App\Http\Controllers\ShopingCartController::class, 'addCart'])->name('add-cart');
Route::get('/home/nota/{id_pembelian}', [App\Http\Controllers\ShopingCartController::class, 'nota'])->name('nota');
Route::post('/addcart_detail/{id_produk}', [App\Http\Controllers\ShopingCartController::class, 'addcart_detail'])->name('addcart_detail');
Route::get('/check', [App\Http\Controllers\ShopingCartController::class, 'index'])->name('index')->middleware('auth');
Route::post('/checkout/{totalBelanja}', [App\Http\Controllers\ShopingCartController::class, 'checkout'])->middleware('auth');
Route::get('/home/riwayat/', [App\Http\Controllers\ShopingCartController::class, 'riwayat'])->middleware('auth');
Route::get('/home/bayar/{id_pembelian}', [App\Http\Controllers\ShopingCartController::class, 'pembayaran'])->middleware('auth');
Route::post('/home/data-nota/{id_pembelian}', [App\Http\Controllers\ShopingCartController::class, 'data_nota'])->middleware('auth');
Route::get('/home/lihat_bayar/{id_pembelian}', [App\Http\Controllers\ShopingCartController::class, 'lihat_bayar']);
Route::get('/remove/{id_produk}', [App\Http\Controllers\ShopingCartController::class, 'removeCart'])->name('remove');
// Api RajaOnkir
Route::get('/kabupaten', [App\Http\Controllers\ShopingCartController::class, 'kabupaten']);
Route::get('/ekspedisi', [App\Http\Controllers\ShopingCartController::class, 'ekspedisi']);
Route::get('/datapaket', [App\Http\Controllers\ShopingCartController::class, 'datapaket']);
// Search
// Route::get('/', [SearchController::class, 'index']);
Route::get('/search', [SearchController::class, 'index']);
// Category
Route::resource('/admin/category', CategoryController::class)->middleware('auth');
// Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home/category/{id_category}', [HomeController::class, 'kategori']);
Route::get('/home/show/{id}', [HomeController::class, 'show']);
// Route::get('/home/show', [HomeController::class, 'show']);

// Profile
Route::resource('/user/profile', ProfileController::class)->middleware('auth');

Route::get('/profile/nota/{id}', function ($id) {
     $users = DB::table('Pembelian_produks')
        ->leftJoin('Products', 'Pembelian_produks.id_produk', '=', 'Products.id_produk')
        ->where('Pembelian_produks.id_pembelian', '=', $id)
        ->get();
        // print_r($users);
    $pembelians = DB::table('pembelians')
    ->leftJoin('users', 'pembelians.user_id', '=', 'users.id')
    ->where('pembelians.id_pembelian', '=', $id)
    ->get();

    return view('profile.nota', [
        'title' => 'Nota Pembelian',
        'pembelians' => $pembelians[0],
        'products' => $users,
        'user' => Auth::user(),
    ]);

});

Route::get('/profile/bayar/{id}', function ($id) {
    $pembelians = DB::table('pembelians')->where('id_pembelian', $id)->first();
    // cek, pelanggan yang bayar harus pelanggan yang melakukan pembelian
    if($pembelians->user_id !== Auth::user()->id) {
        echo "<script>alert('Anda tidak punya hak untuk megakses halaman ini..!');</script>";
        echo "<script>location='/home/riwayat';</script>";
        exit();
    }

    return view('profile.bayar', [
        'user' => Auth::user(),
        'title' => 'Form Pembayaran',
        'pembelians' => $pembelians
    ]);
});

Route::get('/profile/lihat_bayar/{id_pembelian}', function ($id_pembelian) {
    $pembayaran = DB::table('Pembayarans')
                        ->leftJoin('Pembelians', 'Pembelians.id_pembelian', '=', 'Pembayarans.id_pembelian')
                        ->where('pembayarans.id_pembelian', '=', $id_pembelian)
                        ->get();
    // var_dump($pembayaran); die;
    // cek validasi jika belum ada data pembayaran
    if(empty($pembayaran[0])) {
        echo '<script>alert("Maaf.. Belum ada data pembayaran!");</script>';
        echo '<script>location="/profile/transaksi";</script>';
        exit();
    }
    // cek validasi jika data pelanggan yg bayat tidak sesuai dgn user yang login
    if(Auth::user()->id!==$pembayaran[0]->user_id) {
        echo '<script>alert("Maaf.. Anda tidak punya hak untuk mengakses halaman ini!");</script>';
        echo '<script>location="/profile/transaksi";</script>';
    }

    return view('profile.lihat_bayar', [
        // 'categories' => Category::all(),
        'user' => Auth::user(),
        'title' => 'Lihat Pembayaran',
        'pembayaran' => $pembayaran[0]
    ]);

});
