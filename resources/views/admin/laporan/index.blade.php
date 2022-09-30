@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        @if(empty($tglm) OR !($tgls))
            <h4>Laporan Pembelian</h4>
        @else
            <h4>Laporan Pembelian dari <strong>{{ date("d F Y", strtotime($tglm)) }}</strong> sampai <strong>{{ date("d F Y", strtotime($tgls)) }}</strong></h4>
        @endif
    </div>

    <form action="/admin/laporan/data" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tanggal">Tanggal Mulai</label>
                    <input type="date" name="tglm" class="form-control" value="{{ $tglm ?? '' }}">
                </div>
            </div>
            <div class="col-md-3">
                <label for="">Tanggal Selesai</label>
                <input type="date" name="tgls" class="form-control" value="{{ $tgls ?? '' }}">
            </div>
            <div class="col-md-3">
                <label for="status">Status</label>
                <select name="status_pembelian" id="status_pembelian" class="form-control">
                    <option value="">-Pilih Status-</option>
                    <option value="barang dikirim">barang dikirim</option>
                    <option value="pending">pending</option>
                    <option value="sudah melakukan pembayaran">sudah melakukan pembayaran</option>
                    <option value="di batalkan">di batalkan</option>
                    <option value="barang sudah sampai">barang sudah sampai</option>
                    <option value="lunas">lunas</option>
                </select>
            </div>
            <div class="col-md-2">
                <label>&nbsp;</label><br>
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i> Filter Data</button>
            </div>
        </div>
    </form>

    <table class="table table-hover">
        <thead class="text-white" style="background: #495C83">
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="table-bordered">
            @php $total = 0; @endphp
            @if(empty($allData) OR !($allData))
                <tr>
                    <th colspan="5" class="text-center text-danger">Silahkan Pilih Tanggal mulai dan Tanggal Selesai</th>
                </tr>
            @else
            @foreach($allData as $data)
                @php $total+= $data->total_pembelian @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ date("d F Y", strtotime($data->tanggal_pembelian)) }}</td>
                        <td>Rp. {{ number_format($data->total_pembelian) }}</td>
                        <td>{{ $data->status_pembelian }}</td>
                    </tr>
            @endforeach
        </tbody>
        <tfoot class="table">
            <tr class="text-white" style="background: #495C83">
                <td colspan="3" class="text-center">Total Pembelian</td>
                <td>Rp. {{ number_format($total) }}</td>
                <td></td>
            </tr>
        </tfoot>
            @endif
    </table>

    <div class="mb-5">
        @if (isset($allData))
        <a href="/laporan/cetakpdf/{{ $tglm }}/{{ $tgls }}/{{ $status }}" target="_BLANK" class="btn btn-sm btn-success"><i <i class="fas fa-file-download"></i> Download Laporan</a>
    @endif
    </div>

@endsection
