@extends('layouts.app')

@section('container')
<div class="row pt-5">
    <div class="col-md-3 pt-2">
        <div class="card">
            <div class="card-header bg-danger">
                <h5 class="card-title text-white">
                    <i class="fa fa-bars text-white"></i> Kategori
                </h5>
            </div>
            <div class="list-group">
                @foreach($categories as $kategori)
                    <a href="/home/category/{{ $kategori->id_category }}" class="list-group-item"><i class="fa fa-chevron-circle-right"></i> {{ $kategori->name_category }}</a>
                @endforeach
            </div>
        </div>
        @include('sidebar.p_terlaris')
    </div>
    <div class="col-md-9 pt-2">
        <div class="card">
            <div class="card-header bg-secondary">
                <h5 class="text-white">Hasil Pencarian: {{ $request->keyword }}</h3>
            </div>
            @if(empty($product[0]))
                <div class="alert alert-danger mt-2">Produk <strong>{{ $request->keyword }}</strong> tidak di temukan</div>
            @endif
            <div class="card-body">
                <div class="row">
                    @foreach ($product as $item)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                {{-- {{ asset('storage/' . $item->foto_produk) }} --}}
                                {{-- style="width: 18rem; height: 17rem;" --}}
                                @if ($item->foto_produk)
                                    <img src="{{ asset('storage/' . $item->foto_produk) }}" class="card-img-top img-thumbnail" style="width: 405; height: 400;">
                                @else    
                                    <img src="https://source.unsplash.com/405x400?nature,water" class="card-img-top img-thumbnail">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title m-0 p-0">{{ $item->nama_produk }}</h5>
                                    <p class="card-text">Rp. {{ number_format($item->harga_produk) }}</p>
                                    <input type="hidden" value="{{$item->berat}}">
                                    <a href="/add-cart/{{ $item->id_produk }}" class="btn btn-sm btn-success"><i class="fas fa-shopping-cart"></i> Beli</a>
                                    <a href="/home/show/{{ $item->id_produk }}" class="btn btn-sm btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
