@extends('layouts.app')

@section('container')
    <h2>Cart Page</h2>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Hp</td>
                    <td>100.0000</td>
                    <td>4</td>
                    <td>200.000</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  Keranjang
                </div>
            </div>
        </div>
    </div>
</div> --}}
