@extends('Admin.admin-master')
@section('body')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Create Product</h3>
                            <a href="{{ route('product.index') }}" class="btn btn-primary">Manage Product</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if($message = Session::get('message'))
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $message}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-12  col-md-12 ">
                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="title">Product Name*:</label>
                                            <div class="col-sm-10">
                                                <input type="name" name="Product_name" value="{{old('Product_name')}}"  class="form-control" placeholder="Product Name*">
                                                <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('Product_name') ? $errors->first('Product_name') : ''}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="brand Name">Choose Brand* :</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="brand_id" id="" value="">
                                                    <option value="-">---- Select Brand Name*-----</option>
                                                    @foreach($brands as $key => $brand)
                                                    <option value="{{$brand->id}}" {{ (old('brand_id')== $brand->id)? 'selected':''}}>{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Categories Name">Choose Category*:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="category_id" id="">
                                                    <option value="">----- Select Category Name*-----</option>
                                                    @foreach($categorys as $key => $category)
                                                    <option value="{{$category->id}} " {{ (old('category_id')== $category->id)? 'selected':''}} >{{$category->name}}</option>

                                                    @endforeach
                                                </select>
                                                <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Product_code">Product Code:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Product_code" placeholder="Product Code" value="{{ old('Product_code') }}" name="Product_code">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Product_Price">Product Price*:</label>
                                            <div class="col-sm-10">
                                                <input type="float" class="form-control" id="Product_Price" value="{{ old('Product_Price') }}" placeholder="Product Price*" name="Product_Price">
                                                <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('Product_Price') ? $errors->first('Product_Price') : ''}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="discount_Price">Discount Price:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="discount_Price" placeholder="Discount Price" value="{{ old('discount_Price') }}" max="100"  name="discount_Price">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="coupon">Coupon code:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="coupon" placeholder="Coupon code" value="{{old('coupon')}}"  name="coupon ">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Product_Amount">Stock Amount*:</label>
                                            <div class="col-sm-10">
                                                <input  type="number" class="form-control" id="Product_Amount" value="{{old('Product_Amount')}}" placeholder="Stock Amount*" name="Product_Amount">
                                                <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('Product_Amount') ? $errors->first('Product_Amount') : ''}}</span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label " for="Description"> Product Image*:</label>
                                            <div class="col-sm-10">
                                                <div class="form-check-inline ">
                                                    <label class="form-check-label "><input type="file" name="Image" accept="image/*" value=""></label>
                                                    <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('Image') ? $errors->first('Image') : ''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label " for="Description"> Product Sub-Image*:</label>
                                            <div class="col-sm-10">
                                                <div class="form-check-inline ">
                                                    <label class="form-check-label "><input type="file" multiple accept="image/*" name="sImage[]" value=""></label>
                                                    <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('sImage') ? $errors->first('sImage') : ''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Description">Shrot Description*:</label>
                                            <div class="col-sm-10">
                                                <textarea id="Categories summernote1" class="form-control" rows="2" name="sDescription">{{ old('sDescription') }}</textarea>
                                                <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('sDescription') ? $errors->first('sDescription') : ''}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="Description"> Long Description:</label>
                                            <div class="col-sm-10">
                                                <textarea id="summernote" class="form-control" rows="4" name="lDescription">{{ old('lDescription') }} </textarea>
                                            </div>
                                        </div>
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

                                        <div class="form-group row ">
                                            <div class=" col-sm-10">
                                                <button type="submit" class="btn btn-success">Creat New Product</button>
                                            </div>
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