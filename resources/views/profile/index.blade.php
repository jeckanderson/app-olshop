@extends('layouts.app')

@section('container')
<div class="content pt-5">
    <div class="row mt-3">
       <div class="container">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
       </div>
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
            @include('profile.transaksi')
            {{-- <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-history"></i> History Transaksi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead thead class="bg-secondary text-white table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total Pembelian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataPembeli as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date("d F Y", strtotime($item->tanggal_pembelian)) }}</td>
                                        <td>
                                            <div class="text-danger">{{ $item->status_pembelian }}</div>
                                                @if (!empty($item->resi_pengiriman))
                                                    Resi: {{ $item->resi_pengiriman }}
                                                @endif
                                        </td>
                                        <td>Rp. {{ number_format($item->total_pembelian) }}</td>
                                        <td>
                                            <a href="/profile/nota/{{ $item->id_pembelian }}" class="btn btn-danger btn-sm text-white">Nota</a>
                                            @if ($item->status_pembelian=='pending')
                                                <a href="/profile/bayar/{{ $item->id_pembelian }}" class="btn btn-success btn-sm">Input Pembayaran</a>
                                            @else
                                                <a href="/profile/lihat_bayar/{{ $item->id_pembelian }}" class="btn btn-warning btn-sm">Lihat Pembayaran</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $dataPembeli->links() }}
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection