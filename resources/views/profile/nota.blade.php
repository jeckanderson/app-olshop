@extends('layouts.app')

@section('container')
<div class="content py-5">
    <div class="row mt-3">
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header text-center text-white" style="background: #157ED2">
                    <h5><i class="far fa-user-circle"></i> User Profile</h5>
                </div>
                <div class="card-body">
                    <div class="title mb-1">
                        <div class="header text-center border-bottom p-2">
                            <img src="{{ asset('templates/vendor/img/user-icon.png') }}" class="card-img-top img-fluid rounded-circle" style="width: 150px">
                            <h2>{{ $user->name }}</h2>
                            <p class="d-inline">Member Sience</p>: {{ $user->created_at->diffForHumans() }}
                        </div>
                        <div class="header-title border-bottom p-2">
                            <p class="m-0 p-0"><i class="fas fa-map-marker-alt"></i> <strong>Alamat</strong></p>
                            {{ $user->alamat_user }}
                        </div>
                        <div class="header-title border-bottom p-2">
                            <p class="m-0 p-0"><i class="fas fa-envelope"></i> <strong>Email</strong></p>
                            {{ $user->email }}
                        </div>
                        <div class="header-title border-bottom p-2 mb-3">
                            <p class="m-0 p-0"><i class="fas fa-phone-alt"></i> <strong>No Telpon</strong></p>
                            {{ $user->telepon }}
                        </div>
                        <a href="/user/profile/{{ $user->id }}/edit" class="btn btn-sm d-block text-white" style="background: #157ED2"><i class="far fa-edit"></i> Ubah Profile</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            {{-- pengecekan jika id pembelian tidak sama denga user yg lagi login maka akan di rediret ke halaman riwayat lagi --}}
            @php
                if($pembelians->id !== Auth::user()->id) {
                    echo "<script>alert('Anda tidak punya hak untuk megakses halaman ini..!');</script>";
                    echo "<script>location='/profile/transaksi';</script>";
                    exit();
                }
            @endphp
            <div class="info">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="border-bottom mb-3 text-center">
                    <h4>Nota Pembelian</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h4>Pembelian</h4>
                            <strong>No. Pembelian {{ $pembelians->id_pembelian }}</strong><br>
                            Tanggal: {{ $pembelians->tanggal_pembelian }}<br>
                            Total: Rp. {{ number_format($pembelians->total_pembelian) }}<br>
                            Status Pembelian: <div class="badge bg-danger">{{ $pembelians->status_pembelian }}</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4>Pelanggan</h4>
                            <i class="fas fa-user"></i> <strong>{{ $pembelians->name }}</strong> <br>
                            <i class="fas fa-envelope"></i> {{ $pembelians->email }}<br>
                            <i class="fas fa-phone"></i> {{ $pembelians->telepon }}
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4>Pengiriman</h4>
                            <i class="far fa-building"></i> <strong>{{ $pembelians->kabupaten }}</strong><br>
                            <i class="fas fa-file-invoice-dollar"></i> Ongkos Kirim: {{ number_format($pembelians->ongkir) }}<br>
                            <i class="fas fa-hourglass-half"></i> Ekspedisi: {{ $pembelians->ekspedisi }}, {{ $pembelians->paket }} {{ $pembelians->estimasi }} hari<br>
                            <i class="fas fa-map-marker"></i> Alamat Pengiriman: {{ $pembelians->alamat_pengiriman }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover border-top mb-3 table-bordered">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Berat</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">SubBerat</th>
                                    <th scope="col">SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->nama }}</td>
                                        <td>Rp. {{ number_format($product->harga) }}</td>
                                        <td>{{ $product->berat }} Gr.</td>
                                        <td>{{ $product->jumlah }}</td>
                                        <td>{{ $product->subberat }} Gr.</td>
                                        <td>Rp. {{ number_format($product->subharga) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="alert alert-warning text-center">
                        <p>
                            <div>Silahkan melakukan pembayaran dengan nominal <strong>Rp. {{ number_format($pembelians->total_pembelian) }}</strong> ke <br>
                            <strong class="d-block">BANK MANDIRI 154-001211-98934 (AN. Jeck Risen)</strong></div>
                            <div>setelah melakukan pembayaran, silahkan melakukan konfirmasi<br>
                            proses pengiriman barang akan dilakukan 1X24 jam<br> setelah konfirmasi,<br>
                            Terimakasih<br><br></div>
                            Jeck Risen
                        </p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection