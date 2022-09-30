<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Pembelian;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalHarga = Pembelian::select(DB::raw("CAST(SUM(total_pembelian) as int) as total_pembelian"))
                      ->GroupBy(DB::raw("Month(created_at)"))
                      ->pluck('total_pembelian');
        $bulan = Pembelian::select(DB::raw("MONTHNAME(created_at) as bulan"))
                      ->GroupBy(DB::raw("MONTHNAME(created_at)"))
                      ->pluck('bulan');

        return view('admin.index', [
            'product' => Product::all(),
            'pembelian' => Pembelian::all(),
            'user' => User::all(),
            'totalHarga' => $totalHarga,
            'bulan' => $bulan,
            'title' => 'Dashboard'
        ]);
    }

}
