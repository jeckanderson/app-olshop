@extends('admin.templates.main')

@section('container')
    
    <div class="border-bottom mb-3">
        <h4>Data Pelanggan</h4>
    </div>

    <div class="table-responsive">
        {{-- <a href="/admin/pelanggan/create" class="btn btn-sm btn-primary mb-4">Tambah Pelanggan</a> --}}
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
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users->skip(1) as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telepon }}</td>
                        <td>
                            <a href="" class="badge bg-success text-white">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        Showing
        {{ $users->firstItem() }}
        on
        {{ $users->lastItem() }}
        of
        {{ $users->total() }}
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $users->links() }}
    </div>
@endsection