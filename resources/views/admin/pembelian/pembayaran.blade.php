@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        <h4>Data Pembayaran</h4>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <div class="card mb-3">
                <div class="card-header text-center text-white" style="background: #157ED2">
                    <h5>Bukti Pembayaran Pelanggan</h5>
                </div>
                <div class="card-body">
                    <div class="title mb-1">
                        <div class="header text-center border-bottom py-3">
                            <div style="font-size: 10px; font-style: italic;">Note: Bukti Pembayaran Pelanggan Berupa Gambar di Bawa ini</div>
                            <div class="border">
                                <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" class="card-img-top img-fluid">
                            </div>
                            <h4 class="mt-3"><strong>Nama: <div class="text-danger d-inline-block">{{ $pembayaran->name }}</div> </strong></h4>
                            {{-- <p class="d-inline">Member Sience</p>: {{ $admin->created_at->diffForHumans() }} --}}
                        </div>
                        <div class="header-title border-bottom p-2">
                            <p class="m-0 p-0"> <strong>BANK</strong></p>
                            <div class="text-danger">{{ $pembayaran->bank }}</div>
                        </div>
                        <div class="header-title border-bottom p-2">
                            <p class="m-0 p-0"> <strong>Jumlah</strong></p>
                            <div class="text-danger">Rp. {{ number_format($pembayaran->jumlah) }}</div>
                        </div>
                        <div class="header-title border-bottom p-2 mb-3">
                            <p class="m-0 p-0"><strong>Tanggal Pembayaran</strong></p>
                            <div class="text-danger">{{ date("d F Y", strtotime($pembayaran->tanggal)) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-6 mb-5">
            <div class="card">
                <div class="card-header text-white text-center" style="background: #157ED2">
                    <h5>Admin: Proses Resi Pengiriman</h5>
                </div>
                <div class="card-body">
                    <form action="/admin/pembelian/proses/{{ $pembayaran->id_pembelian }}" method="post">
                        @csrf
                       <div class="form-group">
                            <label for="resi">No Resi Pengiriman</label>
                            <input type="text" class="form-control" name="resi" id="resi">
                       </div>
                       <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" name="status">
                                <option value="">-Pilih Status-</option>
                                <option value="lunas">Lunas</option>
                                <option value="barang dikirim">Barang Dikirim</option>
                                <option value="batal">Batal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="proses"><i class="fa-brands fa-telegram"></i> Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection



    


