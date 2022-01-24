@extends('admin.admin-master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Order</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Manage Order</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 container">
        <div class="card card-body rounded-0">
            <div class="container-fuild">
                @if($message = Session::get('message'))
                <div class="alert alert-warning alert-dismissible text-center">
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
                                        <th>Order ID</th>
                                        <th>Customar Name</th>
                                        <th>Mobile Number</th>
                                        <th>Order Total</th>
                                        <th>Payment Type</th>
                                        <th>Payment Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($Orders->count())
                                    @foreach($Orders as $key => $Order)
                                    <tr>
                                        <td class="align-middle text-center">{{ $Order->id}}</td>
                                        <td class="align-middle text-center">{{$Order->billing->fname}} {{$Order->billing->lname}}</td>
                                        <td style="width: 15%" class="align-middle text-center">{{ $Order->billing->mobile }}</td>
                                        <td class="align-middle text-center">{{ $Order->amount}}</td>
                                        <td class="align-middle text-center">{{$Order->payment_method }}</td>
                                        <td class="align-middle text-center">

                                            <form action="{{route('update-status')}}" method="POST">
                                                @csrf
                                                <input class=" form-control border border-info" type="text" name="status" value="{{$Order->status }}">
                                                <input type="hidden" name="id" value="{{ $Order->id}}">
                                                <button type="submit" class="btn btn-success form-control mt-2">Update</button>
                                            </form>

                                        </td>
                                        <td style="width: 12%" class="align-middle text-center">{{ $Order->order_date}}</td>
                                        <td style="width: 22%" class="align-middle text-center">
                                            <a href="{{ route('view-order', [ 'id' => $Order->id])}}" class="btn btn-sm  btn-success mr-1">View</a>
                                            <a href="{{ route('invoice', [ 'id' => $Order->id])}}" class="btn btn-sm  btn-success mr-1">Invoice</a>
                                            <a href="{{ route('delete-order', [ 'id' => $Order->id])}}" onclick="return confirm('are you sure deleat it?')" class="btn btn-danger btn-sm">Deleat</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="p-5">
                                            <h5 class="text-center p-5">No Order found.</h5>
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