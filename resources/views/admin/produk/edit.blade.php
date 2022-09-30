@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        <h2 class="h3">Ubah Produk</h2>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="/admin/product/{{ $product->id_produk }}" method="POST" class="mb-5" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="id_category">Kategori</label>
                    <select class="form-control" name="id_category">
                        {{-- <option value="">-Pilih Kategori-</option> --}}
                            @foreach($categories as $category)
                                @if(old('id_category', $product->id_category) == $category->id_category)
                                    <option value="{{ $category->id_category }}" selected>{{ $category->name_category }}
                                    </option>
                                @else
                                    <option value="{{ $category->id_category }}">{{ $category->name_category }}
                                    </option>
                                @endif
                            @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-valid @enderror" id="nama_produk" name="nama_produk" required autofocus value="{{ old('nama_produk', $product->nama_produk) }}">
                    @error('nama_produk')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga_produk">Harga</label>
                    <input type="number" class="form-control @error('harga_produk') is-valid @enderror" id="harga_produk" name="harga_produk" required value="{{ old('harga_produk', $product->harga_produk) }}">
                    @error('harga_produk')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="number" class="form-control @error('berat') is-valid @enderror" id="berat" name="berat" required value="{{ old('berat', $product->berat) }}">
                    @error('berat')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto_produk">Foto Produk</label>
                    {{-- Kirim Gambar Lama ke AdminProductController --}}
                    <input type="hidden" name="oldImage" value="{{ $product->foto_produk }}">
                    @if($product->foto_produk)
                        <img src="{{ asset('storage/' . $product->foto_produk) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        {{-- <img src="https://source.unsplash.com/60x40?nature,water" class="card-img-top mb-3 col-sm-5 d-block"> --}}
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input type="file" class="form-control @error('foto_produk') is-valid @enderror" id="foto_produk" name="foto_produk" onchange="previewImage()">
                    @error('foto_produk')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_produk" class="d-block">Deskripsi</label>
                    @error('deskripsi_produk')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="hidden" id="deskripsi_produk" name="deskripsi_produk" value="{{ old('deskripsi_produk', $product->deskripsi_produk) }}">
                    <trix-editor input="deskripsi_produk"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="stok_produk">Stok</label>
                    <input type="number" class="form-control @error('stok_produk') is-valid @enderror" id="stok_produk" name="stok_produk" required value="{{ old('stok_produk', $product->stok_produk) }}">
                    @error('stok_produk')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Update Produk</button>
            </form>
        </div>
    </div>

    
    <script>
        // script untuk trix-editornya
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
        // script untuk image preview
        function previewImage() {
            const image = document.querySelector('#foto_produk');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display='block'
            // perintah untuk mengambil nama gambar-nya
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);
            // ketika di load
            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>


@endsection