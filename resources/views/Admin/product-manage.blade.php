@extends('Admin.admin-master')
@section('body')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Product</h1>
        <a href="{{route('product.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add Product</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 container">
        <div class="card card-body rounded-0">
            <div class="container">
                @if($message = Session::get('message'))
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $message}}
                </div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Manage product</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL.NO</th>
                                        <th> Product ID</th>
                                        <th>Image</th>
                                        <th> Category</th>
                                        <th>Price</th>
                                        <th>Qnty</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($products->count())
                                    @foreach($products as $key => $product)
                                  
                                    <tr>
                                        
                                        <td class="align-middle text-center">{{ $loop->iteration}}</td>
                                        <td class="align-middle text-center">{{ $product->id}}</td>
                                        <td>
                                            <div style="max-width: 70px; max-height:60px;overflow:hidden">
                                                <img src="{{ asset($product->image) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">{{ substr($product->category->name, 0,8) }}</td>
                                        <td class="align-middle text-center">{{ $product->Product_Price}}</td>
                                        <td  class="align-middle text-center">{{ $product->Product_Amount }}</td> 
                                        <td class="align-middle text-center">{{ $product->discount_Price }}</td>
                                        <td  class="align-middle text-center">{{$product->status}}</td>
                                        <td class="align-middle text-center d-flex">
                                            <a href="{{ route('product.edit', [$product->id])}}" class="btn btn-sm  btn-success mr-2">Edite</a>
                                            <a href="{{ route('product.show', [$product->id])}}" class="btn btn-sm  btn-warning mr-2">View</a>
                                            <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-sm  btn-danger mr-2">Delete</a>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="p-5">
                                            <h5 class="text-center p-5">No categories found.</h5>
                                        </td>
                                    </tr>
                                    @endif

                                </tbody>

                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        </div>

    </div>
    @endsection
    