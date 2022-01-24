@extends('admin.admin-master')
@section('body')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
    <a href="{{route('category.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Manage Category</a>
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

    <div class="container">
      <form class="" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="Categories Name"> Category Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="Categories Name" value="{{ old('name') }}" placeholder="Category Name...." name="name">
            <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="Description"> Description:</label>
          <div class="col-sm-10">
            <textarea id="Categories Description" class="form-control" rows="2" value="{{ old('Description') }}" name="Description"> </textarea>

          </div>
        </div>
        <!--
        <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name"> Category Image:</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="Categories Name" placeholder="Category image" name="image">
              <span>{{ $errors->has('image') ? $errors->first('image') : ''}}</span>
              </div>
         </div>
          -->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label " for="Description"> Publication status*:</label>
          <div class="col-sm-10">
            <div class="form-check-inline ">
              <label class="form-check-label "><input type="radio" name="status" value=" Published" {{(old('status') == 'Published') ? 'checked' : ''}}> Published*</label>
              <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('status') ? $errors->first('status') : ''}}</span>
            </div>
            <div class="form-check-inline ">
              <label class="form-check-label"> <input type="radio" name="status" value=" Unpublished" {{(old('status') == 'Unpublished') ? 'checked' : ''}}> Unpublished*</label>
              <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('status') ? $errors->first('status') : ''}}</span>
            </div>
          </div>
        </div>

    </div>
    <div class="form-group row ">
      <div class=" col-sm-10">
        <button type="submit" class="btn btn-success">Create New Category</button>
      </div>
    </div>
    </form>
  </div>
</div>

@endsection