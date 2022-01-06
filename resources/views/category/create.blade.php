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
                    Add Category
                </div>

                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label >Category Name</label>
                          <input type="text" name="category_name" class="form-control"  placeholder="Enter Category Name">
                        </div>

                        <div class="form-group">
                            <label > Category Tagline </label>
                            <input type="text"  name="category_tagline" class="form-control" placeholder="Enter Category Tagline"></textarea>
                        </div>

                        <div class="form-group">
                            <label >Category Photo</label>
                            <input type="file" name="category_photo" class="form-control" >
                          </div>

                        <button type="submit" class="btn btn-primary">Add New Category</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

