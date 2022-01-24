@extends('admin.admin-master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage brand</h1>
        <a href="{{route('brand.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add brand</a>
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
                        <h6 class="m-0 font-weight-bold text-primary">Manage brand</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">SL.NO</th>
                                        <th class="align-middle text-center"> Name</th>
                                        <th class="align-middle text-center">Published_At</th>
                                        <th class="align-middle text-center">Status</th>

                                        <th class="align-middle text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($brands->count())
                                    @foreach($brands as $key => $brand)

                                    <tr>
                                        <td class="align-middle text-center">{{ $loop->iteration}}</td>
                                        <td class="align-middle text-center">{{substr($brand->name,0,10)}}</td>
                                        <td class="align-middle text-center">{{ $brand->created_at->format('d M, Y') }}</td>
                                        <td class="align-middle text-center">{{$brand->status}}</td>

                                        <td class="align-middle text-center">
                                            <a href="{{ route('brand.edit', [$brand->id])}}" class="btn btn-sm btn-success">Edite</a>
                                            <a href="{{ route('brand.edit', [ $brand->id])}}" class="btn btn-sm   btn-danger">Delete</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="p-5">
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