@extends('layouts.app')

@section('container')
    <div class="content py-5">
        <div class="row pt-2">
            {{-- Awal Slider --}}
            <div class="col-md-9 mb-2 col-md-pull-3 order-md-2">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://source.unsplash.com/400x180?store,dress" class="d-block w-100 img-fluid" alt="slider img 1" style="height: 450px;">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>Some representative placeholder content for the first slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="https://source.unsplash.com/400x180?store,bag" class="d-block w-100 img-fluid" alt="slider img 2" style="height: 450px;">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Second slide label</h5>
                          <p>Some representative placeholder content for the second slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="https://source.unsplash.com/400x180?store,trousers" class="d-block w-100 img-fluid" alt="slider img 3" style="height: 450px;">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Third slide label</h5>
                          <p>Some representative placeholder content for the third slide.</p>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
                {{-- <div class="container" style="background: #157ED2">
                  <div class="row p-1 text-center" style="color: #C8C8CB">
                    <div class="col-md-4">
                      <h4>Garansi Uang Kembali</h4>
                      <div>Uang Kembali 100% bila cacat produk</div>
                    </div>
                    <div class="col-md-4">
                      <h4>Gratis Pengiriman</h4>
                      <div>Gratis pengiriman seluruh pulau jawa denga JNE</div>
                    </div>
                    <div class="col-md-4">
                      <h4>Harga Termurah</h4>
                      <div>Jaminan Harga Termurah dengan Produksi Kami sendiri</div>
                    </div>
                  </div>
                </div> --}}

                {{-- style="background: #157ED2" --}}
                <div class="row mt-1">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body text-white" style="background: #277BC0">
                        <div class="card-title"><h4>Garansi Uang Kembali</h4></div>
                        <div>Uang Kembali 100% bila cacat produk</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body text-white" style="background: #319DA0">
                        <div class="card-title"><h4>Gratis Pengiriman</h4></div>
                        <div>Gratis pengiriman seluruh pulau jawa dengan JNE</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body text-white" style="background: #FF7F3F">
                        <div class="card-title"><h4>Harga Termurah</h4></div>
                        <div>Jaminan Harga Termurah dengan Produksi Kami sendiri</div>
                      </div>
                    </div>
                  </div>
                </div>

                  {{-- Content Produk Terbaru --}}
                {{-- <div class="card mt-2">
                    <div class="card-img">
                        <div class="position-absolute bg-warning px-3">Produk Terbaru</div>
                        @if ($product[0]->foto_produk)
                            <img src="{{ asset('storage/'.$product[0]->foto_produk) }}" class="card-img-top img-fluid" style="width: 100%; height: 130px;">
                        @else
                            <img src="https://source.unsplash.com/1200x240?nature,clothes" class="card-img-top img-fluid">
                        @endif
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product[0]->nama_produk }}</h5>
                        <p class="card-text">Rp. {{ number_format($product[0]->harga_produk) }}</p>
                        <input type="hidden" value="{{ $product[0]->berat }}">
                        <a href="/add-cart/{{ $product[0]->id_produk }}" class="btn btn-sm btn-success"><i class="fas fa-shopping-cart"></i> Beli</a>
                        <a href="/home/show/{{ $product[0]->id_produk }}" class="btn btn-sm btn-primary">Detail</a>
                    </div>
                </div> --}}
                <div class="row mt-3">
                  @foreach ($product as $item)
                      <div class="col-md-3 mb-2">
                          <div class="card">
                              @if ($item->foto_produk)
                                  <img src="{{ asset('storage/' . $item->foto_produk) }}" class="card-img-top img-thumbnail" style="width: 405; height: 400;">
                              @else    
                                  <img src="https://source.unsplash.com/400x400?store,clothes" class="card-img-top img-thumbnail">
                              @endif
                              <div class="card-body">
                              <h6 class="card-title">{{ $item->nama_produk }}</h6>
                              <p class="card-text">Rp. {{ number_format($item->harga_produk) }}</p>
                              <input type="hidden" value="{{$item->berat}}">
                              @if(empty($item->stok_produk))
                                  <div class="btn btn-sm btn-outline-secondary">Stok Habis</div>
                              @else
                                  <a href="/add-cart/{{ $item->id_produk }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-shopping-cart"></i> Beli</a>
                              @endif
                              <a href="/home/show/{{ $item->id_produk }}" class="btn btn-sm text-white" style="background: #157ED2;">Detail</a>
                              </div>
                          </div>
                      </div>
                  @endforeach
                    {{-- <div class="d-flex justify-content-center">
                        {{ $product->links() }}
                    </div> --}}
              </div>
            </div>
              {{-- Akhir slider Produk --}}

              {{-- Awal Kategory dan Produk Terlaris --}}
            <div class="col-md-3 col-md-push-9">
                @include('sidebar.kategori')
                @include('sidebar.p_terlaris')
                @include('sidebar.testimoni')
            </div>
            {{-- Akhir Kategory dan Produk Terlaris --}}
        </div>
    </div>



    {{-- <div class="content">
        <div class="row mb-3">
            <div class="col-md-3">
                @include('sidebar.testimoni')
            </div>

            <div class="col-md-9">
                <div class="row">
                    @foreach ($product->skip(1) as $item)
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                @if ($item->foto_produk)
                                    <img src="{{ asset('storage/' . $item->foto_produk) }}" class="card-img-top img-thumbnail" style="width: 405; height: 400;">
                                @else    
                                    <img src="https://source.unsplash.com/400x400?nature,clothes" class="card-img-top img-thumbnail">
                                @endif
                                <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_produk }}</h5>
                                <p class="card-text">Rp. {{ number_format($item->harga_produk) }}</p>
                                <input type="hidden" value="{{$item->berat}}">
                                <a href="/add-cart/{{ $item->id_produk }}" class="btn btn-sm btn-success"><i class="fas fa-shopping-cart"></i> Beli</a>
                                <a href="/home/show/{{ $item->id_produk }}" class="btn btn-sm btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

@endsection
