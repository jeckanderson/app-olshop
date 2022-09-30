@extends('admin.templates.main')
@section('container')
    <table class="table table-bordered">
        <thead class="bg-secondary">
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($allData as $key => $data)
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
            <tr>
                <td colspan="3">Total</td>
                <td>Rp. {{ number_format($total) }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>

@endsection