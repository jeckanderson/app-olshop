@extends('admin.templates.main')

@section('container')
    
<div class="col-md-6 mb-5">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card mb-3">
        <div class="card-header text-center text-white" style="background: #157ED2">
            <h5><i class="far fa-user-circle"></i> Admin Profile</h5>
        </div>
        <div class="card-body">
            <div class="title mb-1">
                <div class="header text-center border-bottom p-2">
                    <img src="{{ asset('templates/img/undraw_profile.svg') }}" class="card-img-top img-fluid rounded-circle" style="width: 150px">
                    <h2>{{ $admin->name }}</h2>
                    <p class="d-inline">Member Sience</p>: {{ $admin->created_at->diffForHumans() }}
                </div>
                <div class="header-title border-bottom p-2">
                    <p class="m-0 p-0"><i class="fas fa-map-marker-alt"></i> <strong>Alamat</strong></p>
                    {{ $admin->alamat_user }}
                </div>
                <div class="header-title border-bottom p-2">
                    <p class="m-0 p-0"><i class="fas fa-envelope"></i> <strong>Email</strong></p>
                    {{ $admin->email }}
                </div>
                <div class="header-title border-bottom p-2 mb-3">
                    <p class="m-0 p-0"><i class="fas fa-phone-alt"></i> <strong>No Telpon</strong></p>
                    {{ $admin->telepon }}
                </div>
                <a href="/admin/profile/{{ $admin->id }}/edit" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Update Profile</a>
            </div>
        </div>
    </div>
</div>


@endsection