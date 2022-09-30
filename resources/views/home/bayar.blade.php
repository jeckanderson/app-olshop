@extends('layouts.app')

@section('container')
<div class="content py-5">
    <div class="row pt-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white">
                        <i class="fa fa-bars text-white"></i> Kategori
                    </h5>
                </div>
                <div class="list-group">
                    @foreach($categories as $kategori)
                        <a href="" class="list-group-item"><i class="fa fa-chevron-circle-right"></i> {{ $kategori->name_category }}</a>
                    @endforeach
                </div>
            </div>
            @include('sidebar.p_terlaris')
            {{-- @include('sidebar.testimoni') --}}
        </div>
        <div class="col-md-9">
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