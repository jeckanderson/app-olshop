@extends('admin.templates.main')

@section('container')
    
    <div class="border-bottom mb-3">
        <h4>Tambah Kategori</h4>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="/admin/category" method="post">
                @csrf
                <div class="form-groupo">
                    <label for="name_category">Kategori</label>
                    <input type="text" name="name_category" class="form-control @error('name_category') is-invalid @enderror" id="name_category" value="{{ old('name_category') }}">
                    @error('name_category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-4" name="category"><i class="far fa-save"></i> Simpan Kategori</button>
            </form>
        </div>
    </div>
@endsection
