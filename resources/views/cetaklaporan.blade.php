{{-- @extends('admin.templates.main') --}}
<style type="text/css">
    table{margin-top: 15px;}
    thead{background: rgb(232, 235, 83);}
    table, th, td {
        border: 1px solid black;
        width: 100%;
        padding: 3px;
        border-collapse: collapse;
    }
    table tr td,
		table tr th{
			font-size: 9pt;
	}
    h3{
        text-align: center;
        padding: 0;
        margin: 0;
    }
    h4{text-align: center; padding: 0; margin: 0; font-size: 14px}
    h5{text-align: center; padding: 0; margin: 0; font-size: 13px;}
    p{border-bottom: 2px solid black; margin-top: 8px; padding: 0}
    .total{text-align: center;}
</style>
{{-- @section('container') --}}
    <h4>Ollshope Voices</h4>
    <h3>Laporan Penjualan Perbulan</h3>
    <h5>{{ date('d F Y', strtotime($tglm)) }} - {{ date('d F Y', strtotime($tgls)) }}</h5>
    <p></p>
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
                <td colspan="3" class="total"><strong>Total Pembelian</strong></td>
                <td><strong>Rp. {{ number_format($total) }}</strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
{{-- @endsection --}}