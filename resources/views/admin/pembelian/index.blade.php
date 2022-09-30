@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        <h4>Data Pembelian</h4>
    </div>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="text-white" style="background: #495C83">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Tanggal Pembelian</th>
                    <th scope="col">Status Pembelian</th>
                    <th scope="col">Total Pembelian</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelians as $key => $pembelian)
                    <tr>
                        <td>{{ $pembelians->firstItem() + $key }}</td>
                        <td>{{ $pembelian->user->name }}</td>
                        <td>{{ date("d F Y", strtotime($pembelian->tanggal_pembelian)) }}</td>
                        <td>{{ $pembelian->status_pembelian }}</td>
                        <td>Rp. {{ number_format($pembelian->total_pembelian) }}</td>
                        <td>
                            <a href="/admin/pembelian/{{ $pembelian->id_pembelian }}" class="badge bg-success text-white">Detail</a>
                            @php
                                if($pembelian->status_pembelian!=='pending') {
                                    echo "<a href='/admin/pembelian/pembayaran/$pembelian->id_pembelian' class='badge bg-danger text-white'>Pembayaran</a>";
                                }   
                            @endphp
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- pagination --}}
    <div class="pull-left">
        Showing
        {{ $pembelians->firstItem() }}
        on
        {{ $pembelians->lastItem() }}
        of
        {{ $pembelians->total() }}
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $pembelians->links() }}
    </div>

@endsection