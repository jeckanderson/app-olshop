@extends('admin.templates.main')

@section('container')
    
    <div class="border-bottom mb-3">
        <h4>Data Kategori</h4>
    </div>

    <div class="table-responsive">
        <a href="/admin/category/create" class="btn btn-sm btn-primary mb-4">Tambah Kategori</a>
        {{-- Awal session Alert --}}
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
         {{-- Awal session Alert --}}
        <table class="table table-bordered table-hover">
            <thead class="text-white" style="background: #495C83">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $categori)
                    <tr>
                        <td>{{ $categories->firstItem() + $key }}</td>
                        <td>{{ $categori->name_category }}</td>
                        <td>
                            <a href="/admin/category/{{ $categori->id_category }}/edit" class="badge bg-success text-white">Update</a>
                            <form action="/admin/category/{{ $categori->id_category }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0 text-white" onclick="return confirm('yakin?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        showing
        {{ $categories->firstItem() }}
        to
        {{ $categories->lastItem() }}
        of
        {{ $categories->total() }}
        entries
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $categories->links() }}
    </div>
@endsection