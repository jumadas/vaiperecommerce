@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Profile </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="">Profile</a></li>

    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-12">
            <div class="alert alert-secondary">
                Account Created:   {{Auth::user()->created_at->diffForHumans()}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Change Your Name
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('profilepage.namechange') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                          <div class="form-group">
                              <button class="btn btn-success btn-sm">Change Name</button>
                          </div>
                    </form>

                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    Change Your Photo
                </div>
                <div class="row  mt-2">
                    <div class="col-12 text-center">
                        <img width="100px" src="{{ asset('uploads/profile_photos').'/'.Auth::user()->profile_photo }}" alt="Card image cap">
                    </div>

                </div>

                <div class="card-body">
                    @if (session('photo_sucess'))
                    <div class="alert alert-success">
                        {{ session('photo_sucess') }}
                    </div>
                    @endif

                    <form action="{{ route('profilepage.photochange') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >New Photo</label>
                                <input type="file" class="form-control" name="new_profile_photo" accept=".jpg,.png">
                            @error('new_profile_photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                          <div class="form-group">
                              <button class="btn btn-success btn-sm">Change Photo</button>
                          </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Change  Password
                </div>

                <div class="card-body">
                    @if (session('success_p'))
                    <div class="alert alert-success">
                        {{ session('success_p') }}
                    </div>
                    @endif

                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach

                    </div>
                    @endif --}}
                    <form action="{{ route('profilepage.passwordchange') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label >Old Password</label>
                                <input type="password" class="form-control" name="old_password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label >Password</label>
                                <input type="password" class="form-control" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label >Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirm">
                            @error('password_confirm')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                          <div class="form-group">
                              <button class="btn btn-success btn-sm">Change Password</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
