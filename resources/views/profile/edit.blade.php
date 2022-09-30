@extends('layouts.app')

@section('container')
<div class="content pt-5">
    <div class="row mt-3">
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header text-white text-center" style="background: #157ED2">
                    <h5><i class="fas fa-user-edit"></i> User Profile / Update</h5> 
                </div>
                <div class="card-body">
                    <form action="/user/profile/{{ $user->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="title mb-1 text-center border-bottom py-2">
                            <img src="{{ asset('templates/vendor/img/user-icon.png') }}" class="card-img-top img-fluid rounded-circle" style="width: 150px">
                            <h2>{{ $user->name }}</h2>
                            <p class="d-inline">Member Sience</p>: {{ $user->created_at->diffForHumans() }}
                        </div>
                        <div class="title mb-1">
                            <label for="title" class="form-label border-bottom">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}"> 
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="title mb-1">
                            <label for="title" class="form-label border-bottom">Alamat</label>
                            <input type="text" class="form-control @error('alamat_user') is-invalid @enderror" name="alamat_user" value="{{ old('alamat_user', $user->alamat_user) }}">
                            @error('alamat_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>
                        <div class="title mb-1">
                            <label for="title" class="form-label border-bottom">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>
                        <div class="title mb-2">
                            <label for="title" class="form-label border-bottom">No Telpon</label>
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon', $user->telepon) }}">
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
                        <button type="submit" class="btn btn-sm text-white" style="background: #157ED2"><i class="far fa-edit"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            @include('profile.transaksi')
        </div>
    </div>
</div>
@endsection