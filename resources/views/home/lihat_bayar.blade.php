@extends('layouts.app')

@section('container')
   <div class="container pt-5">
    <div class="row py-3">
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
            <div class="card">
                <div class="card-header bg-warning"><h5><i class="fas fa-history"></i> Riwayat Belanja: {{ $pembayaran->name }}</h5></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $pembayaran->name }}</td>
                        </tr>
                        <tr>
                            <th>BANK</th>
                            <td>{{ $pembayaran->bank }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ date("d F Y", strtotime($pembayaran->tanggal)) }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>Rp. {{ number_format($pembayaran->jumlah) }}</td>
                        </tr>
                        <tr>
                            <th>Bukti Pembayaran</th>
                            <td>
                                <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="bukti pembayaran" class="img-reponsive img-fluid rounded mx-auto img-thumbnail" width="50%">
                            </td>
                        </tr>
                    </table>
                    {{-- <div class="info">
                        <h6>Bukti Pembayaran</h6>
                        <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="" class="img-reponsive img-fluid rounded mx-auto img-thumbnail">
                    </div> --}}
                </div>
            </div>
        </div>
   </div>
</div>
@endsection