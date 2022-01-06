@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

    </ol>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Add Coupon
                </div>

                <div class="card-body">
                    <form action="{{ route('coupon.store') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        {{-- @foreach ($errors->all() as $error )
                         <li>{{ $error }}</li>
                        @endforeach --}}
                        <div class="form-group">
                          <label >Coupon Name</label>
                          <input type="text" name="coupon_name" class="form-control"  placeholder="Enter Coupon Name">
                            @error('coupon_name')
                            <span class="text-danger">{{  $message }}</span>
                            @enderror
                        </div>
                         <div class="form-group">
                          <label > Discount Percentage</label>
                          <input type="text" name="discount_percentage" class="form-control"  placeholder="Enter Discount Percentage">
                            @error('discount_percentage')
                            <span class="text-danger">{{  $message }}</span>
                            @enderror

                        </div>
                         <div class="form-group">
                          <label >Coupon Validity</label>
                          <input type="date" name="validity" class="form-control"  placeholder="Enter Validity">
                            @error('validity')
                                <span class="text-danger">{{  $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label >Coupon Limit  </label>
                            <input type="text"  name="limit" class="form-control" placeholder="Enter Coupon Limit">
                            @error('limit')
                                <span class="text-danger">{{  $message }}</span>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-primary">Add New Coupon</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


