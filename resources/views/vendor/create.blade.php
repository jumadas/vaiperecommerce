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
                    Add Vendor
                </div>

                <div class="card-body">
                    <form action="{{ route('vendor.store') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label >Vendor Name</label>
                          <input type="text" name="vendor_name" class="form-control"  placeholder="Enter Vendor Name">
                        </div>
                         <div class="form-group">
                          <label >Vendor Email</label>
                          <input type="email" name="vendor_email" class="form-control"  placeholder="Enter Vendor Email">
                        </div>
                         <div class="form-group">
                          <label >Vendor Phone Number</label>
                          <input type="text" name="vendor_phone_number" class="form-control"  placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label >Vendor Address </label>
                            <input type="text"  name="vendor_address" class="form-control" placeholder="Enter Vendor Adress"></textarea>
                        </div>



                        <button type="submit" class="btn btn-primary">Add New Vendor</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


