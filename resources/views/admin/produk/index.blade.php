@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        <h4>Data Produk</h4>
    </div>
    <div class="table-responsive">
        <a href="/admin/product/create" class="btn btn-sm btn-primary mb-4">Tambah Produk</a>
        {{-- Alert --}}
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- Akhir Alert --}}
        <table class="table table-bordered table-hover">
            <thead class="text-white" style="background: #495C83">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $products->firstItem() + $key }}</td>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $product->name_category }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>Rp. {{ number_format($product->harga_produk) }}</td>
                        <td>{{ $product->berat }} Gr</td>
                        <td>{{ $product->stok_produk }}</td>
                        @if ($product->foto_produk)
                            <td><img src="{{ asset('storage/' .$product->foto_produk) }}" width="60"></td>
                        @else    
                            <td><img src="https://source.unsplash.com/60x40?nature,water" class="card-img-top img-thumbnail"></td>
                        @endif
                        <td>
                            <a href="/admin/product/{{ $product->id_produk }}/edit" class="badge bg-success text-white">Update</a>
                            <form action="/admin/product/{{ $product->id_produk }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger text-white border-0" onclick="return confirm('yakin akan menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- pagination --}}
    <div>
        Showing
        {{ $products->firstItem() }}
        to
        {{ $products->lastItem() }}
        of
        {{ $products->total() }}
        entries
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $products->links() }}
    </div>
@endsection