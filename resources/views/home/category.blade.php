@extends('layouts.app')

@section('container')
<div class="container pt-5">
    <div class="row mt-3">
        {{-- Awal Kategory dan Produk Terlaris --}}
        <div class="col-md-3 col-md-pull-9">
            {{-- Awal Sidebar Kategory --}}
            @include('sidebar.kategori')
            {{-- <div class="card">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white">
                        <i class="fa fa-bars text-white"></i> Kategori
                    </h5>
                </div>
                <div class="list-group">
                    @foreach($category as $kategori)
                      <a href="/home/category/{{ $kategori->name_category }}" class="list-group-item"><i class="fa fa-chevron-circle-right"></i> {{ $kategori->name_category }}</a>
                    @endforeach
                </div>
            </div> --}}
            {{-- Akhir Sidebar Kategory --}}

            {{-- Awal Sidebar Produk terlaris --}}
            @include('sidebar.p_terlaris')
            {{-- Akhir Sidebar Produk terlaris --}}
        </div>
        {{-- Akhir Kategory dan Produk Terlaris --}}
        <div class="col-md-9 mb-2">
            <div class="card">
                <div class="card-header">
                    @if(!empty($categories[0]))
                        <h5>{{ $categories[0]->name_category }}</h5>
                    @else
                        <div class="text-danger"><h5><strong>Kategori tidak ada!</strong></h5></div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $item)
                            <div class="col-md-3 mb-2">
                                <div class="card">
                                    @if ($item->foto_produk)
                                        <img src="{{ asset('storage/' . $item->foto_produk) }}" class="card-img-top img-thumbnail" style="width: 405; height: 400;">
                                    @else    
                                        <img src="https://source.unsplash.com/400x400?nature,clothes" class="card-img-top img-thumbnail">
                                    @endif
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $item->nama_produk }}</h5>
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
</div>
@endsection