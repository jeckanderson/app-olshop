@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        <h2 class="h4">Tambah Pelanggan</h2>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="/admin/product" method="POST" class="mb-5">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Pelanggan</label>
                    <input type="text" class="form-control @error('name') is-valid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-valid @enderror" id="email" name="email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="number" class="form-control @error('telepon') is-valid @enderror" id="telepon" name="telepon" required value="{{ old('telepon') }}">
                    @error('telepon')
                        <div class="invalid-fedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

@endsection