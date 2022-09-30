@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        <h4>Detail Pembelian</h4>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h5 class="text-danger">Pembelian</h5>
            <strong>Status: &nbsp&nbsp&nbsp{{ $pembelians->status_pembelian }}</strong><br>
            <p>
                Tanggal: &nbsp{{ date("d F Y", strtotime($pembelians->tanggal_pembelian)) }}<br>
                Total: &nbsp&nbsp&nbsp&nbsp&nbsp Rp. {{ number_format($pembelians->total_pembelian) }}
            </p>
        </div>
        <div class="col-md-4">
            <h5 class="text-danger">Pelanggan</h5>
            <strong>Nama: &nbsp&nbsp&nbsp&nbsp{{ $pembelians->user->name }}</strong><br>
            <p>
                Email: &nbsp&nbsp&nbsp&nbsp&nbsp{{ $pembelians->user->email }}<br>
                Telepon: &nbsp{{ $pembelians->user->telepon }}
            </p>
        </div>
        <div class="col-md-4">
            <h5 class="text-danger">Pengiriman</h5>
            <strong>Kota: &nbsp&nbsp&nbsp&nbsp&nbsp{{ $pembelians->kabupaten }}</strong><br>
            <p>
                Tarif: &nbsp&nbsp&nbsp&nbsp&nbsp Rp. {{ number_format($pembelians->ongkir) }}<br>
                Alamat: &nbsp{{ $pembelians->alamat_pengiriman }}<br>
            </p>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="text-white" style="background: #495C83">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">SubTotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>Rp. {{ number_format($product->harga_produk) }}</td>
                        <td>{{ $product->jumlah }}</td>
                        <td>Rp. {{ number_format($product->harga_produk*$product->jumlah) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection