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
                    List Category
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Category Photo</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->status }}</td>

                                        <td>
                                            <img width="200" src="{{ asset('uploads/category_photos').'/'.$category->category_photo }}" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-sm btn-warning">Show</a><br>
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-info mt-2">Edit</a>
                                          <form class="mt-2" action="{{ route('category.destroy',$category->id) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-sm btn-danger">Delete</button>

                                          </form>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center text-danger">
                                        <td colspan="50">No record to show</td>
                                    </tr>
                                @endforelse


                            </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

