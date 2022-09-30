@extends('layouts.app')

@section('container')
<div class="content py-5">
    <div class="row pt-3">
        <div class="col-md">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5><i class="fas fa-history"></i> Riwayat Belanja: {{ auth()->user()->name }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead thead class="bg-secondary text-white table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total Pembelian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembelians as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date("d F Y", strtotime($item->tanggal_pembelian)) }}</td>
                                        <td>
                                            <div class="text-danger">{{ $item->status_pembelian }}</div>
                                                @if (!empty($item->resi_pengiriman))
                                                    Resi: {{ $item->resi_pengiriman }}
                                                @endif
                                        </td>
                                        <td>Rp. {{ number_format($item->total_pembelian) }}</td>
                                        <td>
                                            <a href="/home/nota/{{ $item->id_pembelian }}" class="btn btn-danger btn-sm text-white">Nota</a>
                                            @if ($item->status_pembelian=='pending')
                                                <a href="/home/bayar/{{ $item->id_pembelian }}" class="btn btn-success btn-sm">Input Pembayaran</a>
                                            @else
                                                <a href="/home/lihat_bayar/{{ $item->id_pembelian }}" class="btn btn-warning btn-sm">Lihat Pembayaran</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection