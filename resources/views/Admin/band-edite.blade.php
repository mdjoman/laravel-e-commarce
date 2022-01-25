@extends('Admin.admin-master')
@section('body')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit brand</h1>
        <form action="{{ route('brand.destroy', [$brand->id]) }}" class="mr-1" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Delete brand </button>
        </form>
    </div>
</div>

<div class="card card-body mb-5">
    <div class="container">
        @if($message = Session::get('message'))
        <div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message}}
        </div>
        @endif

        <div class="container" style="margin-bottom: 10rem;">
            <form class="" action="{{ route ('brand.update', [$brand->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="Categories Name"> Brand Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Categories Name" value="{{ $brand->name }}"  name="name">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="Description"> Description:</label>
                    <div class="col-sm-10">
                        <textarea id="Categories Description" class="form-control" rows="2" name="Description"> {{ $brand->Description}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label mb-3" for="Description"> Publication status:</label>
                    <div class="col-sm-10">
                        <div class="form-check-inline ">
                            <label class="form-check-label "><input type="radio" name="status"{{ $brand->status == 'Published' ? 'checked' : '' }} value=" Published"> Published</label>
                            <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : ''}}</span>
                        </div>
                        <div class="form-check-inline ">
                            <label class="form-check-label"> <input type="radio" name="status" {{ $brand->status ==  'Unpublished' ? 'checked' : '' }} value=" Unpublished">Unpublished</label>
                            <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : ''}}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    <div class=" col-sm-10">
                        <button type="submit" class="btn btn-success">Update Brand</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection