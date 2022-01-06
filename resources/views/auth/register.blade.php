@extends('layouts.app_auth')
@section('auth_form')

<div class="card-box p-2">
    <h2 class="text-uppercase text-center pb-4">
        <a href="index.html" class="text-success">
            <span><img src="{{ asset('dashboard') }}/assets/images/logo.png" alt="" height="26"></span>
        </a>
    </h2>

    <form class="form-horizontal" action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="name"> User Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" id="name" name="name" placeholder="User Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="emailaddress" >Email address<span class="text-danger">*</span></label>
                <input class="form-control @error('email') is-invalid @enderror" type="email"  value="{{ old('email') }}" id="emailaddress" name="email" placeholder="Enter Your Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>
        </div>
        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="phone_number">Phone Number</label>
                <input  class="form-control" type="number" id="phone_number" name="phone_number" placeholder="01700000000">

            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter Your Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="password">Confirm Password<span class="text-danger">*</span></label>
                <input  class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Enter Your Confirm Password" >
            </div>
        </div>



        <div class="form-group row text-center m-t-10">
            <div class="col-12">
                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Register</button>
            </div>
        </div>

    </form>

    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Already have an account?  <a href="{{ route('login') }}" class="text-dark m-l-5"><b>Log In</b></a></p>
        </div>
    </div>

</div>
@endsection
