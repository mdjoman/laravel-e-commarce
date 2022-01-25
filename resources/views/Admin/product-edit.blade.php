@extends('Admin.admin-master')
@section('body')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit Post</h3>
                            <form action="{{ route('product.destroy', [$product->id]) }}" class="mr-1" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" > <i class="fas fa-trash"></i> Delete product </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-12  col-md-12 ">
                                <form action="{{ route('product.update',[$product->id]) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Categories Name"> Category Name:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="category_id" id="">
                                                    <option value="">{{$product->category->name }}</option>
                                                    @foreach($categories as $key => $category)
                                                    <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>

                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="brand Name"> Brand Name:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="brand_id" id="">

                                                    @foreach($brands as $key => $brand)
                                                    <option value="{{$brand->id}}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Categories Name"> Product Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Categories Name" name="Product_name" value="{{ $product->Product_name}}">
                                                <input type="hidden" value="{{ $product->id }}" name="id">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Categories Name">Product Code:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Categories Name" name="Product_code" value="{{ $product->Product_code}}">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Categories Name">Product Price:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="Categories Name" name="Product_Price" value="{{ $product->Product_Price}}">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Categories Name">Discount %:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="Categories Name" name="discount_Price"  max="100" value="{{ $product->discount_Price}}">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Categories Name">Coupon Price:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Categories Name" name="coupon" value="{{ $product->coupon}}">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Categories Name">Stock Amount:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="Categories Name" name="Product_Amount" value="{{ $product->Product_Amount}}">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Description">Shrot Description:</label>
                                            <div class="col-sm-10">
                                                <textarea id="Categories summernote1" class="form-control" rows="2" name="sDescription"> {{ $product->sDescription}}</textarea>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Description"> Long Description:</label>
                                            <div class="col-sm-10">
                                                <textarea id="Categories summernote" class="form-control" rows="4" name="lDescription"> {{ $product->lDescription}}</textarea>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label " for="Description"> Product Image:</label>
                                            <div class="col-sm-10">
                                                <div class="form-check-inline ">
                                                    <label class="form-check-label "><input type="file" name="Image" accept="image/*"></label>
                                                    <img src="{{asset( $product->image)}}" width="150px" height="100px" alt="">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label " for="Description"> Product Sub-Image:</label>
                                            <div class="col-sm-10">
                                                <div class="form-check-inline ">
                                                    <label class="form-check-label "><input type="file" name="sImage[]" multiple accept="image/*"></label>
                                                    @foreach($product->subimages as $key => $subimage)
                                                    <img src="{{asset($subimage->subimage)}}" width="50px" height="50px" alt="">
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label " for="Description"> Publication status:</label>
                                            <div class="col-sm-10">
                                                <div class="form-check-inline ">
                                                    <label class="form-check-label "><input type="radio" name="status" {{ $product->status == 'Published' ? 'checked' : '' }} value=" Published"> Published</label>
                                                </div>
                                                <div class="form-check-inline ">
                                                    <label class="form-check-label"> <input type="radio" name="status" {{ $product->status ==  'Unpublished' ? 'checked' : '' }} value=" Unpublished"> Unpublished</label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-lg btn-primary">Create New Post</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
  <title>Summernote with Bootstrap 4</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#summernote1').summernote();
    });
  </script>

  @endsection