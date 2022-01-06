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
                    Add Product
                </div>

                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                          <label >Product Category</label>
                          <select name="category_id" class="form-control">
                              <option>select one</option>
                              @foreach ($active_categories as $active_category )
                                   <option value="{{ $active_category->id }}">{{ $active_category->category_name }}</option>
                              @endforeach

                          </select>
                        </div>
                        <div class="form-group">
                          <label >Product Name</label>
                          <input type="text" name="product_name" class="form-control"  placeholder="Enter Product Name">
                        </div>
                         <div class="form-group">
                          <label >Product Price</label>
                          <input type="number" name="product_price" class="form-control"  placeholder="Enter Product Price">
                        </div>
                         <div class="form-group">
                          <label >Product Short Description</label>
                          <textarea name="product_short_description" class="form-control"  rows="2"></textarea>
                        </div>
                        <div class="form-group">
                          <label >Product Long Description</label>
                          <textarea name="product_long_description" class="form-control"  rows="4"></textarea>
                        </div>
                        <div class="form-group">
                          <label >Product Code</label>
                          <input type="text" name="product_code" class="form-control"  placeholder="Enter Product Code">
                        </div>
                        <div class="form-group">
                          <label >Product Quantity</label>
                          <input type="number" name="product_quantity" class="form-control"  placeholder="Enter Product Quantity">
                        </div>
                          <div class="form-group">
                            <label >Product Photo</label>
                            <input type="file" name="product_photo" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label >Product Thumbnails </label>
                            <input type="file"  class="form-control" name="product_thumbnails[]" multiple>
                          </div>


                        <button type="submit" class="btn btn-primary">Add New Product</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


