@extends('admin.templates.main')

@section('container')
    <div class="border-bottom mb-3">
        <h2 class="h4">Update Kategori</h2>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="/admin/category/{{ $category->id_category }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name_category" class="form-label">Kategori</label>
                    <input type="text" name="name_category" class="form-control @error('name_category') is-invalid @enderror" id="name_category" value="{{ old('name_category', $category->name_category) }}">
                    @error('name_category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <button type="submit" class="btn btn-sm btn-primary mt-4"><i class="far fa-edit"></i> Update Kategori</button>
            </form>
        </div>
    </div>
@endsection
