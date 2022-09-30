@extends('layouts.app')

@section('container')
<div class="content py-5">
    <div class="row pt-2">
        <div class="col-md-3 col-md-pull-9">
            {{-- Awal Sidebar Kategory --}}
            <div class="card">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white">
                        <i class="fa fa-bars text-white"></i> Kategori
                    </h5>
                </div>
                <div class="list-group">
                    @foreach($category as $kategori)
                        <a href="" class="list-group-item"><i class="fa fa-chevron-circle-right"></i> {{ $kategori->name_category }}</a>
                    @endforeach
                </div>
            </div>
            {{-- Akhir Sidebar Kategory --}}
            @include('sidebar.p_terlaris')
            {{-- @include('sidebar.testimoni') --}}
        </div>
        <div class="col-md-9 mt-1">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5><i class="fas fa-shopping-cart"></i> Keranjang Belanja</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-white" style="background: #182747">
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th>Jumlah</th>
                                    <th>Subharga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp

                                @if(session('cart'))
                                    @foreach(session('cart') as $id_produk => $produk)
                                    @php  
                                        $product = DB::table('Products')->where('id_produk', $id_produk)->first();
                                        $subHarga = $product->harga_produk*$produk['quantity'];
                                    @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->nama_produk }}</td>
                                            <td>Rp. {{ number_format($product->harga_produk) }}</td>
                                            <td>{{ $product->berat }} .Gr</td>
                                            <td>{{ $produk['quantity'] }}</td>
                                            <td>Rp. {{ number_format($subHarga) }}</td>
                                            <td>
                                                <a href="/remove/{{ $id_produk }}" onclick="return confirm('apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    @php
                        if(empty(session('cart')) || !(session('cart'))) {
                            echo "<script>alert('Keranjang Belanja kosong, Belanja Dulu!')</script>";
                            echo "<script>location='/'</script>";
                        }
                    @endphp
                    <a href="/" class="btn btn-sm text-white" style="background: #182747"><i class="fas fa-angle-double-left"></i> Belanja Lagi</a>
                    <a href="/check" class="btn btn-sm text-white" style="background: #182747"><i class="fas fa-angle-double-right"></i> Continue</a>
                </div>
            </div>
            <div class="info mt-2">
                @if(session()->has('success'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
   
@endsection

{{-- tidak ada kekuatan jadi kita harap Tuhan saja --}}