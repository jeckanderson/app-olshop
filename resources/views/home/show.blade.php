@extends('layouts.app')

@section('container')
<div class="content py-5">
    <div class="row pt-3">
        {{-- <div class="col-md-3">
            @include('sidebar.kategori')
        </div> --}}
        <div class="col-md-5 mb-2">
            <div class="card">
                <div class="body">
                    <div class="row">
                        @if($product->foto_produk)
                            <img src="{{ asset('storage/' . $product->foto_produk) }}" class="rounded mx-auto" style="width: 600px; height: 560px;">
                        @else
                            <img src="https://source.unsplash.com/600x500?nature,water" class="img-thumbnail">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <h4>{{ $product->nama_produk }}</h4>
            <h5>Rp. {{ number_format($product->harga_produk) }}</h5>
            <h6>Stok: {{ $product->stok_produk > 0 ? $product->stok_produk : 'Stok Habis' }}</h6>
            <form action="{{ route('addcart_detail', [$product->id_produk]) }}" method="post">
                @csrf
                <input type="hidden" value="{{ $product->nama_produk }}" name="nama_produk">
                <input type="hidden" value="{{ $product->harga_produk }}" name="harga_produk">
                <input type="hidden" value="{{ $product->berat }}" name="berat">
                <input type="hidden" value="{{ $product->foto_produk }}" name="foto_produk">
                <div class="input-group mb-3">
                    <input type="number" name="jumlah" min="1" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukan jumlah pembelian" max="{{ $product->stok_produk }}">
                    <button class="btn btn-primary" name="beli" type="submit" id="button-addon2"><i class="fas fa-shopping-cart"></i> Beli</button>
                </div>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </form>
            <div class="card">
                <div class="card-header">
                    <h4>Deskripsi Produk</h4>
                </div>
                <div class="card-body">
                    <p>{!! $product->deskripsi_produk !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection