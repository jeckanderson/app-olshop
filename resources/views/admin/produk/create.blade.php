@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        <h4>Tambah Produk</h4>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="/admin/product" method="POST" class="mb-4" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_category">Kategori</label>
                    <select class="form-select form-control @error('id_category') is-valid @enderror" aria-label="Default select example" name="id_category" id="id_category">
                        <option value="">-Pilih Kategori-</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id_category }}" name="id_category">{{ $category->name_category }}</option>
                            @endforeach
                      </select>
                    @error('id_category')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-valid @enderror" id="nama_produk" name="nama_produk" required autofocus value="{{ old('nama_produk') }}">
                    @error('nama_produk')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga_produk">Harga</label>
                    <input type="number" class="form-control @error('harga_produk') is-valid @enderror" id="harga_produk" name="harga_produk" required value="{{ old('harga_produk') }}">
                    @error('harga_produk')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="text" class="form-control @error('berat') is-valid @enderror" id="berat" name="berat" required value="{{ old('berat') }}">
                    @error('berat')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto_produk">Foto Produk</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <div class="input-img">
                        <input type="file" class="form-control @error('foto_produk') is-invalid @enderror" id="foto_produk" name="foto_produk" onchange="previewImage()">
                    </div>
                    {{-- <span class="btn btn-sm btn-danger mt-2 btn-plus">
                        <i class="fa fa-plus"></i>
                    </span> --}}
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
                    <input type="hidden" id="deskripsi_produk" name="deskripsi_produk" value="{{ old('deskripsi_produk') }}">
                    <trix-editor input="deskripsi_produk"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="stok_produk">Stok</label>
                    <input type="number" class="form-control @error('stok_produk') is-valid @enderror" id="stok_produk" name="stok_produk" required value="{{ old('stok_produk') }}">
                    @error('stok_produk')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Simpan Produk</button>
            </form>
        </div>
    </div>

    {{-- script untuk trix-editornya --}}
    <script>
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

        // Script untuk multiplay Img
        // $(document).ready(function() {
        //     $(".btn-plus").on("click",function() {
        //        $(".input-img").append("<input type='file' class='form-control @error('foto_produk') is-invalid @enderror' id='foto_produk' name='foto_produk[]' onchange='previewImage()'>");
        //     })
        // })
        
    </script>


@endsection