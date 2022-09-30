@extends('layouts.app')

@section('container')
<div class="container py-5">
    <div class="row pt-3">
        @php
            if(empty(session('cart')) || !(session('cart'))) {
                echo "<script>alert('Data Belanja Belum Ada, Silahkan belanja terlebih dahulu.!')</script>";
                echo "<script>location='/'</script>";
            }
        @endphp
        <div class="col-md-3">
            <div class="card mb-1">
                @include('sidebar.kategori')
            </div>
            <div class="card mb-1">
                @include('sidebar.p_terlaris')
            </div>
            {{-- <div class="card">
                @include('sidebar.testimoni')
            </div> --}}
        </div>
       
        <div class="col-md-9">
            <div class="card-header bg-warning mb-1">
                <h5>Checkout Page</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="text-white" style="background: #182747">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subharga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalBelanja = 0; @endphp
                        @php $totalBerat = 0; @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id_produk => $produk)
                                @php
                                    $product = DB::table('Products')->where('id_produk', $id_produk)->first();
                                    $sub_harga = $product->harga_produk * $produk['quantity'];
                                    $totalBelanja += $sub_harga;
                                    $subBerat = $product->berat * $produk['quantity'];
                                    $totalBerat+=$subBerat;
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>Rp. {{ number_format($product->harga_produk) }}</td>
                                    <td>{{ $produk['quantity'] }}</td>
                                    <td>{{ number_format($sub_harga) }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-center">Total Belanja</th> 
                            <th>Rp. {{ number_format($totalBelanja) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <form action="/checkout/{{ $totalBelanja }}" method="POST">
                @csrf
                <div class="row">
                    @php
                        session('cart')
                    @endphp
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly value="{{ auth()->user()->name }}">
                        </div>
                    </div>
                     <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly value="{{ auth()->user()->telepon }}">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat_pengiriman">Alamat Lengkap Pengiriman</label>
                        <textarea class="form-control @error('alamat_pengiriman') is-invalid @enderror" name="alamat_pengiriman" placeholder="masukan alamat lengkap pengiriman (termasuk kode pos)" id="alamat_pengiriman"></textarea>
                        @error('alamat_pengiriman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="nama_provinsi" id="nama_provinsi" class="form-control">
                                <option value="">-Pilih Provinsi-</option>
                                @foreach($provinces as $key => $provinsi)
                                    <option value="{{ $provinsi['province_id'] }}" id_provinsi="{{ $provinsi['province_id'] }}">{{ $provinsi["province"] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Kota/Kabupaten</label>
                            <select name="nama_kabupaten" id="id_kabupaten" class="form-control">
                                {{-- <option value="">Pilih Kabupaten</option> --}}
                                {{-- @foreach($kab as $key => $val)
                                    <option value="{{ $val['city_id'] }}" id_val="{{ $val['city_id'] }}">{{ $val["city_name"] }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Ekspedisi</label>
                            <select name="nama_ekspedisi" id="id_ekspedisi" class="form-control" method="get">
                                <option value="">Pilih Ekspedisi</option>
                                {{-- <option value="jne">JNE</option>
                                <option value="pos">Pos Indonesia</option>
                                <option value="tiki">TIKI</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Paket</label>
                            <select name="paket_kirim" id="id_paket" class="form-control">
                                <!-- <option value="">Pilih Ekspedisi</option> -->
                            </select>
                        </div>
                    </div>
                </div>
                
                <input type="text" hidden name="total_berat" value="{{ $totalBerat }}" class="mt-3">
                <input type="text" hidden name="provinsi" class="mt-3" placeholder="Provinsi">
                <input type="text" hidden name="kabupaten" class="mt-3" placeholder="Kabupaten">
                <input type="text" hidden name="tipe" class="mt-3" placeholder="Tipe">
                <input type="text" hidden name="kodepos" class="mt-3" placeholder="Kodepos">
                <input type="text" hidden name="ekspedisi" class="mt-3" placeholder="Ekspedisi">
                <input type="text" hidden name="paket" class="mt-3" placeholder="Paket">
                <input type="text" hidden name="ongkir" class="mt-3" placeholder="Ongkir">
                <input type="text" hidden name="estimasi" class="mt-3" placeholder="Estimasi">

                <button type="submit" name="checkout" class="btn d-block text-white mt-3" style="background: #182747"><i class="fas fa-angle-double-right"></i> Checkout</button>
            </form>
        </div>
    </div>
</div>

<script  type="text/javascript">
    // ajax setup
    $(function() {
        $.ajaxSetup({
            headers: {'x-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    });

    $(document).ready(function() {
        // Script Province
        // $.ajax({
        //     type: 'post',
        //     url: "/provinsi'",
        //     success:function(hasil_provinsi)
        //     {
        //         $("select[name=nama_provinsi]").html(hasil_provinsi);
        //         // alert('oke');
        //         // console.log(hasil);
        //     }
        // });

        // Script Kabupaten
        // apa bila ada select dgn nama provinsi, select itu di change, maka akan muncul data kabupaten otomatis
        $("select[name=nama_provinsi]").on("change",function() {
            // ambil id_provinsi yg di pilih
            var id_provinsi_terpilih = $('option:selected', this).attr("id_provinsi");
            // alert(id_provinsi_terpilih);
            $.ajax({
                type:"get",
                url:"/kabupaten",
                data:'id_provinsi='+id_provinsi_terpilih,
                success:function(data)
                {
                    // $('#id_kabupaten').html(data);
                    $("select[name=nama_kabupaten]").html(data);
                },
                // error: function(error) {
                //     console.log(error);
                // }
            });
        });

        // Script Ekspedisi
        $.ajax({
            type:'get',
            url:"/ekspedisi",
            success:function(hasil_ekspedisi)
            {
                $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
            }
        });
        // Script Ekspedisi Paket
        $("select[name=nama_ekspedisi]").on("change",function(){
            // mendapatkan ekspedisi yang di pilih
            var distrik_terpilih = $("option:selected","select[name=nama_kabupaten]").attr("id_distrik");
            // alert(distrik_terpilih);
            // mendapatkan id distrik yang di pilih pengguna
            var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
            // alert(distrik_terpilih);
            // mendapatkan total berat dari inputan
            var total_berat = $("input[name=total_berat]").val();
            // alert(total_berat);
            $.ajax({
                type:"get",
                url:"/datapaket",
                data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
                success:function(hasil_paket)
                {
                    $("select[name=paket_kirim]").html(hasil_paket);
                    // isi inputan ekspedisi
                    // letakan nama ekspedisi terpilih di inputan ekspedisi
                    $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                    $("input[name=paket]").val(ekspedisi_terpilih);
                }
            });
        });

        // isi inputan kabupaten
        $("select[name=nama_kabupaten]").on("change", function(){
            var prov_terpilih = $("option:selected",this).attr("nama_province");
            var kab_terpilih = $("option:selected",this).attr("nama_distrik");
            var type_terpilih = $("option:selected",this).attr("type_distrik");
            var kodepos_terpilih = $("option:selected",this).attr("kodepos");
            // alert(kodepos_terpilih);
            // yg di dalam variabel di atas dimasukan ke dalam inputan yang kosong 
            $("input[name=provinsi]").val(prov_terpilih);
            $("input[name=kabupaten]").val(kab_terpilih);
            $("input[name=tipe]").val(type_terpilih);
            $("input[name=kodepos]").val(kodepos_terpilih);
        });

        // isi inputan paket, ongkir, estimasi
        $("select[name=paket_kirim]").on("change", function() {
            // ambil data paket
            var paket = $("option:selected", this).attr("paket");
            var ongkir = $("option:selected", this).attr("ongkir");
            var etd = $("option:selected", this).attr("etd");
            // isi data paket
            $("input[name=paket]").val(paket);
            $("input[name=ongkir]").val(ongkir);
            $("input[name=estimasi]").val(etd);
        })
    });
    
</script>
@endsection

