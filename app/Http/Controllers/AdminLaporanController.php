<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class AdminLaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('admin.laporan.index', [
            'title' => 'Laporan Pembelian'
        ]);
    }

    public function store(Request $request)
    {
        $allData = [];
        $tglm = $request->tglm;
        $tgls = $request->tgls;
        // $status = "";
        $status = $request->status_pembelian;
        $data =  Pembelian::join('users', 'users.id', '=', 'pembelians.user_id')
                            ->whereBetween('pembelians.tanggal_pembelian', [$tglm,$tgls])
                            ->where('pembelians.status_pembelian','=',$status)
                            ->get();
        foreach($data as $dat) {
            $allData[]=$dat;
        }

        return view('admin.laporan.index', [
            'title' => 'Laporan Pembelian',
            'allData' => $allData,
            'tglm' => $tglm,
            'tgls' => $tgls,
            'status' => $status
        ]);
    }

    public function cetakpdf($tglm, $tgls, $status)
    {
        $semuaData = [];
        $data =  Pembelian::join('users', 'users.id', '=', 'pembelians.user_id')
                ->whereBetween('pembelians.tanggal_pembelian', [$tglm,$tgls])
                ->where('pembelians.status_pembelian','=',$status)
                ->get();
                
        foreach($data as $dat) {
            $semuaData[]=$dat;
        }
        
        $html = view('cetaklaporan', [
            'title' => 'Halaman Cetak Laporan',
            'allData' => $semuaData,
            'tglm' => $tglm,
            'tgls' => $tgls,
        ]);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream('laporan-penjualan.pdf');
    }

}
