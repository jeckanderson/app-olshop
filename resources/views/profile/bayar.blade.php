@extends('layouts.app')

@section('container')
<div class="content py-5">
    <div class="row pt-3">
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
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="border-bottom mb-3 text-center">
                <h4>Formulir Pembayaran</h4>
            </div>
            <div class="info1 text-center border-bottom bg-warning p-1">
                <p>Silahkan isi formulir di bawa ini<br> untuk sebagai bukti bahwa Anda sudah melakukan pembayaran<br>Terima Kasih atas kepercayaan Anda</p>
            </div>
            <div class="info2 mt-3">
                <p class="alert alert-danger">Total Tagihan Anda: <strong>Rp. {{ number_format($pembelians->total_pembelian) }}</strong></p>
            </div>
            <form action="/home/data-nota/{{ $pembelians->id_pembelian }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nama Penyetor</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bank" class="form-label">BANK</label>
                    <input type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" id="bank" value="{{ old('bank') }}">
                    @error('bank')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" min="1" id="jumlah" value="{{ old('jumlah') }}">
                    @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bukti" class="form-label">Bukti Pembayaran</label>
                    <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" name="bukti_pembayaran" id="bukti">
                    @error('bukti_pembayaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <p class="text-danger">foto bukti pembayaran harus maksimal 2MB</p>
                </div>
                <button type="submit" class="btn text-white" style="background: #157ED2"><i class="fas fa-share-square"></i> Kirim Bukti Pembayaran</button>
            </form>
        </div>
    </div>
</div>

@endsection