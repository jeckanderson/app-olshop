@extends('layouts.app')

@section('container')
   <div class="container pt-5">
    <div class="row py-3">
        <div class="col-md-4">
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
            <div class="card">
                <div class="card-header"><h5><i class="fas fa-history"></i> Riwayat Belanja: {{ $pembayaran->name }}</h5></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $pembayaran->name }}</td>
                        </tr>
                        <tr>
                            <th>BANK</th>
                            <td>{{ $pembayaran->bank }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ date("d F Y", strtotime($pembayaran->tanggal)) }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>Rp. {{ number_format($pembayaran->jumlah) }}</td>
                        </tr>
                        <tr>
                            <th>Bukti Pembayaran</th>
                            <td>
                                <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="bukti pembayaran" class="img-reponsive img-fluid rounded mx-auto img-thumbnail" width="50%">
                            </td>
                        </tr>
                    </table>
                    {{-- <div class="info">
                        <h6>Bukti Pembayaran</h6>
                        <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="" class="img-reponsive img-fluid rounded mx-auto img-thumbnail">
                    </div> --}}
                </div>
            </div>
        </div>
   </div>
</div>
@endsection