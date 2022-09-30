@extends('admin.templates.main')

@section('container')
    
<div class="col-md-6 mb-5">
    <div class="card mb-3">
        <div class="card-header text-white text-center" style="background: #157ED2">
            <h5><i class="fas fa-user-edit"></i> Admin Profile / Update</h5> 
        </div>
        <div class="card-body">
            <form action="/admin/profile/{{ $admin->id }}" method="post">
                @csrf
                @method('put')
                <div class="title mb-1 text-center border-bottom py-2">
                    <img src="{{ asset('templates/img/undraw_profile.svg') }}" class="card-img-top img-fluid rounded-circle" style="width: 150px">
                    <h2>{{ $admin->name }}</h2>
                    <p class="d-inline">Member Sience</p>: {{ $admin->created_at->diffForHumans() }}
                </div>
                <div class="title mb-1">
                    <label for="title" class="form-label border-bottom">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $admin->name) }}"> 
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="title mb-1">
                    <label for="title" class="form-label border-bottom">Alamat</label>
                    <input type="text" class="form-control @error('alamat_user') is-invalid @enderror" name="alamat_user" value="{{ old('alamat_user', $admin->alamat_user) }}">
                    @error('alamat_user')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror 
                </div>
                <div class="title mb-1">
                    <label for="title" class="form-label border-bottom">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $admin->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror 
                </div>
                <div class="title mb-2">
                    <label for="title" class="form-label border-bottom">No Telpon</label>
                    <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon', $admin->telepon) }}">
                    @error('telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror 
                </div>
                <div class="title mb-2">
                    <label for="title" class="form-label border-bottom">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Update</button>
            </form>
        </div>
    </div>
</div>


@endsection